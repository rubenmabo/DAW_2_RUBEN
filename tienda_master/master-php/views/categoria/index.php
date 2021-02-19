<h1>Gestionar categorias</h1>

<a href="<?=base_url?>categoria/crear" class="button button-small">
	Crear categoria
</a>

<table>
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>TOTAL VENDIDO<th>
		<th> </th>
	</tr>
	<?php while($cat = $categorias->fetch_object()): ?>
		<tr>
			<td><?=$cat->id;?></td>
			<td><a href="<?=base_url?>categoria/listar&id=<?=$cat->id?>&nombre=<?=urlencode($cat->nombre)?>"><?=$cat->nombre?></a></td>
			<td><?=$cat->nproductos;?></td>
			<td>
				<a href="<?=base_url?>categoria/renombrar&id=<?=$cat->id?>" class="button button-gestion ">Editar</a>
				<a href="<?=base_url?>categoria/eliminar" class="button button-red">Borrar</a>
			</td>
		</tr>
	<?php endwhile; ?>
</table>


