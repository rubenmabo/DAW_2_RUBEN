<?php
$j1 = random_int(1, 3);
$j2 = random_int(1, 3);

function figura_j1($j1) {
    if ($j1 == 1){
        $jugador1 = "&#x1F91C;";
    }else if ($j1 == 2){
        $jugador1 = "&#x1F596;";
    }else if ($j1 == 3){
        $jugador1 = "&#x1F91A;";
    }
 return $jugador1;
}

function figura_j2($j2) {
    if ($j2 == 1){
        $jugador2 = "&#x1F91B;";
    }else if ($j2 == 2){
        $jugador2 = "&#x1F596;";
    }else if ($j2 == 3){
        $jugador2 = "&#x1F91A;";
    }
    return $jugador2;
}

function resultado($j1, $j2){
    if ($j1==1 && $j2==1){
        $resultado = "EMPATE";
    }else if($j1==1 && $j2==2){
        $resultado = "GANA JUGADOR 1";
    }else if($j1==1 && $j2==3){
        $resultado = "GANA JUGADOR 2";
    }else if($j1==2 && $j2==1){
        $resultado = "GANA JUGADOR 2";
    }else if($j1==2 && $j2==2){
        $resultado = "EMPATE";
    }else if($j1==2 && $j2==3){
        $resultado = "GANA JUGADOR 1";
    }else if($j1==3 && $j2==1){
        $resultado = "GANA JUGADOR 1";
    }else if($j1==3 && $j2==2){
        $resultado = "GANA JUGADOR 2";
    }else if($j1==3 && $j2==3){
        $resultado = "EMPATE";
    }
        
    return $resultado;
}

echo figura_j1($j1);
echo figura_j2($j2);
echo resultado($j1, $j2);

?>
</br></br></br>
<hr>
<?php show_source(__FILE__); ?>
<hr>

