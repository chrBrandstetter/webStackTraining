<?php
require("includes/common.inc.php"); //inlcudes my funktion to print/check Arrays
ta($_FILES); 
?>

<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <title>File Upload</title>
  <link rel="stylesheet" href="css/common.css">
</head>
<body>
  <form method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
  </form>
</body>
</html>