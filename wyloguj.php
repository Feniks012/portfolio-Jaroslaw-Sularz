<?php
session_start();
if(isset($_SESSION['zalogowany']))
{
	unset($_SESSION['zalogowany']);
	header('Location: Witamy');
	exit();
}
if(!isset($_SESSION['zalogowany']))
{
	
	header('Location: zaloguj.php');
	exit();
}

?>