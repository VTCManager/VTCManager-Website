<?php  
$requested_ad_id = $_GET['ad_id'];
$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"]; 
date_default_timezone_set('Europe/Berlin');
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
if(! $conn )  
{  
  die("2");  
}  
$requested_ad_id = $conn->real_escape_string($requested_ad_id);


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
	die();
}

$sql = "SELECT * FROM user_data WHERE username='$found_token_owner'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		date_default_timezone_set("+1");
		$userCompanyID_search = $row["userCompanyID"];
		$rank_search = $row["rank"];
		$userid = $row["userID"];
		
	}
} else {
    echo "Error: User not found";
	die();
}
if($userCompanyID_search != "0"){
	die("You are already in a company");
}

$sql = "SELECT * FROM job_market WHERE AdID=$requested_ad_id";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$byCompanyID = $row["byCompanyID"];
				$AdID = $row["AdID"];
				$rank = $row["rank"];
			}
		}else{
			die("job ad not found");
		}
$sql = "SELECT * FROM application ORDER BY applicationID DESC LIMIT 1";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$last_applicationID = $row["applicationID"];
			}
		}else{
			die("job ad not found");
		}
(int)$last_applicationID++;
$sql = "INSERT INTO `application`(`byUserID`, `forCompanyID`,`applicationID`,`forRank`, `status`) VALUES ($userid,$byCompanyID,$last_applicationID,'$rank','sent')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT * FROM user_data WHERE rank='owner' AND userCompanyID=$byCompanyID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$username = $row["username"];
		echo $username;
		echo "hi";
		// Your POST data
$data = http_build_query(array(
    'fu' => $username,
    'evnt' => 'newapplication',
	'evntid' => $last_applicationID,
	'evbyu' => $found_token_owner
));

// Create HTTP stream context
$context = stream_context_create(array(
    'http' => array(
        'method' => 'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $data
    )
));

// Make POST request
$response = file_get_contents('http://vtc.northwestvideo.de/notifications/notify.php', false, $context);
if ($result === FALSE) { /* Handle error */ }

		
	}
} else {
    echo "Error: no company owners";
	die();
}
$conn->close();
header("Location: https://vtc.northwestvideo.de/company/?companyid=$byCompanyID"); 
    exit; 
?>
