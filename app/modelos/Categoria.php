<?php
 class Categoria {
     private $id;
     private $nombre_categoria;
     private $bd;

     public function __construct($nombre_categoria, $bd, $id = null) {
         $this->id = $id;
         $this->nombre_categoria = $nombre_categoria;
         $this->bd = $bd;
     }

     // Método para guardar una nueva categoría en la base de datos
     public function guardar() {
        if (isset($this->id)) {
            // Actualizar categoría existente
            $stmt = $this->bd->prepare("UPDATE categorias SET nombre_categoria = ? WHERE id = ?");
            return $stmt->execute([$this->nombre_categoria, $this->id]);
        } else {
            // Insertar nueva categoría
            $stmt = $this->bd->prepare("INSERT INTO categorias (nombre_categoria) VALUES (?)");
            return $stmt->execute([$this->nombre_categoria]);
        }
     }

     // Método estático para obtener todas las categorías
     public static function getListaCategorias($bd) {
         $stmt = $bd->query("SELECT * FROM categorias");
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     public function getId() {
         return $this->id;
     }

     public function getNombreCategoria() {
         return $this->nombre_categoria;
     }

     public function setNombreCategoria($nombre_categoria) {
         $this->nombre_categoria = $nombre_categoria;
     }

     public function setId($id) {
         $this->id = $id;
     }
 }