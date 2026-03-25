<?php
    session_start();
    include 'configdbd.php';
    function conectar(){
        $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BASEDEDATOS);
        $conexion->set_charset("utf8");
        return $conexion;
    }
    function opciones(){
        $conexion=conectar();
        $resultado = $conexion->query("SELECT Jesuita FROM Alumnos WHERE IdAlu <> " . $_SESSION["IdAlu"] . ";");
        while($fila = $resultado->fetch_array()){
            echo '<option value="' . $fila["Jesuita"] . '">' . $fila["Jesuita"] . '</option>';
        }
        $conexion->close();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Agradecer</title>
<link rel="stylesheet" href="styles.css">
</head>
<body class="fondo">

<h1>AGRADECE EN COMPAÑÍA</h1>

<nav>
    <div><a href="agradecer.php">Agradecer</a></div>
    <div><a href="recibir.html">Mis Agradecimientos</a></div>
    <div><a href="CerrarSesion.php">Cerrar sesión</a></div>
</nav>

<div class="container">
    <div class="fondoaux2">
        <form action="enviar.php" method="POST">
            <label>Para:</label>
            <select name="destino">
                <?php
                    opciones();
                ?>
            </select>

            <label>Quiero agradecerte:</label>
            <textarea name="mensaje" required></textarea>

            <button type="submit">
                Enviar
            </button>
        </form>
    </div>
</div>

</body>
</html>
