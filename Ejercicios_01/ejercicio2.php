<?php

$numero_de_columnas = random_int(1, 9);

for ($i=1; $i<=$numero_de_columnas; $i++){
    
    for ($a=1; $a<=$i; $a++){
        if ($i%2==0){
            //azul
            echo "<font color='blue';>" . $i . "</font>";
        }else{
            //rojo
            echo "<font color='red';>" . $i . "</font>";
        } 
    }
    echo "</br>";
}