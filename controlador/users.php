<?php
    session_start();
    include_once "../conexion/conectar.php";
    $sql = mysqli_query($conexion, "SELECT * FROM users");
    $output = "";

    if(mysqli_num_rows($sql) == 1){
        $output .= "No hay usuarios disponibles en el chat";
    }elseif(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $output .= '<a href="#">
                        <div class="contentC">
                        <img src="../icon/ava.png" alt="">
                        <div class="detailsC">
                            <span>'. $row['lname'] .'</span>
                            <p>This is test message</p>
                        </div>
                        </div>
                        <div class="status-dot"><ion-icon name="ellipse-sharp"></ion-icon></div>
                        </a>';
        }
    }
    echo $output;
?>