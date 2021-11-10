<?php

(string)$tresc=$_POST['trescopini'];
$poprzednie_opinie=file_get_contents('opinie.txt');
$nowa_opinia=$poprzednie_opinie.PHP_EOL.$tresc;
file_put_contents('opinie.txt',$nowa_opinia);
header('Location: zalogowany');
?>