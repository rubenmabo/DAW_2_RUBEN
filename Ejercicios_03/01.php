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

function calcularModa($numeros) {
    $repes=0;
    $repesmax=1;
    $valor=0;
    for ($i=0; $i<20; $i++){
        $repes=0;
        for ($b=0; $b<20; $b++){
            if ($numeros[$i] == $numeros[$b]){
                $repes++;
            }
        }
        if ($repes > $repesmax){
            $valor = $numeros[$i];
            $repesmax = $repes;
        }
    }
    return $valor;
}

?>

<html>
<head>
<meta charset="UTF-8">
<title>Tabla y array</title>
</head>
<body>
<table border="1">

<?php 
echo "<tr>";
for ($i=0; $i<20; $i++){
    $num = random_int(1, 10);
    $numeros[]=$num;
    echo "<td>$num</td>";
}
echo "</tr>";


?>

</table>
</br>
</body>
</html>

<?php 
echo "Maximo: " . calcularMaximo($numeros) . "</br>";
echo "Minimo: " . calcularMinimo($numeros) . "</br>";
echo "Moda: " . calcularModa($numeros) . "</br>";
echo "</br></br>" . "La funcion calcularModa no funciona correctamente."
?>

</br></br>
<hr>
<?php show_source(__FILE__); ?>
<hr>