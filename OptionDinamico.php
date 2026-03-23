<?php
    function conectar(){
        $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BASEDEDATOS);
        $conexion->set_charset("utf8");
        return $conexion;
    }
    $conexion=conectar();
    $sql = "SELECT Jesuita FROM Alumnos"; 
    $resultado = $conexion->query($sql);
    while($fila = $resultado->fetch_array()){
        echo '<option value="' . $fila["Jesuita"] . '">' . $fila["Jesuita"] . '</option>';
    }
    $conexion->close();
?>
