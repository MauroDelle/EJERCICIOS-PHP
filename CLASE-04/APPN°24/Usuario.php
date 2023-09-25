<?php
class Usuario
{
    
    private $nombre;
    private $id;
    private $clave;
    private $mail;
    private $fechaRegistro;
    private $imagenJSON;

    public function __construct($id,$nombre,$clave,$mail)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
        $this->fechaRegistro = date("Y-m-d H:i:s");
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getImagen()
    {
        return $this->imagenJSON;
    }

    public function setImagen($imagen)
    {
        $this->imagenJSON = $imagen;
    }

    public function registrarUsuario()
    {   
        //esto para leer datos existentes de 'usuarios.json' o crear un array vacion si no existe
        $usuarios = [];

        //me fijo si el 'usuarios.json' es verdadero.
        if(file_exists("usuarios.json"))
        {
            $contenidoJSON = file_get_contents("usuarios.json");
            $usuarios = json_decode($contenidoJSON,true);

        }

        // Crear un nuevo registro de usuario con los datos del objeto Usuario actual
        $registroUsuario = [
            "id" => $this->getId(),
            "nombre" => $this->getNombre(),
            "mail" => $this->getMail(),
            "clave" => $this->getClave(),
            "fechaRegistro" => $this->getFechaRegistro(),
            "imagen" => $this->getImagen()
        ];

        // Agregar el nuevo registro al array de usuarios
        $usuarios[] = $registroUsuario;
        // Convertir el array de usuarios a formato JSON y guardar en "usuarios.json"
        $jsonString = json_encode($usuarios, JSON_PRETTY_PRINT);
        file_put_contents("usuarios.json", $jsonString);

        // Devolver un mensaje de éxito
        return "Usuario registrado con éxito.";
    }

    public static function cargarDesdeJSON($rutaArchivo)
    {
        if(file_exists($rutaArchivo))
        {
            $contenidoJSON = file_get_contents($rutaArchivo);
            $usuariosJSON = json_decode($contenidoJSON,true);
            $usuarios = [];

            if($usuariosJSON !== null)
            {
                foreach($usuariosJSON as $usuarioJSON)
                {
                    $usuario = new Usuario(
                        $usuarioJSON['id'],
                        $usuarioJSON['nombre'],
                        $usuarioJSON['clave'],
                        $usuarioJSON['mail']
                    );
                    $usuarios[] = $usuario;
                }
            }
            return $usuarios;
        }
        else{
            return [];
        }
    }
}
?>