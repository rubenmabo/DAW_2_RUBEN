<?php
function limpiarEntrada(string $entrada):string{
    $salida = trim($entrada); // Elimina espacios antes y después de los datos
    $salida = stripslashes($salida); // Elimina backslashes \
    $salida = htmlspecialchars($salida); // Traduce caracteres especiales en entidades HTML
    return $salida;
}
// Función para limpiar todos elementos de un array
function limpiarArrayEntrada(array &$entrada){
    
    foreach ($entrada as $key => $value ) {
        $entrada[$key] = limpiarEntrada($value);
    }
}

function isOkUser ($user,$passwd) : bool {
  return ( $user == "admin" && $passwd == "admin");
}

function isAdmin ():bool {
   return ( isset( $_SESSION['rol'])  &&  $_SESSION['rol'] == "admin" );
}