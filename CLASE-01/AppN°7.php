<?php

    /*      MAURO DELLE CHIAIE

        Aplicación No 7 (Mostrar impares)
        Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
        Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
        salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números
        utilizando las estructuras while y foreach.
    */

    $impares = array(); //Creo el array para almacenar los numeros impares;

    $num = 1;
    $contador = 0;

    //Lleno el array con los primeros 10 numeros impares
    while($contador < 10)
    {
        if($num % 2 != 0)   //verifico si el numero es impar
        {
            $impares[] = $num;  //agrego el numero al array
            $contador++;
        }
        $num++;
    }

    //Ahora imprimo los numeros impares usando la estructura for
    echo "Números impares usando for: <br>";
    for($i = 0; $i < count($impares); $i++)
    {
        echo $impares[$i] . "<br>";
    }

    // Ahora imprimo los numeros impares usando la estructura while
    echo "<br>Números impares usando while:<br>";
    $indice = 0;
    while ($indice < count($impares)) {
        echo $impares[$indice] . "<br>";
        $indice++;
    }

    //Ahora imprimo los numeros impares usando la estructura foreach
    echo "<br>Números impares usando foreach:<br>";
    foreach ($impares as $numero) {
        echo $numero . "<br>";
    }
?>