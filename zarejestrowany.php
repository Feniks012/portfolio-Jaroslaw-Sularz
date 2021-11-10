<?php
session_start();

if(isset($_SESSION['zalogowany']))
{
	header('Location: zalogowany.php');
	exit();
}

if(!isset($_SESSION['zarejestrowano']))
{
	header('Location: zarejestruj.php');
	exit();
}
else
{
	unset($_SESSION['zarejestrowano']);
}
if(isset($_SESSION['nick'])) unset($_SESSION['nick']);
if(isset($_SESSION['b_user'])) unset($_SESSION['b_user']);
if(isset($_SESSION['haslo1'])) unset($_SESSION['haslo1']);
if(isset($_SESSION['haslo2'])) unset($_SESSION['haslo2']);
if(isset($_SESSION['b_pass'])) unset($_SESSION['b_pass']);
if(isset($_SESSION['mail'])) unset($_SESSION['mail']);
if(isset($_SESSION['b_mail'])) unset($_SESSION['b_mail']);
if(isset($_SESSION['b_bot'])) unset($_SESSION['b_bot']);
if(isset($_SESSION['f_user'])) unset($_SESSION['f_user']);
if(isset($_SESSION['f_email'])) unset($_SESSION['f_email']);
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
</head>
<body>

<div class="container">
<header>
	<div id="zegarek">
		
	</div>

	<div id="baner" onclick="ajaksik('start')" title="Home">
		<i class="icon-briefcase"></i><span id="napis_portfolio">PORTFOLIO</span><i class="icon-briefcase"></i>
	</div>
	<a href="zaloguj.php">
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
				<header>
				<h1>Dziękujemy za rejestracje!</h1>
				</header>
				<section>
				<a class="mozesz_zalogowac" href="zaloguj.php">Możesz teraz zalogować się na swoje konto!</a>
				</section>
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