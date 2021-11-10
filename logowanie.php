<?php

session_start();

if(isset($_SESSION['zalogowany']))
{
	header('Location: zalogowany.php');
	exit();
}
if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
{
	header('Location: zaloguj.php');
	exit();
}

require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);
try
{
	$polaczenie= new mysqli($host,$admin,$password,$database);
	if($polaczenie->connect_errno!=0)
	{
		throw new Exception(mysqli_connect_errno());
	}
	else
	{
	$sekret="6LdsoCMdAAAAALh3uAKZqzqLks3qYE3-xYbDlGsh";
	$sprawdz=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$sekret."&response=".$_POST['g-recaptcha-response']);
	$odpowiedz=json_decode($sprawdz);
	$ok=true;
	if($odpowiedz->success==false)
	{
		$ok=false;
	
	}
		$login=$_POST['login'];
		$haslo=$_POST['haslo'];
		$_SESSION['l_login']=$login;
		$login=htmlentities($login, ENT_QUOTES, "UTF-8");
		
		if($rezultat=$polaczenie->query(
		sprintf("SELECT * FROM uzytkownicy WHERE login='%s'",
		mysqli_real_escape_string($polaczenie,$login))))
		{
			$ile_wierszy=$rezultat->num_rows;
			if($ile_wierszy>0)
			{
				$wiersz=$rezultat->fetch_assoc();
				if(password_verify($haslo,$wiersz['password']))
				{
					if($ok==true)
					{
						$_SESSION['zalogowany']=true;
					
						unset($_SESSION['blad1']);
						$rezultat->free_result();
						header('Location: zalogowany');
					}
					else
					{
						$_SESSION['blad2'] = '<span style="color:red">Zaznacz że nie jesteś botem!</span>';
						header('Location: zaloguj.php');
					}
				}
				else
				{
					$_SESSION['blad1'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: zaloguj.php');
				}
			}
			else
			{
				$_SESSION['blad1'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: zaloguj.php');
			}
		}
		else
		{
			throw new Exception($polaczenie->error);
		}
		$polaczenie->close();
	}
}
catch(Exception $b)
{
	echo '<span style="color:red;">Błąd serwera! Przepraszamy za utrudnienia!</span>';
}
?>