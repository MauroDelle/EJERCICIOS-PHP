
    <!--                    MAURO DELLE CHIAIE

            Aplicación No 23 (Registro JSON)
    Archivo: registro.php
    método:POST
    Recibe los datos del usuario(nombre, clave,mail )por POST ,
    crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un dato con la
    fecha de registro , toma todos los datos y utilizar sus métodos para poder hacer el alta,
    guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
    Usuario/Fotos/.
    retorna si se pudo agregar o no.
    Cada usuario se agrega en un renglón diferente al anterior.
    Hacer los métodos necesarios en la clase usuario. -->

<?php
require_once 'Usuario.php';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Obtener los datos del formulario POST
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $mail = $_POST["mail"];
    // Emular un ID autoincremental (puedes usar un valor random)
    $id = mt_rand(1, 10000);

    // Crear un objeto Usuario con los datos
    $usuario = new Usuario($id, $nombre, $clave, $mail);

    $carpetaDestino = "d:\\xampp\\htdocs\\EJERCICIOS-PHP\\Fotos\\";

        // Subir la imagen al servidor y establecer la ruta en el objeto Usuario
        if (isset($_FILES["imagen"])) {
            $nombreImagen = $_FILES["imagen"]["name"];
            $rutaImagen = $carpetaDestino . $nombreImagen;
    
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImagen)) {
                $usuario->setImagen($rutaImagen);
            }
        }

    // Registrar al usuario utilizando la lógica de la clase Usuario
    $resultado = $usuario->registrarUsuario();

    echo $resultado;
    
}



?>