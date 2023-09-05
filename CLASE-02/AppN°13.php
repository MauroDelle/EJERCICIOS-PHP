<?php
/*
        MAURO DELLE CHIAIE

        Aplicación No 13 (Invertir palabra)
        Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
        función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
        deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
        “Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán: 1 si la palabra
        pertenece a algún elemento del listado.
        0 en caso contrario.
*/

    function validarPalabra($palabra, $max)
    {
        //aca hago la listita de las palabras validas;
        $palabrasValidas = array("Recuperatorio", "Parcial", "Programacion");

        //primero verifico si la longitud de la palabra no supera $max;
        if(strlen($palabra) <= $max)
        {
            //verifico si esta en la lsita de palabras
            foreach($palabrasValidas as $palabraValida)
            {
                if($palabra === $palabraValida)
                {
                    return 1;   //retorno 1 s la palabra es valida;
                }
            }
        }
        return 0; //retorno 0 si la palabra no cumple con los criterios
    }

    $palabraUno = "Recuperatorio";
    $palabraDos = "Examen";
    $max = 15;

    $resultadoUno = validarPalabra($palabraUno,$max);
    $resultadoDos = validarPalabra($palabraDos,$max);

    echo "Resultado para '$palabraUno': $resultadoUno<br>";
    echo "Resultado para '$palabraDos': $resultadoDos<br>";
?>