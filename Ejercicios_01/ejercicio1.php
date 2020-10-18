<?php

$num1 = random_int(0, 10);
$num2 = random_int(0, 10);

echo "Numero 1 : " . $num1 . "</br>";
echo "Numero 2 : " . $num2 . "</br></br>";

echo "$num1 + $num2 = " .($num1 + $num2). "</br>";
echo "$num1 - $num2 = " .($num1 - $num2). "</br>";
echo "$num1 * $num2 = " .($num1 * $num2). "</br>";
echo "$num1 / $num2 = " .($num1 / $num2). "</br>";
echo "$num1 % $num2 = " .($num1 % $num2). "</br>";
echo "$num1 ^ $num2 = " .($num1 ** $num2);

?>

</br></br></br>
<hr>
<?php show_source(__FILE__); ?>
<hr>
