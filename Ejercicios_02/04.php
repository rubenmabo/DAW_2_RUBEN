<?php
$total = 0;
$max = 0;
$min = 100;
for ($i=0;$i<50;$i++){
    $num = random_int(1, 100);
    $total = $total + $num;
    if ($num > $max){
        $max = $num;
    }
    if ($num < $min){
        $min = $num;
    }
}

?>

<table border="1">
  <tr>
    <th colspan="2">Generación de 50 valores aleatorios</th>
  </tr>
  <tr>
    <td>Media : </td>
    <td align=right><?php echo $total / 50;?></td>
  </tr>
  <tr>
    <td>Maximo : </td>
    <td align=right><?php echo $max;?></td>
  </tr>
  <tr>
    <td>Minimo : </td>
    <td align=right><?php echo $min;?></td>
  </tr>
</table>


