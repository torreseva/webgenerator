<?php
    include('../models/userModels.php'); 

    if (isset($_POST['btn_submit'])) {
        $email = $_POST['email'];
        $password= $_POST['password'];
        $password2 = $_POST['password2'];

        if ($password !==  $password2) {
            echo "contraseña Incorrecta";
             }else{ 
				$conn = conectar();
             	$sql = "INSERT INTO  `usuarios` (`email`,`password`) VALUES ('$email', '$password')";
	
	
             	
				if(mysqli_query($conn, $sql)){
    				header("location: login.php");
    				exit();
				
				}else{
    				echo "error de Datos" . mysqli_error($conn);
				
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
    <title>Registrarse es simple</title> 
</head>
<body>
<form action="" method="post">
     <section class="form-register">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <br>
        <label for="contraseña">Contraseña:</label>
        <input type="password"  name="password" required>
        <br>
        <br>
        <label for="contraseña">Confirmar Contraseña:</label>
        <input type="password"  name="password2" required>
        <br>
        <br>
        <input type="submit" name="btn_submit" value="Registrarse">
   </section>
    </form>
    
</body>
</html>
</html>


