<?php
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $basededatos = "app";
    $port = 3307;
    
    $conexion = new mysqli($servidor, $usuario, $password, $basededatos, $port);

    if($conexion->connect_error){
       print_r($conexion->connect_error); 
    }

    if($_POST){
        echo "Se agrego la terea: ".$_POST["tarea"];

        $tarea = $_POST["tarea"];

        $sql = "INSERT INTO tareas (id, tarea, completado) VALUES (NULL, '$tarea', 0)";

        $conexion->query($sql);
   }
   
   $sql = "SELECT * FROM tareas";
   $resultado = $conexion->query($sql);

   if($resultado->num_rows > 0){
        $tareas = array();
        while($fila = $resultado->fetch_assoc()){
              $tareas[] = $fila;   
        }

        print_r($tareas);
   }
?>