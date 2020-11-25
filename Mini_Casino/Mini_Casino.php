<?php 
session_start();
$visitas=0;

if (isset($_POST['dinero'])){
    $_SESSION['dinero'] = $_POST['dinero'];
}


$dinero_total = $_SESSION['dinero'];


if (isset($_POST["dejar"]) || ($_SESSION['dinero'] == '0') ) {
    echo "Muchas gracias por jugar con nosotros. <br> ";
    echo "Su resultado final es de " . $dinero_total . " Euros <br>";
    $visitas++;
    setcookie("visitascasino",$_COOKIE['visitascasino']+1, time()+ 30 * 24 * 3600); // Un mes
    echo "Veces que has jugado " . $_COOKIE['visitascasino'];
    session_destroy();
    exit();
} else if (isset($_POST['apuesta'])){
        
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
            $dinero_total = $dinero_total + $_POST['apuesta'];
        } else if ($_POST['num'] == "IMPAR" && $resultado == "IMPAR"){
            echo "</br> GANASTE </br>";
            $dinero_total = $dinero_total + $_POST['apuesta'];
        }else {
            echo "</br> PERDISTE... </br>";
            $dinero_total = $dinero_total - $_POST['apuesta'];
        }
       
               
        $_SESSION['dinero'] = $dinero_total;
        
    } else {
        echo "Error:  NO DISPONES DE " . $_POST['apuesta'] . " EUROS PARA JUGAR... </br>";
    }
    header("Refresh:0");
}

echo "Dispone de " . $_SESSION['dinero'] . " para jugar. </br>";
?>

<html>
<body>
	<form action="Mini_Casino.php" method="post">
		<p>Cantidad a apostar: <input type="text" name="apuesta" /></p>
		<p>Tipo de apuesta: <input type="radio" name="num" value="PAR" checked>Par</input>  <input type="radio" name="num" value="IMPAR">Impar</input> 
		<p><input type="submit" value="Apostar cantidad" /> <button name='dejar' value='dejar'> Abandonar el Casino </button></p>
	</form>
</body>
</html>