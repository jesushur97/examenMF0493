<?php
class ContactoController {
    public function mostrar_contacto() {
        $vista = __DIR__ . '/../vistas/contacto.php';
        require(__DIR__ . '/../vistas/layout.php');
    }

    public function enviar_contacto() {
        // Aquí podrías procesar el formulario, enviar email, etc.
        $vista = __DIR__ . '/../vistas/contacto.php';
        $mensaje_enviado = true;
        require(__DIR__ . '/../vistas/layout.php');
    }
}
?>