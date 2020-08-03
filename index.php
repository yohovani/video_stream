<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/scriptMovies.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

    <!-- Video -->
    <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

<!-- Video.js base CSS -->
<link
  href="https://unpkg.com/video.js@7/dist/video-js.min.css"
  rel="stylesheet"
/>

<!-- City -->
<link
  href="https://unpkg.com/@videojs/themes@1/dist/city/index.css"
  rel="stylesheet"
/>

    <title>Hello, world!</title>
  </head>
  
  <?php 
  session_start();
    if(isset($_SESSION['id'])){
        echo '
  <body class="p-3 mb-2 bg-dark text-white" onload="listarCatalogo()">
        <div class="d-flex" id="wrapper">
          <!-- Sidebar -->
          <div class="bg-black d" id="sidebar-wrapper">
          <div class="sidebar-heading"><h5>Navegaci&oacute;n</h5></div>
            <div class="list-group list-group-flush">
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Peliculas</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Series</a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Estrenos</a>
            </div>
          </div>
          <!-- /#sidebar-wrapper -->
          <div id="page-content-wrapper">
              <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Mi Lista</a>
                        </li>
                      </ul>
                      <form class="form-inline my-2 my-lg-0">

                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Buscar</button>
                      </form>
                    </div>
                </nav>
          <!-- Page Content -->
          <div id="page-content-wrapper">
            <div class="container-fluid">
          
          <br>
            <div class="row" id="listarCatalogo">
            </div>
        </div>';
      }else{
        echo '
        <body class="image-background">
        <div class="container centrar" id="collapsibleNavbar3">
              <div class="modal-dialog modal-dialog-centered">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-dark text-white">
                    <h4 class="modal-title">Iniciar Sesi&oacute;n</h4>
                  </div>
                  <div class="modal-body bg-dark text-white">
                    
                    <div id="sesionTecnicos">
                      <form action="php/login.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user" id="usuario" placeholder="Usuario" required>
                        </div>
                        <div class="form-group" align="center"> 
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Iniciar Sesi&oacute;n</button>
                          </div>
      
                        <div id="resultadoIS">
      
                        </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        ';
      }
      ?>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" id="MostrarVideo" name="MostrarVideo">
      <div class="modal-dialog modal-lg bg-dark">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title"><p id="tituloVideo"></p></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
          </div>
          <div class="modal-body bg-dark" align="center" id="Video" name="Video">

        </div>
      </div>
    </div>



  </body>
</html>