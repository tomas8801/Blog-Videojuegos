<?php require_once 'includes/header.php';?>
       
        
            <?php require_once 'includes/sidebar.php'; ?>
            <!-- CAJA PRINCIPAL -->
            <div id="principal">
                <h1>Ultimas Entradas</h1>
                <?php $entradas = conseguirUltimasEntradas($conexion);?>
                <?php while($entrada = mysqli_fetch_assoc($entradas)): ?>
                    <article class="entrada">
                        <a href="entrada.php?id=<?= $entrada['id']; ?>">
                            <h2><?= $entrada['titulo']; ?></h2>
                            <span class="fecha"><?=$entrada['categoria'] ."|". $entrada['fecha']; ?> </span>
                            <p><?= substr($entrada['descripcion'], 0, 180). "..."; ?></p>
                        </a>
                    </article>
                <?php endwhile; ?>
                
                
                <div id="ver-todas">
                    <a href="entradas.php">Ver todas las entradas</a>
                </div>
            </div> <!-- FIN PRINCIPAL -->
            <div class="clearfix"></div>
        </div> <!-- FIN CONTAINER -->
        

        <?php require_once 'includes/footer.php';?>
