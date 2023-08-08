<?php
session_start();
?>


<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Iwtymsek logowanie</title>
  <link rel="stylesheet" type="text/css" href="css/styllogowanie.css">
</head>

<body>

  <form action="/realizacjarzecz/ladowanie.php" method="post">

    <div class="imgcontainer">
      <img src="/realizacjarzecz/image/logo.png" alt="logo" class="logo">
    </div>

    <div class="container">

      <?php
      if (isset($_SESSION['blad']))
        echo $_SESSION['blad'];
      ?>
      <input type="text" placeholder="Login" name="uname" required>
      <br>

      <input type="password" placeholder="Hasło" name="psw" required>

      <button type="submit">Zaloguj</button>

    </div>
  </form>

</body>

</html>