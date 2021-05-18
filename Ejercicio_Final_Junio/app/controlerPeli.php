<?php
// ------------------------------------------------
// Controlador que realiza la gestión de usuarios
// ------------------------------------------------

include_once 'config.php';
include_once 'modeloPeliDB.php'; 
include_once 'Pelicula.php';

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
function ctlPeliModificar (){
   //Todavia no hay que poner nada
}



/*
 *  Muestra detalles de la pelicula
 */

function ctlPeliDetalles(){
    if (isset($_GET['codigo'])){
        $codigo = $_GET['codigo'];
        $peli = ModeloPeliDB::GetOne($codigo);
        include_once 'plantilla/detalle.php';
    
    }
    
}
/*
 * Borrar Peliculas
 */

function ctlPeliBorrar(){
   //Todavia no hay que poner nada
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