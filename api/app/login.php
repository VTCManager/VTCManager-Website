<?php  
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'username':
            $user = $value;
            break;
        case 'password':
            $passwd = $value;
            break;
        default:
            break;
    }
}
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "root", "paswdmysqlllol29193093KK","nwv_api");  
if(! $conn )  
{  
  die("2");  
}  

$sql = "SELECT * FROM user_data WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $hash = $row["password_hash"];
    }
} else {
    echo "Error: User_Invalid";
	die();
}
if ($passwd==$hash) {
	mysqli_close($conn); 
    $token = bin2hex(random_bytes(64));
	$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
	if(! $conn )  
	{  
		die("2");  
	}  
	$sql = "SELECT * FROM authCode_table WHERE Token='$token'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
		die("Error: Serverside2");
    }
	$sql = "INSERT INTO authCode_table (User, Token, Expires)
VALUES ('$user', '$token', '')";
	if ($conn->query($sql) === TRUE) {
			echo $token;
	} else {
		
		die();
	}
	
} else {
    echo "Error: PIN_Invalid";
	die();
} 


mysqli_close($conn); 
?> 