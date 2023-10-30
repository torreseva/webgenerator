<?php

session_start();
	
	$idUsuario = $_SESSION['idUsuario'];

	include('../models/conex.php');

	$conn = conectar();

if (isset($_GET['id'])){
    $idi=$_GET['id'];
    $sqll = "DELETE FROM `webs` WHERE `webs`.`idWeb` = '$idi'";

    
    
    $resultList = mysqli_query($conn, $sqll);
     if (($resultList)) {
        // echo"se borro";
        // echo"<br>";

        } else {
            echo "No se borro.";

            echo"<br>";
        }

}
        if (isset($_GET['botonzip'])) {

        shell_exec('zip '.$_GET['botonzip'].".zip ../web/".$_GET['botonzip']);
        shell_exec('mv '.$_GET['botonzip'].".zip ../zips/".$_GET['botonzip'].".zip");
        header("Location: ../zips/".$_GET['botonzip'].".zip");
}

if(isset($_POST['boton'])){
	$name = $_POST['nombre'];

	$sql = "INSERT INTO `webs`(`idUsuario`, `dominio`) VALUES ('$idUsuario','$name')";
	$resultado = mysqli_query($conn,$sql);

	if($resultado){

    shell_exec("chmod 757 wix.sh");
    shell_exec(".././wix.sh ".$name);
    echo " se creo ".$name;
    }else{
	echo "error al ingresar a la BD " . mysqli_close($conn);
	}
}

    if($idUsuario==999){
    	$list = "SELECT * FROM `webs`";

    }else{
    	$list = "SELECT * FROM `webs` WHERE `idUsuario`='$idUsuario'";

    }


    $result= mysqli_query($conn, $list);

    if(mysqli_num_rows($result) > 0){
    	echo "<form>";
    	while($row = mysqli_fetch_assoc($result)) {
    		$dom =$row['dominio'];
    		$idUsuario =$row['idUsuario'];
    		$id_web =$row['idWeb'];


    	echo "<a href='../web/$dom/index.php'>$dom</a>";
                  echo " <a href='?id=$id_web'>Eliminar</a>";
                echo " <input id='Agregar_link' ".$row['idWeb']." type='submit' name='botonzip' value='".$row
                   ["dominio"]."' >";
                

    	}
    	echo "</form>";

	}else{
		echo" todavia no creaste nada";
	}


    	mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="../style.css">
<!-- <h3>Bienvenido a tu Panel.</h3> -->
<!-- <a href="../view/logout.php">cerrar session</a> -->
<form action="" method="POST">
	<section class="panel">
	<h3>Bienvenido a tu Panel.</h3>
	<a href="../view/logout.php">cerrar session</a>
	<label for="nombre">Webs:</label>
	<input type="text" id="nombre" name="nombre" required>
	<br>
	<input type="submit" value="crear webs" name="boton">
	</section>
</form>
</body>
</html>