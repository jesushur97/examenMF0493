<?php
require_once(__DIR__ . '/../config/config.php'); 
/**
 * Clase auxiliar que se encarga deque controlador hay que invocarcon cada url que se introduzca enel navegador
 */
class Router {

    public static function enrutar($uri,$bd) {
        switch($uri) {
            // registro usuarios
            case '/index.php':
            case '/':
                require_once(__DIR__ . '/../app/vistas/layout.php'); // carga el layout con esa vista
                break;
            case '/registro':
                require_once(__DIR__ . '/../app/controladores/UsuarioController.php');
                $controlador= new UsuarioController($bd);
                $controlador->mostrar_registro();
                break;
            case '/registro/guardar':
                require_once(__DIR__ . '/../app/controladores/UsuarioController.php');
                $controlador= new UsuarioController($bd);
                $controlador->registrar_usuario();
                break;
            case '/login':
                require_once(__DIR__ . '/../app/controladores/UsuarioController.php');
                $controlador= new UsuarioController($bd);
                $controlador->logear_usuario();
                break;
            case '/logout':
                require_once(__DIR__ . '/../app/controladores/UsuarioController.php');
                $controlador= new UsuarioController($bd);
                $controlador->deslogear_usuario();
                break;
            case '/contacto':
                require_once(__DIR__ . '/../app/controladores/ContactoController.php');
                $controlador = new ContactoController();
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $controlador->enviar_contacto();
                } else {
                    $controlador->mostrar_contacto();
                }
                break;
            case '/productos/listado':
                require_once(__DIR__ . '/../app/controladores/ProductoController.php');
                $controlador= new ProductoController($bd);
                $controlador->mostrar_productos();
                break;
            case '/productos/nuevo':
                require_once(__DIR__ . '/../app/controladores/ProductoController.php'); 
                $controlador= new ProductoController($bd);
                $controlador->mostrar_formulario();
                break;
            case '/productos/guardar':
                require_once(__DIR__ . '/../app/controladores/ProductoController.php'); 
                $controlador= new ProductoController($bd);
                $controlador->registrar_producto();
                break;
            case '/productos/detalle':
                require_once(__DIR__ . '/../app/controladores/ProductoController.php');
                $controlador = new ProductoController($bd);
                $id=$_GET['id'] ?? null;
                if ($id===null) {
                    http_response_code(400);
                    echo "<h2> 400 - Bad Request </h2>";
                    exit();
                }
                $controlador->mostrar_detalle($id);
                break;
            default:
                http_response_code(404);
                echo "<h2> 404 - Página no encontrada </h2>".$uri;
                break;
        }
    }
}

?>