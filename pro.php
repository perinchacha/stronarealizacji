<?php

session_start();

if (!isset($_SESSION['zalogowany'])) {
	header('Location: index.php');
	exit();
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>IWTYMSEK</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$(document).ready(function () {
			$("input[type=checkbox]").on("change", function () {
				var id = $(this).data("id");
				var columnName = $(this).data("column");
				var value = $(this).prop("checked") ? 1 : 0;

				$.ajax({
					url: "update.php",
					method: "POST",
					data: { id: id, columnName: columnName, value: value },
					success: function (response) {
						console.log(response);
					}
				});
			});
		});
	</script>
</head>

<body>

	<a href="logout.php"><img src="image/logouticon.png" alt="Wyloguj" class="out"> </a>

	<div>
		<form method="POST" action="add.php" class="tabelazam">
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
			<tr>
				<th> LP </th>
				<th class="parz"> Data Zamówienia</th>
				<th> Co zamówiono </th>
				<th class="parz"> Cena </th>
				<th> Projekt gotowy</th>
				<th class="parz"> Projekt zaakceptowany</th>
				<th> Wycięto</th>
				<th class="parz"> Spakowano</th>
				<th> Zamówiono etykiete</th>
				<th class="parz"> Wysłano</th>
				<th> Zapłacono</th>



				<!-- Dodaj więcej nagłówków dla kolejnych zmiennych -->
			</tr>
			<?php
			include "conn.php"; // Plik z danymi dostępowymi do bazy danych
			
			$sql = " SELECT * FROM test ORDER BY id DESC";
			$result = $conn->query($sql);

			while ($row = $result->fetch_assoc()) {
				$id = $row["id"];
				$nazwa = $row["data"];
				$cozam = $row["coorder"];
				$cena = $row["cena"];
				$wartosc1 = $row["projekt"];
				$wartosc2 = $row["projekt_akcept"];
				$wartosc3 = $row["wycieto"];
				$wartosc4 = $row["spakowano"];
				$wartosc5 = $row["etykieta"];
				$wartosc6 = $row["wyslano"];
				$wartosc7 = $row["zaplacono"];


				echo "<tr>";
				echo "<td>$id</td>";
				echo "<td class='parz'>$nazwa</td>";
				echo "<td>$cozam</td>";
				echo "<td class='parz'>$cena</td>";
				echo "<td><input type='checkbox' data-id='$id' data-column='projekt' " . ($wartosc1 ? "checked" : "") . "></td>";
				echo "<td class='parz'><input type='checkbox' data-id='$id' data-column='projekt_akcept' " . ($wartosc2 ? "checked" : "") . "></td>";
				echo "<td><input type='checkbox' data-id='$id' data-column='wycieto' " . ($wartosc3 ? "checked" : "") . "></td>";
				echo "<td class='parz'><input type='checkbox' data-id='$id' data-column='spakowano' " . ($wartosc4 ? "checked" : "") . "></td>";
				echo "<td><input type='checkbox' data-id='$id' data-column='etykieta' " . ($wartosc5 ? "checked" : "") . "></td>";
				echo "<td class='parz'><input type='checkbox' data-id='$id' data-column='wyslano' " . ($wartosc6 ? "checked" : "") . "></td>";
				echo "<td><input type='checkbox' data-id='$id' data-column='zaplacono' " . ($wartosc7 ? "checked" : "") . "></td>";
				echo "<td><a href='edit.php?id=$id'class='ed'>Edytuj</a></td>"; // Dodaj odnośnik do podstrony
				echo "<td><a href='delete.php?id=$id'class='us'>Usuń</a></td>"; // Dodaj odnośnik do podstrony
				echo "</tr>";

			}
			?>

		</table>
	</div>
</body>

</html>