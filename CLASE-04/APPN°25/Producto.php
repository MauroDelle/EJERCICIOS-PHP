<?php
class Producto{

    #region CAMPOS
    private $codigoDeBarras;
    private $nombre;
    private $tipo;
    private $stock;
    private $precio;

    private $id;
    #endregion

    #region CONSTRUCT
    public function __construct($nombre,$tipo,$stock,$precio,$codigoDeBarras,$id)
    {
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->stock = $stock;
        $this->precio = $precio;
        $this->codigoDeBarras = $codigoDeBarras;
        $this->id = $id; 
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

    public function getCodigoDeBarras()
    {
        return $this->codigoDeBarras;
    }
    public function getId()
    {
        return $this->id;
    }
    #endregion
 
    #region METODOS

  
    
    public function verificarYActualizar()
    {
        $productos = $this->cargarDesdeJSON('productos.json');

        // if($productos === null)
        // {
        //     return "No se pudo cargar el archivo Json";
        // }
        $indice  = $this->buscarEnLista($productos);

        if($indice !== false)
        {
            $productos[$indice]['stock'] += $this->stock;
        }
        else{
            //aca si el producto no se encontro, osea que lo agrego como nuevo

            $nuevoProducto = [
                'Id' => $this->id,
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
        return false;
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