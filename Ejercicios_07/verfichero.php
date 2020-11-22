<html>
<body>
	<form action="verfichero.php" method="post">
		<p>Fichero: <input type="text" name="fichero" /></p>
	</form>
</body>
</html>

<?php 
//$contenido = file_get_contents($nombre_fichero);
if (isset($_POST["fichero"])){
    show_source($_POST["fichero"]);
    
    $nombre_fichero = $_POST["fichero"];
    $fichero = fopen ($nombre_fichero, "r");
    
    $num_lineas = 0;
    $caracteres = 0;
    
    
    while(!feof($fichero)){
        if($lineas = fgets($fichero)){
            $num_lineas++;
            $caracteres = $caracteres + strlen($lineas);
        }
        echo "LINEA: " . $lineas . "</br>";
        echo "Linea: " . strlen($lineas) . "</br>";
    }
    
    fclose($fichero);
    
    echo "</br></br>";
    echo "Lineas: " . $num_lineas . "</br>";
    echo "Caracteres: " . $caracteres . "</br>";
}


//Hay que repasar el contador de lineas y letras
?>