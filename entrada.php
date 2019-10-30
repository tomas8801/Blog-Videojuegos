<?php require_once 'includes/header.php';?>
<?php 
$entrada_actual = conseguirEntrada($conexion, $_GET['id']);
 if (!isset($entrada_actual['id'])) {
     header("Location: index.php");
}
?>

       
        
            <?php require_once 'includes/sidebar.php'; ?>
            <!-- CAJA PRINCIPAL -->
            <div id="principal">
                <h1><?= $entrada_actual['titulo']; ?></h1>
                <a href="categoria.php?id=<?= $entrada_actual['categoria_id']; ?>">
                    <h2><?= $entrada_actual['categoria']; ?></h2>                  
                </a>
                <p><?= $entrada_actual['descripcion']; ?></p>
                <br>
                <h4><?= $entrada_actual['fecha']; ?></h4>

                
            </div> <!-- FIN PRINCIPAL -->
            <div class="clearfix"></div>
        </div> <!-- FIN CONTAINER -->
        

        <?php require_once 'includes/footer.php';?>
