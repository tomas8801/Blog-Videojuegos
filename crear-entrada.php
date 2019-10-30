<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php'; ?>

    <!-- CAJA PRINCIPAL -->
    <div id="principal">
        <h1>Crear Entrada</h1>
        
        <form action="guardar-entrada.php" method="POST">
            <label>Titulo</label>
            <input type="text" name="titulo">
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>
            <label>Descripcion</label>
            <textarea name="descripcion"></textarea>
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>
            <label>Categoria</label>
            <select name="categoria">
                <?php $categorias = conseguirCategorias($conexion); ?>
                <?php while($categoria = mysqli_fetch_assoc($categorias)):?>
                    <option value="<?= $categoria['id']; ?>"><?= $categoria['nombre']; ?></option>
                <?php endwhile;?>
            </select>
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>
            <input type="submit" name="enviar" value="Guardar">
        </form>
        <?php borrarErrores();?>
        
        
        

        <div id="ver-todas">Ver todas las entradas</div>
    </div> <!-- FIN PRINCIPAL -->
<div class="clearfix"></div>
</div> <!-- FIN CONTAINER -->


<?php require_once 'includes/footer.php';?>
