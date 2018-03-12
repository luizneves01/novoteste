<?php
    ini_set("display_errors", 1);
    $localhost = "localhost";
    $usuario = "root";
    $senha = "";
    $bancoDeDados = "upload_teste";
    $bancoConectado = mysqli_connect($localhost, $usuario, $senha, $bancoDeDados);
?>