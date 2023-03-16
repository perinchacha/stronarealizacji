<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<title>IWTYMSEK</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<a href="logout.php"><img src="image/logouticon.png" alt="Wyloguj" style="width:42px;height:42px;" class="out"> </a>

	<div>
		<form method="POST" action="add.php">
			<table>
				<tr>
				<td> <label>Co zamówiono:</label> </td>

				<td><label>Cena:</label>
				</td>

				<td><label>Data zamówienia:</label>
				</td>
</tr>
			<td><textarea type="text" name="cozam" cols="40" rows="3"></textarea></td>
			<td><input type="text" name="cen"></td>
			<td><input type="date" name="datazam" value="today"> </td>
			<td><input type="submit" name="add"></td>

			</table>
			

<br>
		<br>
		<br>
		</form>
		
	</div>

	<br>

	<div>
		<table>
			<thead>
				<td> LP </td>
				<td> Data Zamówienia </td>
				<td> Co zamówiono </td>
				<td> Cena </td>
				<td> Projekt gotowy ? </td>
				<td> Projekt zaakceptowany ? </td>
				<td> Wycięto ? </td>
				<td> Spakowano ? </td>
				<td> Zamówiono etykiete?</td>
				<td> Wysłano ? </td>
				<td> Zapłacono ? </td>
				<th></th>
			</thead>
			<tbody>
				<?php
					include('conn.php');
					//$query=mysqli_query($conn,"select * from `test`");
					$query=mysqli_query($conn," SELECT * FROM test ORDER BY id DESC");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
						<td><?php echo $row['id']; ?></td>
       					<td><?php echo $row['data']; ?></td>
						<td><?php echo $row['coorder']; ?></td>
						<td><?php echo $row['cena']; ?></td>
						<td>
        				  <?php if ($row['projekt'] == 1): ?>
							<label class="container"><input type="checkbox" checked><span class="checkmark"></span>
         						<?php else: ?>
									<label class="container"><input type="checkbox" ><span class="checkmark"></span>
        						<?php endif; ?>
        				</td>
						<td>
          <?php if ($row['projekt_akcept'] == 1): ?>
            <label class="container"> <input type="checkbox" checked> <span class="checkmark"></span>
          <?php else: ?>
            <label class="container"> <input type="checkbox"><span class="checkmark"></span>
          <?php endif; ?>
        </td>
		<td>
          <?php if ($row['wycieto'] == 1): ?>
            <label class="container"><input type="checkbox" checked><span class="checkmark"></span>
          <?php else: ?>
            <label class="container"><input type="checkbox"><span class="checkmark"></span>
          <?php endif; ?>
        </td>
		<td>
          <?php if ($row['spakowano'] == 1): ?>
            <label class="container"><input type="checkbox" checked><span class="checkmark"></span>
          <?php else: ?>
            <label class="container"><input type="checkbox"><span class="checkmark"></span>
          <?php endif; ?>
        </td>
		<td>
          <?php if ($row['etykieta'] == 1): ?>
            <label class="container"><input type="checkbox" checked><span class="checkmark"></span>
          <?php else: ?>
            <label class="container"><input type="checkbox"><span class="checkmark"></span>
          <?php endif; ?>
        </td>
		<td>
          <?php if ($row['wyslano'] == 1): ?>
            <label class="container"><input type="checkbox" checked><span class="checkmark"></span>
          <?php else: ?>
            <label class="container"><input type="checkbox"><span class="checkmark"></span>
          <?php endif; ?>
        </td>
		<td>
          <?php if ($row['zaplacono'] == 1): ?>
            <label class="container"><input type="checkbox" checked><span class="checkmark"></span>
          <?php else: ?>
            <label class="container"><input type="checkbox"><span class="checkmark"></span>
          <?php endif; ?>
        </td>
						<td>
							<a href="edit.php?id=<?php echo $row['id']; ?>" class="ed">Edytuj</a>
							<a href="delete.php?id=<?php echo $row['id']; ?>" class="us" >Usuń</a>
						</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>