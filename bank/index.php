<?php  
if(!isset($_COOKIE['authWebToken'])) {
	die("404");
}
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
			echo "0 results2";
		}
		if ($found_token_owner != $username_cookie) {
			die("wrong owner detected");
		}
		$sql = "SELECT * FROM user_data WHERE username='$username_cookie'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$rank_user = $row["rank"];
				$company_id = $row["userCompanyID"];
				$bank_balance_user =$row["bank_balance"];
			}
		} else {
			die("0 results3");
		}
$sql = "SELECT * FROM company_information_table WHERE id=$company_id";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$found_company_name = $row["name"];
				$found_company_bank_balance = $row["bank_balance"];
			}
		} else {
		}
mysqli_close($conn); 
?> 
<!DOCTYPE html>
<html lang="de">
  <head>
	  <title>Bank - VTCManager</title>
	  <?php include '../basis_header.php'; ?> 
  </head>
  <body>
	  <?php include '../navbar.php'; ?>  
	  &nbsp;&nbsp;
	  <?php if($_GET['idc'] == "tra_sc"){
	echo '<div class="container"><div class="success" style="background-color: #ddffdd;
  border-left: 6px solid #4CAF50;">
  <p><strong>&nbsp;Transaktion erfolgreich gesendet!</strong></p>
</div></div>';}?>
	  <div class="modal fade" id="transactionprivat" tabindex="-1" role="dialog">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <form action="https://vtc.northwestvideo.de/bank/transaction_user" method="post" name="transactForm" id="transact_form">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                  <h4 class="modal-title" id="myModalLabel">Überweisung von meinem Privatkonto</h4>
                                          </div>
                   <div class="modal-body">
                       
                       Überweisen an
                       <input type="text" class="form-control" name="receiver" id="receiver" placeholder="Nutzer/Firma" autocomplete="off">
                       <div class="input-group">
                           <input type="number" class="form-control" name="amount" id="amount" min="1" max="3000" placeholder="Betrag" required="">
                           <span class="input-group-addon">€</span>
                       </div>
                       <input type="text" class="form-control" name="message" id="message" placeholder="Nachricht" maxlength="180" required="">
                   </div>
                   <div class="modal-footer">
                       <button type="submit" class="btn btn-primary" name="submit" id="submit">Überweisen</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
	  <div class="modal fade" id="transactioncompany" tabindex="-1" role="dialog">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <form action="https://vtc.northwestvideo.de/bank/transaction_company" method="post" name="transactForm" id="transact_form">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                  <h4 class="modal-title" id="myModalLabel">Überweisung von <?php echo $found_company_name;?> tätigen</h4>
                                          </div>
                   <div class="modal-body">
                       Überweisen an
                       <input type="text" class="form-control" name="receiver" id="receiver" placeholder="Nutzer/Firma" autocomplete="off">
                       <div class="input-group">
                           <input type="number" class="form-control" name="amount" id="amount" min="1" max="1000000" placeholder="Betrag" required="">
                           <span class="input-group-addon">€</span>
                       </div>
                       <input type="text" class="form-control" name="message" id="message" placeholder="Nachricht" maxlength="180" required="">
                   </div>
                   <div class="modal-footer">
                       <button type="submit" class="btn btn-primary" name="submit" id="submit">Überweisen</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
	  <div class="container">
		  <h1><?php echo $name;?> </h1>
<ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#user" data-toggle="tab"><i class="fa fa-info"></i> Privatkonto</a></li>
	<?php if($SeeBank == "1"){
	?>
            <li class=""><a href="#company" data-toggle="tab"><i class="fa fa-briefcase"></i> Firmenkonto</a></li>
	<?php 
	 }
	?>
            <li class=""><a href="#credits" data-toggle="tab"><i class="fa fa-bullhorn"></i> Kredite</a></li>
                    </ul>
<div id="myTabContent" class="tab-content">
                                <div class="tab-pane active in" id="user">
									<h3>Mein Privatkonto</h3>
									<a href="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#transactionprivat">Überweisen</a>
									<p>aktueller Kontostand: <?php echo $bank_balance_user;?>€ </p>
									<table class="table" style="max-height: 150px !important; overflow: auto !important;">
					
                    <thead>
                    <tr>
                        <td>Absender</td>
                        <td>Empfänger</td>
						<td>Nachricht</td>
						<td>Datum</td>
						<td>Betrag</td>
						<td>Status</td>
                    </tr>
                    </thead>

                    <tbody>
						<?php
						$sql = "SELECT * FROM money_transfer WHERE sender='$username_cookie' OR receiver='$username_cookie' ORDER by date_sent DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $sender = $row["sender"];
		$receiver = $row["receiver"];
		$message = $row["message"];
		$date_sent = $row["date_sent"];
		$amount = $row["amount"];
		$status = $row["status"];
		echo '<tr><td>'.$sender.'</td><td>'.$receiver.'</td><td>'.$message.'</td><td>'.$date_sent.'</td><td>'.$amount.'€</td><td>'.$status.'</td></tr>';
    }
} else {
}
?>
                    </tbody>
                </table>
            </div>
<?php if($SeeBank == "1"){
	?>
            <div class="tab-pane" id="company">
				<h3>Firmenkonto von <?php echo $found_company_name;?></h3>
				<?php if($UseBank == "1"){
	?>
				<a href="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#transactioncompany">Überweisen</a>
				<?php }
	?>
				<p>aktueller Kontostand: <?php echo $found_company_bank_balance;?>€ </p>
                <table class="table" style="max-height: 150px !important; overflow: auto !important;">
					
                    <thead>
                    <tr>
                        <td>Absender</td>
                        <td>Empfänger</td>
						<td>Nachricht</td>
						<td>Datum</td>
						<td>Betrag</td>
						<td>Status</td>
                    </tr>
                    </thead>

                    <tbody>
						<?php
						$sql = "SELECT * FROM money_transfer WHERE sender='$found_company_name' OR receiver='$found_company_name' ORDER by date_sent DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $sender = $row["sender"];
		$receiver = $row["receiver"];
		$message = $row["message"];
		$date_sent = $row["date_sent"];
		$amount = $row["amount"];
		$status = $row["status"];
		echo '<tr><td>'.$sender.'</td><td>'.$receiver.'</td><td>'.$message.'</td><td>'.$date_sent.'</td><td>'.$amount.'€</td><td>'.$status.'</td></tr>';
    }
} else {
}
mysqli_close($conn); ?>
                    </tbody>
                </table>
            </div>
	<?php }?>

            <div class="tab-pane" id="credits">

                                                                </div>
                    </div>
	  </div>
	  <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
	      <footer class="footer">
        <div class="container">
            <div class="col-md-9 social-media">
                <p class="pull-left">
                    <a href="https://vtc.northwestvideo.de/impressum">Impressum</a>|
                    <a href="https://vtc.northwestvideo.de/datenschutz">Datenschutz &amp; Nutzungsbedingungen</a>
                </p>
            </div>
            <div class="col-md-3">
                <p class="pull-right">© © NorthWestMedia 2019-2020</p>
            </div>
                    </div>
    </footer>
  </body>
</html>
