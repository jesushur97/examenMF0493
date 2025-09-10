    <div class="productos-header">
        <h2>Producto destacados</h2>
        <?php if(isset($_SESSION['usuario_id']) && isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin'): ?>
        <a href="<?= BASE_URL ?>/productos/nuevo" class="btn-principal btn-nuevo-producto">+ Nuevo Producto</a>
    <?php endif; ?>
    </div>    
            
    <div class="productos-grid">
    <?php if (empty($productos)): ?>
        <p>No hay productos disponibles.</p>
    <?php else: ?>
        <?php foreach ($productos as $producto): ?>
            <div class="producto-card">
                <a href="<?= BASE_URL ?>/productos/detalle?id=<?php echo $producto['id']; ?>">
                    <img src="<?= BASE_URL ?>/assests/<?php echo htmlspecialchars($producto['imagen_url']); ?>" alt="<?php echo htmlspecialchars($producto['nombre_producto']); ?>" class="producto-img">
                    <h3><?php echo htmlspecialchars($producto['nombre_producto']); ?></h3>
                    <p class="producto-descripcion">
                        <?php echo htmlspecialchars(substr($producto['descripcion'], 0, 60)); ?>...
                    </p>
                    <p class="producto-precio"><?php echo htmlspecialchars($producto['precio']); ?>€</p>
                </a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>