<?php
require("includes/common.inc.php"); //inlcudes my funktion to print/check Arrays
ta($_FILES); 


$uploaddir = 'includes/';
$uploadfile = $uploaddir . basename($_FILES['UL']['name']);

if(count($_FILES) > 0){

  $upl = $_FILES["UL"];

  if($upl["error"] == 0){
    $ok = move_uploaded_file($upl["tmp_name"], $uploadfile);
    if($ok) {
			$msg = '<p class="success">Die Datei wurde erfolgreich hochgeladen.</p>';
		}
		else {
			$msg = '<p class="error">Leider konnte die Datei nicht am Zielort gespeichert werden.</p>';
		}
	}
	else {
		$msg = '<p class="error">Während des Uploads ist (irgendein) Fehler aufgetreten.</p>';
	}
}

?>

<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <title>File Upload</title>
  <link rel="stylesheet" href="css/common.css"> <!--Includes styling fpor output arrays -->
</head>
<body>
  <?php echo($msg);?>
  <form method="post" enctype="multipart/form-data">
    <input type="file" name="UL" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
  </form>
</body>
</html>    