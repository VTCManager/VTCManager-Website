<?php
$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"]; 
if (!isset($_COOKIE["authWebToken"])&&!isset($_COOKIE["username"])) {
    header("Status: 404 Not Found");
	die();
}
?> 
<!DOCTYPE html>
<html lang="de" class="gr__vtcmanager_de"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <meta name="theme-color" content="#ff8000">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">

        <meta property="og:site_name" content="VTCManager">
        <meta property="og:title" content="All tours - VTCManager">
        <meta property="og:url" content="https://vtc.northwestvideo.de/en/account/logbook/">
        <meta property="og:type" content="website">

        <link rel="icon" href="https://vtc.northwestvideo.de/media/images/favicon.png" type="image/x-icon">
        
        <link rel="stylesheet" type="text/css" href="./list_files/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./list_files/main.css">
        <link rel="stylesheet" type="text/css" href="./list_files/vs.css">
        
        <title>All tours - VTCManager</title>
    <style></style></head>

    <body data-gr-c-s-loaded="true">

                
    <div class="container">
        <div class="page-header">
            <h1>Your logbook entries</h1>
        </div>

        <div class="vertical-scroll">
            <table class="table" data-company="7649">
                <thead>
                    <tr>
                        <td>Cargo</td>
                        <td>Departure</td>
                        <td>Destination</td>
                        <td>Earnings</td>
                        <td>Truck</td>
                        <td>Date</td>
                        <td>Status</td>
                    </tr>
                </thead>
				<tbody>
					<?php include 'load_data.php'; ?>                  
                </tbody>
            </table>
        </div>
    </div>

    
     
    <script type="text/javascript" src="./list_files/filterfortable.min.js.Download"></script>
	
</body></html>
