<?php
//ARRAYs ASOCIATIVOS

$medios = array(
    "El Pais"  => "https://www.elpais.com/",
    "El Mundo" => "https://www.elmundo.es/",
    "El ABC"   => "https://www.abc.es/",
    "La Razon" => "https://www.larazon.es/",
    "Prensa" => "https://www.prensaescrita.com/",
);

foreach ($medios as $clave => $valor){
    echo "<li> <a href=\"$valor\">$clave</a></li>";
}

?>

<br>
<hr>
<?php show_source(__FILE__); ?>
<hr>
