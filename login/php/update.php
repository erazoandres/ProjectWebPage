<?php
   
    include_once 'create_conection.php';

    $con = new Conection();
    $con = Conection::get_conection();

    $keyUser = $_POST['user']; 
    $data = $_POST['input_user'];

    $attr = $_POST["attr_to_replace"];
    $data2 = $_POST['item2'];
    
    try{
        
        $sql = "UPDATE usuarios SET $attr = '$data2'  WHERE $keyUser = '$data' ";
        $sentencia = $con->prepare($sql);
        $sentencia->execute();

        $resultado = $sentencia->fetchAll();

    }catch(PDOException $e){
        echo "[update not realized] ";

    }
    
    include_once 'board_users.php';
?>