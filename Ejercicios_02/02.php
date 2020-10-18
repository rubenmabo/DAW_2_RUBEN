<?php
$num1 = random_int(1, 10);
$num2 = random_int(1, 10);

require_once('funcionesvar.php');

echo "Numero 1 : " . $num1 . "</br>";
echo "Numero 2 : " . $num2 . "</br></br>";
echo $num1 . " + " . $num2 . " : " . calcSuma($num1, $num2) . "</br>";
echo $num1 . " - " . $num2 . " : " . calcResta($num1, $num2) . "</br>";
echo $num1 . " * " . $num2 . " : " . calcMultiplicacion($num1, $num2) . "</br>";
echo $num1 . " / " . $num2 . " : " . calcDivision($num1, $num2) . "</br>";
echo $num1 . " % " . $num2 . " : " . calcModulo($num1, $num2) . "</br>";
echo $num1 . " ** " . $num2 . " : " . calcPotencia($num1, $num2) . "</br>";

?>

</br></br></br>
<hr>
<?php show_source(__FILE__); ?>
<hr>
