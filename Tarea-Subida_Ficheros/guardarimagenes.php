<html>
<head>
<title>Procesa una subida de archivos </title>
<meta charset="UTF-8">
</head>
<?php
// se incluyen esta tabla de  códigos de error que produce la subida de archivos en PHPP
// Posibles errores de subida segun el manual de PHP
$codigosErrorSubida= [ 
    0 => 'Subida correcta',
    1 => 'El tamaño del archivo excede el admitido por el servidor',  // directiva upload_max_filesize en php.ini
    2 => 'El tamaño del archivo excede el admitido por el cliente',  // directiva MAX_FILE_SIZE en el formulario HTML
    3 => 'El archivo no se pudo subir completamente',
    4 => 'No se seleccionó ningún archivo para ser subido',
    6 => 'No existe un directorio temporal donde subir el archivo',
    7 => 'No se pudo guardar el archivo en disco',  // permisos
    8 => 'Una extensión PHP evito la subida del archivo', // extensión PHP
    11 => 'El fichero 1 es de mayor tamanio que lo permitido',
    12 => 'El fichero 1 no tiene el formato valido (PNG o JPG)',
    13 => 'El fichero 1  exite en destino',
    21 => 'El fichero 2 es de mayor tamanio que lo permitido',
    22 => 'El fichero 2 no tiene el formato valido (PNG o JPEG)',
    23 => 'El fichero 2 existe en destino ',
    31 => 'El conjunto de los ficheros es de mas grande de lo permitido',
]; 
$mensaje = '';
$directorio="/home/alumno_b/Escritorio/FICHEROS/";

