<!-- Aplicación No 20 BIS (Registro CSV)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.csv.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario -->
<?php

class Usuario
{
    private $nombre;
    private $clave;
    private $mail;

    public function __construct($nombre,$clave,$mail)
    {
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
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

}

?>