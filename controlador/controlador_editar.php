<?php
// Incluir el archivo del controlador que obtiene los datos de los usuarios
include("../controlador/controlador_tabla.php");

// Verificar si hay usuarios para mostrar
if (!empty($usuarios)) {
    // Mostrar la tabla
    echo '<table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>usuario</th>
                    <th>email</th>
                    <th>whatsapp</th>
                    <th>password</th>
                    <th>saldo</th>
                    <th>pais</th>
                    <th>id_cargo</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>';
    
    // Recorrer los usuarios y mostrar cada uno en una fila de la tabla
    foreach ($usuarios as $usuario) {
        echo "<tr>";
        echo "<td>" . $usuario['user_id'] . "</td>";
        echo "<td>" . $usuario['fname'] . "</td>";
        echo "<td>" . $usuario['lname'] . "</td>";
        echo "<td>" . $usuario['email'] . "</td>";
        echo "<td>" . $usuario['whatsapp'] . "</td>";
        echo "<td>" . $usuario['password'] . "</td>";
        echo "<td>" . $usuario['saldo'] . "</td>";
        echo "<td>" . $usuario['pais'] . "</td>";
        echo "<td>" . $id_cargo['id_cargo'] . "</td>";
        // Agregar un enlace para editar el usuario
        echo "<td><a href='editar_usuario.php?id=" . $usuario['user_id'] . "&id_cargo=" . $usuario['id_cargo'] . "'>Editar</a></td>";
        // Agregar un campo oculto para enviar id_cargo al formulario de edición
        echo "<input type='hidden' name='id_cargo' value='" . $usuario['id_cargo'] . "'>";
        echo "</tr>";
    }
    
    echo '</tbody>
        </table>';
} else {
    // Mostrar un mensaje si no hay usuarios para mostrar
    echo "No se encontraron usuarios.";
}
?>
