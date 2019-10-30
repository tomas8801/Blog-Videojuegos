<?php require_once 'conexion.php';
 require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./assets/css/estilos.css">
        <title>Blog de Videojuegos</title>
    </head>
    <body>
        <!-- CABECERA -->
        <header id="cabecera">
            <div id="logo">
                <a href="#">
                    Blog de Videojuegos
                </a>
            </div>
            <!-- MENU -->
            
            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                    
                    <?php $categorias = conseguirCategorias($conexion); ?>
                    <?php while($categoria = mysqli_fetch_assoc($categorias)):?>
                    <li>
                        <a href="categoria.php?id=<?=$categoria['id']?>"><?= $categoria['nombre']; ?></a>
                    </li>
                    <?php endwhile;?>
                    
                    <li>
                        <a href="index.php">Sobre mi</a>
                    </li>
                    <li>
                        <a href="index.php">Contacto</a>
                    </li>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </header>
        
        <body>
        <div id="contenedor">