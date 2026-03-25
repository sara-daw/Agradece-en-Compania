<?php
    session_start();
    if($_SESSION["IdAlu"] != null){
        header("Location: CerrarSesion.php");
    }
    function conectar(){
        $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BASEDEDATOS);
        $conexion->set_charset("utf8");
        return $conexion;
    }
    //Hay que conectar con la base de datos para comprobar que el usuario y contraseña son correctos
    require 'configdbd.php';
    $conexion=conectar();
    $usuario=$_POST["usuario"];
    $contrasenia=$_POST["contrasenia"];
    $sql="SELECT IdAlu FROM Alumnos WHERE Usuario='".$usuario."' AND PW='".$contrasenia."';";
    $resultado=$conexion->query($sql);
    if($resultado->num_rows>0){
        //Si el usuario y contraseña son correctos, redirigimos a la página de agradecimientos
        $fila=$resultado->fetch_array();
        $_SESSION["IdAlu"]=$fila["IdAlu"];
        header("Location: agradecer.php");
    } else {
        echo "Usuario o contraseña incorrectos";
    }
    echo '<br>';
    echo $sql;
    echo '<br>';
?>
