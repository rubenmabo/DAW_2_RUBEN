<?php

$medios = array(
    "El Pais"  => "https://www.elpais.com/",
    "El Mundo" => "https://www.elmundo.es/",
    "El ABC"   => "https://www.abc.es/",
    "La Razon" => "https://www.larazon.es/",
    "Prensa" => "https://www.prensaescrita.com/",
);

$periodico=array_rand($medios);

foreach ($medios as $clave => $valor){
    if ($clave == $periodico){
        echo "<li> <a href=\"$valor\">$clave</a></li>";
        break;
    }
}

?>

<br>
<hr>
<?php show_source(__FILE__); ?>
<hr>