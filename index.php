<!DOCTYPE html>
<html lang="de">
  <head>
    <meta name="google-site-verification" content="r2Bq-2ocVh60-0e5uyRuB6YTSk5A8iOufZxyiKZxyQw" />
	  <title>VTCManager - ETS2 Manager</title>
	  <?php include 'basis_header.php'; ?>
  </head>
  <body>

	  <?php include 'navbar.php'; ?>

	  <div class="text-center">
  <img src="https://vtc.northwestvideo.de/media/images/main-ad-highway-w-trucks.png" class="rounded" alt="..." style="width:100%;">
		  <br>
		  <br>
		  <?php

$useragent=$_SERVER['HTTP_USER_AGENT']; //Prüfung ob das Gerät mobil ist (wenn ja, dann Anpassung vom Banner)

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){

echo '<img src="https://vtc.northwestvideo.de/media/images/VTCM-Release-Month.png" class="rounded" alt="..." style="width:100%;">';}else{
	echo '<img src="https://vtc.northwestvideo.de/media/images/VTCM-Release-Month.png" class="rounded" alt="..." style="width:40%;">';
}

?>

</div>
	  <div class="container my-5 p-5 z-depth-1">

<hr>
  <section class="dark-grey-text">
    <h2 class="text-center font-weight-bold mb-4 pb-2">Das Besondere an VTCManager</h2>

    <div class="row">
      <div class="col-lg-5 text-center text-lg-left">
        <img class="img-fluid" src="https://vtc.northwestvideo.de/media/vtcmanager-beta-client.jpg" alt="Sample image" style="width: 400px;">
      </div>
      <div class="col-lg-7">
        <div class="row mb-3">
          <div class="col-xl-10 col-md-11 col-10">
			  <i class="fas fa-code" style="font-size: 24px;"></i>
            <h5 class="font-weight-bold mb-3">Communitynahe &amp; regelmäßige Entwicklung</h5>
            <p class="grey-text">Mit wöchtentlichen neuen Updates verbessern und entwickeln dein ETS2-Spielerlebnis weiter. Unser Developement-Team arbeitet täglich an diesem Projekt, teilt den Fortschritt mit der VTCCommunity und setzt deren Vorschläge um.</p>
          </div>

        </div>
        <div class="row mb-3">
          <div class="col-xl-10 col-md-11 col-10">
			  <i class="fas fa-sliders-h"style="font-size: 24px;"></i>
            <h5 class="font-weight-bold mb-3">Personalisierbare Einstellungen</h5>
            <p class="grey-text">In den VTCManager-Interface kannst du deine Firma bis zum letzten Feature individuell anpassen.</p>
		</div>

        </div>
        <div class="row">
          <div class="col-xl-10 col-md-11 col-10">
			  <i class="fas fa-shield-alt"style="font-size: 24px;"></i>
            <h5 class="font-weight-bold mb-3">Sicherheit</h5>
            <p class="grey-text mb-0">Mit SHA256, Denial of Service Sicherheitssysteme und HTTPS-Verschlüsselung sorgen wir für maximale Sicherheit bei maximaler Performance.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
		  <hr>
		  <div class="container mt-5 pt-5 pb-3 px-5 z-depth-1">
  <section class="text-center dark-grey-text">

    <div class="row text-center d-flex justify-content-center my-5">
      <div class="col-lg-3 col-md-6 mb-4">
        <i class="fas fa-truck fa-3x mb-4 grey-text"></i>
        <h5 class="font-weight-normal mb-3">Frustfreies Fahren</h5>
        <p class="text-muted mb-0">Mit Sound-Benachrichtigung keine Sorgen mehr über nicht verarbeitete Fahrten</p>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <i class="fas fa-users fa-3x mb-4 grey-text"></i>
        <h5 class="font-weight-normal mb-3">Multiplayer Anpassung</h5>
        <p class="text-muted mb-0">Aktuelle Verkehrslage schnell einsehbar</p>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <i class="fas fa-mobile-alt fa-3x mb-4 grey-text"></i>
        <h5 class="font-weight-normal mb-3">Mobil nutzbar</h5>
        <p class="text-muted mb-0">Unser Interface ist für mobile Endgeräte angepasst</p>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <i class="fas fa-puzzle-piece fa-3x mb-4 grey-text"></i>
        <h5 class="font-weight-normal mb-3">und noch Vieles mehr...</h5>
        <p class="text-muted mb-0"></p>
      </div>
    </div>

  </section>


</div>


</div>
	<?php include 'footer.php';?>
  </body>
</html>
