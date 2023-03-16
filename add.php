

<?php
	include('conn.php');
 
	$cozamu=$_POST['cozam'];
	$wycena=$_POST['cen'];
	$dataz=$_POST['datazam'];
 
	mysqli_query($conn,"insert into `test` (coorder,cena,data) values ('$cozamu','$wycena','$dataz')");
	header('location:pro.php');
 
?>