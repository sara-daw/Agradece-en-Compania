<?php
    function conectar(){
        $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BASEDEDATOS);
        $conexion->set_charset("utf8");
        return $conexion;
    }
    //session_start();
    //Hay que conectar con la base de datos para comprobar que el usuario y contraseña son correctos
    require 'configdbd.php';
    $conexion=conectar();
    $usuario=$_POST["usuario"];
    $contrasenia=$_POST["contrasenia"];
    $sql="SELECT IdAlu FROM Alumnos WHERE Usuario='".$usuario."' AND PW='".$contrasenia."';";
    $resultado=$conexion->query($sql);
    if($resultado->num_rows>0){
        //Si el usuario y contraseña son correctos, redirigimos a la página de agradecimientos
        echo "Usuario y contraseña correctos";
    } else {
        echo "Usuario o contraseña incorrectos";
    }
    echo '<br>';
    echo $sql;
    echo '<br>';
?>