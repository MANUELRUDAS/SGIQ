<?php
include "conexion.php";
if (!empty($_POST["btninstrumento"])) {
    if (!empty($_POST["codigo"]) and !empty($_POST["nombre"]) and !empty($_POST["tipo"]) and !empty($_POST["estado"]) and !empty($_POST["fecha-ingreso"]) and !empty($_POST["esterilizado"])) {
        
        $codigo = $_POST["codigo"];
        $nombre = $_POST["nombre"];
        $tipo = $_POST["tipo"];
        $estado = $_POST["estado"];
        $fecha_ingreso = $_POST["fecha-ingreso"];
        $esterilizado = $_POST["esterilizado"];

        $sql=$conn->query("INSERT INTO instrumental (codigo, nombre, tipo, estado, fecha, estado_est) VALUES ($codigo, '$nombre', '$tipo', '$estado', '$fecha_ingreso', '$esterilizado');");

        if ($sql==1){
            echo '<div class="alert">Instrumento registrado correctamente</div>';
        } else {
            echo '<div class="alert">Error al registrar</div>';
        }

    }else{
        echo '<div class="alert">Alguno de los campos estan vacios</div>';
    }
}
?>