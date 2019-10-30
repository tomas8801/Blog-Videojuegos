<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php'; ?>

    <!-- CAJA PRINCIPAL -->
    <div id="principal">
        <h1>Crear Categoria</h1>
        
        <form action="guardar-categoria.php" method="POST">
            <label>Nombre</label>
            <input type="text" name="nombre">
            <input type="submit" name="enviar" value="Guardar">
        </form>
        
        
        

        <div id="ver-todas">Ver todas las entradas</div>
    </div> <!-- FIN PRINCIPAL -->
<div class="clearfix"></div>
</div> <!-- FIN CONTAINER -->


<?php require_once 'includes/footer.php';?>
