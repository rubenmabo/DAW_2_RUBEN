<?php

$letras = array("T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E");

$num=$_REQUEST['numero'];

//Con esta linea sumas los numeros de dentro de la variable entre ellos
$nuevo_num= array_sum(str_split( (string) $num));
$letra = $nuevo_num % 23;


    echo "</br>";
    echo "DNI: " . $num ."-".$letras[$letra];
    

?>
