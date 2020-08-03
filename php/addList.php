<?php
    require_once "consulta.php";
    $sql = new Consulta();
    $idVideo = $_POST['idVideo'];
    $idUser = $_SESSION['id'];

    $sql->setSql("INSERT INTO `vermastardepeliculas`(`idUsuario`, `idPeliculas`) VALUES ('".$idUser."','".$idVideo."')");
    $resultado = $sql->runQuery();

?>