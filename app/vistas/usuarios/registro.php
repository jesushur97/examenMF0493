<?php require_once(__DIR__ . '/../../../config/config.php'); 
if (isset($error)) {
    echo '<div class="login-error">' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . '</div>';
}
?>
<div class="login-container">
    <form class="login-form" method="POST" action="<?= BASE_URL ?>/registro/guardar">
        <h2>Registro de usuario</h2>
        <div class="form-group">
            <label for="nombre_usuario">Nombre de usuario</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" required autocomplete="username" value="<?= htmlspecialchars($_POST['nombre_usuario'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" required autocomplete="email" value="<?= htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" id="contrasena" name="contrasena" required autocomplete="new-password">
        </div>
        <button type="submit">Registrarse</button>
        <div class="login-links">
            <a href="<?= BASE_URL ?>/login">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </form>
</div>