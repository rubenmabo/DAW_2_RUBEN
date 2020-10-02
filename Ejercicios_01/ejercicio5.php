<?php
$num1 = random_int(1, 9);
$num2 = random_int(1, 9);

echo "Numero 1 : " . $num1 . "</br>";
echo "Numero 2 : " . $num2 . "</br></br>";

?>
<table border="1">
	<tr>
		<td>Operacion</td>
		<td>Resultado</td>
	</tr>
	<tr>
		<td><?php echo $num1 . " + " . $num2?></td>
		<td><?php echo $num1 + $num2?></td>
	</tr>
	<tr>
		<td><?php echo $num1 . " - " . $num2?></td>
		<td><?php echo $num1 - $num2?></td>
	</tr>
	<tr>
		<td><?php echo $num1 . " * " . $num2?></td>
		<td><?php echo $num1 * $num2?></td>
	</tr>
	<tr>
		<td><?php echo $num1 . " / " . $num2?></td>
		<td><?php echo $num1 / $num2?></td>
	</tr>
	<tr>
		<td><?php echo $num1 . " % " . $num2?></td>
		<td><?php echo $num1 % $num2?></td>
	</tr>
	<tr>
		<td><?php echo $num1?><sup><?php echo $num2?></sup></td>
		<td><?php echo $num1 ** $num2?></td>
	</tr>
</table>