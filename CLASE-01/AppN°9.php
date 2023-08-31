<?php
    /*      MAURO DELLE CHIAIE
        Aplicación No 9 (Arrays asociativos)
        Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
        contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
        lapiceras.
    */

    // Definimos tres arrays asociativos para representar las lapiceras con sus propiedades
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

    // creo un array que contiene los arrays de lapiceras
    $lapiceras = array($lapicera1, $lapicera2, $lapicera3);

    // hago un bucle foreach para recorrer el array de lapiceras y mostrar sus detalles
    foreach ($lapiceras as $index => $lapicera) {
    echo "Lapicera $index:<br>"; // Mostramos el índice de la lapicera
    echo "Color: " . $lapicera['color'] . "<br>"; // Mostramos el color
    echo "Marca: " . $lapicera['marca'] . "<br>"; // Mostramos la marca
    echo "Trazo: " . $lapicera['trazo'] . "<br>"; // Mostramos el trazo
    echo "Precio: $" . $lapicera['precio'] . "<br><br>"; // Mostramos el precio
}

?>