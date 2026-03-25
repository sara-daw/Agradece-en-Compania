<?php
    session_start();
    include 'configdbd.php';
    function conectar(){
        $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BASEDEDATOS);
        $conexion->set_charset("utf8");
        return $conexion;
    }
    $conexion=conectar();
    $sql="SELECT IdAlu FROM Alumnos WHERE Jesuita='".$_POST["destino"]."';";
    $fila=$conexion->query($sql);
    $receptor = $fila->fetch_assoc()["IdAlu"];
    $emisor = $_SESSION["IdAlu"];
    $sql = "SELECT * FROM Agradecimientos WHERE Emisor = $emisor AND Destinatario = $receptor";
    $resultado=$conexion->query($sql);
    if($resultado->num_rows>0){
        echo "Ya has agradecido a esta persona";
    }else{
        $sql = "INSERT INTO Agradecimientos (Emisor, Destinatario, Mensaje) VALUES ($emisor, $receptor, '" . $_POST["mensaje"] . "')";
        $conexion->query($sql);
        $conexion->close();
        header("Location: agradecer.php");
    }
?>