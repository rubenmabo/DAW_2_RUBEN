<h1>Gestión de Usuarios</h1>

<a href="<?= base_url ?>usuario/registro" class="button button-small">
	Crear Usuario
</a>

<table>
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>APELLIDOS</th>
		<th>EMAIL</th>
		<th>ROL</th>
	</tr>
	<?php while ($pro = $usuarios->fetch_object()) : ?>
		<tr>
			<!--  Aqui justo falta esto:
			<td><input type="checkbox" name="tproductos[]" value"
		-->
			<td><?= $pro->id; ?></td>
			<td><?= $pro->nombre; ?></td>
			<td><?= $pro->apellidos; ?></td>
			<td><?= $pro->email; ?></td>
			<td><?= $pro->rol; ?></td>
			<td>
				<a href="<?= base_url ?>usuario/editar&id=<?= $pro->id ?>&nombre=<?= $pro->nombre ?>&apellidos=<?= $pro->apellidos ?>&email=<?= $pro->email ?>&rol=<?= $pro->rol ?>" class="button button-gestion">Editar</a>
				<a href="<?= base_url ?>usuario/eliminar&id=<?= $pro->id ?>&nombre=<?= $pro->nombre ?>" class="button button-gestion button-red">Eliminar</a>
			</td>
		</tr>
	<?php endwhile; ?>
</table>