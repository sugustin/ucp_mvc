<?php
session_start();
require_once("core/env.php");
include("inc/conexion.php");
conectar();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MVC - UCP</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">    

    <!-- Custom styles for this template-->
    <link href="inc/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="inc/css/jquery-confirm.min.css">
    
    <script src="inc/js/jquery.js"></script>
    <script src="inc/js/jquery-confirm.js"></script>

    <script type="text/javascript">
        function cambiar_clave_pass()
        {
            $.get("modulos/administracion/cambiar_clave/formulario.php",function(dato){
                $("#popup").html(dato);
                $('#popup').fadeIn('slow');            
                return false;
            });
        }
        function cerrar_pass()
        {
            $('#popup').fadeOut('slow');
            $('.popup-overlay').fadeOut('slow');
        }
        function validar_formulario()
        {
            if ($("#clave_actual").val().length < 3) {
                $("#clave_actual").focus();          
                return 0;
            }
            if ($("#clave_nueva").val().length < 3) {
                $("#clave_nueva").focus();          
                return 0;
            }
            if ($("#clave_nueva_1").val().length < 3) {
                $("#clave_nueva_1").focus();                 
                return 0;
            }

            if($("#clave_nueva_1").val() != $("#clave_nueva").val()) {
                alertas("Las claves nuevas no coinciden");
                $("#clave_nueva").focus();
                clave_nueva.value = "";
                clave_nueva_1.value="";        
                return 0;
            }
        }
        function controlar_pass() 
        {
            if(validar_formulario()==0) {
                $("#formulario").addClass('was-validated');
                return;
            }
            $.post("modulos/administracion/cambiar_clave/controlador.php",$("#formulario").serialize(),function(dato) {
            $("#mensaje").html(dato);
            $('#mensaje').fadeIn('slow');
        });
    }
    function alertas(msj)
    {
        $.alert({
            title: 'Alerta!',    
            content: msj,
            icon: 'fas fa-bell',
            animation: 'scale',
            closeAnimation: 'scale',
            buttons: {
                okay: {
                    text: 'OK!',
                    btnClass: 'btn-blue'
                }
            }
        });
    }
</script>
</head>

<body class="bg-gradient-primary">
   <div id="popup" style="display: none;"></div>
   <div id="mensaje" style="display: none;"></div>
   <?php 
   if(isset($_POST['login']))
    {
        //verifico el usuario
        $user = addslashes($_POST['user']);
        $password = addslashes($_POST['password']);

        echo $sql = "SELECT
         u.id,
         u.nombre,
         u.clave  
         FROM
         usuarios u
         WHERE     
         u.nombre='".$user."'";

        $sql = mysqli_query($con, $sql);
        if(mysqli_num_rows($sql) != 0)
        {
            $row = mysqli_fetch_array($sql);
            echo password_verify($password, $row['clave']);
            if (password_verify($password, $row['clave'])) 
            {
                $_SESSION['userid'] = $row['id'];          
                $_SESSION['grupo'] = 'TEST';
                $_SESSION['id_grupo'] = 1;            
                $_SESSION['usuario'] = $row['nombre'];
                $_SESSION['username'] = 'test';    
                $_SESSION['nombre_apellido'] = 'Nombre TEST';
                if (password_verify($row['usuario'], $row['clave'])) 
                {
                  echo "<script>cambiar_clave_pass();</script>";
                }
                else
                {
                  echo "<script>document.location='index.php';</script>";
                }
            }
            else 
            {
                echo "<script>alertas('Usuario inexistente o datos mal ingresados');</script>";
            }
        }
        else
        {
          echo "<script>alertas('Usuario inexistente o datos mal ingresados');</script>";
        }
    }
    ?>
<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container" style="border-radius: 10px 100px / 120px; background-color: black; border: solid 1px #224abe;">
                   <!--<br/><i class='fas fa-id-card' style="font-size:9em;color:#FFFFFF;"></i>-->
                   <img src="inc/img/test.svg" width="70%" style="border-radius: 10px 100px / 120px;">
               </div>
            </div>
            <div class="d-flex justify-content-center form_container">
            <form action="" method="post" class="login">
                <h1 class="text-white">MVC UCP</h1>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="user" class="form-control input_user" value="" placeholder="Usuario">
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control input_pass" value="" placeholder="Clave">
                </div>

                <div class="d-flex justify-content-center mt-3 login_container">
                    <button type="submit" name="login" class="btn login_btn">Conectar</button>
                </div>
            </form>
        </div>
        
        <div class="mt-4">
            <div class="d-flex justify-content-center links text-white">
                Complete los datos para Ingresar
            </div>
        </div>
    </div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="inc/js/jquery.dataTables.min.js"></script>
</body>
<style type="text/css">
    body,
    html {
        margin: 0;
        padding: 0;
        height: 100%;
        overflow: hidden;
    }
    .user_card {
        height: 400px;
        width: 350px;
        margin-top: auto;
        margin-bottom: auto;
        background: #000;
        position: relative;
        display: flex;
        justify-content: center;
        flex-direction: column;
        padding: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 5px;

    }
    .brand_logo_container {
        position: absolute;
        height: 170px;
        width: 170px;
        top: -75px;
        border-radius: 50%;
        background: #fff;
        padding: 10px;
        padding-top: 3em;
        text-align: center;
    }
    .brand_logo {
        height: 150px;
        width: 150px;
        border-radius: 50%;
        border: 2px solid white;
    }
    .form_container {
        margin-top: 100px;
    }
    .login_btn {
        width: 100%;
        background: #777 !important;
        color: white !important;
    }
    .login_btn:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }
    .login_container {
        padding: 0 2rem;
    }
    .input-group-text {        
        color: #000 !important;
        border: 0 !important;
        border-radius: 0.25rem 0 0 0.25rem !important;
    }
    .input_user,
    .input_pass:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }
    .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
        background-color: #4e73df !important;
    }

    #popup {
        left: 0;
        top: 0;
        position: fixed;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow: auto;
        z-index: 1;
    }
    .content-popup {
        margin: 0px auto;
        margin-top: 50px;
        margin-bottom: 50px;
        position: relative;
        padding: 10px;
        width: 90%;
        min-height: 250px;
        border-radius: 4px;
        background-color: #e9ebf2;
    }
    .content-popup h2 {
        background-color: #4e73df;
        color: #fff;

        margin-right: 40px;

        margin-top: 0;
        padding-bottom: 4px;
        line-height: 35px;
        border-radius: 4px 4px 4px 4px;
        font-size: 18px;
    }
    a.popup-cerrar {
      position: absolute;
      right:10px;
      background-color: #DC3545;
      padding:10px 10px;
      font-size: 20px;
      text-decoration: none;
      line-height: 1;
      color:#fff;
      border-radius: 4px 4px 4px 4px;
      opacity: 1;
  }

 /* FONDO VIDEO */
  .contenido_video{
   overflow: hidden;
   position: fixed;
   top: 0;
   right: 0;
   bottom: 0;
   left: 0;
   z-index: 0;
}
/* Estilos para la etiqueta "video" con la calse (.video)  */
.video{
   /*position: absolute;*/
   max-width: 300%;
   width: 100%;
}
</style>
</html>