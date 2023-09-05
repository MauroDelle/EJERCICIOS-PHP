<?php
/*
    MAURO DELLE CHIAIE

    Aplicación No 12 (Invertir palabra)
    Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
    de las letras del Array.
    Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.

*/ 
    //Defino la funcion
    function invertirPalabra($palabra)
    {
        $longitud = strlen($palabra); //Aca obtengo el longitud de la palabra;
        $palabraInvertida = ''; //Creo la variable para almacenar la palabra ya invertida;

        //Ahora recorro la palabrade atras hacia adelante
        for($i = $longitud - 1; $i >= 0; $i--)
        {
            $palabraInvertida .= $palabra[$i]; //concateno cada letra al inicio de la palabra invertida
        } 

        return $palabraInvertida; //aca retorno la palabra ya invertida;
    }

    $palabraOriginal = "HOLA"; //defino la palabra original
    $palabraInvertida = invertirPalabra($palabraOriginal); //llamo a la funcion y le paso la palabra a invertir

    //ahora muestro la palabra original y la palabra invertida;
    echo "palabra original: $palabraOriginal<br>";
    echo "palabra invertida: $palabraInvertida";
?>