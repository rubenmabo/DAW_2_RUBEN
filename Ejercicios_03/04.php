<?php
$deportes = array(
    "Baloncesto"  => "img/baloncesto.JPG",
    "Karate" => "img/karate.JPG",
    "Padel" => "img/padel.JPG",
    "Rugby" => "img/rugby.JPG",
    "Tenis" => "img/tenis.JPG",
);

?>

<table border="1">
	<tr>
    	<td>Deporte</td>
    	<td>Logo</td>
  	</tr>

<?php 

foreach ($deportes as $clave => $valor){
    echo "<tr>";
        echo "<td> $clave </td>";
        echo "<td> <img src='$valor'> </td>";
    echo "</tr>";
}

?>
  
</table>