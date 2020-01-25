<?php
$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"]; 
if (!isset($_COOKIE["authWebToken"])&&!isset($_COOKIE["username"])) {
    header("Status: 404 Not Found");
	die();
}
$host = 'localhost:3306';    
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
if(! $conn )  
{  
  die("2");  
}  

$sql = "SELECT * FROM authCode_table WHERE Token='$authCode_cookie'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $found_token_owner = $row["User"];
    }
} else {
    echo "0 results";
}
if ($found_token_owner != $username_cookie) {
	die("wrong owner detected");
}
$sql = "SELECT * FROM user_data WHERE username='$found_token_owner'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$found_rank = $row["rank"];
		$found_company = $row["userCompanyID"];
    }
} else {
    echo "0 results";
}
if ($found_rank != "owner"){
	die("404: not found");
}
$sql = "SELECT * FROM rank WHERE forCompanyID=$found_company ORDER BY struct_id ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$rank_name = $row["name"];
		if($rank_name == "owner"){
			$rank_name_tra = "Geschäftsführung";
		}else if($rank_name == "driver"){
			$rank_name_tra = "Fahrer";
		}else{
			$rank_name_tra = $rank_name;
		}
		$rank_salary = $row["salary"];
		echo "<tr>";
		echo <<<EOT
		<td>$rank_name_tra</td>
		<td>$rank_salary €</td>
		<td><button type="button" onclick="window.location='http://vtc.northwestvideo.de/company/rank_edit?rank=$rank_name';" class="btn btn-info">Bearbeiten</button></td>
		</tr>
		EOT;
    }
} else {
}
?> 
