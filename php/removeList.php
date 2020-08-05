<?php
    session_start();
    require_once "consulta.php";
    $sql = new Consulta();
    if($_POST['opcion'] == 1){
        remove_list_peliculas($_POST['id']);
    }else{
        remove_list_series();
    }

    function remove_list_peliculas($id_pelicula){
        global $sql;
        $sql->setSql("SELECT titulo FROM peliculas WHERE id = '".$id_pelicula."'");
        $titulo = $sql->runQuery();
        $titulo = mysqli_fetch_array($titulo);
        $sql->setSql("DELETE FROM `vermastardepeliculas` WHERE `idUsuario` = '".$_SESSION['id']."' AND `idPeliculas` = '".$id_pelicula."'");
        $resultado = $sql->runQuery();
        echo "<div class='alert alert-success' role='alert' align='center'>
                <h4 class='alert-heading'>Se elimino ".$titulo[0]." de tu lista de reproducc&oacute;n</h4>
                <button class='btn btn-success' data-dismiss='modal'>Aceptar</button>
            </div>";
    }

    function remove_list_series(){

    }



