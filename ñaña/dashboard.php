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
<style>
  /* Estilos para el contenedor de la imagen */
  #imagenContainer {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    display: none; /* Ocultar por defecto */
    justify-content: center;
    align-items: center;
    z-index: 9999;
  }

  /* Estilos para la imagen */
  #imagenContainer img {
    max-width: 80%;
    max-height: 80%;
  }

  /* Estilos para el botón */
  #cerrarBtn {
    position: absolute;
    top: 20px;
    right: 20px;
    padding: 10px 20px;
    background-color: #fff;
    color: #000;
    border: none;
    cursor: pointer;
  }
</style>
<!-- Contenedor para la imagen -->
<div id="imagenContainer">
  <!-- Botón para cerrar -->
  <button id="cerrarBtn">Cerrar</button>
  <!-- Imagen -->
  <img id="imagenVisor" src="" alt="Imagen">
</div>
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
                        <div class="numbers" id="saldito">
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
                    
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 0;
                            padding: 0;
                            background-color: #f4f4f4;
                        }

                        h2 {
                            text-align: center;
                            margin-top: 20px;
                        }

                        form {
                            width: 100%;
                            margin: 0 auto;
                            background-color: #fff;
                            padding: 20px;
                            border-radius: 5px;
                            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                        }

                        label {
                            font-weight: bold;
                        }

                        select, input[type="text"], input[type="number"] {
                            width: 100%;
                            padding: 10px;
                            margin-bottom: 20px;
                            border: 1px solid #ccc;
                            border-radius: 5px;
                            box-sizing: border-box;
                        }

                        .input descripcion_panel {
                            display: none;
                            padding: 10px;
                            border: 1px solid #ccc;
                            border-radius: 5px;
                            margin-bottom: 20px;
                        }

                        .panel p{
                            text-align: start;
                            font-size: 20px;
                        }

                        input[type="submit"] {
                            display:flex;
                            justify-content: center;
                            width: 50%;
                            padding: 10px;
                            background-color: #42b72a;
                            color: #fff;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                            transition: background-color 0.3s ease;
                        }

                        input[type="submit"]:hover {
                            background-color: #7dfc64;
                        }
                    </style>
                    <div class="cardHeader">
                        <h2>AQUI ENVIA TU PEDIDO:</h2>
                    </div>
                        <form id="formulario" action="../controlador/guardar.php" action method="POST" onsubmit="return validarFormulario()">

                            <label for="combo2">Categorías:</label>
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"] ?>">
                            <select name="categoria" id="categoria" onchange="muestraselect(this.value);">
                            <option value="0">Seleccione una categoría</option>
                                <option value="1">Gmail - Cuentas de Gmail por cantidad</option>
                                <option value="2">WhatsApp - Seguidores de canal</option>
                                <option value="3">WhatsApp - Reacciones en publicacion  - Canal</option>
                                <option value="3">WhatsApp - Reaccionesen publicacion - Canal - (Serv. 2)</option>
                                <option value="3">WhatsApp - Miembros de grupo</option>
                                <option value="3">Kwai - Seguidores</option>
                                <option value="3">Kwai - Vistas</option>
                                <option value="3">Kwai - Comentarios</option>
                                <option value="3">Kwai - Vistas+ 50% Compartir - Publicaciones</option>
                                <option value="3">Kwai - Me gusta</option>
                                <option value="3">Kwai - Compartir publicacion</option>
                                <option value="3">Kwai - Transmisión en vivo</option>
                                <option value="3">Instagram - Otros servicios latinos</option>
                                <option value="3">Instagram - Me gusta -  latinos/Hispanos</option>
                                <option value="3">Instagram - Seguidores - latinos/Hispanos</option>
                                <option value="3">Instagram - Comentarios - latinos/Hispanos</option>
                                <option value="3">Instagram - Me gusta - AUTOMÁTICOS - Latinos</option>
                                <option value="3">Instagram - América latina + otros países</option>
                                <option value="3">Instagram - Miembros de canal</option>
                                <option value="3">Instagram - Cuentas de instagram por cantidad</option>

                            </select>

                            <label for="combo2">Servicios:</label>
                            <select name="servicios_select" id="servicios_select" onchange="mostrarSeleccion(this)">
                                <option value="0" id="">Seleccione un servicio</option>
                            </select>

                            <label for="combo2">Descripcion:</label>
                            <div class="panel">
                                <p id="descripcion_servicio" placeholder="Ingresa tu nombre">Descripcion de los servicios</p>
                            </div>
                            
                            <label for="link">Enlace o URL:</label>
                            <input type="text" id="link" name="link" placeholder="link o URL de la cuenta aumentar ...">

                            <label for="cantidad">Cantidad:</label>
                            <input type="number" id="cantidad" name="cantidad" placeholder="Cantidad de seguidores, likes, etc ..." oninput="calcular()">

                            <label for="aa">Tiempo Promedio:</label>
                            <input type="text" id="tiempo" name="tiempo" placeholder="Tiempo aproximado del aumento ..." readonly>
                            <input type="hidden" id= "saldo" name="saldo">
                            <input type="hidden" id= "estado" name="estado" value="En curso">


                            <label for="saldo">Precio:</label>
                            <input type="number" id="resultado" name="resultado" placeholder="Cuanto pagaras ..."  readonly>
                            
                            <input type="submit" name="enviarFormulario" value="Enviar">
                        </form>

                </div>

                <!------New Customer----------->
                <section>
                    <div class="recentCustomers">
                        <div class="cardHeader">
                            <h2>Clientes Recientes</h2>
                        </div>

                        <table>
                            <?php
                                include("../controlador/controlador_ultimos_registrados.php");
                            ?>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!--Scripts-->
    <script src="../js/main.js"></script>
    <!--ionicons-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script module src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>