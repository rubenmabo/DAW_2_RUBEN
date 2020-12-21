<?php
// ------------------------------------------------
// Controlador que realiza la gestión de usuarios
// ------------------------------------------------
include_once 'config.php';
include_once 'modeloUser.php';

/*
 * Inicio Muestra o procesa el formulario (POST)
 */

function  ctlUserInicio(){
    $msg = "";
    $user ="";
    $clave ="";
    if ( $_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['user']) && isset($_POST['clave'])){
            $user =$_POST['user'];
            $clave=$_POST['clave'];
            if ( modeloOkUser($user,$clave)){
                $_SESSION['user'] = $user;
                $_SESSION['tipouser'] = modeloObtenerTipo($user);
                if ( $_SESSION['tipouser'] == "Máster"){
                    $_SESSION['modo'] = GESTIONUSUARIOS;
                    header('Location:index.php?orden=VerUsuarios');
                }
                else {
                  // Usuario normal;
                  // PRIMERA VERSIÓN SOLO USUARIOS ADMISTRADORES
                  $msg="Error: Acceso solo permitido a usuarios Administradores.";
                  // $_SESSION['modo'] = GESTIONFICHEROS;
                  // Cambio de modo y redireccion a verficheros
                }
            }
            else {
                $msg="Error: usuario y contraseña no válidos.";
           }  
        }
    }
    
    include_once 'plantilla/facceso.php';
}

// Cierra la sesión y vuelva los datos
function ctlUserCerrar(){
    session_destroy();
    modeloUserSave();
    header('Location:index.php');
}

// Muestro la tabla con los usuario 
function ctlUserVerUsuarios (){
    // Obtengo los datos del modelo
    $usuarios = modeloUserGetAll(); 
    // Invoco la vista 
    include_once 'plantilla/verusuariosp.php';
   
}




function ctlUserAlta(){
    $msg="";
    $user="";
    $clave="";
    $nombre="";
    $correo="";
    $tipo="";
    $estado="";
    
    if( $_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['user']) && isset($_POST['clave']) && isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['tipo']) && isset($_POST['estado'])){
            
            $user = $_POST['user'];
            $clave = $_POST['clave'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $tipo = $_POST['tipo'];
            $estado = $_POST['estado'];
            
            $nuevo = [$clave, $nombre, $correo, $tipo, $estado];
            //if(modeloUserComprobar($user, $nuevo)){
            modeloUserGetAll();
            modeloUserAdd($user, $nuevo);
            modeloUserSave();
            if(modeloUserAdd($user,$nuevo)){
                header('Location:index.php?orden=VerUsuarios');
            }
            //}
        } else {
            
            $msg="debes introducir todos los datos majo";
        }
        
    } else{
        include_once 'plantilla/fnuevo.php';
    }
}

function ctlUserDetalles(){
    
    $clavedet=$_GET['id'];
    $usuaridet =$_SESSION['tusuarios'][$clavedet];
    $nombredet=$usuaridet[1];
    $userdet=$clavedet;
    $correodet=$usuaridet[2];
    
    
    $tipodet=$usuaridet[3];
    switch($tipodet){
        
        case "0": $detalle = "Basico";
        break;
        case "1": $detalle = "Profesional";
        break;
        case "2": $detalle = "Premium";
        break;
        case "3": $detalle = "Master";
        break;
        default:
    }
    include_once 'plantilla/fdetalles.php';
    
}

function ctlUserModificar(){
    $clave=$_GET['id'];
    $usuariomodif =$_SESSION['tusuarios'][$clave];
    $msg="";
    $newuser=$clave;
    $newclave=$usuariomodif[0];
    $newcorreo=$usuariomodif[2];
    $newnombre=$usuariomodif[1];
    $newtipo= $usuariomodif[3];
    $newestado= $usuariomodif[4];
    
    if( $_SERVER['REQUEST_METHOD'] == "POST"){
         
        $newuser = $_POST['user'];
        $newclave = $_POST['clave'];
        $newnombre = $_POST['nombre'];
        $newcorreo = $_POST['correo'];
        $newtipo = $_POST['tipo'];
        $newestado = $_POST['estado'];
        
        $modificado = [ $newclave, $newnombre, $newcorreo, $newtipo, $newestado];
        //if(modeloUserComprobar($newuser, $modificado)){
        modeloUserUpdate($newuser, $modificado);
        modeloUserSave();
        if(modeloUserUpdate($newuser, $modificado)){
            header('Location:index.php?orden=VerUsuarios');
        }
        //}
        
        
    } else{
        include_once 'plantilla/fmodificar.php';
    }
}

function ctlUserBorrar(){
    
    if (isset($_GET['id'])){
        $user = $_GET['id'];
        modeloUserDel($user);
        modeloUserSave();
        if(modeloUserDel($user)){
            header('Location:index.php?orden=VerUsuarios');
        }
    }
    
    
}