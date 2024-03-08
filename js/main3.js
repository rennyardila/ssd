// Obtener todos los elementos de usuario
var usuarios = document.querySelectorAll('.usuario');

// Agregar un evento de clic a cada elemento de usuario
usuarios.forEach(function(usuario) {
    usuario.addEventListener('click', function() {
        // Obtener el ID de usuario del atributo de datos
        var usuarioId = usuario.getAttribute('data-usuario-id');
        
        // Hacer una solicitud AJAX para obtener los detalles del usuario
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'obtener_usuario.php?id=' + usuarioId, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Actualizar el contenido del contenedor con la información del usuario
                document.getElementById('infoUsuario').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });
});
