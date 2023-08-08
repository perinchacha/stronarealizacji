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
$query = mysqli_query($conn, "select * from `test` where id='$id'");
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>

<head>
	<title>I w tym sęk Realizacja</title>
	<link rel="stylesheet" type="text/css" href="css/styleed.css">

</head>

<body>
	<h2>Edycja zamówienia numer: <span style='color: green;'>
			<?php echo $id; ?>
		</span> zamówienie z dnia: <span style='color: green;'>
			<?php echo $row['data']; ?>
		</span></h2>
	<form method="POST" action="updateinfo.php?id=<?php echo $id; ?>">
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


		</table>

		<input type="submit" name="submit" value="Zapisz">
		<a href="pro.php">Cofnij</a>
	</form>
</body>

</html>