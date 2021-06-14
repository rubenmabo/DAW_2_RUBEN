<?php
include_once 'app/Pelicula.php';
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();
$auto = $_SERVER['PHP_SELF'];

?>
<?php if ( !isAdmin() ) : ?>
<h2> ACCESO INVITADO </H2>
<?php endif; ?>

<input type="button" value=" Salir " onclick="javascript:window.location='index.php?orden=Salir'" >


<form action="index.php" method="GET">
     &#128270 <input type="text" name="valor" placeholder="Buscar aqui.." required ><th>
	<input type='submit' name='orden' value='Buscar por Título'>
	<input type='submit' name='orden' value='Buscar por Director'>
	<input type='submit' name='orden' value='Buscar por Genero'>
</form>
<hr>
<form action='index.php'>
<input type='hidden' name='orden' value='VerPelis'> 
<input type='submit' value='Ver Todos' >
Hay <?= count($peliculas) ?> películas disponibles.
</form>

<table class="tablapelis">
<th>Código</th><th>Nombre</th><th>Director</th><th>Genero</th>
<?php foreach ($peliculas as $peli) : ?>
<tr>		
<td><?= $peli->codigo_pelicula ?></td>
<td><?= $peli->nombre ?></td>
<td><?= $peli->director ?></td>
<td><?= $peli->genero ?></td>
<?php if ( isAdmin() ) : ?>
<td><a href="#"
			onclick="confirmarBorrar('<?= $peli->nombre."','".$peli->codigo_pelicula."'"?>);"><img src="/PHP/2_2/Eclipse/Ejercicio_Final_Junio/app/img/Borrar.jpg" width="30" height="40"></a></td>
<td><a href="<?= $auto?>?orden=Modificar&codigo=<?=$peli->codigo_pelicula?>"><img src="/PHP/2_2/Eclipse/Ejercicio_Final_Junio/app/img/Editar.png" width="40" height="45"></a></td>
<?php endif; ?>
<td><a href="<?= $auto?>?orden=Detalles&codigo=<?= $peli->codigo_pelicula?>"><img src="/PHP/2_2/Eclipse/Ejercicio_Final_Junio/app/img/Informacion.png" width="45" height="40"></a></td>
</tr>
<?php endforeach; ?>
</table>
<br>
<form name='f2' action='index.php'>
<input type='hidden' name='orden' value='Alta'> 
<?php if ( isAdmin() ) : ?>
<input type='submit' value='Nueva Película' >
<?php endif; ?>
</form>
<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido de la página principal
$contenido = ob_get_clean();
include_once "principal.php";

?>