<?php  
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'authcode':
            $authcode = $value;
            break;
        case 'job_id':
            $job_id = $value;
            break;
		case 'percentage':
            $percentage = $value;
            break;
        default:
            break;
    }
}
$passwdhsh = hash('sha256',$passwd);
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");

$sql = "SELECT User FROM authCode_table WHERE Token='$authcode'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $found_user = $row["User"];
    }
} else {
    echo "0 results";
	die();
}
$sql = "UPDATE tour_table SET percentage='$percentage' WHERE username='$found_user' AND tour_id='$job_id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
	die();
}
mysqli_close($conn); 
?> 