<?php 


if ($_POST['nombre'] != ''){    
    if ($_POST['email'] != ''){
        if ($_POST['password'] != ''){
            if ($_POST['password2'] != ''){
                $pass1=$_POST['password'];
                $pass2=$_POST['password2'];
                if ($pass1 == $pass2){
                    $tamano = strlen($pass1);
                    if ($tamano >= 8){
                        
                        $array_pass = str_split($pass1);
                        $tmayus=0;
                        $tminus=0;
                        $tnum=0;
                        $diferente=0;
                        for ($i=0 ; $i<strlen($pass1) ; $i++){
                            if(ctype_upper($array_pass[$i])){
                                $tmayus++;
                            }
                            if(ctype_lower($array_pass[$i])){
                                $tminus++;
                            }
                            if(ctype_digit($array_pass[$i])){
                                $tnum++;
                            }
                            if((! ctype_digit($array_pass[$i])) && (! ctype_alpha($array_pass[$i]))){
                                $diferente++;
                            }
                        }
                        
                        if ($tmayus>0 && $tminus>0 && $tnum>0 && $diferente>0){
                            echo "REGISTRO COMPLETADO: </br>";
                            echo "NOMBRE:   " . ($_POST['nombre']) . "</br>";
                            echo "EMAIL:    " . ($_POST['email']) . "</br>";
                            echo "PASSWORD: " . ($_POST['password']) . "</br>";
                            
                                                        
                        }else{
                            echo "LA PASSWORD NO CUMPLE CON LOS REQUISITOS DE SEGURIDAD";                            
                        }
                                     
                    }else {
                        echo "Contra MENOR!! de 8 caracteres";
                    }                    
                }else{
                    echo "LAS PASSWORDS NO COINCIDEN" . "</br>";
                }
            }else{
                echo "TIENES QUE RELLENAR LA SEGUNDA PASSWORD PARA COMPARARLAS" . "</br>";
            }
        }else{
            echo "TE FALTA RELLENAR LA PASSWORD" . "</br>";
        }
    }else{
        echo "FALTA EL CAMPO EMAIL" . "</br>";
    }
}else {
    echo "FALTA EL CAMPO NOMBRE" . "</br>";
}

?>