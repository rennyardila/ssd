<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (empty($_SESSION["id"])) {
    header("location: login.php"); // Redirigir a la página de inicio de sesión si no hay sesión activa
    exit(); // Finalizar el script para evitar que se ejecute más código innecesario
}

// Establecer la conexión a la base de datos (reemplaza los valores con los de tu base de datos)
$conexion = mysqli_connect("localhost","root","","login");

// Verificar si la conexión tiene errores
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Consulta SQL para obtener el saldo del usuario (reemplaza "saldo_columna" y "nombre_tabla" con los nombres reales)
$sql = "SELECT saldo FROM login WHERE id = ?";

// Preparar la sentencia SQL
$stmt = $conexion->prepare($sql);

// Vincular parámetros
$stmt->bind_param("i", $_SESSION["id"]);

// Ejecutar la consulta
$stmt->execute();

// Obtener el resultado de la consulta
$resultado = $stmt->get_result();

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Obtener el saldo del primer registro (asumiendo que el usuario tiene solo un saldo)
    $fila = $resultado->fetch_assoc();
    $saldo = $fila["saldo"];

    // Guardar el saldo en la sesión
    $_SESSION["saldo"] = $saldo;
} else {
    // Si no se encuentra ningún saldo para el usuario, puedes establecer un valor predeterminado o mostrar un mensaje de error
    $_SESSION["saldo"] = 0; // Por ejemplo, saldo predeterminado de 0
    // También puedes mostrar un mensaje de error o registrar el problema para su posterior análisis
}

// Consulta SQL para obtener el nombre del usuario (reemplaza "nombre_columna" y "nombre_tabla" con los nombres reales)
$sql_nombre = "SELECT nombre FROM login WHERE id = ?";

// Preparar la sentencia SQL para el nombre
$stmt_nombre = $conexion->prepare($sql_nombre);

// Vincular parámetros para el nombre
$stmt_nombre->bind_param("i", $_SESSION["id"]);

// Ejecutar la consulta para el nombre
$stmt_nombre->execute();

// Obtener el resultado de la consulta para el nombre
$resultado_nombre = $stmt_nombre->get_result();

// Verificar si se encontraron resultados para el nombre
if ($resultado_nombre->num_rows > 0) {
    // Obtener el nombre del primer registro (asumiendo que el usuario tiene solo un nombre)
    $fila_nombre = $resultado_nombre->fetch_assoc();
    $nombre = $fila_nombre["nombre"];

    // Guardar el nombre en la sesión
    $_SESSION["nombre"] = $nombre;
} else {
    // Si no se encuentra ningún nombre para el usuario, puedes mostrar un mensaje de error o registrar el problema para su posterior análisis
}

// Consulta SQL para obtener el correo electrónico del usuario (reemplaza "email_columna" y "nombre_tabla" con los nombres reales)
$sql_email = "SELECT email FROM login WHERE id = ?";

// Preparar la sentencia SQL para el correo electrónico
$stmt_email = $conexion->prepare($sql_email);

// Vincular parámetros para el correo electrónico
$stmt_email->bind_param("i", $_SESSION["id"]);

// Ejecutar la consulta para el correo electrónico
$stmt_email->execute();

// Obtener el resultado de la consulta para el correo electrónico
$resultado_email = $stmt_email->get_result();

// Verificar si se encontraron resultados para el correo electrónico
if ($resultado_email->num_rows > 0) {
    // Obtener el correo electrónico del primer registro (asumiendo que el usuario tiene solo un correo electrónico)
    $fila_email = $resultado_email->fetch_assoc();
    $email = $fila_email["email"];

    // Guardar el correo electrónico en la sesión
    $_SESSION["email"] = $email;
} else {
    // Si no se encuentra ningún correo electrónico para el usuario, puedes mostrar un mensaje de error o registrar el problema para su posterior análisis
}

// Cerrar la conexión y liberar los recursos
$stmt->close();
$stmt_nombre->close();
$stmt_email->close();
$conexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    
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
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>
                <li>
                    <a href="chat.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                        </span>
                        <span class="title">Messages</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>
                <li>
                    <a href="">
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
                        if (isset($_SESSION["usuario"])) {
                            echo '<b>' . strtoupper($_SESSION["usuario"]) . '</b>';
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
                        <div class="numbers">80</div>
                        <div class="cardName">Sales</div>
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
            
            <!--------chat-----------> 

            <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

h2 {
    text-align: center;
    color: #333;
}

form {
    width: 50%;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    font-weight: bold;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

textarea {
    resize: vertical;
    min-height: 100px;
}

button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

.error {
    color: #ff0000;
    font-size: 14px;
}
</style>

            
            <form action="../controlador/enviar_mensaje.php" method="POST">
               <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre" required><br><br>
                <label for="mensaje">Mensaje:</label><br>
                <textarea id="mensaje" name="mensaje" rows="4" required></textarea><br><br>
                <button type="submit">Enviar</button>
            </form>

           

    <!--Scripts-->
    <script src=".js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="../js/main3.js"></script>
    <!--ionicons-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script module src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
