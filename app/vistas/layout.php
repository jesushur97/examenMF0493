<?php
require_once(__DIR__ . '/../../config/config.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechZone - Tienda de informática</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assests/estilos.css">
    <?php if (isset($css)) include($css); ?>
</head>
<body>
     <header class="main-header">
        <div class="header-content">
            <div class="logo-area">
                <a href="<?php echo BASE_URL; ?>/">
                    <img src="<?php echo BASE_URL; ?>/assests/logo.png" alt="TechZone Logo" class="logo-img">
                </a>
                <span class="site-title">TechZone</span>
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>/">Inicio</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/productos/listado">Productos</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/ofertas">Ofertas</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/contacto">Contacto</a></li>
                </ul>
            </nav>
            <div class="botones-login">
                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <?=$_SESSION['usuario_id'] ?>
                    <span class="usuario-logeado">
                        👤 <?= htmlspecialchars($_SESSION['usuario_nombre'], ENT_QUOTES, 'UTF-8') ?>
                    </span>
                    <a href="<?= BASE_URL ?>/logout" class="btn-header">Cerrar sesión</a>
                <?php else: ?>
                    <a href="<?= BASE_URL ?>/registro" class="btn-header">Registrarse</a>
                    <a href="<?= BASE_URL ?>/login" class="btn-header">Iniciar sesión</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <main>
        <?php if (isset($vista)) include($vista); ?>
    </main>
    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="<?php echo BASE_URL; ?>/assests/logo.png" alt="TechZone Logo" class="footer-logo-img">
                <span class="footer-title">TechZone</span>
            </div>
            <div class="footer-links">
                <a href="<?php echo BASE_URL; ?>/">Inicio</a> |
                <a href="<?php echo BASE_URL; ?>/productos">Productos</a> |
                <a href="<?php echo BASE_URL; ?>/ofertas">Ofertas</a> |
                <a href="<?php echo BASE_URL; ?>/contacto">Contacto</a>
            </div>
            <div class="footer-copy">
                &copy; <?=date('Y')?> TechZone. Todos los derechos reservados.
            </div>
        </div>
    </footer>
</body>
</html>