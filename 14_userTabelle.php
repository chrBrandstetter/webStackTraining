<?php
$conn = new MySQLi("localhost","root","","db_cbr"); 
if($conn->connect_errno > 0){
    //es  ist ein Fehler bei der DB verbindung aufgetreten
    die("Fehler bei beim Verbindungsaufbau: " . $conn->connection_error); 
}
$counter = 1;
$userFilter =""; 
$sql = "
        SELECT * FROM tbl_user
";
?>

<DOCTYPE! html>
<html lang="de">
    <head>
        <title>User-Tabelle mit Datenbank</title>
        <meta charset="utf-8">
    </head>
    <body>
    <table>
			<thead>
				<tr>
                    <th scope="col">Nummer</th>
					<th scope="col">Emailadresse</th>
					<th scope="col">Passwort</th>
					<th scope="col">Nachname</th>
					<th scope="col">Vorname</th>
					<th scope="col">IDUser</th>
					<th scope="col">Geburtsdatum</th>
                    <th scope="col">Registrierungszeitpunkt</th>
				</tr>
			</thead>
			<tbody>
				<?php
                print_r($_POST);
                //revert funktioniert weil durch das % vor und nach dem Post automatisch alles zählt
                //bsp wenn der string leer ist sucht er trozdem nach allen weil % % 
                    if(count($_POST)>0){
                        $sql = "
                        SELECT * FROM tbl_user
                        	WHERE(
                            Nachname LIKE '%".$_POST["filter"]."%' OR
                            Vorname LIKE '%".$_POST["filter"]."%'
                        )";
                    }
                
                    $response = $conn->query($sql) or die("Fehlerhafte Query: " . $conn->error); 
                    if($response != false){
                        while($data = $response->fetch_object()){
                             
                            echo('
							<tr>
                                <td>'.$counter.'.</td>
                                <td>' . $data->Emailadresse . '</td>
                                <td>(' . $data->Passwort . '):</td>
                                <td>' . $data->Nachname . '</td>
                                <td>' . $data->Vorname . '</td>
								<td>ID = ' . $data->IDUser . ',</td>
                                <td>geboren am ' . $data->Geburtsdatum . ',</td>
                                <td>registriert ' . $data->RegistrierungsZeit . '</td>
							</tr>
						    ');
                            $counter ++; 
                        }
                    }
                    else{
                        die("Fehlerhafte Query: " . $conn->error); 
                    }
				?>
			</tbody>
		</table>
        <form method="post">
            <label>Nach Namen filtern:</label>
            <input type="text" name="filter">
            <input type="submit" value="filtern">
        </form>
    </body>
    
</html>
