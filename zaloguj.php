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
<script src="https://www.recaptcha.net/recaptcha/api.js" async defer></script>
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
				<div id="ajax5">
				<div id="komunikat5">
					<?php
						if(isset($_SESSION['blad1']))
						{
							echo '<div class="blad">'.$_SESSION['blad1'].'</div>';
							unset($_SESSION['blad1']);
						}
					?>
					</div>
					
					<div id="komunikat6">
					<?php
						if(isset($_SESSION['blad2']))
						{
							echo '<div class="blad">'.$_SESSION['blad2'].'</div>';
							unset($_SESSION['blad2']);
						}
					?>
					</div>
				<div class="formularzyk">
					<form action="logowanie.php" method="POST">
					
					
						
						<label>Login</br><input class="pola" type="text" name="login" value="<?php
						if(isset($_SESSION['l_login']))
						{
							echo $_SESSION['l_login'];
							unset($_SESSION['l_login']);
						}
						?>" required></input></label></br>
						<label>Hasło</br><input class="pola" type="password" name="haslo" required></input></label></br></br>
						<div class="g-recaptcha" data-sitekey="6LdsoCMdAAAAAPnqZ6ASBz5GlGGJnBrf-PAhcy3U"></div></br>
						<input class="wyslij" type="submit" value="Zaloguj się"></input></br></br>
						<span id="tekst_w_logowanie"> <a href="rejestracja">Nie masz konta? Zarejestruj się!</a></br>
						<span id="bezpieczna_rejestracja" onclick="ajaksik('bezpieczenstwo')">Czy rejestracja jest bezpieczna?</span></span>
					<form>
				</div>
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