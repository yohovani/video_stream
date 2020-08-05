<?php
    require_once "consulta.php";
    $sql = new Consulta();
    $sql->setSql("SELECT * FROM peliculas");
    $resultado = $sql->runQuery();
    while($pelicula = mysqli_fetch_array($resultado)){
        echo '
        <div class="col-sm-2 zoom" onclick="mostrarVideo('.$pelicula['id'].')"  data-toggle="modal" data-target="#MostrarVideo">
          <div class="card text-white bg-dark mb-3 card border-danger mb-3" style="max-width: 18rem;">
              <img class="card-img-top" src="'.$pelicula['portada'].'" alt="Card image cap">
              <div class="card-body" >
                <h5 class="card-title" align="center">'.$pelicula['titulo'].'</h5>
                <input type="hidden" name="titulo" id="titulo" value="'.$pelicula['titulo'].'">
                <p class="card-text" align="justify">'.$pelicula['descripcion'].'</p>
              </div>
          </div><br>
        </div>';
    }
?>

