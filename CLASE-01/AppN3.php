<?php

$a = 6;
$b = 9;
$c = 4;

if (($a >= $b && $a <= $c) || ($a <= $b && $a >= $c)) {
    echo "El valor del medio es: $a";
} elseif (($b >= $a && $b <= $c) || ($b <= $a && $b >= $c)) {
    echo "El valor del medio es: $b";
} elseif (($c >= $a && $c <= $b) || ($c <= $a && $c >= $b)) {
    echo "El valor del medio es: $c";
} else {
    echo "No hay valor del medio";
}
?>