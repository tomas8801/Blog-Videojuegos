<?php

if (isset($_POST)) {
    //CONEXION A LA BASE DE DATOS
    require_once 'includes/conexion.php';
    
    if (!isset($_SESSION)) {
        session_start();    
    }
    
    
    
    //RECOGEMOS LOS DATOS DEL FORMULARIO DE REGISTRO.
    $nombre     = isset($_POST['nombre'])   ? mysqli_real_escape_string($conexion, $_POST['nombre'])   : false;
    $email      = isset($_POST['email'])    ? mysqli_real_escape_string($conexion, trim($_POST['email']))    : false;
    $contraseña = isset($_POST['password']) ? mysqli_real_escape_string($conexion, $_POST['password']) : false;
    
    //ARRAY DE ERRORES
    $errores = array();
    
    //VALIDAR  LOS DATOS ANTES DE GUARDAR EN LA BASE DE DATOS.
    //validar campo NOMBRE
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
    }else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }
    //validar campo EMAIL
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    }else {
        $email_validado = false;
        $errores['email'] = "El email no es valido";
    }
    //validar campo PASSWORD
    if (!empty($contraseña)) {
        $contraseña_validado = true;
    }else {
        $constraseña_validado = false;
        $errores['contraseña'] = "La contraseña no es valida";
    }
    
    $guardar_usuario = false;
    if (count($errores) == 0) {
        //INSERTAMOS LOS DATOS EN LA BASE DE DATOS.
        $guardar_usuario = true;
        //CIFRAR  LA CONTRASEÑA
        $password_segura = password_hash($contraseña, PASSWORD_BCRYPT, ['cost'=>4]);
        password_verify($contraseña, $password_segura);
        $sql = "INSERT INTO usuarios VALUES (null, '$nombre', '$email', '$password_segura', CURDATE() )";
        $guardar = mysqli_query($conexion, $sql);
        
        if ($guardar) {
            $_SESSION['completado']         =  "Usuario registrado correctamente.";
        }else {
            $_SESSION['errores']['general'] = "Hubo un error al registrar el usuario!";
        }
    }else {
        $_SESSION['errores']    = $errores;
    }
}

header('Location: index.php');