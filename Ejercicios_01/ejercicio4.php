<?php

$i=0;
$tiempo_inicio= microtime(true);
do{
    $num1 = random_int(1, 10);
    
    if($num1 == 6){
        $i++;
    }else{
        $i=0;
    }
    
}while ($i<3);
$tiempo_final= microtime(true);
$tiempo_ejecucion= $tiempo_final - $tiempo_inicio;
echo $tiempo_ejecucion;