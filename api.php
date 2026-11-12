<?php
    header("Content-Type: application/json");
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $basededatos = "app";
    $port = 3307;
    
    $conexion = new mysqli($servidor, $usuario, $password, $basededatos, $port);

    if($conexion->connect_error){
       print_r($conexion->connect_error); 
    }

    $accion = $_POST["accion"];

    if($accion == "agregar"){

        $tarea = $_POST["tarea"];

        $sql = "INSERT INTO tareas (id, tarea, completado) VALUES (NULL, '$tarea', 0)";

        $conexion->query($sql);

        echo json_encode(array('success' => true, 'datos' => "Se agrego la terea."));
   }
   
   if($accion == "leer"){
       $sql = "SELECT * FROM tareas";
       $resultado = $conexion->query($sql);

      if($resultado->num_rows > 0){
         $tareas = array();
         while($fila = $resultado->fetch_assoc()){
               $tareas[] = $fila;   
         }

         echo json_encode(array('success' => true, 'datos' => $tareas));
      } 
   }
   
?>