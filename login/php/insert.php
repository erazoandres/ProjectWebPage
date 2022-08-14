<?php
   
    include_once 'create_conection.php';

    Conection::create_conection();
    $con = Conection::get_conection();

    $a = $_POST['nombre'];
    $b = $_POST['email'];
    $c = $_POST['password'];
    
    $get = $con->prepare("SELECT * FROM usuarios WHERE nombre = '$a'");
    $get->execute();
    $res = $get->fetchAll();

    if(count($res)>=1){
        echo '[insert not realized]';
    }else{
        $sql = "INSERT INTO usuarios(nombre,email,password) VALUES( '$a','$b','$c')";
        $sentencia = $con->prepare($sql);
        $sentencia->execute();
    }     

    include 'board_users.php';
?>