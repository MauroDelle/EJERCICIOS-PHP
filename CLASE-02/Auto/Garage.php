<?php
include_once "Auto.php";

/*
            MAURO DELLE CHIAIE

        Crear la clase Garage que posea como atributos privados:

        _razonSocial (String)
        _precioPorHora (Double)
        _autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
        Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros: 

        i. La razón social.
        ii. La razón social, y el precio por hora.

        Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
        que mostrará todos los atributos del objeto.

        Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
        objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.

        Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
        (sólo si el auto no está en el garaje, de lo contrario informarlo).
        Ejemplo: $miGarage->Add($autoUno);

        Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
        “Garage” (sólo si el auto está en el garaje, de lo contrario informarlo). Ejemplo:
        $miGarage->Remove($autoUno);

        En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos
        los métodos.
*/

class Garage
{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;


    public function __construct($razonSocial,$precioPorHora = null)
    {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora  = $precioPorHora;
        $this->_autos = array();
    }

    //metodo para mostrar todos los atributos del garage
    public function MostrarGarage()
    {
        echo "Razon Social: " . $this->_razonSocial . "<br>";
        echo "Precio por Hora: $" . $this->_precioPorHora . "<br>";
        echo "Autos en el Garage: <br>";
        foreach($this->_autos as $auto)
        {
            Auto::MostrarAuto($auto); //uso el mostrar auto de la clase auto.php;
        }
    }

    // Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
    // objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
    public function Equals($auto)
    {
        foreach($this->_autos as $garageAuto)
        {
            if($garageAuto-> Equals($auto))
            {
                return true;
            }
        }
        return false;
    }

    // Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
    // (sólo si el auto no está en el garaje, de lo contrario informarlo).
    // Ejemplo: $miGarage->Add($autoUno);
    public function Add($auto)
    {
        //primero me fijo si el auto ya esta en el garage usando el metodo Equals
        if($this->Equals($auto))
        {
            echo "El auto ya esta en el garage. <br>";
        }
        else{
            //si el auto no esta en el garage, lo agrego al array de autos;
            $this->_autos[] = $auto;
            echo "El auto se ha añadido al garage <br>";
        }
    }


    public function Remove($auto) {
        $index = $this->FindAutoIndex($auto);
    
        if ($index !== false) {
            // Si se encontró el auto en el garage, eliminarlo del array de autos
            array_splice($this->_autos, $index, 1);
            echo "El auto se ha eliminado del garage.<br>";
        } else {
            // Si el auto no está en el garage, mostrar un mensaje de error
            echo "El auto no está en el garage, no se puede eliminar.<br>";
        }
    }

    private function FindAutoIndex($auto) {
        // Buscar el índice del auto en el array de autos usando el método Equals
        foreach ($this->_autos as $index => $garageAuto) {
            if ($garageAuto->Equals($auto)) {
                return $index;
            }
        }
        return false; // El auto no se encontró en el garage
    }


}





?>