window.onload=funkcje


function funkcje()
{
slajderki();
zegar();
};
function zegar()
{
	var czas= new Date();
	var godzina=czas.getHours();
	var minuta=czas.getMinutes();
	var sekunda=czas.getSeconds();
	
	if(sekunda<10)sekunda="0"+sekunda;
	if(minuta<10)minuta="0"+minuta;
	if(godzina<10)godzina="0"+godzina;
	
	document.getElementById("zegarek").innerHTML= godzina+":"+ minuta+":"+sekunda;
	setTimeout("zegar()",1000);
	
};

var liczba= Math.floor(Math.random()*5)+1;

function slajderki()
{
	liczba=liczba+1;
	if(liczba>5)liczba=1;
	var plik= '<img src="slajdy/o0'+liczba+'.jpg"/>';
	$("#pobocze").html(plik);
	$("#pobocze").fadeIn(2000);
	setTimeout("slajderki()",6000);
	setTimeout("schowaj()",4000);
};
function schowaj()
{
	$("#pobocze").fadeOut(2000);
};

function ajaksik(zmienna)
{
	var ajax0= new XMLHttpRequest();
	ajax0.onload= function()
	{
			document.getElementById("tresc1").innerHTML= ajax0.responseText;
	}
	ajax0.open("GET","div_tresc1/"+zmienna+".php",true);
	ajax0.send();
	

};

