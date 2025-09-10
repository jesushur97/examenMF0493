<div class="contact-container">
    <form class="contact-form" method="POST" action="<?= BASE_URL ?>/contacto">
        <h2>Contacto</h2>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
        </div>
        <button type="submit">Enviar</button>
    </form>
    <div class="contact-info-box">
        <h3>Información de la tienda</h3>
        <p><strong>Ubicación:</strong> Calle Mayor 123, 28001 Madrid</p>
        <p><strong>Teléfono:</strong> <a href="tel:+34911223344">911 223 344</a></p>
        <p><strong>Email:</strong> <a href="mailto:info@techzone.com">info@techzone.com</a></p>
        <p><strong>Horario:</strong> Lunes a Viernes de 10:00 a 20:00</p>
        <iframe
            src="https://www.openstreetmap.org/export/embed.html?bbox=-3.7037902%2C40.4167754%2C-3.7037902%2C40.4167754&amp;layer=mapnik"
            style="border:1px solid #ccc;width:100%;height:200px;margin-top:1rem;"
            allowfullscreen
            loading="lazy"></iframe>
    </div>
</div>