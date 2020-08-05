<?php
    require_once "consulta.php";
    $sql = new Consulta();
    session_start();

    if($_POST['opcion'] == 1){
        lista_peliculas($_SESSION['id']);
    }else{
        lista_series($_SESSION['id']);
    }

    function lista_peliculas($id){
        global $sql;
        $sql->setSql("SELECT p.* FROM peliculas p INNER JOIN usuarios u INNER JOIN vermastardepeliculas cvp ON p.id = cvp.idPeliculas AND u.id = cvp.idUsuario WHERE u.id = '".$id."';");    
        $resultado = $sql->runQuery();
        echo "<center><h4> Mis Peliculas</h4></center>";
        while($pelicula = mysqli_fetch_array($resultado)){
            echo '
            <div class="col-sm-2 zoom" onclick="mostrarVideo('.$pelicula['id'].')"  data-toggle="modal" data-target="#MostrarVideo">
              <div class="card text-white bg-dark mb-3 card border-danger mb-3" style="max-width: 18rem;">
                  <img class="card-img-top" src="'.$pelicula['portada'].'" alt="Card image cap">
                  <div class="card-body" >
                    <h5 class="card-title" align="center">'.$pelicula['titulo'].'</h5>
                    <input type="hidden" name="titulo" id="titulo" value="'.$pelicula['titulo'].'">
                    <p class="card-text" align="justify">'.$pelicula['descripcion'].'</p>
                    <button type="button" class="btn btn-danger" onClick="remove_list('.$pelicula['id'].')">Eliminar</button>
                  </div>
              </div><br>
            </div>';
        }
    }