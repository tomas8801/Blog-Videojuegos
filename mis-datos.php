<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php'; ?>


<!-- CAJA PRINCIPAL -->
    <div id="principal">
        <h1>Mis datos</h1>
        
        <?php if(isset($_SESSION['completado'])) : ?>
            <div class="alerta alerta-exito">
                   <?= $_SESSION['completado']; ?>
            </div>
        <?php elseif(isset($_SESSION['errores']['general'])) : ?>
            <div class="alerta alerta-error">
                   <?= $_SESSION['errores']['general']; ?>
            </div>
        <?php endif; ?>
        
        <form action="actualizar-usuario.php" method="POST">
            <label>Nombre y Apellido
            <input type="text" name="nombre" id="nombre" value="<?=$_SESSION['usuario']['nombre']?>">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

            <label>Email
            <input type="email" name="email" id="email" value="<?=$_SESSION['usuario']['email']?>">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

          
            <input type="submit" name="enviar" value="Actualizar">
        </form>
        <?php borrarErrores(); ?>
    
    
    
    </div> <!-- FIN PRINCIPAL -->
<div class="clearfix"></div>
</div> <!-- FIN CONTAINER -->


<?php require_once 'includes/footer.php';?>