<?php
include "conn.php"; // Plik z danymi dostępowymi do bazy danych

if (isset($_POST["id"]) && isset($_POST["columnName"]) && isset($_POST["value"])) {
	$id = $conn->real_escape_string($_POST["id"]);
	$columnName = $conn->real_escape_string($_POST["columnName"]);
	$value = $conn->real_escape_string($_POST["value"]);

	$sql = "UPDATE test SET $columnName = '$value' WHERE id = '$id'";
	if ($conn->query($sql)) {
		echo "Zaktualizowano wartość.";
	} else {
		echo "Błąd podczas aktualizacji: " . $conn->error;
	}
}
?>