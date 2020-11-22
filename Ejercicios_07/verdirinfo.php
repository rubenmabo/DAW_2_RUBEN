<?php

$directorio = ".";

if (scandir($directorio)){
    $ficheros = scandir($directorio);
   // print_r($ficheros);
    
    $num_ficheros = count($ficheros);

    for ($burbuja=0; $num_ficheros-1>$burbuja;$burbuja++){
        for ($cont=0; $num_ficheros-1>$cont; $cont++){       
            if (filesize($ficheros[$cont]) < filesize($ficheros[$cont+1])){
                $aux = $ficheros[$cont];
                $ficheros[$cont] = $ficheros[$cont+1];
                $ficheros[$cont+1] = $aux;
                
            }
        }
    }
    
} else {
    echo "No es un directorio";
}

?>
<html>
<body>
	<table border="1">
		<tr>
    		<td>Nombre fichero: </td>
   			<td>Tamano: </td>
  		</tr>
  		<?php 
  		$contador = 0;
  		while ($num_ficheros > $contador){
  		    echo "<tr> <td> " . $ficheros[$contador] . "</td>";
  		    echo "<td>" . filesize($ficheros[$contador]) . "</td> </tr>";
  		    $contador++;
  		}  		
  		?>
	</table>
</body>
</html>