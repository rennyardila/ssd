<?php
    if (isset($_GET['registro_exitoso']) && $_GET['registro_exitoso'] == 1) {
        echo "<script>alert('Tu registro se completó');</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bucaramarketing - Logueate</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: #F1F1F1;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- OJO TODO DEBE LLEVAR NAME PARA QUE FUNCIONE -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url(icon/influ.jpg)"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido a Bucaramarketing!</h1>
                                        <?php
                                            include "conexion/conectar.php";
                                            include "controlador/controlador_login.php";
                                        ?>
                                    </div>
                                    <form method="post" class="user" id="MyForm">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user input"
                                                id="lname" aria-describedby="emailHelp" name="lname"
                                                placeholder="Usuario...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user input" name="password"
                                                id="password" placeholder="Contraseña">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recuerdame</label>
                                            </div>
                                        </div>
                                        <style>
                                        .btn.btn-primary.btn-user.btn-block {
                                            background-color: #42b72a;
                                            border-color: #42b72a;
                                            font-size: 20px;
                                            font-weight: bold;
                                            transition: transform 0.2s, background-color 0.3s; /* Agregamos la transición para el cambio de color de fondo */
                                        }

                                        .btn.btn-primary.btn-user.btn-block:hover {
                                            transform: scale(1.05);
                                            background-color: #2d841b; /* Cambiamos el color de fondo al pasar el cursor sobre el botón */
                                        }
                                        </style>

                                        <input class="btn btn-primary btn-user btn-block" 
                                            type="submit" 
                                            value="Iniciar Sesión" 
                                            name="btningresar">

                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Olvidastes la contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="registrate.php">Crear una Cuenta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>