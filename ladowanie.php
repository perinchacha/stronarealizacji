<?php
	
	session_start();
	
	if ((!isset($_POST['uname'])) || (!isset($_POST['psw'])))
	{
		header('Location: index.php');
		exit();
	}

	require_once "conn.php";
	
		$login = $_POST['uname'];
		$haslo = $_POST['psw'];
		
		$sql="SELECT * FROM users WHERE user='$login' AND pass='$haslo'";
	
		if ($rezultat = @$conn->query($sql))
		{		
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				header('Location: pro.php');
				unset($_SESSION['blad']);

			} else {
				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				
			}
			
		}
		
		$conn->close();
	
	
?>