<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
	header('Location: zaloguj.php');
	exit();
}
else
{
	if(isset($_SESSION['l_login'])) unset($_SESSION['l_login']);
	if(isset($_SESSION['blad2'])) unset($_SESSION['blad2']);
	if(isset($_SESSION['blad1'])) unset($_SESSION['blad1']);
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
</head>
<body>

<div class="container">
<header>
	<div id="zegarek">
		
	</div>

	<div id="baner" onclick="ajaksik('start')" title="Home">
		<i class="icon-briefcase"></i><span id="napis_portfolio">PORTFOLIO</span><i class="icon-briefcase"></i>
	</div>
	<a href="wyloguj.php">
		<div id="zaloguj" title="wyloguj">
			<i class="icon-user"></i>
			</br>
			Wyloguj się
		</div>
	</a>
		
	<nav>
		<div id="opinia" onclick="ajaksik('opinia')">
		<div id="ostatni1"><img class="dymek" src="obrazy/dymek.png"><div class="op">Prześlij nam swoją opinie</div><img class="dymek" src="obrazy/dymek.png"></div>
		</div>
	</nav>
</header>

<div id="tresc">
	<main>
			<article id="tresc1">
			<header>
				<h4>Dziękujemy za zalogowanie!</h4>
			</header>
			<section id="przeslanie">
				Prześlij nam swoją opinie klikając w przycisk powyżej
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