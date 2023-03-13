<?php
//Hilfs-funktion um gesendete Werte im HTML code anzeigen zu lassen
function ta($in) {
	echo('<pre class="ta">');
	print_r($in);
	echo('</pre>');
}

$output = "Es wurde noch kein Vorname eingegeben";  //hilfsvariable zum Ausgeben

if(count($_POST) > 0){
	ta($_POST);
	if($_POST ["VN"] == "Christoph"){
		$output = "Der Vorname ist richtig"; 
	}
	else{
		$output = "Der Vorname ist falsch"; 
	}
}
?>

<!DOCTYPE html>
<html lang="de">
	<head>
		<title>Einfaches Formular</title>
		<meta charset="utf-8"> 
		<style>
		.ta {
			background-color:#ffc;
			border:1px solid orange;
			border-left-width:5px;
			padding:0.2em 1em;
			margin:1em 0px;
			font-family:"Courier New", monospace;
			font-size:0.9rem;
		}
		</style>
	</head>
	<body>
		<form method="post" enctype="multipart/form-data">
			<label>
				Ihr Vorname: 
				<input type="text" name="VN">
			</label>
			<input type="submit" value="abschicken">
		</form>
		<?php
		echo($output);
		?>
	</body>
</html>