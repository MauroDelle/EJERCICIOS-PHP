<?php
require_once 'Usuario.php';


if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    //obtenego los datos del usuario desde POST
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];
    $mail = $_POST['mail'];

    $usuario = new Usuario($nombre,$clave,$mail);

    // Realizar validaciones
    if (empty($nombre) || empty($clave) || empty($mail)) {
        echo "Todos los campos son obligatorios. Por favor, complete todos los campos.<br>";
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico no es válido. Por favor, proporcione un correo electrónico válido.<br>";
    } else {
        // Crear un objeto Usuario
        $usuario = new Usuario($nombre, $clave, $mail);

        // Guardar el objeto Usuario en el archivo usuarios.csv
        if ($usuario->guardarEnCSV()) {
            echo "Usuario agregado correctamente.<br>";
        } else {
            echo "Error al agregar el usuario.<br>";
        }
    }
    
}
else {
    echo "Método no permitido. Se espera una solicitud POST.<br>";
}

?>