<?php
    $con = mysqli_connect("localhost", "root", "", "chat");
    if(!$con){
        echo "Database connected" . mysqli_connect_error();
    }else{
        echo "Error";
    }
?>