<h1>Modificar <?= $_SESSION['identity']->nombre ?></h1>

<form action="<?= base_url ?>usuario/gestionUser" method="POST">
	<label for="nombre">Nuevo nombre</label>
	<input type="text" value="<?= $_SESSION['identity']->nombre ?>" name="nuevonombre" required />
	<label for="nombre">Nuevo apellidos</label>
	<input type="text" value="<?= $_SESSION['identity']->apellidos ?>"  name="apellidos" required />
	<label for="nombre">Nuevo correo</label>
	<input type="text"  value="<?= $_SESSION['identity']->email ?>"  name="email" required />
	<input type="hidden" value="" name="rol" required />
	<input type="hidden" value="<?= $_SESSION['identity']->id ?>" name="id" required />

	<input type="submit" value="Guardar" />
</form>