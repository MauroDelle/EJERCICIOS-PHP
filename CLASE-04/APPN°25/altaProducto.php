<?php
    require_once 'Producto.php';


    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $nombre = $_POST["nombre"];
        $tipo = $_POST["tipo"];
        $stock = $_POST["stock"];
        $precio = $_POST["precio"];
        $codigoDeBarras = $_POST["codigoDeBarras"];
        $id = mt_rand(1, 10000);

        $producto = new Producto($nombre,$tipo,$stock,$precio,$codigoDeBarras,$id);

        $resultado = $producto->verificarYActualizar();

        echo $resultado;

    }
    else{
        echo "No se recibieron datos POST";
    }

?>