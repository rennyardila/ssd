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
                    <a href="seguidores.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
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
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="bag-check-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li>
                <li>
                    <a href="../controlador/controlador_cerrar_seccion.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
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
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">208</div>
                        <div class="cardName">Comments</div>
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
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>nombre</td>
                                <td>usuario</td>
                                <td>email</td>
                                <td>whatsapp</td>
                                <td>pais</td>
                                <td>password</td>
                                <td>saldo</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Conectar a la base de datos (reemplaza los valores con los de tu base de datos)
                                $conexion = mysqli_connect("localhost", "root", "", "chat");

                                // Verificar si hay errores en la conexión
                                if ($conexion->connect_error) {
                                    die("Error en la conexión: " . $conexion->connect_error);
                                }

                                // Consulta SQL para seleccionar todos los usuarios
                                $sql = "SELECT user_id, fname, lname, email, whatsapp, pais, password, saldo FROM users";
                                // Ejecutar la consulta
                                $resultado = $conexion->query($sql);

                                // Verificar si se encontraron resultados
                                if ($resultado->num_rows > 0) {
                                    // Mostrar los datos de los usuarios en la tabla
                                    while ($fila = $resultado->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $fila["user_id"] . "</td>";
                                        echo "<td>" . $fila["fname"] . "</td>";
                                        echo "<td>" . $fila["lname"] . "</td>";
                                        echo "<td>" . $fila["email"] . "</td>";
                                        echo "<td>" . $fila["whatsapp"] . "</td>";
                                        echo "<td>" . $fila["pais"] . "</td>";
                                        echo "<td>" . $fila["password"] . "</td>";
                                        echo "<td>" . $fila["saldo"] . "</td>";
                                        // Agregar el botón de "Editar" con un enlace que redirige a la página de edición
                                        echo "<td><a href='../controlador/editar_usuario.php?id=" . $fila['user_id'] . "'>Editar</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='8'>No se encontraron usuarios</td></tr>";
                                }

                                // Cerrar la conexión
                                $conexion->close();
                            ?>

                        </tbody>
                    </table>
                </div>

    <!--Scripts-->
    <script src="../js/main.js"></script>
    <!--ionicons-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script module src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>