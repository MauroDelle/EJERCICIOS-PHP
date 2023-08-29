<?php

    $fechaActual = date("Y-m-d"); // Obtengo la fecha actual.


    //Formateo la fecha en diferentes formatos
    $formato1 = date("d/m/Y");
    $formato2 = date("F d, Y");
    $formato3 = date("l, F d, Y");

    echo "Fecha actual en formato Año-Mes-Día: $fechaActual<br>";
    echo "Fecha actual en formato Día/Mes/Año: $formato1<br>";
    echo "Fecha actual en formato Mes Día, Año: $formato2<br>";
    echo "Fecha actual en formato Día de la semana, Mes Día, Año: $formato3<br>";

    //Ahora determino la estacion del año
    $mes = date("n");

    $estacion = "";

    switch($mes)
    {
        case 12:
            case 1:
                case 2:
                    $estacion = "Verano";
                    break;
        case 3:
            case 4:
                case 5:
                    $estacion = "Otoño";
                    break;
        case 6:
            case 7:
                case 8:
                    $estacion = "Invierno";
                    break;
        case 9:
            case 10:
                case 11:
                    $estacion = "Primavera";
                    break;
    }

    echo "Estacion del año en Argentina: $estacion";
?>