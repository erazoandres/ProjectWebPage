<?php
   
    include_once 'create_conection.php';

    Conection::create_conection();
    $con = Conection::get_conection();
    
    $a = $_POST['item']; 
    $attr = $_POST['multi'];

    $query = $con->prepare("SELECT * FROM usuarios WHERE $attr='$a'");
    $query->execute();
    $res = $query->fetchAll();

    if(count($res)>0){
        
        try{
            $sql = "DELETE FROM usuarios WHERE $attr ='$a'";
            $sentencia = $con->prepare($sql);
            $sentencia->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }else{
        echo '[delete not realized]';
    }
    
    include 'board_users.php';

?>