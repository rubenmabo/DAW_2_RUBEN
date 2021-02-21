<?php
require_once 'models/Usuario.php';

class usuarioController
{

	public function gestion()
	{
		Utils::isAdmin();
		$gestion = true;

		$usuario = new Usuario();
		$usuarios = $usuario->getAll();

		require_once 'views/usuario/gestion.php';
	}

	public function editar()
	{
		Utils::isAdmin();
		$gestion = true;

		$usuario = new Usuario();
		$usuarios = $usuario->getAll();

		if (isset($_POST) && isset($_POST['nuevonombre'])) {
			// Guardar la categoria en bd
			$usuario = new Usuario();
			$usuario->setNombre($_POST['nuevonombre']);
			$usuario->setId($_POST['id']);
			$usuario->setApellidos($_POST['apellidos']);
			$usuario->setEmail($_POST['email']);
			$usuario->setRol($_POST['rol']);
			$renombrar = $usuario->update();

			header("Location:" . base_url . "usuario/gestion");
		}
		require_once 'views/usuario/editarUser.php';
	}


	public function eliminar()
	{
		Utils::isAdmin();
		$gestion = true;

		// Guardar la categoria en bd
		$usuario = new Usuario();
		$usuario->setNombre($_REQUEST['nombre']);
		$usuario->setId($_REQUEST['id']);
		echo $usuario->getId();
		if ($usuario->delete()) {
			$msg = "Se ha borrado";
		} else $msg = "No se ha borrado";

		header("Location:" . base_url . "usuario/gestion");
	}

	public function gestionUser()
	{
		$gestion = true;

		$usuario = new Usuario();
		$usuarios = $usuario->getAll();
	

		if (isset($_POST) && isset($_POST['nuevonombre'])) {
			// Guardar la categoria en bd
			$usuario = new Usuario();
			$usuario->setNombre($_POST['nuevonombre']);
			$usuario->setId($_POST['id']);
			$usuario->setApellidos($_POST['apellidos']);
			$usuario->setEmail($_POST['email']);
			$usuario->setRol($_POST['rol']);
		
			$renombrar = $usuario->updateUser();

			header("Location:" . base_url . "usuario/gestion");
		}
		require_once 'views/usuario/editarUser.php';
	}

	public function index()
	{
		echo "Controlador Usuarios, Acción index";
	}

	public function registro()
	{
		require_once 'views/usuario/registro.php';
	}

	public function save()
	{
		if (isset($_POST)) {

			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;

			if ($nombre && $apellidos && $email && $password) {
				$usuario = new Usuario();
				$usuario->setNombre($nombre);
				$usuario->setApellidos($apellidos);
				$usuario->setEmail($email);
				$usuario->setPassword($password);

				$save = $usuario->save();
				if ($save) {
					$_SESSION['register'] = "complete";
				} else {
					$_SESSION['register'] = "failed";
				}
			} else {
				$_SESSION['register'] = "failed";
			}
		} else {
			$_SESSION['register'] = "failed";
		}
		header("Location:" . base_url . 'usuario/registro');
	}

	public function login()
	{
		if (isset($_POST)) {
			// Identificar al usuario
			// Consulta a la base de datos
			$usuario = new Usuario();
			$usuario->setEmail($_POST['email']);
			$usuario->setPassword($_POST['password']);

			$identity = $usuario->login();

			if ($identity && is_object($identity)) {
				$_SESSION['identity'] = $identity;

				if ($identity->rol == 'admin') {
					$_SESSION['admin'] = true;
				}
			} else {
				$_SESSION['error_login'] = 'Identificación fallida !!';
			}
		}
		header("Location:" . base_url);
	}

	public function logout()
	{
		if (isset($_SESSION['identity'])) {
			unset($_SESSION['identity']);
		}

		if (isset($_SESSION['admin'])) {
			unset($_SESSION['admin']);
		}

		header("Location:" . base_url);
	}
} // fin clase