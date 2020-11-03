<?php

$num=1234;

//Con esta linea sumas los numeros de dentro de la variable entre ellos
$nuevo_num= array_sum(str_split( (string) $num));

echo $num . "</br>";
echo $nuevo_num;

/*
function justOneDigit2($digit) {
    while($digit>9) {
        $digit = (int) array_sum(str_split( (string) $digit ));
    }
    return  $digit;
}
echo justOneDigit2(4861);
*/