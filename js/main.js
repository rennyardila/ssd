
let list = document.querySelectorAll(".navigation li");

function activelink() {
    list.forEach((item) => {
        item.classList.remove("hovered");
    });
    this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activelink));

//menu toggle

let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function() {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
}

function sendMessage() {
    var messageInput = document.getElementById('message-input');
    var message = messageInput.value;
    if (message.trim() !== '') {
      // Aquí puedes enviar el mensaje al servidor o procesarlo de alguna manera
      // Por ahora, simplemente lo agregamos a la zona de mensajes
      var chatMessages = document.getElementById('chat-messages');
      var messageDiv = document.createElement('div');
      messageDiv.textContent = message;
      chatMessages.appendChild(messageDiv);
      // Limpiamos el input después de enviar el mensaje
      messageInput.value = '';
    }
}


function muestraselect(str){
    var conexion;

    if(str==""){
        document.getElementById("text.Hint").innerHTML="";
        return;
    }
    
    if(window.XMLHttpRequest){
        conexion = new XMLHttpRequest();
    }
    conexion.onreadystatechange=function(){
        if(conexion.readyState == 4 && conexion.status==200){
            document.getElementById("servicios_select").innerHTML=conexion.responseText;
        }
    }
    conexion.open("GET", "../controlador/servicios.php?c="+str, true);
    conexion.send();
}

function mostrarSeleccion(select) {
    var selectedOption = select.options[select.selectedIndex];
    var descripcion = selectedOption.getAttribute('data-descripcion');
    var saldo = selectedOption.getAttribute('data-saldo');
    var tiempo = selectedOption.getAttribute('data-tiempo');

    document.getElementById('descripcion_servicio').innerText = descripcion;
    document.getElementById('saldo').value = saldo;
    document.getElementById('tiempo').value = tiempo;
}

    // Realizar una solicitud AJAX para obtener el precio por mil desde la base de datos
    function validarFormulario() {
        var categoria = document.getElementById("categoria").value;
        var servicio = document.getElementById("servicios_select").value;
        var link = document.getElementById("link").value;
        var cantidad = document.getElementById("cantidad").value;
    
        if (categoria == "0" || servicio == "0" || link == "" || cantidad == "") {
            alert("Por favor llene todos los campos.");
            return false;
        }
    
        // Expresión regular para validar URL
        var urlRegex = /^(ftp|http|https):\/\/[^ "]+$/;
    
        // Comprobamos si el enlace coincide con la expresión regular
        if (!urlRegex.test(link)) {
            alert("Por favor ingrese una URL válida.");
            return false;
        }
    
        // Validar si la cantidad es menor que 50
        if (parseInt(cantidad) < 50) {
            alert("La cantidad mínima permitida es 50.");
            return false;
        }
    
        // Validar si la cantidad es mayor que 100,000
        if (parseInt(cantidad) > 100000) {
            alert("La cantidad máxima permitida es 100,000.");
            return false;
        }
    
        // Realizar una solicitud AJAX para obtener el saldo del servicio seleccionado
}


function calcular() {
    // Obtener el valor de la cantidad
    var cantidad = document.getElementById("cantidad").value;

    // Obtener el saldo
    var saldo = document.getElementById("saldo").value;

    // Realizar el cálculo que desees con la cantidad y el saldo
    var resultado = (cantidad / 1000) * saldo;

    // Mostrar el resultado en el input con id "resultado"
    document.getElementById("resultado").value = resultado;
}

function enviarFormulario() {
    // Obtener el formulario
    var formulario = document.getElementById('formulario');
    
    // Crear un clon del formulario
    var formularioClon = formulario.cloneNode(true);
    
    // Cambiar la acción del formulario clonado para enviarlo a la segunda URL
    formularioClon.action = '../controlador/actualizar_saldo.php';
    
    // Agregar el formulario clonado al cuerpo del documento para enviarlo
    document.body.appendChild(formularioClon);
    
    // Enviar el formulario original
    return true;
}

function calcularya() {
    calcular();
    validarFormulario()
}

  // Función para abrir la imagen
function abrirImagen() {
    setTimeout(function() {
      alert("Recuerda que con un deposito igual o mayor de 100 mil cop tienes de 🎁 un 10%");
    }, 300000);
    setTimeout(function(){
        alert("manao")
    }, 5000)
    
}

