<?php
$a=random_int(0, 9);
$b=random_int(0, 9);
$c=random_int(0, 9);

echo "A= " . $a . "</br>";
echo "B= " . $b . "</br>";
echo "C= " . $c . "</br>";

function elMayor($a, $b, $c){
    if ($a > $b){
        if ($a > $c){
            return $a;
        }else {
            return $c;
        }
    }else if ($b > $c){
        return $b;
    }else{
        return $c;
    }
}

echo elMayor($a, $b, $c);