
<!-- BARRA LATERAL -->
<aside id="sidebar">
    
    <?php if(isset($_SESSION['usuario'])) : ?>
        <div id="usuario-logueado" class="bloque">
            <h3><?=$_SESSION['usuario']['nombre']; ?></h3>
            <!--BOTONES-->
            <a href="crear-entrada.php" class="boton">Crear entrada</a>
            <a href="crear-categoria.php" class="boton boton-naranja">Crear categoria</a>
            <a href="mis-datos.php" class="boton boton-verde">Mis datos</a>
            <a href="logout.php" class="boton boton-rojo">Cerrar sesion</a>
        </div>
    <?php endif; ?>
    
    <?php if(!isset($_SESSION['usuario'])):?>
    <div id="login" class="bloque">
        <?php if(isset($_SESSION['error-login'])) : ?>
            <div class="alerta alerta-error">
                <?=$_SESSION['error-login']; ?>
            </div>
        <?php endif; ?>
        <h3>Identificate</h3>
        <form action="login.php" method="POST">
            <label>Email
            <input type="email" name="email" id="email">

            <label>Contraseña
            <input type="password" name="password" id="password">

            <input type="submit" name="enviar" value="Entrar">
        </form>
    </div>

    <div id="register" class="bloque">
        <!--MOSTRAR ERRORES-->
        <?php if(isset($_SESSION['completado'])) : ?>
            <div class="alerta alerta-exito">
                   <?= $_SESSION['completado']; ?>
            </div>
        <?php elseif(isset($_SESSION['errores']['general'])) : ?>
            <div class="alerta alerta-error">
                   <?= $_SESSION['errores']['general']; ?>
            </div>
        <?php endif; ?>
        <h3>Registrate</h3>
        <form action="registro.php" method="POST">
            <label>Nombre y Apellido
            <input type="text" name="nombre" id="nombre">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

            <label>Email
            <input type="email" name="email" id="email">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

            <label>Contraseña
            <input type="password" name="password" id="password">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'contraseña') : ''; ?>

            <input type="submit" name="enviar" value="Registrar">
        </form>
        <?php borrarErrores(); ?>
    </div>
    <?php endif;?>

</aside>
