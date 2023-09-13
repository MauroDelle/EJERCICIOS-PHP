<!-- Aplicación No 21 ( Listado CSV y array de usuarios)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
usuarios).
En el caso de usuarios carga los datos del archivo usuarios.csv.
se deben cargar los datos en un array de usuarios.
Retorna los datos que contiene ese array en una lista

<ul>
<li>Coffee</li>
<li>Tea</li>
<li>Milk</li>
</ul>
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

}

?>