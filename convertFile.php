<?php
$oldSQLFile = fopen($_FILES['file']['tmp_name'], "r") or die("Unable to open file!");

/**
*	Recorrer el contenido SQL y guardar el contenido en un array separandolo por tablas
*/
$arraySQL = [];
$pattern = '/INSERT INTO `([^`]+)` .*? VALUES\s*\(\s*(.+?)\s*\);/i';
while(!feof($oldSQLFile)) {
	$currentLine = fgets($oldSQLFile);

	if (preg_match($pattern, $currentLine, $matches)) {
		$tableName = $matches[1];
		$values = $matches[2];
		$arraySQL[$tableName][] = $values;
	}
}

/**
*	Recorrer el array y convertirlo a SQL
*/
$query = "";
foreach ($arraySQL as $table => $currentTable) {
	$query .= ($query != "" ? "\n\n" : "")."INSERT INTO ".$table." VALUES\n";
	$queryValues = "";
	$countRows = 0;
	foreach ($currentTable as $key => $value) {
		if($countRows == $_POST['rowsPerBlock']) {
			$countRows = 0;
			$queryValues = substr($queryValues, 0, -2).";";
			$queryValues .= ";".($query != "" ? "\n\n" : "")."INSERT INTO ".$table." VALUES\n";
		}
		$countRows++;
		$queryValues .= "(".$value."),\n";
	}
	$query .= substr($queryValues, 0, -2).";";
}

$fileName = time()."_final.sql";
$newSQLFile = fopen("output/" . $fileName, "w") or die("Unable to open file!");
fwrite($newSQLFile, $query);
fclose($newSQLFile);

fclose($oldSQLFile);

header("Location: /?file=" . $fileName);

?>