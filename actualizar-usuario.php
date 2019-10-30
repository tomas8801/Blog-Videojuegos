<?php

if (isset($_POST)) {
    //CONEXION A LA BASE DE DATOS
    require_once 'includes/conexion.php';
    

    
    //RECOGEMOS LOS DATOS DEL FORMULARIO DE REGISTRO.
    $nombre     = isset($_POST['nombre'])   ? mysqli_real_escape_string($conexion, $_POST['nombre'])   : false;
    $email      = isset($_POST['email'])    ? mysqli_real_escape_string($conexion, trim($_POST['email']))    : false;
    
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
    
    $guardar_usuario = false;
    if (count($errores) == 0) {
        $guardar_usuario = true;
        $usuario = $_SESSION['usuario']['id'];
        
        //HAY QUE COMPROBAR SI EL EMAIL DEL USUARIO ACTUALIZADO YA EXISTE.
        $sql = "SELECT email FROM usuarios WHERE email = '$email'";
        $isset_email = mysqli_query($conexion, $sql);
        $isset_user  = mysqli_fetch_assoc($isset_email);
        
        if($isset_user == $usuario || empty($isset_user)){
            //ACTUALIZAMOS LOS DATOS EN LA BASE DE DATOS.

            $sql = "UPDATE usuarios SET nombre = '$nombre',"
                    . "email = '$email' WHERE id = $usuario";
            $guardar = mysqli_query($conexion, $sql);

            if ($guardar) {
                //ACTUALIZAMOS LOS DATOS DE LA SESSION CON LOS NUEVOS DATOS.
                $_SESSION['usuario']['nombre']  = $nombre;
                $_SESSION['usuario']['email']   = $email;

                $_SESSION['completado']         =  "Usuario actualizado correctamente.";

                header('Location: mis-datos.php');
            }else {
                $_SESSION['errores']['general'] = "Hubo un error al actualizar el usuario!";
                
            }
        }else {
            $_SESSION['errores']['general'] = "El usuario ya existe!";
            header('Location: mis-datos.php');
        }    
    }else {
        $_SESSION['errores']    = $errores;
        header('Location: mis-datos.php');
    }
}
