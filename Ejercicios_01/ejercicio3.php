<?php
//$columnas = random_int(1, 9);
$columnas = 5;
for ($i=1; $i<=$columnas; $i++){
    
    do{
     $espacio=$i;
     echo "<code> </code>";
    }while($espacio<5);
    
    for ($a=1; $a<=$i; $a++){
        echo "*";
    }
    
    echo "<code> </code>";
    echo "";
    echo "</br>";
}