<?php

$numeros=[];

for ($i=0; $i<20; $i++){
    $num = random_int(1, 10);
    $numeros[]=$num;   
}

function calcularMaximo($numeros){
    $maximo=0;
    for ($b=0; $b<20; $b++){
        if ($maximo < $numeros[$b]){
            $maximo=$numeros[$b];
        }
    }
    return $maximo;
}

function calcularMinimo($numeros){
    $minimo=11;
    for ($b=0; $b<20; $b++){
        if ($minimo > $numeros[$b]){
            $minimo=$numeros[$b];
        }
    }
    return $minimo;
}