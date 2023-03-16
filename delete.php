<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<?php
	$id=$_GET['id'];
	include('conn.php');
	mysqli_query($conn,"delete from `test` where id='$id'");
	header('location:index.php');
?>