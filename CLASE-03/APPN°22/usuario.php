<?php

class Usuario
{
    private $nombre;
    private $clave;
    private $mail;

    public function __construct($nombre, $clave,$mail)
    {
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function toCSV()
    {
        return $this->nombre . ',' . $this->clave . ',' . $this->mail;
    }

    public function guardarEnCSV()
    {
        $csvFile = 'usuarios.csv';
        $data =  $this->toCSV() . PHP_EOL;

        $file = fopen($csvFile,'a');

        if ($file !== false) {
            fwrite($file, $data);
            fclose($file);
            return true; // Éxito al guardar
        } else {
            return false; // Error al guardar
        }
    }


    // public function verificarUsuario($clave, $mail)
    // {
    //     // Cargar los datos de usuarios desde el archivo CSV
    //     $usuarios = $this->cargarUsuariosDesdeCSV('usuarios.csv');
    
    //     // Filtrar los usuarios que coincidan con el correo electrónico y la clave
    //     $usuariosCoincidentes = array_filter($usuarios, function ($usuario) use ($mail, $clave) {
    //         return $usuario['mail'] === $mail && $usuario['clave'] === $clave;
    //     });
    
    //     // Si se encontraron usuarios coincidentes, entonces el usuario está verificado
    //     if (!empty($usuariosCoincidentes)) {
    //         return "Verificado"; // Usuario y clave coinciden
    //     }
    
    //     return "Error en los datos o Usuario no registrado";
    // }

    //hice las dos posibilidades, utilizando array filter y haciendo un foreach convencional.

    public function verificarUsuario($clave, $mail)
    {
        // Cargar los datos de usuarios desde el archivo CSV
        $usuarios = $this->cargarUsuariosDesdeCSV('usuarios.csv');
        
        foreach ($usuarios as $usuario) {
            if ($usuario['mail'] === $mail) {
                if ($usuario['clave'] === $clave) {
                    return "Verificado"; // Usuario y clave coinciden
                } else {
                    return "Error en los datos"; // Clave incorrecta
                }
            }
        }
        return "Usuario no registrado"; // Mail no coincide
    }

    //funcion para cargar usuarios desde el archivo CSV en una lista
    function cargarUsuariosDesdeCSV($csvFile)
    {
        $usuarios = []; // Inicializo una lista array vacia para almacenar los usuarios
    
        if (file_exists($csvFile)) {
            $lines = file($csvFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                $data = explode(',', $line);
                if (count($data) === 3) {
                    $nombre = $data[0];
                    $clave = $data[1];
                    $mail = $data[2];
                    $usuarios[] = ['nombre' => $nombre, 'clave' => $clave, 'mail' => $mail];
                }
            }
        }

        return $usuarios;
    }







}
?>