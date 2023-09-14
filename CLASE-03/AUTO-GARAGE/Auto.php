<?php
/*
    MAURO DELLE CHIAIE

    Aplicación No 19 (Auto)
    Realizar una clase llamada “Auto” que posea los siguientes atributos

    privados: _color (String)
    _precio (Double)
    _marca (String).
    _fecha (DateTime)

    Realizar un constructor capaz de poder instanciar objetos pasándole como

    parámetros: i. La marca y el color.

    ii. La marca, color y el precio.
    iii. La marca, color, precio y fecha.

    Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
    parámetro y que se sumará al precio del objeto.
    Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto” por
    parámetro y que mostrará todos los atributos de dicho objeto.
    Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo devolverá
    TRUE si ambos “Autos” son de la misma marca.
    Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son de la
    misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con la suma de los
    precios o cero si no se pudo realizar la operación.
    Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);
    Crear un método de clase para poder hacer el alta de un Auto, guardando los datos en un archivo
    autos.csv.
    Hacer los métodos necesarios en la clase Auto para poder leer el listado desde el archivo
    autos.csv
    Se deben cargar los datos en un array de autos.

*/
class Auto {
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($marca, $color, $precio = null, $fecha = null) {
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio;
        $this->_fecha = $fecha;
    }

    public function AgregarImpuestos($impuesto) {
        if ($this->_precio !== null) {
            $this->_precio += $impuesto;
        }
    }

    public static function MostrarAuto($auto) {
        echo "Marca: " . $auto->_marca . "<br>";
        echo "Color: " . $auto->_color . "<br>";
        if ($auto->_precio != null) {
            echo "Precio: $" . $auto->_precio . "<br>";
        }
        if ($auto->_fecha !== null) {
            echo "Fecha: " . $auto->_fecha->format('Y-m-d') . "<br>";
        }
    }

    public function Equals($otroAuto) {
        if ($this->_marca == $otroAuto->_marca) {
            return true;
        } else {
            return false;
        }
    }

    public static function Add($auto1, $auto2) {
        if ($auto1->_marca == $auto2->_marca && $auto1->_color == $auto2->_color) {
            if ($auto1->_precio !== null && $auto2->_precio !== null) {
                $sumaPrecios = $auto1->_precio + $auto2->_precio;
                return $sumaPrecios;
            }
        }
        return 0;
    }

    public function toCSV()
    {
        //primero convierto los datos del objeto a una cadena
        $data = array(
        $this->_marca,
        $this->_color,
        $this->_precio,
        ($this->_fecha !== null) ? $this->_fecha->format('Y-m-d') : ''
    );
    return implode(',', $data);

    }

    public static function AltaAuto($auto)
    {
        //guardo los datos del auto en el archivo autos.csv
        $csvFile = 'autos.csv';
        $data= $auto->toCSV() . PHP_EOL; //con esto agrego un salto de linea al final de la cadena

        //utilizo fopen, abro el archivo en modo escritura, y si no existe lo crea.
        $file = fopen($csvFile,'a');

        //ahora escribo los datos en el archivo
        if($file !== false)
        {
            fwrite($file, $data);
            fclose($file); //cierro el archivo;
            //mensaje de guardado;
            echo "El auto se dio de alta y se guardo en autos.csv. <br>";
        }
        else
        {
            echo "Error al abrir el archivo<br>";
        }
    }

    public static function LeerAutosDesdeCSV()
    {
        $autos = array(); //aca creo un array para almacenar los objetos auto;

        $csvFile = 'autos.csv';

        //primero verifico si el archivo existe;
        if(file_exists($csvFile))
        {
            $file = fopen($csvFile, 'r'); //primero abro el archivo en modo lectura 'r';

            if($file !== false)
            {
                while(($data = fgetcsv($file))!== false)
                {
                    //ahora creo un objeto nuevo auto con los datos del csv;
                    $marca = $data[0];
                    $color = $data[1];
                    $precio = $data[2];
                    $fecha = (!empty($data[3])) ? new DateTime($data[3]) : null;

                    $auto = new Auto($marca, $color, $precio, $fecha);

                    // Agregar el objeto Auto al array
                    $autos[] = $auto;
                }
                fclose($file); //cierro el archivo
            }else{
                echo "Error al abrir el archivo autos.csv en lectura <br>";
            }
        }
        else{
            echo "El archivo autos.csv no existe. <br>";
        }
        
        return $autos; //devuelvo el  array de objetos auto;
    }



}


?>