<?php

session_start();

if(isset($_SESSION['zalogowany']))
{
	header('Location: zalogowany.php');
	exit();
}

if(isset($_POST['mail']))
{
	$ok=true;
	
	$user= $_POST['nick'];
	
	if((strlen($user)<3) || (strlen($user)>20))
	{
		$ok=false;
		$_SESSION['b_user']="Hasło musi mieć od 3 do 20 znaków!";
	}
	if(ctype_alnum($user)==false)
	{
		$ok=false;
		$_SESSION['b_user']="Login musi składać się tylko z liter i cyfr (bez polskich znaków)!";
	}
	
	$pass1=$_POST['haslo1'];
	$pass2=$_POST['haslo2'];
	if((strlen($pass1)<8) || (strlen($pass1)>20))
	{
		$ok=false;
		$_SESSION['b_pass']="Hasło musi mieć od 8 do 20 znaków!";
	}
	if($pass1!=$pass2)
	{
		$ok=false;
		$_SESSION['b_pass']="Hasła nie są takie same!";
	}
	$pass_hash=password_hash($pass1,PASSWORD_DEFAULT);
	
	$email=$_POST['mail'];
	$emailS=filter_var($email,FILTER_SANITIZE_EMAIL);
	if((filter_var($emailS,FILTER_VALIDATE_EMAIL)==false) || ($emailS!=$email))
	{
		$ok=false;
		$_SESSION['b_mail']="Podaj poprawny e-mail";
	}
	
	$sekret="6LdsoCMdAAAAALh3uAKZqzqLks3qYE3-xYbDlGsh";
	$sprawdz=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$sekret."&response=".$_POST['g-recaptcha-response']);
	$odpowiedz=json_decode($sprawdz);
	if($odpowiedz->success==false)
	{
		$ok=false;
		$_SESSION['b_bot']="Zaznacz, że nie jesteś botem!";
	}
	else
	{
	$recaptchaa=true;
	}
	$_SESSION['f_user']=$user;
	$_SESSION['f_email']=$email;
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
			$rezultat=$polaczenie->query("SELECT id FROM uzytkownicy WHERE mail='$email'");
			if(!$rezultat)
			{
				throw new Exception($polaczenie->error);
			}
			$ile_maili_w_bazie=$rezultat->num_rows;
			if($ile_maili_w_bazie>0)
			{
				$ok=false;
				$_SESSION['b_mail']="Istnieje już taki email";
			}
			
			$rezultat=$polaczenie->query("SELECT id FROM uzytkownicy WHERE login='$user'");
			if(!$rezultat)
			{
				throw new Exception($polaczenie->error);
			}
			$ile_userow_w_bazie=$rezultat->num_rows;
			if($ile_userow_w_bazie>0)
			{
				$ok=false;
				$_SESSION['b_user']="Istnieje już taki login";
			}
			if($ok==true)
			{
				if($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL,'$user','$pass_hash','$email','$recaptchaa')"))
				{
					$_SESSION['zarejestrowano']=true;
					header('Location: zarejestrowany.php');
				}
				else
				{
					throw new Exception($polaczenie->error);
				}
			}
			$rezultat->free_result();
			$polaczenie->close();
		}
	}
	catch(Exception $b)
	{
		echo '<span style="color:red;">Błąd serwera! Przepraszamy za utrudnienia!</span>';
	}
	
}
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="keywords" content="Portfolio, Jarosław Sularz, informatyk,teczka ">
<meta name="description" content="Portfolio z projektami">
<meta name="author" content="Jarosław Sularz">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jarosław Sualrz - Portfolio</title>
<link rel="shortcut icon" href="obrazy/favicon.png"/>
<script src="jquery-3.6.0.min.js" type="text/javascript"></script>
<script src="kod.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" type="text/css" href="css/fontello.css"/>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>

