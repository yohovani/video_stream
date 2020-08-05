<?php
    session_start();
    $id = $_POST['id'];

    require_once "consulta.php";
    $sql = new Consulta();
    $sql->setSql("SELECT id,ruta,titulo FROM peliculas WHERE id='".$id."'");
    $video = $sql->runQuery();

    $video = mysqli_fetch_array($video);
    $idVideo = $video[0];
    $titulo = $video[2];
    echo '
    <div class="modal-content">
        <div class="modal-header bg-dark">
        <h5 class="modal-title">'.$titulo.'</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <div class="modal-body bg-dark" align="center" id="Video" name="Video">

        <video class="video-js vjs-theme-city"
            id="my-video"
            class="video-js"
            width="640px" height="360px"
            controls
            preload="auto"
            data-setup=\'{ "aspectRatio":"640:360", "playbackRates": [1, 1.5, 2] }\'>
            <source src="'.$video[1].'" type="video/mp4" />

        </video>
    
        <script src="https://vjs.zencdn.net/7.8.4/video.js"></script><br>';
    
    $sql->setSql("SELECT * FROM vermastardepeliculas WHERE idPeliculas='".$id."' AND idUsuario='".$_SESSION['id']."'");
    $usuario = $sql->runQuery();
    if(mysqli_num_rows($usuario) == 1){
        echo '
            <button type="button" class="btn btn-danger btn-lg btn-block" onclick="remove_list('.$id.')"><img whidrh="20 px" height="20 px" src="Img\iconos\delete.svg"/>Eliminar '.$titulo.' de mi Lista</button>
            <button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal" ">Cerrar</button>
        </div>';
    }else{
        echo '
            <button type="button" class="btn btn-success btn-lg btn-block" onclick="addList('.$id.')"><img whidrh="20 px" height="20 px" src="Img\iconos\anadir.svg"/> &nbspAgregar a mi Lista</button>
            <button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal" ">Cerrar</button>
        </div>';
    }
