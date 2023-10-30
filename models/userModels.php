<?php
	
	require('conex.php');

	 function getUsers(){
        $query = ejecutarQuery('SELECT *  FROM usuarios');
        $retorno = [];

        $i = 0;
        if(!empty($query)){
        foreach($query as $fila){
            $retorno[$i] = $fila;
            $i++;
        }
       
        return $retorno;
     }
   }
   
	function ejecutarQuery($consulta)	
    {
       $conn = conectar();
       $resultado = mysqli_query($conn,$consulta);
       if (mysqli_query($conn,$consulta)){
        echo "<br>Operación realizada";
        }
       else
       {
         echo "Error: ".mysqli_error($conn);
       }
       return $resultado;
    }
    
    function login($consulta)	
    {
       $conn = conectar();
       $resultado = mysqli_query($conn,$consulta);
       $cantidad = mysqli_num_rows($resultado);
       echo"$consulta";
       if ($cantidad>0){
        echo "<br>usuario existente";
        return mysqli_fetch_all($resultado,MYSQLI_ASSOC);
        }
       else
       {
         echo "Usuario no existe";
       return 0;
       }
    }


 ?>