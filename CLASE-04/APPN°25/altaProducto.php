<?php
    require_once 'Producto.php';


    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        var_dump($codigoDeBarras);
        var_dump($nombre);
        var_dump($tipo);
            // Verificar si el código de barras está presente
        if (isset($data['codigoDeBarras'])) {
            $codigoDeBarras = $data['codigoDeBarras'];
        } else {
            // Manejar el caso en el que 'codigo_de_barra' no está definido
            echo "Error: Falta el código de barras.";
            exit;
        }

        //Primero obtengo los datos del form
        //$codigoDeBarra = $_POST["codigoDeBarras"];
        $nombre = $_POST["nombre"];
        $tipo = $_POST["tipo"];
        $stock = $_POST["stock"];
        $precio = $_POST["precio"]; 

        $producto = new Producto($nombre,$tipo,$stock,$precio,$codigoDeBarra);

        //ahora verifico si el producto ya existe y realizo la actualizacion o el agregado del nuevo producto;
        $resultado = $producto->verificarYActualizar();

        echo $resultado;
    }
    else{
        echo "No se recibieron datos POST";
    }

?>