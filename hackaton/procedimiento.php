<?php
include "conexion.php";
if (!empty($_POST["btnprocedimiento"])) {
    if (!empty($_POST["codigo"]) and !empty($_POST["tipo"]) and !empty($_POST["instrumentador"]) and !empty($_POST["pre"]) and !empty($_POST["post"]) and !empty($_POST["observaciones"])) {
        
        $codigo = $_POST["codigo"];
        $tipo = $_POST["tipo"];
        $instrumentador = $_POST["instrumentador"];
        $pre = $_POST["pre"];
        $post = $_POST["post"];
        $observaciones = $_POST["observaciones"];

        $sql=$conn->query("INSERT INTO procedimiento (codigo, tipo, id_iq, inv_pre, inv_post, observaciones) VALUES ($codigo, '$tipo', '$instrumentador', '$pre', '$post', '$observaciones');");

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