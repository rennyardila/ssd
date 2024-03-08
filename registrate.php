<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bucaramarketing Registrate</title>

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

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image" style="background-image: url(icon/emo.jpg)"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crear una Cuenta en Bucaramarketing!</h1>
                            </div>
                            <form method="post" class="user" id="MyForm" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="fname"
                                            placeholder="Nombre" name="fname" require>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="lname"
                                            placeholder="Usuario" name="lname" require>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email"
                                        placeholder="Email" name="email" require>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user"
                                            id="whatsapp" placeholder="Whatsapp" name="whatsapp" require>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="pais"
                                            placeholder="Pais" name="pais" require>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" placeholder="Contraseña" name="password" require>
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
                                    value="Registrarte" 
                                    name="register">


                                
                            </form>
                            <?php
                                include ('controlador/controlador_registrar.php');
                            ?>
                            <hr>
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