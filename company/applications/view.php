<?php 
if(!isset($_POST['id'])) {
	die("Keine Bewerbungsdaten abrufbar. Öffne die Bewerbungsliste erneut");
}
$application_id = $_POST['id'];
$host = 'localhost:3306';    
		$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
		if(! $conn )  
		{  
			die("2");  
		}  

$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"]; 
		$sql = "SELECT * FROM authCode_table WHERE Token='$authCode_cookie'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$found_token_owner = $row["User"];
			}
		} else {
			setcookie("username", "", time() - 13600,'/');
			setcookie("authWebToken", "", time() - 13600,'/');
			header("Refresh:0; url=https://vtc.northwestvideo.de/");
			die("wrong owner detected");
		}
		if ($found_token_owner != $username_cookie) {
			setcookie("username", "", time() - 13600,'/');
			setcookie("authWebToken", "", time() - 13600,'/');
			header("Refresh:0; url=https://vtc.northwestvideo.de/");
			die("wrong owner detected");
		}
		$sql = "SELECT * FROM user_data WHERE username='$username_cookie'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$navbar_userid = $row["userID"];
				$rank_user = $row["rank"];
				$profile_pic = $row["profile_pic_url"];
				$company = $row["userCompanyID"];
			}
		} else {
			setcookie("username", "", time() - 13600,'/');
			setcookie("authWebToken", "", time() - 13600,'/');
			header("Refresh:0; url=https://vtc.northwestvideo.de/");
			die("profile not found");
		}
$sql = "SELECT * FROM rank WHERE name='$rank_user' AND forCompanyID=$company";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$EditEmployees = $row["EditEmployees"];
			}
		} else {
		die("no res 1");
		}
		if($EditEmployees != "1"){
	die("Berechtigung fehlt.");
}
if(isset($_POST['cmd'])) {
	if($_POST['cmd'] == "accept"){
		
	}else if($_POST['cmd'] == "decline") {
			
	}
}
		$sql = "SELECT * FROM company_information_table WHERE id=$company";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$company_name = $row["name"];
			}
		} else {
		die("no res 1");
		}
		$sql = "SELECT * FROM user_data WHERE userID=$byUserID";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$appli_username = $row["username"];
						}
				} else {
					$appli_username = "Unbekannt";
				}
$sql = "SELECT * FROM application WHERE applicationID=$application_id";
		$result1 = $conn->query($sql);
		if ($result1->num_rows > 0) {
			// output data of each row
			while($row = $result1->fetch_assoc()) {
				$byUserID = $row["byUserID"];
				$forRank = $row["forRank"];
				$appli_status = $row["status"];
				$appli_time = $row["time"];
			}
		}
		$sql = "SELECT * FROM user_data WHERE userID=$byUserID";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$appli_username = $row["username"];
						}
				} else {
					$appli_username = "Unbekannt";
				}
		?>
<!DOCTYPE html>
<html lang="de">
  <head>
	  <title>Bewerbungen - VTCManager</title>
	  <?php include '../../basis_header.php'; ?>  
  </head>
  <body>
	  <?php include '../../navbar.php'; ?>  
	  <div class="container">
			<h1>Bewerbungen von <?php echo $appli_username;?></h1>
			<p>Rolle: <?php echo $forRank;?><br>
			   Abgesendet um <?php echo $appli_time;?><br>
			   Status: <?php echo $appli_status;?></p>
			   <form action="" method="post" name="createnewrankForm" id="createnewrankForm"><input type="hidden" value="accept" name="cmd" /><button class="btn btn-success" name="id" value="<?php echo $application_id;?>">Akzeptieren</button></form>
			   <form action="" method="post" name="createnewrankForm" id="createnewrankForm"><input type="hidden" value="decline" name="cmd" /><button class="btn btn-danger" name="id" value="<?php echo $application_id;?>">Ablehnen</button></form>
            <footer class="footer">
            <div class="col-md-9 social-media">
                <p class="pull-left">
                    <a href="https://vtc.northwestvideo.de/impressum">Impressum</a>|
                    <a href="https://vtc.northwestvideo.de/datenschutz">Datenschutz &amp; Nutzungsbedingungen</a>
                </p>
            </div>
            <div class="col-md-3">
                <p class="pull-right">© NorthWestMedia 2019-2020</p>
            </div>
                    </div>
    </footer>
  </body>
</html>
