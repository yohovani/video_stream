<?php
    session_start();
    require_once "consulta.php";
    $sql = new Consulta();
    $idVideo = $_POST['idVideo'];
    $idUser = $_SESSION['id'];
    $titulo = $_POST['nombre'];
    $sql->setSql("INSERT INTO `vermastardepeliculas`(`idUsuario`, `idPeliculas`) VALUES ('".$idUser."','".$idVideo."')");
    $resultado = $sql->runQuery();
    
    echo '
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Se realizo una actualizaci&oacute;n!</h4>
            <p>Se agrego <strong>'.$titulo.'</strong> a tu lista, Disfrutala!!.</p>
            <center><button class="btn btn-success" data-dismiss="modal">Aceptar</button></center>
        </div>';

?>