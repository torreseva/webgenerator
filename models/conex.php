<?php

function conectar()

{
     $host="localhost";
     $usuario="adm_webgenerator";
     $clave="webgenerator2020";
     $dbnombre="webgenerator";
     // echo"probando conectar a la BD";
     // echo"<BR>";
     $conn=new mysqli($host,$usuario,$clave,$dbnombre);

         if(mysqli_connect_errno())
         {
              echo "conexion No establecida".mysqli_connect_error();
         }
         else
         {
              // echo"conexion establecida:";

         }
         
     return $conn;

}

?>