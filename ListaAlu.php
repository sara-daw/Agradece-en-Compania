<?php
    require 'configdb.php';
    function conectar(){
        $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BASEDEDATOS);
        $conexion->set_charset("utf8");
        return $conexion;
    }
    function consultar(){
        $conexion = conectar();
        $sql = "SELECT IdAlu, nombre FROM alumnos";
        $resultado = $conexion->query($sql);
        // $total_filas = $resultado->num_rows;
        while($fila = $resultado->fetch_array()){
            echo "<p>";
            echo $fila['IdAlu'] . " - " . $fila['nombre'];
            echo "</p>";
        }
        $conexion->close();
        return $apuntes;
    }
?>
    
