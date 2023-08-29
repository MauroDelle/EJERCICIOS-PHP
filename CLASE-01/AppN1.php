<?php   

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