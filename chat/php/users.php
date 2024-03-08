<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];

// Verificar si el usuario actual tiene el apellido 'xbladeyx'
$sql_check_xbladeyx = "SELECT * FROM users WHERE unique_id = {$outgoing_id} AND lname = 'Bucaramarketing'";
$query_check_xbladeyx = mysqli_query($conn, $sql_check_xbladeyx);
$show_all_users = false;

if(mysqli_num_rows($query_check_xbladeyx) > 0) {
    // El usuario actual tiene el apellido 'xbladeyx', mostrar todos los usuarios
    $show_all_users = true;
}

if($show_all_users) {
    // Mostrar todos los usuarios
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
} else {
    // Mostrar solo el usuario con el apellido 'xbladeyx'
    $sql = "SELECT * FROM users WHERE lname = 'Bucaramarketing' ORDER BY user_id DESC LIMIT 1";
}

$query = mysqli_query($conn, $sql);
$output = "";

if(mysqli_num_rows($query) == 0) {
    $output .= "No users are available to chat";
} elseif(mysqli_num_rows($query) > 0) {
    include_once "data.php";
}

echo $output;
?>
