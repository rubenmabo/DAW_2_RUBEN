
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Forma de pago</title>
    </head>
    <body>
        <center>

<?php 
//UTILIZANDO LAS COOKIES
//Usando pagocookie.php la selección de tarjeta 
//se mantendrá mientras el cookie no se elimine
//o caduque aunque rearranquemos el navegador


if (isset($_COOKIE["nuevatarjeta"])) {
    $tarjeta = $_COOKIE["nuevatarjeta"];
    echo "<h2>SU FORMA DE PAGO ACTUAL ES: </h2><br>";
    header("Refresh:1");
    echo "<img  src='imagenes/$tarjeta.gif' />";
}else {
    echo "<h2>NO TIENE FORMA DE PAGO ASOCIADA </h2><br>";
}

if (isset($_GET['nuevatarjeta'])) {
    $tarjeta = $_GET['nuevatarjeta'];
    setcookie("nuevatarjeta", $tarjeta, time() + 3*24*3600);
} 


?>
	<h2>SELECCIONE UNA NUEVA TARJETA DE CREDITO </h2><br>
         <a href='?nuevatarjeta=cashu'><img  src='imagenes/cashu.gif' /></a>&ensp;
         <a href='?nuevatarjeta=cirrus1'><img  src='imagenes/cirrus1.gif' /></a>&ensp;
         <a href='?nuevatarjeta=dinersclub'><img  src='imagenes/dinersclub.gif' /></a>&ensp;
         <a href='?nuevatarjeta=mastercard1'><img  src='imagenes/mastercard1.gif'/></a>&ensp;
         <a href='?nuevatarjeta=paypal'><img  src='imagenes/paypal.gif' /></a>&ensp;
         <a href='?nuevatarjeta=visa1'><img  src='imagenes/visa1.gif' /></a>&ensp;
         <a href='?nuevatarjeta=visa_electron'><img  src='imagenes/visa_electron.gif'/></a>  

        </center>
    </body>
</html>