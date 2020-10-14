<?php

function generarValores(){
    
    $valores = [];
    for ($i=0; $i<=5; $i++){
        $num1 = random_int(1, 6);
        $valores[]=$num1;
    }
    
    return $valores;
}

function generarFigura($valor) {
    
    $resultado;    
    if ($valor == 1){
        $resultado = "&#9856;";
    }else if($valor == 2){
        $resultado = "&#9857;";
    }else if($valor == 3){
        $resultado = "&#9858;";
    }else if($valor == 4){
        $resultado = "&#9859;";
    }else if($valor == 5){
        $resultado = "&#9860;";
    }else if($valor == 6){
        $resultado = "&#9861;";
    }
    
    return $resultado;
}

$dadosj1 = generarValores();
$dadosj2 = generarValores();

print_r($dadosj1);
echo "</br>";
print_r($dadosj2);


echo "</br>";
echo generarFigura(1) . "</br>";
echo generarFigura(2) . "</br>";
echo generarFigura(3) . "</br>";
echo generarFigura(4) . "</br>";
echo generarFigura(5) . "</br>";
echo generarFigura(6) . "</br>";






