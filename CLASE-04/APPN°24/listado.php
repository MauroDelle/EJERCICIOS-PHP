<!-- Aplicación No 24 ( Listado JSON y array de usuarios)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,etc.),por ahora solo tenemos
usuarios).
En el caso de usuarios carga los datos del archivo usuarios.json.
se deben cargar los datos en un array de usuarios.
Retorna los datos que contiene ese array en una lista.
Hacer los métodos necesarios en la clase usuario -->

<?php
require_once 'Usuario.php';



if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
    if (isset($_GET['listado']) && $_GET['listado'] === 'usuarios')
    {
        $usuarios = Usuario::cargarDesdeJSON('usuarios.json');

        echo '<ul>';
        foreach ($usuarios as $usuario) {
            echo '<li>' . $usuario->getNombre() .'<br>'. 'ID:  ' . $usuario->getId() .'<br>'. $usuario->getFechaRegistro() .'</li>';
        }
        echo '</ul>';
    }
    
}

?>