<?php
require_once(__DIR__ . '/../modelos/Usuario.php');
    class UsuarioController {
        private $bd;

        public function __construct($bd) {
            $this->bd=$bd;
        }

        /**
         * Funcion del controlador que muestra el registro de usuario
         */
        public function mostrar_registro() {
            $vista = __DIR__ . '/../vistas/usuarios/registro.php';
            require(__DIR__ . '/../vistas/layout.php');
        }

        public function registrar_usuario() {
            if (isset($_POST['nombre_usuario']) && isset($_POST['email']) && isset($_POST['contrasena'])) {
                $nombre =  htmlspecialchars(trim($_POST['nombre_usuario']), ENT_QUOTES, 'UTF-8');
                $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
                $password = htmlspecialchars(trim($_POST['contrasena']), ENT_QUOTES, 'UTF-8');

                // Validar que los campos no estén vacíos
                if (empty($nombre) || empty($email) || empty($password)) {
                    $error = "Todos los campos son obligatorios.";
                    $vista = __DIR__ . '/../vistas/usuarios/registro.php';
                    require(__DIR__ . '/../vistas/layout.php');
                    return;
                }

                // Validar formato del email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error = "El formato del email no es válido.";
                    $vista = __DIR__ . '/../vistas/usuarios/registro.php';
                    require(__DIR__ . '/../vistas/layout.php');
                    return;
                }

                // Validar longitud mínima de la contraseña
                if (strlen($password) < 6) {
                    $error = "La contraseña debe tener al menos 6 caracteres.";
                    $vista = __DIR__ . '/../vistas/usuarios/registro.php';
                    require(__DIR__ . '/../vistas/layout.php');
                    return;
                }

                $usuario = new Usuario($nombre, $email, $password, 0,'usuario', $this->bd);
                if ($usuario->guardar()>0) {
                    // Registro exitoso, redirigir al inicio de sesión o a otra página
                    header("Location: " . BASE_URL . "/login");
                    exit();
                } else {
                    $error = "Error al registrar el usuario. El email ya está en uso.";
                    $vista = __DIR__ . '/../vistas/usuarios/registro.php';
                    require(__DIR__ . '/../vistas/layout.php');
                }
            } else {
                // Si no se enviaron los datos del formulario, redirigir al formulario de registro
                header("Location: " . BASE_URL . "/registro");
                exit();
            }
        }

        public function logear_usuario() {
            if (isset($_POST['nombre_usuario']) && isset($_POST['contrasena'])) {
                $nombreUsuario = htmlspecialchars(trim($_POST['nombre_usuario']),ENT_QUOTES, 'UTF-8');
                $password = htmlspecialchars(trim($_POST['contrasena']), ENT_QUOTES, 'UTF-8');

                // Validar que los campos no estén vacíos
                if (empty($nombreUsuario) || empty($password)) {
                    $error = "Todos los campos son obligatorios.";
                    $vista = __DIR__ . '/../vistas/usuarios/login.php';
                    require(__DIR__ . '/../vistas/layout.php');
                    return;
                }

                $usuario =Usuario::getUsuarioPorNU($nombreUsuario,$this->bd);
                if ($usuario && password_verify($password, $usuario->getContrasena())) {
                    // Inicio de sesión exitoso
                    $_SESSION['usuario_id'] = $usuario->getId();
                    $_SESSION['usuario_nombre'] = $usuario->getNombreUsuario();
                    $_SESSION['rol'] = $usuario->getRol();
                    // Redirigir a la página principal o al panel de usuario
                    header("Location: " . BASE_URL . "/");
                    exit();
                } else {
                    $error = "Email o contraseña incorrectos.";
                    $vista = __DIR__ . '/../vistas/usuarios/login.php';
                    require(__DIR__ . '/../vistas/layout.php');
                }
            } else {
                // Si no se enviaron los datos del formulario, mostrar el formulario de inicio de sesión
                $vista = __DIR__ . '/../vistas/usuarios/login.php';
                require(__DIR__ . '/../vistas/layout.php');
            }
        }

            function deslogear_usuario() {
                // Iniciar la sesión si no está iniciada
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                // Destruir todas las variables de sesión
                $_SESSION = array();

                // Si se desea destruir la sesión completamente, también se debe borrar la cookie de sesión.
                if (ini_get("session.use_cookies")) {
                    $params = session_get_cookie_params();
                    setcookie(session_name(), '', time() - 42000,
                        $params["path"], $params["domain"],
                        $params["secure"], $params["httponly"]
                    );
                }

                // Finalmente, destruir la sesión.
                session_destroy();

                // Redirigir al usuario a la página de inicio o a la página de login
                header("Location: " . BASE_URL . "/");
                exit();
            }

    }
?>