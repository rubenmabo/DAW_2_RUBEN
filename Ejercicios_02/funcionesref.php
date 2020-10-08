<?php
function calcSuma($num1, $num2, &$resultado){
    $resultado = $num1 + $num2;
}
function calcResta($num1, $num2, &$resultado){
    $resultado = $num1 - $num2;
}
function calcMultiplicacion($num1, $num2, &$resultado){
    $resultado = $num1 * $num2;
}
function calcDivision($num1, $num2, &$resultado){
    $resultado = $num1 / $num2;
}
function calcModulo($num1, $num2, &$resultado){
    $resultado = $num1 % $num2;
}
function calcPotencia($num1, $num2, &$resultado){
    $resultado = 1;
    for ($i=0;$i<$num2;$i++){
        $resultado = $resultado * $num1;
    }
}