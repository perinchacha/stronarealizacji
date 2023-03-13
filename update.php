<?php
	include('conn.php');
	$id=$_GET['id'];
 
	$cozamu=$_POST['cozam'];
	$wycena=$_POST['cen'];


	if (isset($_POST['checkbox_pr'])) {
		$checkbox_value = 1; // Jeśli checkbox jest zaznaczony, wartość = 1
	  } else {
		$checkbox_value = 0; // Jeśli checkbox nie jest zaznaczony, wartość = 0
	}
	$proje=$checkbox_value;
	
	if (isset($_POST['checkbox_pra'])) {
		$checkbox_value = 1; // Jeśli checkbox jest zaznaczony, wartość = 1
	  } else {
		$checkbox_value = 0; // Jeśli checkbox nie jest zaznaczony, wartość = 0
	}
	$projea=$checkbox_value;

	if (isset($_POST['checkbox_wyc'])) {
		$checkbox_value = 1; // Jeśli checkbox jest zaznaczony, wartość = 1
	  } else {
		$checkbox_value = 0; // Jeśli checkbox nie jest zaznaczony, wartość = 0
	}
	$wyciet=$checkbox_value;

	if (isset($_POST['checkbox_sp'])) {
		$checkbox_value = 1; // Jeśli checkbox jest zaznaczony, wartość = 1
	  } else {
		$checkbox_value = 0; // Jeśli checkbox nie jest zaznaczony, wartość = 0
	}
	$spako=$checkbox_value;

	if (isset($_POST['checkbox_ety'])) {
		$checkbox_value = 1; // Jeśli checkbox jest zaznaczony, wartość = 1
	  } else {
		$checkbox_value = 0; // Jeśli checkbox nie jest zaznaczony, wartość = 0
	}
	$etyk=$checkbox_value;
 
	if (isset($_POST['checkbox_wys'])) {
		$checkbox_value = 1; // Jeśli checkbox jest zaznaczony, wartość = 1
	  } else {
		$checkbox_value = 0; // Jeśli checkbox nie jest zaznaczony, wartość = 0
	}
	$wys=$checkbox_value;
	
	if (isset($_POST['checkbox_zap'])) {
  		$checkbox_value = 1; // Jeśli checkbox jest zaznaczony, wartość = 1
	} else {
  		$checkbox_value = 0; // Jeśli checkbox nie jest zaznaczony, wartość = 0
  	}
	$zap=$checkbox_value; 



  mysqli_query($conn,"update `test` set coorder='$cozamu', cena='$wycena', projekt='$proje', projekt_akcept='$projea', 
  wycieto='$wyciet', spakowano='$spako', etykieta='$etyk', wyslano='$wys', zaplacono = $zap where id='$id' ");

  
  header('location:pro.php');
	
?>