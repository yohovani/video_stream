<?php
    require 'conexion.php';
    $name = $_POST['user'];
        if(preg_match("/^([0-9])*$/", $name)){
            $usuario_encontrado = 0;
            $sqlBuscarUsuario = "SELECT * FROM usuarios WHERE `id` = '".$name."'";
            $sqlEjecucion = mysqli_query($conexion,$sqlBuscarUsuario) or die(mysqli_error($conexion));
            while($resultadoBusquedaUsuario = mysqli_fetch_array($sqlEjecucion)){
                $id = $resultadoBusquedaUsuario['id'];
                $usuario_encontrado += 1;
            }
            if($usuario_encontrado == 1){
                session_start();
                $_SESSION['id'] = $id;
                session_set_cookie_params(3600, "/Carlos_video/");
                header( 'Location: /Carlos_Video/');
            }else{
               echo "<script>alert('Credenciales Erroneas');window.location.href='/Carlos_Video/';</script>";
            }
        }else{
            echo "<script>alert('Credenciales Erroneas');window.location.href='/Carlos_Video/';</script>";
        }
?>  