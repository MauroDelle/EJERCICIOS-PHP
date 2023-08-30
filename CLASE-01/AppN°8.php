<?php
    /*      MAURO DELLE CHIAIE  
            Aplicación No 8 (Carga aleatoria)
            Imprima los valores del vector asociativo siguiente usando la estructura de control foreach:
            $v[1]=90; $v[30]=7; $v['e']=99; $v['hola']= 'mundo';
    */

    $v = array(1=>90, 30=>7,'e' => 99, 'hola' => 'mundo'); //Creamos un vector asociativo con diferentes claves y valores;

    //Ahora uso un foreach para iterar a traves del vector;
    foreach($v as $clave => $valor)
    {
        //imprimo la clave y el valor en cada iteracion;
        echo "Clave: $clave, Valor: $valor <br>";
    }
?>