<?php   
/*
    Aplicación No 1 (Sumar números)
    Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
    supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
    se sumaron.
*/

    $suma = 1;
    $numerosSumados = 0;

    for($i = 1;$suma + $i < 1000;$i++)
    {
        $suma += $i;
        if ($suma < 1000) {
            $numerosSumados++;
            echo "Número sumado: $i<br>";
        }
    }


    echo "Se sumaron un total de $numerosSumados números";
?>