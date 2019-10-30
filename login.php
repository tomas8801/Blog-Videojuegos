<?php
    //CONEXION A LA BASE DE DATOS
    require_once 'includes/conexion.php';

if (isset($_POST)) {
    
    //BORRAR ERROR ANTIGUO
    if (isset($_SESSION['error-login'])) {
        session_unset($_SESSION['error-login']);
    }
    
    //RECOGEMOS LOS DATOS DEL FORMULARIO DE LOGIN.
    $email      = trim($_POST['email']);
    $contraseña = $_POST['password'];
    //CONSULTA PARA COMPROBAR LAS CREDENCIALES DEL USUARIO.
    $sql     = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($conexion, $sql);
    
    if ($login && mysqli_num_rows($login) == 1) {
       $usuario = mysqli_fetch_assoc($login);
       //COMPROBAR LA CONTRASEÑA.
       $verify = password_verify($contraseña, $usuario['password']);
       
       if ($verify) {
           $_SESSION['usuario']     = $usuario;
       }else {
           $_SESSION['error-login'] = "Error al iniciar sesion";
       }
       
    } else {
        $_SESSION['error-login']    = "Error al iniciar sesion";
    }
}

header('Location: index.php');