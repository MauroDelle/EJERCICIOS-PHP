<?php
// Incluir la clase Usuario
require_once 'usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del usuario desde POST
    $clave = $_POST['clave'];
    $mail = $_POST['mail'];

    // Crear un objeto de usuario
    $usuarioRegistrado = new Usuario('NombreDelUsuario', 'ClaveDelUsuario', 'correo@usuario.com');

    // Verificar si el usuario y la clave coinciden
    $resultado = $usuarioRegistrado->verificarUsuario($clave, $mail);

    // Devolver el resultado como respuesta
    echo $resultado;
}else {
    echo 'Método no permitido. Se espera una solicitud POST.';
}



?>