<?php
include "../controlador/controlador_conexion.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">
    
</head>
<body>
    <!--navegacion-->
    <div class="contaier">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </span>
                        <span class="title"><b>BUCARAMARKETING</b></span>
                    </a>
                </li>

                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="usuariotable.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Clientes</span>
                    </a>
                </li>
                <li>
                    <a href="pedidos.php">
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="title">Pedidos</span>
                    </a>
                </li>
                <li>
                    <a href="../chat/login.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                        </span>
                        <span class="title">Mensajes</span>
                    </a>
                </li>
                <li>
                    <a href="configuracion.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Configuracion</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="bag-check-outline"></ion-icon>
                        </span>
                        <span class="title">Ayuda</span>
                    </a>
                </li>
                <li>
                    <a href="../controlador/controlador_cerrar_seccion.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Cerrar</span>
                    </a>
                </li>
            </ul>
        </div>
        <!--main-->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-sharp"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here...">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <ion-icon name="person-sharp"></ion-icon>
                    <span class="usuario"><b></b>
                        <?php
                        if (isset($_SESSION["lname"])) {
                            echo '<b>' . strtoupper($_SESSION["lname"]) . '</b>';
                        }
                        ?>
                    </span>
                </div>
            </div>
            <!--Cards-->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                            include("../controlador/controlador_visitas.php");
                        ?>
                        </div>
                        <div class="cardName">Usuarios</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                        if (isset($_SESSION["pedido"])) {
                            echo strtoupper($_SESSION["pedido"]);
                        }
                        ?>
                        </div>
                        <div class="cardName">Pedidos</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubble-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                        if (isset($_SESSION["saldo"])) {
                            echo strtoupper($_SESSION["saldo"]);
                        }
                        ?>
                        </div>
                        <div class="cardName">Saldo</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <!----order detail list---->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                    </div>

                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f4f4f4;
                        }

                        h2 {
                            color: #333;
                        }

                        form {
                            background-color: #fff;
                            padding: 20px;
                            border-radius: 5px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            width: 90%;
                            margin: 0 auto;
                        }

                        label {
                            display: block;
                            margin-bottom: 5px;
                            color: #333;
                        }

                        input[type="text"],
                        input[type="password"] {
                            width: 100%;
                            padding: 10px;
                            margin-bottom: 10px;
                            border: 1px solid #ccc;
                            border-radius: 5px;
                            box-sizing: border-box;
                        }

                        input[type="submit"] {
                            background-color: #4caf50;
                            color: #fff;
                            padding: 10px 20px;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                        }

                        input[type="submit"]:hover {
                            background-color: #45a049;
                        }
                    </style>
                    <form action="../controlador/cambiar_contrasena.php" method="post">
                        <label for="usuario">Usuario:</label>
                        <input type="text" id="lname" name="lname" required><br><br>
                        <label for="contrasena_antigua">Contraseña Antigua:</label>
                        <input type="password" id="contrasena_antigua" name="contrasena_antigua" required><br><br>
                        <label for="nueva_contrasena">Nueva Contraseña:</label>
                        <input type="password" id="nueva_contrasena" name="nueva_contrasena" required><br><br>
                        <input type="submit" value="Cambiar Contraseña">
                    </form>

                    
                </div>
            </div>

    <!--Scripts-->
    <script src="../js/main.js"></script>
    <!--ionicons-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script module src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>