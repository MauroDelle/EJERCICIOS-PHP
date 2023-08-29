<?php

/*      MAURO DELLE CHIAIE  

Aplicación No 5 (Números en letras)
Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
*/
    $num = 58;

    if($num >= 20 && $num <= 60)
    {
        $unidades = ["", "uno","dos","tres","cuatro","cinco","seis","siete","ocho","nueve"];
        $decenas = ["","diez","veinte","treinta","cuarenta","cincuenta","sesenta"];

        if ($num <= 29) {
            if ($num == 20) {
                echo "veinte";
            } else {
                $unidad = $num % 10;
                echo $decenas[2] . " y " . $unidades[$unidad];
            }
        } else {
            $decena = floor($num / 10);
            $unidad = $num % 10;
            echo $decenas[$decena] . " y " . $unidades[$unidad];
        }
    } else {
        echo "El número está fuera del rango válido (20-60)";
    }
?>