<?php
require("includes/config.inc.php"); 
require("includes/common.inc.php"); 
require("includes/conn.inc.php"); 

$sql="SELECT * FROM tbl_user"; 
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>JOIN</title>
    <link rel="stylesheet" href="../css/common.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th scope="col">IDUser</th>
				<th scope="col">Emailadresse</th>
				<th scope="col">Passwort</th>
				<th scope="col">Vorname</th>
				<th scope="col">Nachname</th>
				<th scope="col">Geb-Datum</th>
				<th scope="col">GeburtsLand</th>
				<th scope="col">Geschlecht</th>
				<th scope="col">Reg-Zeitpunkt</th>
            </tr>
        </thead>
        <tbody>
				<?php
				$sql = "
					SELECT
						tbl_user.*,
						tbl_staaten.Bezeichnung AS bezStaat,
						tbl_geschlecht.Bezeichnung
					FROM tbl_user
					INNER JOIN tbl_staaten ON tbl_staaten.IDStaat=tbl_user.FIDGebLand
					LEFT JOIN tbl_geschlecht ON tbl_geschlecht.IDGeschlecht=tbl_user.FIDGeschlecht
				";
				$userliste = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
				while($user = $userliste->fetch_object()) {
					echo('
						<tr>
							<td>' . $user->IDUser . '</td>
							<td>' . $user->Emailadresse . '</td>
							<td>' . $user->Passwort . '</td>
							<td>' . $user->Vorname . '</td>
							<td>' . $user->Nachname . '</td>
							<td>' . $user->Geburtsdatum . '</td>
							<td>' . $user->FIDGebLand . ' | ' . $user->bezStaat . '</td>
							<td>' . $user->FIDGeschlecht . ' | ' . $user->Bezeichnung . '</td>
							<td>' . $user->RegistrierungsZeit . '</td>
						</tr>
					');
				}
				?>
				<tr><td colspan="9">ENDE INNER JOIN-----</td></tr>
				<?php
				$sql = "
					SELECT
						tbl_user.*,
						tbl_staaten.Bezeichnung AS bezStaat
					FROM tbl_user
					LEFT JOIN tbl_staaten ON tbl_staaten.IDStaat=tbl_user.FIDGebLand
				";
				$userliste = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
				while($user = $userliste->fetch_object()) {
					
					echo('
						<tr>
							<td>' . $user->IDUser . '</td>
							<td>' . $user->Emailadresse . '</td>
							<td>' . $user->Passwort . '</td>
							<td>' . $user->Vorname . '</td>
							<td>' . $user->Nachname . '</td>
							<td>' . $user->Geburtsdatum . '</td>
							<td>' . $user->FIDGebLand . ' | ' . $user->bezStaat . '</td>
							<td>' . $user->FIDGeschlecht . '</td>
							<td>' . $user->RegistrierungsZeit . '</td>
						</tr>
					');
				}
				?>
				<tr><td colspan="9">ENDE LEFT JOIN-----</td></tr>
				<?php
				$sql = "
					SELECT
						tbl_user.*,
						tbl_staaten.Bezeichnung AS bezStaat
					FROM tbl_user
					RIGHT JOIN tbl_staaten ON tbl_staaten.IDStaat=tbl_user.FIDGebLand
				";
				$userliste = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
				while($user = $userliste->fetch_object()) {
					echo('
						<tr>
							<td>' . $user->IDUser . '</td>
							<td>' . $user->Emailadresse . '</td>
							<td>' . $user->Passwort . '</td>
							<td>' . $user->Vorname . '</td>
							<td>' . $user->Nachname . '</td>
							<td>' . $user->Geburtsdatum . '</td>
							<td>' . $user->FIDGebLand . ' | ' . $user->bezStaat . '</td>
							<td>' . $user->FIDGeschlecht . '</td>
							<td>' . $user->RegistrierungsZeit . '</td>
						</tr>
					');
				}
				?>
				<tr><td colspan="9">ENDE RIGHT JOIN-----</td></tr>
			</tbody>
    </table>
</body>
</html>