// si no se reciben el directorio de alojamiento y el archivo, se descarta el proceso
if (! isset($_FILES['archivo1']['name'])) {
    $mensaje .= 'ERROR: No se indicó el archivo 1';
} else { // recibe los datos de los ficheros
    // Información sobre el archivo subido
    $nombreFichero1   =   $_FILES['archivo1']['name'];
    $tipoFichero1     =   $_FILES['archivo1']['type'];
    $tamanioFichero1  =   $_FILES['archivo1']['size'];
    $temporalFichero1 =   $_FILES['archivo1']['tmp_name'];
    $errorFichero1    =   $_FILES['archivo1']['error'];

    $nombreFichero2   =   $_FILES['archivo2']['name'];
    $tipoFichero2     =   $_FILES['archivo2']['type'];
    $tamanioFichero2  =   $_FILES['archivo2']['size'];
    $temporalFichero2 =   $_FILES['archivo2']['tmp_name'];
    $errorFichero2    =   $_FILES['archivo2']['error'];
    
    $mensaje .= 'Intentando subir el archivo 1: ' . ' <br />';
    $mensaje .= "- Nombre: $nombreFichero1" . ' <br />';
    $mensaje .= '- Tamaño: ' . number_format(($tamanioFichero1 / 1000), 1, ',', '.'). ' KB <br />';
    $mensaje .= "- Tipo: $tipoFichero1" . ' <br />' ;
    $mensaje .= "- Nombre archivo temporal: $temporalFichero1" . ' <br />';
    $mensaje .= "- Código de estado: $errorFichero1" . ' <br />';
    
    if ($errorFichero2 != 4){
        $mensaje .= '<br/>';
        $mensaje .= 'Intentando subir el archivo 2: ' . ' <br />';
        $mensaje .= "- Nombre: $nombreFichero2" . ' <br />';
        $mensaje .= '- Tamaño: ' . number_format(($tamanioFichero2 / 1000), 1, ',', '.'). ' KB <br />';
        $mensaje .= "- Tipo: $tipoFichero2" . ' <br />' ;
        $mensaje .= "- Nombre archivo temporal: $temporalFichero2" . ' <br />';
        $mensaje .= "- Código de estado: $errorFichero2" . ' <br />';
        
    }
    
    
    $mensaje .= '<br />RESULTADO<br />';
    $directorio="C:\Users\RubenMarinBodas\Desktop\FICHEROS/";
    

    
   //  (AQUI HAY QUE METER EL FILTRO DEL TAMAÑO, SOLO JPG o PNG ESE FORMATO, SI EXISTE NO SUBE EL FICH)
    if (($errorFichero1 == 0 && $errorFichero2 == 4) || ($errorFichero1 == 0 && $errorFichero2 == 0)){
        if ($errorFichero2 == 4){
            //solo fichero 1
            if ($tamanioFichero1 <= 200000){
                if (($tipoFichero1 == "image/png" || $tipoFichero1 == "image/jpeg")){                    
                    if(! file_exists($directorio."/". $nombreFichero1)){
                        //CONTINUA CON RESTRICCIONES PARA FICHERO 1 (SOLO FICHERO 1, FICHERO 2 NO SELECCIONADO)
                        
                        
                    }else{
                        $errorFichero1 = 13; //fichero 1 duplicado
                    }
                }else {
                    $errorFichero1 = 12; //el formato no es png o jpeg
                }
            }else{
                $errorFichero1 = 11; //ocupa mas de 200 el fichero 1
            }
            
        }else{
            //Fichero 1 y 2
            if ($tamanioFichero1 <= 200000){
                if ($tamanioFichero2 <= 200000){
                    if(($tamanioFichero1 + $tamanioFichero2) <= 300000){
                        if(($tipoFichero1 == "image/png" || $tipoFichero1 == "image/jpeg")){
                            if (($tipoFichero2 == "image/png" || $tipoFichero2 == "image/jpeg")){                                
                                if(! file_exists($directorio."/". $nombreFichero1)){
                                    if(! file_exists($directorio."/". $nombreFichero2)){
                                        //CONTINUA CON LAS RESTRICCIONES PARA FICHEROS 1 Y 2
                                        
                                    }else{
                                        $errorFichero1 = 23; //Fichero 2 duplicado
                                        $errorFichero2 = 23;
                                    }                                    
                                }else {
                                    $errorFichero1 = 13; //fichero 1 duplicado
                                }                                
                            }else {
                                $errorFichero1 = 22; //formato incorrecto en fichero 2
                                $errorFichero2 = 22;
                            }
                        }else{
                            $errorFichero1 = 12; //formato incorrecto en fichero 1
                        }
                    }else{
                        $errorFichero1 = 31; //ocupa mas de 300 entre los 2
                        $errorFichero2 = 31;
                    }
                }else{
                    $errorFichero1 = 21; //ocupa mas de 200 el fichero 2
                    $errorFichero2 = 21;
                }
            }else{
                $errorFichero1 = 11; //ocupa mas de 200 el fichero 1
            }
            
        }      
    }
    
    
    // Obtengo el codigo de error de la operacion, 0 si todo ha ido bien
    if ($errorFichero1 > 0 && ($errorFichero2 != 0 || $errorFichero2 != 4)) {//Falla -->
        $mensaje .= "Se ha producido el error nº $errorFichero1: <em>" . $codigosErrorSubida[$errorFichero1] . '</em> <br/>';
    } else { //BIEN - Sube -->
        // si es un directorio y tengo permisos     
         if ( $directorio && is_writable ($directorio)) { 
            //Intento mover el archivo temporal al directorio indicado
             if (move_uploaded_file($temporalFichero1,  $directorio .'/'. $nombreFichero1) == true) {
                 $mensaje .= 'Archivo guardado en: ' . $directorio .'/'. $nombreFichero1 . ' <br />';
            } else {
                $mensaje .= 'ERROR: Archivo no guardado correctamente <br />';
            }
        } else {
            $mensaje .= 'ERROR: No es un directorio correcto o no se tiene permiso de escritura <br />';
        }
    }
}
?>


<body>
<?php echo " Bienvenido ".$_REQUEST['nombre']."<br>"?>
<?php echo $mensaje; ?>
<br />
	<a href="subirfichero.html">Volver a la página de subida</a>
</body>
</html>