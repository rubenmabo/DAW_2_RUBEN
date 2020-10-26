<?php
$bono = array();
$i=0;
do{
    $numero = random_int(1, 49);
    $repe = array_search($numero,$bono); 
    
    if($repe === false){
        $bono[$i]= $numero;
        $i++;
    }
}while($i<5);

asort($bono);
$complementario = random_int(1, 49);


echo "<pre>";
print_r($bono);

?>
<table border="1">
  <tr>
    <?php 
            foreach ($bono as $clave => $valor){
                echo "<th>";
                echo $valor;
                echo "</th>";
            }
    ?>
    <th>Complementario <?php echo $complementario;?></th>
  </tr>
</table>

