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
                        <ion-icon name="cart-outline"></ion-icon>
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
                        <h2>TUS PEDIDOS:</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>servicios_select</td>
                                <td>link</td>
                                <td>cantidad</td>
                                <td>resultado</td>
                                <td>Estado</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            // Incluir la configuración de la base de datos y verificar la sesión de usuario
                            $conexion = mysqli_connect("localhost", "root", "", "chat");

                            // Verificar si hay una sesión de usuario activa
                            if (!isset($_SESSION["user_id"])) {
                                header("Location: ../login.php"); // Redirigir al usuario a la página de inicio de sesión si no está autenticado
                                exit();
                            }

                            // Consulta SQL para seleccionar los registros del usuario actual en orden descendente por id
                            $sql = "SELECT id, servicios_select, link, cantidad, resultado, estado FROM guardar WHERE user_id = ? ORDER BY id DESC";

                            // Preparar la sentencia SQL
                            $stmt = $conexion->prepare($sql);

                            // Vincular el parámetro de user_id
                            $stmt->bind_param("i", $_SESSION["user_id"]);

                            // Ejecutar la consulta
                            $stmt->execute();

                            // Obtener el resultado de la consulta
                            $resultado = $stmt->get_result();

                            // Verificar si se encontraron resultados
                            if ($resultado->num_rows > 0) {
                                // Mostrar los datos de los registros en la tabla
                                while ($fila = $resultado->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $fila["id"] . "</td>";
                                    echo "<td>" . $fila["servicios_select"] . "</td>";
                                    echo "<td>" . $fila["link"] . "</td>";
                                    echo "<td>" . $fila["cantidad"] . "</td>";
                                    echo "<td>" . $fila["resultado"] . "</td>";
                                    echo "<td>" . $fila["estado"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No se encontraron registros para este usuario</td></tr>";
                            }

                            // Cerrar la conexión y liberar los recursos
                            $stmt->close();
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