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
                    <a href="ayuda.php">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
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
                        <h2>GUIA DE COMO HACER UN PEDIDO</h2>
                    </div>
                    
                    <p style="color: #333; font-size: 20px;">

<br>Por favor, sigue estos pasos para enviar tu pedido:<br><br>

<b>1) Categorías:</b> Selecciona la categoría que corresponde al servicio que deseas. Puedes elegir entre diferentes opciones como Gmail, WhatsApp, Kwai e Instagram, etc.

<br><br><b>2)Servicios:</b> Una vez que hayas seleccionado la categoría, elige el servicio específico que deseas dentro de esa categoría. Esto puede incluir seguidores, likes, comentarios, entre otros.

<br><br><b>3)Descripción:</b> Aquí verás una breve descripción del servicio seleccionado para que tengas más información sobre lo que incluye.

<br><br><b>4)Enlace o URL:</b> Proporciona el enlace o URL de la cuenta en la que deseas aumentar seguidores, likes, etc.

<br><br><b>5)Cantidad:</b> Indica la cantidad deseada para el servicio seleccionado. Por ejemplo, el número de seguidores o likes que deseas obtener.

<br><br><b>6)Tiempo Promedio:</b> Este campo mostrará el tiempo aproximado que llevará completar el servicio.

<br><br><b>7)Precio:</b> Aquí se mostrará el precio total del servicio seleccionado.

<br><br><b>8)Enviar:</b> Una vez que hayas completado todos los campos, haz clic en el botón "Enviar" para enviar tu pedido.

<br><br><b>8)Te llegara una notificacion:</b> Cuando envies tu pedido se te enviara un formulario donde dira que tu servicio esta en proceso.

<br><br><b>8)Revisa la seccion de Pedidos:</b> En la seccion de pedidos hay una tabla con el id de tu pedido, el servicio, cantidad, resultado y el estado, el <b>estado</b>, tiene 3 opciones cuando el pedido es recibido por el sistema saldra <b>En proceso</b>, cuando el servicio empiece el aumento saldra <b>Aumentando</b> y cuando finalice saldra <b>Enviados</b>. 

<br><br><b>8)Te llegara una notificacion:</b> Cuando envies tu pedido se te enviara un formulario donde dira que tu servicio esta en proceso. 

<br><br>Recuerda que es importante proporcionar información precisa y completa las redes sociales deben estar publicas ya que no funcionan con cuentas privadas y asi poder garantizar que tu pedido se procese correctamente, despues de un servicio iniciado ya no se puede cancelar y si el servicio es equivocado por no colocar el link de la red social <b>DESDE UNA PC</b> ya que aveces el link desde el telefono se cambia pasa mucho con youtube y facebook el pedido puede ser que se envie pero no se aumente ahi ese pedido corre por parte del cliente o puede ser que se cancele, recuerde que es un sistema que recibe sus servicios.

<br><br>Cualquier duda escribenos en el chat 

<br><br>¡Gracias por elegir nuestros servicios!
                    </p>
                </div>
            </div>

    <!--Scripts-->
    <script src="../js/main.js"></script>
    <!--ionicons-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script module src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>