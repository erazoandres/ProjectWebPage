
<?php

    include_once '../php/create_conection.php';

    Conection::create_conection();
    $nuevaConexion = Conection::get_conection();
    $sentencia = $nuevaConexion->prepare("SELECT * FROM usuarios");
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();

?>

<html>
    <head>
        
    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing:border-box;
        }

        
        body{
            background:cornflowerblue;
            display:flex;
            flex-direction:column;
            justify-content:center;
        }

        header{
            width:100%;
            height:50px;
            background-color:tomato;
        }

        .name_user{
            font-size:22px;
            text-transform:capitalize;
            position: relative;
            left:20px;
            top:10px;
        }

        table{
            display:flex;
            justify-content:center;
            font-family:consolas;
            min-width:300px;
            margin-top:20px;
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

        .tools{
            background:red;
            width:200px;
            height:50px;
            position:fixed;
            right:20px;
            bottom:20px;
            display:flex;
            padding: 1px;
        }

        .tools div{
            border:2px crimson solid;
            background:indigo;
            width:33%;
            
            display:flex;
            justify-content:center;
            align-items:center;
        }
        
        .tools div a{
            text-decoration:none;   
        }

        .tools div a:hover{
            color:white;
        }   

        .exit{
            width: 50px;
            height: 50px;
            background: indigo;
            display: flex;
            text-align: center; 
            justify-content: center;       
            align-items: center;     
            left:50px;
            position: fixed;
            top:80px;
        }

        .exit a{
            color:white;
            text-decoration: none;
        }

        .exit a:hover{
            color:crimson;
        }

    </style>
    

    </head>
    <body>

        <header> <p> <span class="name_user"> Bienvenid@ <?php echo $_SESSION["userName"] ?></span></p> </header>    
    
        <table>
            <tr>
                <td>[id]</td>
                <td>[nombre]</td>
                <td>[email]</td>
                <td>[password]</td>
                <td>[estado]</td>
            </tr>
            
            <?php
                foreach($resultado as $fila){
            ?>
                    <tr>
                        <td style="color:white;"><?php echo $fila['id'] ?></td>
                        <td><?php echo $fila['nombre'] ?></td>
                        <td><?php echo $fila['email'] ?></td>
                        <td><?php echo $fila['password'] ?></td>
                        <td><?php echo $fila['activo'] ?></td>
                    </tr>
            <?php
                }
            ?>
        </table>
        
        <div class="tools">
            <div class="insertar"><a href="../html/form_insert.html">INS</a></div>
            <div class="borrar"><a href="../html/form_delete.html">DEL</a></div>
            <div class="actualizar"><a href="../html/form_update.html">ACT</a></div>
            <div class="buscar"><a href="../html/form_search.html">SRC</a></div>
        </div>

        <div class="exit">
            <a href="../html/index.html">EXIT</a>
        </div>

    </body>
</html>