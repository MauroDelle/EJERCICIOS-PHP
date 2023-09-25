<?php
class Producto{

    #region CAMPOS
    private $codigoDeBarras;
    private $nombre;
    private $tipo;
    private $stock;
    private $precio;
    #endregion

    #region CONSTRUCT
    public function __construct($nombre,$tipo,$stock,$precio,$codigoDeBarras)
    {
                // Verificar si el código de barras está presente
        if (isset($codigoDeBarras)) {
            $this->codigoDeBarras = $codigoDeBarras;
        } else {
            // Manejar el caso en el que 'codigo_de_barra' no está definido
            throw new Exception("Error: Falta el código de barras.");
        }
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        if (isset($stock)) {
            $this->stock = $stock;
        } else {
            // Manejar el caso en el que 'stock' no está definido
            throw new Exception("Error: Falta el stock.");
        }
                // Verificar si el precio está presente
                if (isset($precio)) {
                    $this->precio = $precio;
                } else {
                    // Manejar el caso en el que 'precio' no está definido
                    throw new Exception("Error: Falta el precio.");
                }
        // $this->codigoDeBarras = $codigoDeBarras;
    }
    #endregion

    #region GETTERS

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getId()
    {
        return $this->codigoDeBarras;
    }
    #endregion
 
    #region METODOS

  
    
    public function verificarYActualizar()
    {
        $productos = $this->cargarDesdeJSON('productos.json');
        $indice  = $this->buscarEnLista($productos);

        if($indice !== false)
        {
            $productos[$indice]['stock'] += $this->stock;
        }
        else{
            //aca si el producto no se encontro, osea que lo agrego como nuevo

            $nuevoProducto = [
                'codigoDeBarras' => $this->codigoDeBarras,
                'nombre' => $this->nombre,
                'tipo' => $this->tipo,
                'stock' => $this->stock,
                'precio' => $this->precio
            ];
            $productos[] = $nuevoProducto;
        }

        $this->guardarEnJSON($productos,'productos.json');

        if($indice !== false)
        {
            return "Actualizado";
        }
        else{
            return "Ingresado";
        }
    }
    
    #region Metodos Auxiliares

    public function cargarDesdeJSON($archivo)
    {
        if(file_exists($archivo))
        {
            $contenidoJSON = file_get_contents($archivo);
            return json_decode($contenidoJSON,true);
        }
        else
        {
            return [];
        }
    }

    public function buscarEnLista($productos)
    {
        foreach($productos as $indice => $producto)
        {
            if($producto['codigoDeBarras'] === $this->codigoDeBarras)
            {
                return $indice;
            }
        }
    }

    public function guardarEnJSON($productos,$archivo)
    {
        $contenidoJSON = json_encode($productos, JSON_PRETTY_PRINT);
        file_put_contents($archivo,$contenidoJSON);
    }
    #endregion

    #endregion



}


?>