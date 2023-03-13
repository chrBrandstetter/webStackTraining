<?php
    require("includes/config.inc.php");
    require("includes/common.inc.php");
    require("includes/conn.inc.php");
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Insert Update Delete</title>
</head>
<body>
    <ol>
        <?php
            $sql="SELECT * FROM tbl_user"; 
            $serverResponse = $conn->query($sql) or die("Fehler:" . $conn->error);
            while($data = $serverResponse->fetch_Object()){//gibt ture zurueck wenn das fetchen funktioniert
                echo('
                    <li>UserID = '.$data->IDUser.', EMail: '.$data->Emailadresse.'('.$data->Passwort.'), Name: '.$data->Vorname.''.$data->Nachname.' geboren am '.$data->Geburtsdatum.', registriert '.$data->RegistrierungsZeit.'</li><br>
                ');
            } 
            
        ?>
    </ol>
    
</body>
</html>