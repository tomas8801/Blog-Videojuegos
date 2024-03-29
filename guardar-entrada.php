<?php
if (isset($_POST)) {
    //CONEXION A LA BASE DE DATOS
    require_once 'includes/conexion.php';
    

    
    //AGARRAMOS LOS DATOS ENVIADOS POR POST
    $titulo      = isset($_POST['titulo']) ? mysqli_real_escape_string($conexion, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conexion, $_POST['descripcion']) : false;
    $categoria   = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $usuario     = $_SESSION['usuario']['id'];


    //VALIDAMOS LOS DATOS
    $errores = array();
    
    if (empty($titulo)) {
        $errores['titulo'] = "El titulo no es valido";
    }
    
    if (empty($descripcion)) {
        $errores['descripcion'] = "La descripcion no es valida";
    }
    
    if (empty($categoria) && !is_numeric($categoria)) {
        $errores['categoria'] = "La categoria no es valido";
    }
    
    if (count($errores) == 0) {
        $sql = "INSERT INTO entradas VALUES (null, $usuario, $categoria, '$titulo', '$descripcion', CURDATE() )";
        $guardar = mysqli_query($conexion, $sql);
        header("Location: index.php");
    } else {
        $_SESSION['errores_entrada'] = $errores;
        header("Location: crear-entrada.php");
    }
}

