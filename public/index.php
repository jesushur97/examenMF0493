<?php
// Inicia las sesiones HTTP para poder guardar variables en la sesión y manetener estado entre unas páginas y otras
session_start();

// Cargarmos los ficheros PHP necesarios
require_once(__DIR__ . '/../config/Database.php');
require_once(__DIR__ . '/../config/Router.php');

// Obtenemos una conexión a la base de datos
$bd = Database::getInstancia();

// Obtenemos la URI de la petición HTTP
$uri = $_SERVER['REQUEST_URI'];
//echo BASE_URL.'<br>';
// Elimina el prefijo base si existe
if (strpos($uri, BASE_URL) === 0) {
    $uri = substr($uri, strlen(BASE_URL));
}

// Elimina parámetros GET
$uri = strtok($uri, '?');
// Si la ruta está vacía, pon 'inicio' o lo que corresponda
if ($uri === '' || $uri === false) {
    $uri = 'inicio';
}
//echo $uri;

Router::enrutar($uri,$bd);

?>