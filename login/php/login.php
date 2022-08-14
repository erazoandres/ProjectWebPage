<?php

    include_once 'create_conection.php';
    
    
    Conection::create_conection();
    $nuevaConexion = Conection::get_conection();
    $user_name = $_POST["nombre"];
    $user_pass = $_POST["pass"];
    $sentencia = $nuevaConexion->prepare("SELECT * FROM usuarios WHERE nombre ='$user_name' And password = '$user_pass'" );
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();

    if(count($resultado)> 0){  
        include_once 'board_users.php';
    }else{
        echo 'credenciales incorrectas';
        die();
    }

?>