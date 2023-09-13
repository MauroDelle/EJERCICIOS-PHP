<?php
    require_once 'Usuario.php';

    
    if($_SERVER['REQUEST_METHOD']=== 'GET')
    {
        //primero verifico el parametro listado en la url

        if(isset($_GET['listado']))
        {
            $listado = $_GET['listado'];
            //valido el valor del parametro
            if($listado === 'usuarios')
            {
                //ahora cargo los datos desde el archivo usuarios.csv y los almaceno en un array de usuarios;
                $usuarios = cargarUsuariosDesdeCSV('usuarios.csv');

                if($usuarios)
                {
                    //ahora muestro la lista de usuarios en formato html
                    echo '<ul>';
                    foreach ($usuarios as $usuario) {
                        echo '<li>' . $usuario->getNombre() . ' - ' . $usuario->getMail() . '</li>';
                    }
                    echo '</ul>';
                }else{
                    echo 'No se pudieron cargar los usuarios.';
                }
            }else{
                echo 'El listado es no valido';
            }
        }else{
            echo 'El parametro "listado" es requierido';
        }
    }else{
        echo 'Método no permitido. Se espera una solicitud GET. <br>';
    }


    function cargarUsuariosDesdeCSV($csvFile)
    {
        $usuarios = [];
        if (file_exists($csvFile)) {
            $lines = file($csvFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                $data = explode(',', $line);
                if (count($data) === 3) {
                    $nombre = $data[0];
                    $clave = $data[1];
                    $mail = $data[2];
                    $usuarios[] = new Usuario($nombre, $clave, $mail);
                }
            }
        }
        return $usuarios;
    }


?>