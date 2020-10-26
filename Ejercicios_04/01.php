<?php
$usuarios = array(
    "ruben" => "ruben123",
    "pepe" => "pepe123",
    "admin" => "administrador",
);

/*
foreach ($_REQUEST as $user => $pass){
    $usuario_intro = $user;
    $password_intro = $pass;
    foreach ($usuarios as $usuario => $contrase){
        if ($usuario_intro == $usuario){
            if ($password_intro == $contrase){
                echo "USUARIO CORRECTO </br>";
            }else{
                echo "ERROR: Contraseña incorrecta </br>";
            }
        }else{
            echo "ERROR: Usuario no existe </br>";
        }
    }
}
*/

var_dump($usuarios);
echo "</br>";
var_dump($_REQUEST);
echo "</br>";

$result_array = array_intersect_assoc($usuarios, $_REQUEST);
print_r($result_array);

echo"</br></br><hr>";
echo "<pre>";
print_r($_REQUEST);
echo"</br></br>";
print_r($usuarios);
echo "</pre>";

