<?php

function generarValores(){ 
    $valores = [];
    for ($i=0; $i<=4; $i++){
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


function calcularPuntos($numero){
    $total=0;
    $max=0;
    $min=6;
   
    for ($i=0; $i<=4; $i++){
        if($numero[$i]>$max){
            $max = $numero[$i];
        }
        if($numero[$i]<$min){
            $min = $numero[$i];
        }  
    }
    
    for ($b=0; $b<=4; $b++){
        if ($numero[$b] != $max && $numero[$b] != $min){
            $total = $numero[$b] + $total; 
        }  
    }

    //$total = $numero[0] + $numero[1] + $numero[2] + $numero[3] + $numero[4];
    return $total;  
}

function calcularGanador($param1, $param2) {
    $resultado;
    if ($param1 > $param2){
        $resultado = 'Ha ganado el jugador 1'; 
    }else if ($param1 < $param2){
        $resultado = 'Ha ganado el jugador 2';
    }else if ($param1 == $param2){
        $resultado = 'Han empatado';
    }
    return $resultado;
}

$dadosj1 = generarValores();
$dadosj2 = generarValores();


?>

<table>

<table>
 
  <tr>
    <td align=center> JUGADOR 1 </td>
    <td><span style="font-size: 6rem"> <?php echo generarFigura($dadosj1[0]) ?> </span></td>
    <td><span style="font-size: 6rem"> <?php echo generarFigura($dadosj1[1]) ?> </span></td>
    <td><span style="font-size: 6rem"> <?php echo generarFigura($dadosj1[2]) ?> </span></td>
    <td><span style="font-size: 6rem"> <?php echo generarFigura($dadosj1[3]) ?> </span></td>
    <td><span style="font-size: 6rem"> <?php echo generarFigura($dadosj1[4]) ?> </span></td>
    <td> <?php echo calcularPuntos($dadosj1); ?> </td>
  </tr>
  <tr>
    <td align=center> JUGADOR 2 </td>
    <td><span style="font-size: 6rem"> <?php echo generarFigura($dadosj2[0]) ?> </span></td>
    <td><span style="font-size: 6rem"> <?php echo generarFigura($dadosj2[1]) ?> </span></td>
    <td><span style="font-size: 6rem"> <?php echo generarFigura($dadosj2[2]) ?> </span></td>
    <td><span style="font-size: 6rem"> <?php echo generarFigura($dadosj2[3]) ?> </span></td>
    <td><span style="font-size: 6rem"> <?php echo generarFigura($dadosj2[4]) ?> </span></td>
    <td> <?php echo calcularPuntos($dadosj2); ?> </td>
  </tr>
  <tr>
    <th> Resultado </th>
    <th align=left colspan="5"> <?php echo calcularGanador(calcularPuntos($dadosj1), calcularPuntos($dadosj2))?> </th>
  </tr>
</table>

</br></br></br>
<hr>
<?php show_source(__FILE__); ?>
<hr>




