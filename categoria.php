<?php require_once 'includes/header.php';?>
<?php 
$categoria = conseguirCategoria($conexion, $_GET['id']);
 if (!isset($categoria['id'])) {
     header("Location: index.php");
}
?>

       
        
            <?php require_once 'includes/sidebar.php'; ?>
            <!-- CAJA PRINCIPAL -->
            <div id="principal">
                <h1>Categoria <?= $categoria['nombre']; ?></h1>
                <?php $entradas = conseguirTodasEntradas($conexion, $categoria['id']);?>
                <?php if(!empty($entradas) && mysqli_num_rows($entradas) >= 1) :?>
                    <?php while($entrada = mysqli_fetch_assoc($entradas)): ?>
                        <article class="entrada">
                            <a href="entrada.php?id=<?= $entrada['id']; ?>">
                                <h2><?= $entrada['titulo']; ?></h2>
                                <span class="fecha"><?=$entrada['categoria'] ."|". $entrada['fecha']; ?> </span>
                                <p><?= substr($entrada['descripcion'], 0, 180). "..."; ?></p>
                            </a>
                        </article>
                    <?php endwhile; ?>
                <?php else :?>
                    <div class="alerta">No hay entradas en esta categoria</div>
                <?php endif ;?>
                
                
            </div> <!-- FIN PRINCIPAL -->
            <div class="clearfix"></div>
        </div> <!-- FIN CONTAINER -->
        

        <?php require_once 'includes/footer.php';?>