<div class="container">
<header>
	<div id="zegarek">
		
	</div>

	<div id="baner" onclick="ajaksik('start')" title="Home">
		<i class="icon-briefcase"></i><span id="napis_portfolio">PORTFOLIO</span><i class="icon-briefcase"></i>
	</div>
	<a href="zaloguj">
		<div id="zaloguj" title="zaloguj">
			<i class="icon-user"></i>
			</br>
			Zaloguj się
		</div>
	</a>
	<nav>
		<div id="o_mnie" onclick="ajaksik('o_mnie')">
			<i class="icon-adult"></i>
			</br>
			Coś o mnie
			<p class="przycisk1">Dowiedz się kim jestem</p>
		</div>
			
		<div id="cv" onclick="ajaksik('cv')">
			<i class="icon-graduation-cap"></i>
			</br>
			Curriculum vitae
			<p class="przycisk1">Moje wykształcenie</p>
		</div>
			
		<div id="projekty" onclick="ajaksik('projekty')">
			<i class="icon-laptop"></i>
			</br>
			Moje projekty
				<p class="przycisk1">Zobacz moje możliwości</p>
		</div>
			
		<div id="kontakt" onclick="ajaksik('kontakt')">
			<i class="icon-mail"></i>
			</br>
			Kontakt
			<p class="przycisk1">Napisz do mnie</p>
		</div>
	</nav>
</header>

<div id="tresc">
	<main>
			<article id="tresc1">
				<div id="ajax6">
					<div id="komunikat1">
						<?php
							if(isset($_SESSION['b_user']))
							{
								echo '<div class="blad">'.$_SESSION['b_user'].'</div>';
								unset($_SESSION['b_user']);
							}
						?>
					</div>
					<div id="komunikat2">
						<?php
							if(isset($_SESSION['b_pass']))
							{
								echo '<div class="blad">'.$_SESSION['b_pass'].'</div>';
								unset($_SESSION['b_pass']);
							}
						?>
					</div>
					<div id="komunikat3">
						<?php
							if(isset($_SESSION['b_mail']))
							{
								echo '<div class="blad">'.$_SESSION['b_mail'].'</div>';
								unset($_SESSION['b_mail']);
							}
						?>
					</div>
					<div id="komunikat4">
						<?php
							if(isset($_SESSION['b_bot']))
							{
								echo '<div class="blad">'.$_SESSION['b_bot'].'</div>';
								unset($_SESSION['b_bot']);
							}
						?>
					</div>
					<header>
						<h4>Rejestracja</h4>
					</header>
					<section class="pola_rejestracji">
					<form method="POST">
						<label>Login</br><input class="pola" type="text" name="nick" value="<?php
							if(isset($_SESSION['f_user']))
							{
								echo $_SESSION['f_user'];
								unset($_SESSION['f_user']);
							}
						?>" required></input></label>
						</br>
						<label>Hasło</br><input class="pola" type="password" name="haslo1" required></input></label>
						</br>
						<label>Powtórz hasło</br><input class="pola" type="password" name="haslo2" required></input></label></br>
						<label>E-mail</br><input class="pola" type="email" name="mail" value="<?php
							if(isset($_SESSION['f_email']))
							{
								echo $_SESSION['f_email'];
								unset($_SESSION['f_email']);
							}
						?>" required></input></label>
						</br>
						<div class="g-recaptcha" data-sitekey="6LdsoCMdAAAAAPnqZ6ASBz5GlGGJnBrf-PAhcy3U"></div>
					
						<label><input class="wyslij" type="submit" value="Zarejestruj się"></input></label>
					</form>
				</script>
					</section>
				</div>
			</article>
	</main>
</div>
	<div id="pobocze">
		<aside>
			
		</aside>
	</div>
<div class="czyscik"></div>

<footer>
	<div id="stopka">
		Jarosław Sularz &copy; 2021 -----> Gotowy do współpracy
	</div>
</footer>

</div>

</body>
</html>