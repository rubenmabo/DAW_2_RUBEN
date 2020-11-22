<?php 

$absoluto = file_get_contents('accesos.txt');


if (isset($_COOKIE['conexiones'])){
    setcookie('conexiones',$_COOKIE['conexiones']+1,time()+3600*24);
} else {  
    setcookie('conexiones',1,time()+3600*24);
}

//fwrite('accesos.txt', $_COOKIE['conexiones']);

$absoluto++;

file_put_contents('accesos.txt', $absoluto);

/*
$fichero_escribir = fopen("accesos.txt", "w");
fwrite($fichero_escribir, "1");
fclose($fichero_escribir);
*/
if (isset($_COOKIE['conexiones'])){
echo "Cookie " . $_COOKIE['conexiones'] . "</br>";
}
echo "Valor Absoluto: " . $absoluto;
//fclose('accesos.txt');
?>