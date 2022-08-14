<?php

   
    include_once 'create_conection.php';

    Conection::create_conection();
    $con = Conection::get_conection();

    $a = $_POST['item']; 
    $attr = $_POST['multi'];

    $query = $con->prepare("SELECT * FROM usuarios WHERE $attr = '$a'");
    $query->execute();
    $res = $query->fetchAll();

    if(count($res)==0){  
    
        echo "[search not realized]";
    }


?>

<html>
    <head>
        <style>

            *{
                padding: 0;
                margin: 0;
                box-sizing:border-box;
                font-family:monospace;

                font-size:16px;
            }

            body{
                height:100vh;
                width: 100%;
                display:flex;
                justify-content:center;
                position:relative;
                top:50px;
                background:cornflowerblue;
            }

            table{
                display:flex;
                font-family:consolas;
            }

            table tr{
                background:crimson;
            }

            table tr:first-child{
                background:indigo;
                color:white;
                font-size:18px;
                text-transform:capitalize;
            }

            table td{
                padding: 5px 12px;
            }

            .home{
                width: 50px;
                height: 50px;
                background: indigo;
                display: flex;
                text-align: center; 
                justify-content: center;       
                align-items: center;     
                left:50px;
                position: fixed;
                top:50px;
            }

            .home a{
                color:white;
                text-decoration: none;
            }

            .home a:hover{
                color:crimson;
            }

        </style>
    </head>
    <body>
        <div class="home">
            <a href="../php/board_users.php">HOME</a>
        </div>

        <table>
                <tr>
                    <td>[id]</td>
                    <td>[nombre]</td>
                    <td>[email]</td>
                    <td>[password]</td>
                    <td>[estado]</td>
                </tr>
                
                <?php
                    foreach($res as $fila){
                ?>
                        <tr>
                            <td><?php echo $fila['id'] ?></td>
                            <td><?php echo $fila['nombre'] ?></td>
                            <td><?php echo $fila['email'] ?></td>
                            <td><?php echo $fila['password'] ?></td>
                            <td><?php echo $fila['activo'] ?></td>
                        </tr>
                <?php
                    }
                ?>
            </table>
    </body>
</html>


