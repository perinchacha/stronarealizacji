<?php
	include('conn.php');
	$id=$_GET['id'];
	$query=mysqli_query($conn,"select * from `test` where id='$id'");
	$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
<title>I w tym sęk Realizacja</title>
<link rel="stylesheet" type="text/css" href="css/styleed.css">

</head>
<body>
	<h2>Edycja zamówienia numer: <span style='color: green;'><?php echo $id; ?></span> zamówienie z dnia: <span style='color: green;'> <?php echo $row['data']; ?></span></h2> 
	<form method="POST" action="update.php?id=<?php echo $id; ?>">
		<table>
		<tr>
			<td>
				<label>Zamówienie:</label>
			</td> 	
			<td>
				<input type="text" value="<?php echo $row['coorder']; ?>" name="cozam">
			</td>
		</tr>
		<tr>
			<td>
				<label>Cena:</label>
			</td> 	
			<td>	
				<input type="text" value="<?php echo $row['cena']; ?>" name="cen">
			</td>
		</tr>
		<td> <label>Projekt gotowy ?</label> </td>
		<td>
		<?php
		if ($row['projekt'] == 1) {
 			 $checkbox_checked = 'checked';
				} else {
 				 $checkbox_checked = '';
			}
			echo '<input type="checkbox" name="checkbox_pr" '.$checkbox_checked.'>';
		?></td>
		</tr>
		<tr> 
		<td> <label>Projekt zaakceptowany ?</label> </td> 
		<td> <?php
		if ($row['projekt_akcept'] == 1) {
 			 $checkbox_checked = 'checked';
				} else {
 				 $checkbox_checked = '';
			}
			echo '<input type="checkbox" name="checkbox_pra" '.$checkbox_checked.'>';
		?></td> 
		</tr> 
		<tr>
		<td> <label>Wycięto ?</label></td> 
		<td> <?php
		if ($row['wycieto'] == 1) {
 			 $checkbox_checked = 'checked';
				} else {
 				 $checkbox_checked = '';
			}
			echo '<input type="checkbox" name="checkbox_wyc" '.$checkbox_checked.'>';
		?></td> 
		</tr>
		<tr>
		<td><label>Spakowano ?</label></td> 
		<td> <?php
		if ($row['spakowano'] == 1) {
 			 $checkbox_checked = 'checked';
				} else {
 				 $checkbox_checked = '';
			}
			echo '<input type="checkbox" name="checkbox_sp" '.$checkbox_checked.'>';
		?></td> 
		</tr>
		<tr>
		<td><label>Zamówiono etykiete?</label></td>
		<td><?php
		if ($row['etykieta'] == 1) {
 			 $checkbox_checked = 'checked';
				} else {
 				 $checkbox_checked = '';
			}
			echo '<input type="checkbox" name="checkbox_ety" '.$checkbox_checked.'>';
		?></td>
		</tr>
		<tr>

		<td><label>Wysłano?</label></td>
		<td><?php
		if ($row['wyslano'] == 1) {
 			 $checkbox_checked = 'checked';
				} else {
 				 $checkbox_checked = '';
			}
			echo '<input type="checkbox" name="checkbox_wys" '.$checkbox_checked.'>';
		?></td>
		</tr>
		<tr>
			

		<td><label>Zapłacono ?</label></td>
		<td><?php
		if ($row['zaplacono'] == 1) {
 			 $checkbox_checked = 'checked';
				} else {
 				 $checkbox_checked = '';
			}
			echo '<input type="checkbox" name="checkbox_zap" '.$checkbox_checked.'>';
		?></td>
		</tr>
		

		</table>

		<input type="submit" name="submit" value="Zapisz">
		<a href="pro.php">Cofnij</a>
	</form>
</body>
</html>