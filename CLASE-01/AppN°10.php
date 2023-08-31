<?php

    /*      MAURO DELLE CHIAIE

        Aplicación No 10 (Arrays de Arrays)
        Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
        contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
        Arrays de Arrays.
    */

    $lapicera1 = array(
        'color' => 'azul',
        'marca' => 'BIC',
        'trazo' => 'fino',
        'precio' => 1.5
    );

    $lapicera2 = array(
        'color' => 'rojo',
        'marca' => 'Pilot',
        'trazo' => 'medio',
        'precio' => 2.0
    );

    $lapicera3 = array(
        'color' => 'negro',
        'marca' => 'Faber-Castell',
        'trazo' => 'grueso',
        'precio' => 3.5
    );


    // creo el array asociativo que contiene los arrays de lapiceras
    $lapicerasAsociativo = array(
        'lapicera1' => $lapicera1,
        'lapicera2' => $lapicera2,
        'lapicera3' => $lapicera3
    );

    // creo el array indexado que contiene los arrays de lapiceras
    $lapicerasIndexado = array($lapicera1, $lapicera2, $lapicera3);

    // muestro el array asociativo de lapiceras usando un bucle foreach
    echo "Array asociativo de lapiceras:<br>";
    foreach ($lapicerasAsociativo as $nombre => $lapicera) {
        echo "Nombre: $nombre<br>";
        echo "Color: " . $lapicera['color'] . "<br>";
        echo "Marca: " . $lapicera['marca'] . "<br>";
        echo "Trazo: " . $lapicera['trazo'] . "<br>";
        echo "Precio: $" . $lapicera['precio'] . "<br><br>";
    }

    // muestro el array indexado de lapiceras usando un bucle foreach
    echo "Array indexado de lapiceras:<br>";
    foreach ($lapicerasIndexado as $index => $lapicera) {
        echo "Índice: $index<br>";
        echo "Color: " . $lapicera['color'] . "<br>";
        echo "Marca: " . $lapicera['marca'] . "<br>";
        echo "Trazo: " . $lapicera['trazo'] . "<br>";
        echo "Precio: $" . $lapicera['precio'] . "<br><br>";
    }

?>