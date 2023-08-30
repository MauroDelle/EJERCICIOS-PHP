<?php
/*          MAURO DELLE CHIAIE  

    Aplicación No 6 (Carga aleatoria)
    Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
    función rand). Mediante una estructura condicional, determinar si el promedio de los números
    son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
    resultado.
 */
    $elementos = array(); //Creo el array vacio para guardar los numeros
    $suma = 0; //variable para guardar la suma de los numeros

    //Lleno el array con los numeros aleatorios
    for ($i= 0 ; $i< 5 ; $i++){

        $elementos[$i] = rand(1,10); //Genero el numero aleatorio entre 1 y 10
        $suma += $elementos[$i]; //sumo el numero actual a la suma total
    }

    $promedio = $suma / 5; //calculo el promedio

    //Ahora muesto los numeros del array;
    echo "Números en el array: " . implode(", ", $elementos) . "<br>"; // Mostramos los números en el array separados por comas
    echo "Promedio: $promedio<br>"; // Mostramos el promedio calculado

    //Determino si el promedio es mayor, menor o igual a 6.
    if($promedio > 6){
        echo "El promedio es mayor que 6.";
    }
    else if($promedio < 6)
    {
        echo "El promedio es menor que 6.";
    }
    else{
        echo "el promedio es igual a 6. ";
    }
    
?>