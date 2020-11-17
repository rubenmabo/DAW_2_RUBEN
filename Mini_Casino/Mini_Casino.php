<?php 
session_start();

if (isset($_POST['dinero'])){
    $_SESSION['dinero'] = $_POST['dinero'];
}


$dinero_total = $_SESSION['dinero'];


//SOLO SE MUESTRA EN JUEGO
if (isset($_POST['apuesta'])){
        
    //APUESTA PAR O IMPAR ORDENADOR - ALEATORIO
    $num = random_int(0, 1);
    if($num == 1){
        $resultado = "IMPAR";
    } else {
        $resultado = "PAR";
    }
    
    //FUNCIONALIDAD DEL JUEGO
    if ($dinero_total >= $_POST['apuesta']){
        
        //MUESTRA EL RESULTADO
        echo "RESULTADO DE LA APUESTA : " . $resultado . "</br>";
        if ($_POST['num'] == "PAR" && $resultado == "PAR"){
            echo "</br> GANASTE </br>";
            $casino=1;
        } else if ($_POST['num'] == "IMPAR" && $resultado == "IMPAR"){
            echo "</br> GANASTE </br>";
            $casino=1;
        }else {
            echo "</br> PERDISTE... </br>";
            $casino=0;
        }
        
        //CALCULOS DE APUESTAS
        if ($casino == 0){
            $dinero_total = $dinero_total - $_POST['apuesta'];
        } else{
            $dinero_total = $dinero_total + $_POST['apuesta'];
        }
        
        $_SESSION['dinero'] = $dinero_total;
        
    } else if($dinero_total == 0) {
        echo "Error: NO PUEDES SEGUIR JUGANDO, NO TIENES DINERO. </br>";
    } else {
        echo "Error:  NO DISPONES DE " . $_POST['apuesta'] . " EUROS PARA JUGAR... </br>";
    }
    
    
}

echo "Dispone de " . $dinero_total . " para jugar. </br>";
?>

<html>
<body>
	<form action="Mini_Casino.php" method="post">
		<p>Cantidad a apostar: <input type="text" name="apuesta" /></p>
		<p>Tipo de apuesta: <input type="radio" name="num" value="PAR" checked>Par</input>  <input type="radio" name="num" value="IMPAR">Impar</input> 
		<p><input type="submit" value="Apostar cantidad" /> <input type="" value="Abandonar el Casino" /></p>
	</form>
</body>
</html>
