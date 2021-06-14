<?php
// ------------------------------------------------
// Controlador que realiza la gestión de usuarios
// ------------------------------------------------

include_once 'config.php';
include_once 'modeloPeliDB.php'; 
include_once 'Pelicula.php';
include_once 'funcionesaux.php';

/**********
/*
 * Inicio Muestra o procesa el formulario (POST)
 */

function  ctlPeliInicio(){
    //Aqui por ahora no hay que poner nada
   }

/*
 *  Muestra y procesa el formulario de alta 
 */

function ctlPeliAlta (){
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        include_once 'plantilla/fnuevo.php';
    } else {
        $peli = new Pelicula();
        $peli->nombre   = $_POST['nombre'];
        $peli->director = $_POST['director'];
        $peli->genero   = $_POST['genero'];
        if (isset ($_FILES['imagen']['name'])) {
            if ($msg = ErrordescargarPeli()){
                include_once 'plantilla/fnuevo.php';
                return;
            } else {
                $peli->imagen = $_FILES['imagen']['name'];
            }
        }else {
            $peli->imagen = NULL;
        }
        ModeloPeliDB::Insert($peli);
        header('Location: index.php');
    }
    
}


//Procesar formulario POST

function    ctlIndentificacion() {
    if  ($_SERVER['REQUEST_METHOD'] == 'GET'){
        include_once 'plantilla/facceso.php';
    } else {
        if ( isset($_POST['Invitado'])){
            $_SESSION['autentificado'] = false;
            $_SESSION['rol'] = 'invitado';
            ctlPeliVerPelis();
            return;
        } else if ( ! empty($_POST["user"]) && !empty($_POST["password"])){
            if ( isOkUser ($_POST["user"],$_POST["password"]) ){
                $_SESSION['autentificado'] = true;
                $_SESSION['rol'] = 'admin';  
                ctlPeliVerPelis();
                return; 
            } else {
                $msg =  " Usuario introducido incorrecto ";
            }
        }
        include_once 'plantilla/facceso.php';
    }

   }

function  ctlSalir(){
    session_destroy();
    header('Location: index.php');
}

//Se crea la funcion que llamas en la funcion ctlPeliAlta
function ErrordescargarPeli(){
    $nombreFichero   =   $_FILES['imagen']['name'];
    $tipoFichero     =   $_FILES['imagen']['type'];
    $tamanioFichero  =   $_FILES['imagen']['size'];
    $temporalFichero =   $_FILES['imagen']['tmp_name'];
    $errorFichero    =   $_FILES['imagen']['error'];
    $msg=false;
    if ($errorFichero != 0 ){
        $msg="Error al subir el fichero $nombreFichero <br>";
    } else 
    if ($tipoFichero != "image/jpeg" && $tipoFichero != "image/png") {
        $msg =" Error el fichero no es una imagen jpeg o png";
    } else
    if (! move_uploaded_file($temporalFichero,'app/img/'. $nombreFichero )) {
       $msg= "ERROR: el fichero no se puede copiar en imagenes";
       return;
    }

    return $msg;
}


/*
 *  Muestra y procesa el formulario de Modificación 
 */
function ctlPeliModificar(){
    if  ($_SERVER['REQUEST_METHOD'] == 'GET'){
        if ( isset($_GET['codigo'])){
            $codigo = $_GET['codigo'];
            $peli = ModeloPeliDB::GetOne($codigo); 
            include_once 'plantilla/fmodificar.php';
        }
    
    } else {
        $peli = new Pelicula();
        $peli->codigo_pelicula = $_POST['codigo_pelicula'];
        $peli->nombre   = $_POST['nombre'];
        $peli->director = $_POST['director'];
        $peli->genero   = $_POST['genero'];
        $peli->imagen   = $_POST['imagenold'];
        $peli->youtube  = $_POST['youtube'];
        if ( !empty($_FILES['imagen']['name']) ) { 
           if ( $msg = ErrordescargarPeli()){
            include_once 'plantilla/fmodificar.php';
            return;
           } else {
            $peli->imagen = $_FILES['imagen']['name'];
            
           }
        } 
        ModeloPeliDB::Update($peli);
        header('Location: index.php');
    }
   
    
}



/*
 *  Muestra detalles de la pelicula
 */

function ctlPeliDetalles(){
    if (isset($_GET['codigo'])){
        $codigo = $_GET['codigo'];
        $peli = ModeloPeliDB::GetOne($codigo);
        include_once 'plantilla/detalle.php';

        $peli->youtube = str_replace("youtu.be","www.youtube.com/embed",$peli->youtube);
        include_once 'plantilla/detalle.php';
    
    }
    
}
/*
 * Borrar Peliculas
 */

function ctlPeliBorrar(){
    if (isset($_GET['codigo'])){
        $codigo = $_GET['codigo'];
        $peli = ModeloPeliDB::GetOne($codigo);
        ctlPeliVerPelis ();
    
    }
}

/*
 * Cierra la sesión y vuelca los datos
 */
function ctlPeliCerrar(){
    session_destroy();
    ModeloPeliDB::closeDB();
    header('Location:index.php');
}

/*
 * Muestro la tabla con los usuario 
 */ 
function ctlPeliVerPelis (){
    // Obtengo los datos del modelo
    $peliculas = ModeloPeliDB::GetAll();
    // Invoco la vista 
    include_once 'plantilla/verpeliculas.php';
   
}

//BARRA DE BUSQUEDA

function ctlBuscaTitulo(){
    if (!empty($_GET['valor']) ){
        $valor = $_GET['valor'];
        $peliculas = ModeloPeliDB::GetbyTitulo($valor);
        include_once 'plantilla/verpeliculas.php';
    }
  }
  
  function ctlBuscaDirector(){
      if (!empty($_GET['valor']) ){
          $valor = $_GET['valor'];
          $peliculas = ModeloPeliDB::GetbyDirector($valor);
          include_once 'plantilla/verpeliculas.php';
      }
  }
  
  function ctlBuscaGenero(){
      if (!empty($_GET['valor']) ){
          $valor = $_GET['valor'];
          $peliculas = ModeloPeliDB::GetbyGenero($valor);
          include_once 'plantilla/verpeliculas.php';
      }
  }



  //Para votar

  function ctlVotar(){
    if (!empty($_GET['puntos']) && !empty($_GET['codigo']) ){
      $puntos = $_GET['puntos'];
      $codigo = $_GET['codigo'];
      ModeloPeliDB::UpdatePuntos($codigo,$puntos);
      ctlPeliDetalles ();
    }
}