<?php
    // Pendiente Encapsular en una clase (Objetos)

    session_start();
    include_once 'create_conection.php';

    $nuevaConexion = new Conection();
    $nuevaConexion = Conection::get_conection();
    

    // Pendiente verificar diferencia con  try and catch ademas de la captura del error.
    if(isset($nuevaConexion)){

        $user_name = $_POST["nombre"];
        $user_pass = $_POST["pass"];
        $sentencia = $nuevaConexion->prepare("SELECT * FROM usuarios WHERE nombre ='$user_name' And password = '$user_pass'" );
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();

        $_SESSION["userName"] = $user_name;

        if(count($resultado)> 0){  
            header('Location:board_users.php');
        }else{
            echo 'credenciales incorrectas';
            die();
        }
    }else{
        echo 'No hay conexion con la base de datos - sesion no iniciada' ;
    }

    
?>