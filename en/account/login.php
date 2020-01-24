<?php
if ($lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "de") {
	header("Location: https://vtc.northwestvideo.de/en/account/login");
	die();
}else{
}

?>
<!DOCTYPE html>
<html lang="de" ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:site_name" content="VTCManager">
        <meta property="og:title" content="Log In - VTCManager">
        <meta property="og:url" content="https://vtc.northwestvideo.de/account/login">
        <meta property="og:type" content="website">
        <link rel="icon" href="https://vtc.northwestvideo.de/media/images/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" href="https://vtc.northwestvideo.de/media/images/apple-icon.png">
        <link rel="stylesheet" type="text/css" href="https://vtc.northwestvideo.de/account/Anmelden - VTCManager_files/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://vtc.northwestvideo.de/account/Anmelden - VTCManager_files/main.css">

        <title>Log In - VTCManager</title>
    </head>
<body class="account-login-page">

    <div class="loginFormWrapper">
        <div class="loginForm">
            <h1 style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Log In</h1>
            <hr class="underline" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
            
            <form action="https://vtc.northwestvideo.de/api/web/account/login.php" method="post" name="loginform" id="account-login-form" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="" required="">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" maxlength="150" required="">
                <p><a href="https://vtc.northwestvideo.de/account/reset-password">Forgot Password?</a></p>
                                <input type="submit" name="submit" class="btn btn-default btn-block" value="Log In">
                <p>New to VTCManager? <br> <a href="https://vtc.northwestvideo.de/account/register">Register</a> now!</p>
            </form>
        </div>
    </div>
	<script type="text/javascript" async="" defer="" src="./Anmelden - VTCManager_files/piwik.js.Download"></script><script type="text/javascript" src="./Anmelden - VTCManager_files/jquery.min.js.Download"></script>
    <script type="text/javascript" src="./Anmelden - VTCManager_files/bootstrap.min.js.Download"></script>
    <script type="text/javascript" src="./Anmelden - VTCManager_files/account.js.Download"></script>
    <script async="" src="./Anmelden - VTCManager_files/js"></script>
</body>
</html>