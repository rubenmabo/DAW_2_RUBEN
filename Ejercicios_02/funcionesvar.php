<?php
function calcSuma($num1, $num2){
    $resul = $num1 + $num2;
    return $resul;
}
function calcResta($num1, $num2){
    $resul = $num1 - $num2;
    return $resul;
}
function calcMultiplicacion($num1, $num2){
    $resul = $num1 * $num2;
    return $resul;
}
function calcDivision($num1, $num2){
    $resul = $num1 / $num2;
    return $resul;
}
function calcModulo($num1, $num2){
    $resul = $num1 % $num2;
    return $resul;
}
function calcPotencia($num1, $num2){
    $result = 1;
    for ($i=0;$i<$num2;$i++){
        $result = $result * $num1;
    }
    return $result;
}

