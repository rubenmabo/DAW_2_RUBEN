<h1>Modificar Categoria</h1>

<form action="<?=base_url?>categoria/renombrar" method="POST">
	<label for="nombre">Nuevo nombre</label>
	<input type="text" value="<?=$_REQUEST["nombre"]?>" name="nuevonombre" required/> 
	<input type="hidden" value="<?=$_REQUEST["id"]?>" name="id" required/> 
	 
	<input type="submit" value="Guardar" />
</form>