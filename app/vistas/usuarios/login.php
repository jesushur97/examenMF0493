<?php
// Si hay un mensaje de error, lo mostramos
if (isset($error)) {
    echo '<div class="login-error">' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . '</div>';
}
?>
<div class="login-container">
    <form class="login-form" method="POST" action="<?= BASE_URL ?>/login">
        <h2>Iniciar sesión</h2>
        <div class="form-group">
            <label for="nombre_usuario">Nombre de usuario:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" required autocomplete="username">
        </div>
        <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" id="contrasena" name="contrasena" required autocomplete="current-password">
        </div>
        <button type="submit">Entrar</button>
        <div class="login-links">
            <a href="<?= BASE_URL ?>/registro">¿No tienes cuenta? Regístrate</a>
        </div>
    </form>
</div>