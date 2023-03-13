<?php
function ta($in) {
	echo('<pre class="ta">');
	print_r($in);
	echo('</pre>');
}

function generateTable(): string{
$table= "<table>"; 
	for($i=0; $i<intval($_POST["zeilen"]); $i++) { //intval konvertiert den wert im arry in einen integer 
		$table.= '<tr>';
		for($j=0; $j<intval($_POST["spalten"]); $j++) {
			$table.= '<td>Zelle ' .($j+1) . '</td>';
		}
		$table.= '</tr>';
	}
	$table.= '</table>';
	return $table; 
}

function generateTableWhile(): string{
$table= "<table>"; 
	$zeilen=intval($_POST["zeilen"]);
	while($zeilen>0){
		$table.= '<tr>';
		$spalten=intval($_POST["spalten"]);
		while($spalten>0){
			$table.= '<td>Zelle</td>';
			$spalten--;
		}
		$table.= '</tr>';
		$zeilen--;
	}
	$table.= '</table>';
	return $table; 
}

if(count($_POST) > 0){
	ta($_POST);
	$generatedTable = generateTable();
	$generatedTableWhile = generateTableWhile();
}
?>

<!DOCTYPE html>
<html lang="de">
	<head>
		<title>Tabellen generieren</title>
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
	<?php echo($generatedTable); ?>
	<p>LineBreaker</p>
	<?php echo($generatedTableWhile); ?>
		<form method="post" enctype="multipart/form-data">
			<label>Anzahl Zeilen für die Tabelle:</label>
			<input type="number" min="1" step="1" name="zeilen" required>
			<label>Anzahl Zellen (Spalten) für die Tabelle:</label>
			<input type="number" min="1" step="1" name="spalten" required>
			<input type="submit" value="abschicken">
		</form>
	</body>
</html>