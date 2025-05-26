<?php
include "conexion.php";
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["id"]) and !empty($_POST["nombre"]) and !empty($_POST["especialidad"]) and !empty($_POST["telefono"]) and !empty($_POST["correo"])) {
        
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $especialidad = $_POST["especialidad"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];

        $sql=$conn->query("INSERT INTO iq (codigo, nombre, especialidad, telefono, correo) VALUES ($id, '$nombre', '$especialidad', '$telefono', '$correo');");

        if ($sql==1){
            echo '<div class="alert">Instrumentador registrado correctamente</div>';
        } else {
            echo '<div class="alert">Error al registrar</div>';
        }

    }else{
        echo '<div class="alert">Alguno de los campos estan vacios</div>';
    }
}
?>