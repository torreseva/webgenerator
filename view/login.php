<?php
session_start();

require('../models/conex.php');

$msg = "";

if($_SERVER["REQUEST_METHOD"] ==="POST"){


    $email = $_POST['email_txt'];
    $pass = $_POST['pass_txt'];

    if($email == "admin@server" && $pass == "serveradmin"){
        
        $_SESSION['idUsuario'] = 999;
                $_SESSION['usuario'] = $email;

                header('location: ../controllers/panel.php');
    }else{ // es un usuario
        
        $db= conectar();

        $sql = " SELECT * FROM `usuarios` WHERE email = '$email'";
        $result=($db->query($sql));
            
        if($result->num_rows>0){
            
            $user=$result->fetch_all(MYSQLI_ASSOC)[0];
            
            if($user["password"]==$pass){

                $_SESSION['idUsuario'] = $user['idUsuario'];
                $_SESSION['usuario'] = $email;

                header('location: ../controllers/panel.php');
 
            }else{ // la contraseña es invalida
                    $msg="la contra es invalida";
            }

        }else{ // no es un usuario valido
            $msg="el usua no exite";

        }
    
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webgenerator-Priscila,Torres.</title>

    <style type="text/css">
        #advertencia{
            color:red;
        }
    </style>

</head>
<body>
<form action="" method="post">
    <section class="formu">

        <div id="advertencia"><?php  echo $msg; ?></div>        

        <label for="email">Email:</label>
        <input type="email" id="email" name="email_txt" required>
        <br>
        <label for="contraseña">Contraseña:</label>
        <input type="password"  name="pass_txt" required>
        <br>
        <input type="submit" name="btn_submit" value="Ingresar">
        <br>
        <a href="register.php">Registrarse.</a>
    </section>
</form>
    
</body>
</html>
</html>
