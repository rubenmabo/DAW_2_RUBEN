<?php
$bono = array();
$i=0;

do{
    $numero = random_int(1, 6);
  
    
    $repe = array_search($numero,$bono);
    //$repe = isset($bono[$numero]);
    echo $repe . "</br>";

    
    
    if($repe == false){
        foreach ($bono as $i => $numero){
            $i => $numero;
        }
        $i++;
    }
}while($i<5);

echo "<pre>";
print_r($bono);
