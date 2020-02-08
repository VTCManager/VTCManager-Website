<?php
$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"]; 
if (!isset($_COOKIE["authWebToken"])&&!isset($_COOKIE["username"])) {
    header("Status: 404 Not Found");
	die();
}
?> 
<!DOCTYPE html>
<html lang="de" class="gr__vtcmanager_de"><head>
        
        <meta name="theme-color" content="#ff8000">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">

        <meta property="og:site_name" content="VTCManager">
        <meta property="og:title" content="Alle Aufträge - VTCManager">
        <meta property="og:url" content="https://vtc.northwestvideo.de/account/logbook/">
        <meta property="og:type" content="website">

        <link rel="icon" href="https://vtc.northwestvideo.de/media/images/favicon.png" type="image/x-icon">
        
        <link rel="stylesheet" type="text/css" href="./list_files/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="./list_files/main.css">
        <link rel="stylesheet" type="text/css" href="./list_files/vs.css">
        
        <title>Alle Aufträge - VTCManager</title>
	</head>

    <body>
 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" aria-hidden="true" href="https://trucking-vs.de/"><span style="display:none;">Trucking VS</span></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            
                       
            
            <li class="dropdown">
              <a href="https://trucking-vs.de/logbook/list-all#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-book"></i>  Fahrtenbuch <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="https://trucking-vs.de/logbook/new">Neuer Eintrag</a></li>
                <li><a href="https://trucking-vs.de/logbook/list-own">Meine Einträge</a></li>
                                <li><a href="https://trucking-vs.de/logbook/list-all">Alle Einträge</a></li>
                              </ul>
            </li>
                                    <li class="dropdown">
              <a href="https://trucking-vs.de/logbook/list-all#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-building"></i>  Meine Firma <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="https://trucking-vs.de/company/7649">Profil anzeigen</a></li>
                <li><a href="https://trucking-vs.de/company/livemap">Livemap</a></li>
                                <li><a href="https://trucking-vs.de/company/salaries">Gehälter</a></li>
                                <li><a href="https://trucking-vs.de/company/employees">Mitarbeiter</a></li>
                                    <li><a href="https://trucking-vs.de/company/applications">Bewerbungen </a></li>
                <li><a href="https://trucking-vs.de/company/jobs">Stellenanzeigen</a></li>
                                <li><a href="https://trucking-vs.de/company/edit">Einstellungen</a></li>
                                                              </ul>
            </li>
                                        <li><a href="https://trucking-vs.de/messages"><i class="fa fa-comments"></i> Nachrichten </a></li>

                   <li class="dropdown">
                       <a href="https://trucking-vs.de/logbook/list-all#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bank"></i>  Bank <span class="caret"></span></a>
                       <ul class="dropdown-menu">
                           <li><a href="https://trucking-vs.de/bank/user">Mein Konto</a></li>
                                                          <li><a href="https://trucking-vs.de/bank/company">Firmenkonto</a></li>
                               <li><a href="https://trucking-vs.de/bank/credit">Kredite</a></li>
                                                  </ul>
                   </li>
            <!--li><a href="/shop/"><i class="fa fa-shopping-cart"></i> Shop</a></li-->
                            
                        <li><a href="https://trucking-vs.de/events"><i class="fa fa-calendar"></i> Events</a></li>
                            <li><a href="https://trucking-vs.de/jobs"><i class="fa fa-address-card"></i> Jobs </a></li>
                                    <li><a href="https://trucking-vs.de/stats"><i class="fa fa-pie-chart"></i> Statistiken</a></li>
            
                       
                      </ul>

          <ul class="nav navbar-nav navbar-right">
                                    <li><a href="https://trucking-vs.de/search"><i class="fa fa-search"></i> <span class="visible-xs">Suchen</span></a></li>
            <!--li class="dropdown">
                <a href="#" class="dropdown-toggle notification-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"></i> <span class="visible-xs">Benachrichtigungen</span></a>
                <ul class="dropdown-menu notification-dropdown">
                    <li class="unread"><a href="/messages/5">Neue Nachricht von Janik.</a></li>
                    <li><a href="/events/5">Trucking VS hat ein neues Event angekündigt.</a></li>
                    <li><a href="/bank">Dein Gehalt für KW 20 ist eingetroffen.</a></li>
                    <li><a role="button" class="btn btn-sm"><i class="fa fa-check"></i> Alle als gelesen markieren</a></li>
                </ul>
            </li-->

            <li class="dropdown">
              <a href="https://trucking-vs.de/logbook/list-all#" class="dropdown-toggle profile-image" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <img src="./Alle Fahrtenbucheinträge - Trucking VS_files/e797ee4138f5f1deb081f099bd080c74.jpeg" class="profilePicture">
                  &nbsp;joschi_service <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="https://trucking-vs.de/user/13160"><h4>joschi_service</h4>Profil anzeigen</a></li>
                <li><a href="https://trucking-vs.de/account/applications">Meine Bewerbungen</a></li>
                <li><a href="https://trucking-vs.de/downloads">Downloads</a></li>
                <li><a href="https://trucking-vs.de/help">Hilfe &amp; Support</a></li>
                <li><a href="https://forum.trucking-vs.de/">Forum</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="https://trucking-vs.de/account/logout">Ausloggen</a></li>
              </ul>
            </li>
                                              </ul>
        </div><!-- /.navbar-collapse -->
      </div>
    </nav>
		<div class="container">
        <div class="page-header">
            <h1>Deine Fahrtenbucheinträge</h1>
        </div>

        <div class="vertical-scroll">
            <table class="table">
                <thead>
                    <tr>
                        <td>Fracht</td>
                        <td>Von</td>
                        <td>Nach</td>
                        <td>Verdienst</td>
                        <td>LKW</td>
                        <td>Datum</td>
                        <td>Status</td>
						<td></td>
                    </tr>
                </thead>
				<tbody>
					<?php include 'load_data.php'; ?>                  
                </tbody>
            </table>
        </div>
    </div>
	<script type="text/javascript" async="" defer="" src="./list_files/piwik.js.Download"></script><script src="./list_files/cookieconsent.min.js.Download"></script>  
    <script async="" src="./list_files/js"></script>
    <script type="text/javascript" src="./list_files/jquery.min.js.Download"></script>
    <script type="text/javascript" src="./list_files/bootstrap.js"></script>
	
</body></html>
