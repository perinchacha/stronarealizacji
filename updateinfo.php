<?php

session_start();

if (!isset($_SESSION['zalogowany'])) {
	header('Location: index.php');
	exit();
}

?>
<?php
include('conn.php');
$id = $_GET['id'];

$cozamu = $_POST['cozam'];
$wycena = $_POST['cen'];




mysqli_query($conn, "update `test` set coorder='$cozamu', cena='$wycena' where id='$id' ");


header('location:pro.php');

?>