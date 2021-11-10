<?php
session_start();
if(isset($_SESSION['zalogowany']))
{
	header('Location: zalogowany.php');
	exit();
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
				<header>
				<h1>Witam Cię na mojej stronie!</h1>
				</header>
				<section>
					<p class="zawartosc_glowna">
						Strona ta została napisana ręcznie od zera.
						
						Jest ona pierwszą próbką moich możliwości, 
						
						w której głównie w prostocie chce przekazć dane treści,
						
						więcej moich projektówbędzie można zobaczyć z czasem w zakładce 
						
						"Moje projekty".
						
						Zapoznaj się z nią dokładniej klikając przyciski powyżej .
						
						Zarejestruj się i zaloguj na niej aby przesłać mi opinie .
						
						Mam nadzieje że się państwu spodoba <img class="oczko" src="obrazy/oczko.png"/>
					</p>
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