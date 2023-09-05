<?php
    /*
            MAURO DELLE CHIAIE

        Realizar una clase llamada “Auto” que posea los siguientes atributos

        privados: _color (String)
        _precio (Double)
        _marca (String).
        _fecha (DateTime)

        Realizar un constructor capaz de poder instanciar objetos pasándole como

        parámetros: i. La marca y el color.
        ii. La marca, color y el precio.
        iii. La marca, color, precio y fecha.

        Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble
        por parámetro y que se sumará al precio del objeto.
        Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
        por parámetro y que mostrará todos los atributos de dicho objeto.
        Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
        devolverá TRUE si ambos “Autos” son de la misma marca.
        Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
        de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
        la suma de los precios o cero si no se pudo realizar la operación.
        Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);
    */
    class Auto{

        private $_color;
        private $_precio;
        private $_marca;
        private $_fecha;

        public function __construct($marca, $color, $precio = null, $fecha = null)
        {
            $this->_marca = $marca;
            $this->_color = $color;
            $this->_precio = $precio;
            $this->_fecha = $fecha;
        }

        /* Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble
        por parámetro y que se sumará al precio del objeto.
        */
        public function AgregarImpuestos($impuesto)
        {
            if($this->_precio !== null)
            {
                $this->_precio += $impuesto;
            }
        }

        /*
        Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
        por parámetro y que mostrará todos los atributos de dicho objeto.   
        */

        public static function MostrarAuto($auto)
        {
            echo "Marca: " . $auto->_marca . "<br>";
            echo "Color: " . $auto->_color . "<br>";
            if($auto->_precio != null)
            {
                echo "Precio: $" . $auto->_precio . "<br>";
            }
            if ($auto->_fecha !== null) {
                echo "Fecha: " . $auto->_fecha->format('Y-m-d') . "<br>";
            }
        }

        public function Equals($otroAuto)
        {
            if($this->_marca == $otroAuto->_marca)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        /* Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
        de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
        la suma de los precios o cero si no se pudo realizar la operación.
        Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos); */

        public static function Add($auto1, $auto2)
        {
            //verifico si ambos autos son de la misma marca y color;
            if($auto1->_marca == $auto2->_marca && $auto1->_color == $auto2->_color)
            {
                //ahora me fijo si ambos autos tienen precio definido
                if($auto1->_precio !== null && $auto2->_precio !== null)
                {
                    // Sumamos los precios de ambos autos
                    $sumaPrecios = $auto1->_precio + $auto2->_precio;
                    return $sumaPrecios;
                }
            }
            return 0; // Devuelvo cero si no se puede realizar la operación
        }



    }




?>