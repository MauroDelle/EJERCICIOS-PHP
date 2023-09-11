<?php
    require_once ('Auto.php');
    require_once('Garage.php');

        // Crear autos
    $auto1 = new Auto("Ford", "Rojo", 20000);
    $auto2 = new Auto("Honda", "Azul", 25000);
    $auto3 = new Auto("Chevrolet", "Verde", 18000);

        // Crear un garage
    $miGarage = new Garage("Wilde center", 10.0);

    // Mostrar información del garage
    echo "Información del Garage:<br>";
    $miGarage->MostrarGarage();

        // Mostrar información actualizada del garage
    echo "<br>Información del Garage después de agregar autos:<br>";
    $miGarage->MostrarGarage();

    // Intentar agregar un auto que ya está en el garage
    $miGarage->Add($auto1);
    // $miGarage->Add($auto3);

    // Eliminar un auto del garage
    $miGarage->Remove($auto2);

// Mostrar información actualizada del garage
    echo "<br>Información del Garage después de eliminar un auto:<br>";
    $miGarage->MostrarGarage();

    // Intentar eliminar un auto que ya no está en el garage
    $miGarage->Remove($auto2);

    // Verificar si un auto está en el garage
    if ($miGarage->Equals($auto1)) {
        echo "<br>El ford está en el garage.<br>";
    } else {
        echo "<br>El ford no está en el garage.<br>";
    }

    if ($miGarage->Equals($auto3)) {
        echo "El chevrolet está en el garage.<br>";
    } else {
        echo "El chevrolet no está en el garage.<br>";
    }
?>