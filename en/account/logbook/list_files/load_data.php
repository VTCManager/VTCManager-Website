<?php
$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"]; 

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
$sql = "SELECT * FROM tour_table WHERE username='$found_token_owner'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $found_tour_depature = $row["depature"];
		$found_tour_destination = $row["destination"];
		$found_truck_manu = $row["truck_manufacturer"];
		$found_truck_manu = $row["truck_model"];
		$found_tour_cargo = $row["cargo"];
		$found_tour = $row["tour_id"];
		echo <<<EOT
		<tr data-id='$found_tour'>
		<td>
		<a href="https://trucking-vs.de/user/13160">joschi_service</a>
		</td>
		<td><a target="_blank" href="https://trucking-vs.de/user/tour/13160">Baggerlader</a></td>
		EOT;
    }
} else {
    echo "0 results";
}
?> 