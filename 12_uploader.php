<?php
require("includes/common.inc.php");
ta($_FILES)

if(count($_FILES))
    $upload = $_FILES["UL"]; 
?>

<!doctype html>
<html lang="de">
    <head>
        <title>Verzeichnis (anzeige durch Rekursion)</title>
	    <meta charset="utf-8">
		<link rel="stylesheet" href="css/common.css">
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload" name="submit">
        </form>
    </body>
</html>