<?php

session_start();
include_once 'app/config.php';
include_once 'app/controlerPeli.php';
include_once 'app/modeloPeliDB.php';
include_once 'app/funcionesaux.php';

// Inicializo el modelo 
ModeloPeliDB::Init();


// Enrutamiento
// Relación entre peticiones y función que la va a tratar
// Versión sin POO no manejo de Clases ni objetos
// Rutas en MODO PELICULAS
$rutasPelis = [
    "Inicio"      => "ctlPeliInicio",
    "Alta"        => "ctlPeliAlta",
    "Detalles"    => "ctlPeliDetalles",
    "Modificar"   => "ctlPeliModificar",
    "Borrar"      => "ctlPeliBorrar",
    "Cerrar"      => "ctlPeliCerrar",
    "VerPelis"    => "ctlPeliVerPelis",
    "Buscar Título"   => "ctlBuscaTitulo",
    "Buscar Genero"   => "ctlBuscaGenero",
    "Buscar Director" => "ctlBuscaDirector",
    "votar" => "ctlVotar",
    "Salir" => "ctlSalir"
];

// Evito inyección html
limpiarArrayEntrada($_POST);
limpiarArrayEntrada($_GET);




if ( !isset( $_SESSION['autentificado'])) {
    ctlIndentificacion();
    return;

}


if (isset($_GET['orden'])){
            // La orden tiene una funcion asociada 
            if ( isset ($rutasPelis[$_GET['orden']]) ){
                $procRuta =  $rutasPelis[$_GET['orden']];
            }
            else {
                // Error no existe función para la ruta
                header('Status: 404 Not Found');
                echo '<html><body><h1>Error 404: No existe la ruta <i>' .
                    $_GET['ctl'] .
                    '</p></body></html>';
                    exit;
            }
        }
        else {
            $procRuta = "ctlPeliVerPelis";
        }
    
 
// Llamo a la función seleccionada
$procRuta();