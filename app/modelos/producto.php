<?php
require_once(__DIR__ . '/../../config/Database.php');



class Producto {
    // Variables privadas
    private $id;
    private $nombreProducto;
    private $descripcion;
    private $precio;
    private $stock;
    private $imagenURL;
    private $db;

    // Constructor
    public function __construct($id, $nombreProducto, $descripcion, $precio, $stock, $imagenURL, $db) {
        $this->id = $id;
        $this->nombreProducto = $nombreProducto;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->imagenURL = $imagenURL;
        $this->db = $db;
    }

    //  Getters y Setters
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getNombreProducto() { return $this->nombreProducto; }
    public function setNombreProducto($nombreProducto) { $this->nombreProducto = $nombreProducto; }

    public function getDescripcion() { return $this->descripcion; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }

    public function getPrecio() { return $this->precio; }
    public function setPrecio($precio) { $this->precio = $precio; }

    public function getStock() { return $this->stock; }
    public function setStock($stock) { $this->stock = $stock; }

    public function getImagenURL() { return $this->imagenURL; }
    public function setImagenURL($imagenURL) { $this->imagenURL = $imagenURL; }

    // Método estático: obtener producto por nombre
    public static function getProductoPorNombre($nombre, $db) {
        $stmt = $db->prepare("SELECT * FROM productos WHERE nombre_producto = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new Producto(
                $row['id'],
                $row['nombre_producto'],
                $row['descripcion'],
                $row['precio'],
                $row['stock'],
                $row['imagen_url'],
                $db
            );
        }
        return null;
    }

    // Método estático: obtener lista de productos
    public static function getListaProductos($db) {
        $productos = [];
        $result = $db->query("SELECT * FROM productos");
        while ($row = $result->fetch_assoc()) {
            $productos[] = new Producto(
                $row['id'],
                $row['nombre_producto'],
                $row['descripcion'],
                $row['precio'],
                $row['stock'],
                $row['imagen_url'],
                $db
            );
        }
        return $productos;
    }

    //  Método guardar: insertar o actualizar
    public function guardar() {
        if ($this->id == 0) {
            $stmt = $this->db->prepare("INSERT INTO productos (nombre_producto, descripcion, precio, stock, imagen_url, idCategoria) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssdisi", $this->nombreProducto, $this->descripcion, $this->precio, $this->stock, $this->imagenURL, $idCategoria);
            $idCategoria = 1; // Puedes ajustar esto según tu lógica
            $stmt->execute();
            $this->id = $this->db->insert_id;
        } else {
            $stmt = $this->db->prepare("UPDATE productos SET nombre_producto=?, descripcion=?, precio=?, stock=?, imagen_url=? WHERE id=?");
            $stmt->bind_param("ssdisi", $this->nombreProducto, $this->descripcion, $this->precio, $this->stock, $this->imagenURL, $this->id);
            $stmt->execute();
        }
    }
}
?>


