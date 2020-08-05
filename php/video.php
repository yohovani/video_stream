<?php
    $id = $_POST['id'];

    require_once "consulta.php";
    $sql = new Consulta();
    $sql->setSql("SELECT id,ruta,titulo FROM peliculas WHERE id='".$id."'");
    $video = $sql->runQuery();

    $video = mysqli_fetch_array($video);

    echo '
    <video class="video-js vjs-theme-city"
        id="my-video"
        class="video-js"
        width="640px" height="360px"
        controls
        preload="auto"
        data-setup=\'{ "aspectRatio":"640:360", "playbackRates": [1, 1.5, 2] }\'>
        <source src="'.$video[1].'" type="video/mp4" />

    </video>
    
    <script src="https://vjs.zencdn.net/7.8.4/video.js"></script><br>
    <form>
    <input type="hidden" name="idVideoStream" id="idVideoStream" value="'.$id.'">
    </form>
    <button type="button" class="btn btn-success btn-lg btn-block" onclick="addList('.$id.',\''.$video[2].'\')"><img whidrh="20 px" height="20 px" src="Img\iconos\anadir.svg"/> &nbspAgregar a mi Lista</button>
    <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" ">Cerrar</button>';
