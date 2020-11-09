<?php
function usuarioOk($usuario, $contraseña) :bool {
   
    return ($contraseña == strrev($usuario));
    
}

function contarPalabras($comentario){
    $palabras = count(explode(" ", $comentario));
    return $palabras;
}


function contarLetraRepe($comentario){
    $cont=0;
    $cont_total=0;
    $array_comentario = str_split($comentario);
    for($i=0 ; $i<count($array_comentario) ; $i++){
        for($a=0 ; $a<count($array_comentario) ; $a++){
            if($array_comentario[$i] == $array_comentario[$a]){
                $cont++;
                if ($array_comentario[$i] == " " && $array_comentario[$a] == " "){
                    $cont--;
                }
            }
            if ($cont > $cont_total){
                $cont_total = $cont;
                $letraR = $array_comentario[$i];                
            }
        }
        $cont=0;
    }
    
    return $letraR;
}

function contarPalabraRepe($comentario){
    $contador = 0;
    $contador_total = 0;
    $array_PalabraRepe = explode(" " , $comentario);
    for($i=0 ; $i<count($array_PalabraRepe) ; $i++){
        for($a=0 ; $a<count($array_PalabraRepe) ; $a++){
            if($array_PalabraRepe[$i] == $array_PalabraRepe[$a]){
                $contador++;
                if($array_PalabraRepe[$i] == " " && $array_PalabraRepe[$a] == " "){
                    $contador--;
                }
            }
            if ($contador > $contador_total){
                $contador_total = $contador;
                $palabraR = $array_PalabraRepe[$i];
            }
        }
        $contador=0;
    }
    return $palabraR;
}