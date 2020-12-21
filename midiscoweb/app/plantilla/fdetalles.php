<?php

// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();
// FORMULARIO DE ALTA DE USUARIOS
//CAMBIAR A PARTIR DE AQUI-->
?>

<div id='aviso'><b><?= (isset($msg))?$msg:"" ?></b></div>
<form name='Detalles' method="POST" action="index.php">
	<table>
         <h2> DETALLES DE <?= " $clavedet " ?></h2>
		 <tr>
			<td>nombre:</td>
			<td> <?= " $nombredet " ?> </td>
		</tr>
		<tr>
			<td>correo electronico :</td>
			<td> <?= " $correodet " ?> </td>
		</tr>
		<tr>
			<td> Plan: </td>
			<td><?= " $detalle " ?> </td>
		</tr>
		
	</table>
	<input type="submit" name="orden" value="atras">
</form>

<?php 
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido
$contenido = ob_get_clean();
include_once "principal.php";

?>