<h1>Modificar Categoria</h1>

<form action="<?=base_url?>categoria/renombrar" method="POST">
	<label for="nombre">Nuevo nombre</label>
	<input type="text" value="Sudadera" name="nuevonombre" required/> 
	 
	<input type="submit" value="Guardar" />
</form>