const carrito = document.getElementById('carrito');
const elementos1 = document.getElementById('lista-1')
const lista = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.getElementById('vaciar-carrito')

cargarEventListeners();

function cargarEventListeners() {

    elementos1.addEventListener('click', comprarElemento);
    carrito.addEventListener('click', eliminarElemento);
    vaciarCarritoBtn.addEventListener('click', vaciarCarrito);
}

function comprarElemento(e) {
    e.preventDefault();
    if(e.target.classList.contains("agregar-carrito")) {
        const elemento = e.target.parentElement.parentElement;
        leerDatosElemento(elemento);
    }
}

function leerDatosElemento(elemento) {
    const infoElemento = {
        imagen: elemento.querySelector("img").src,
        titulo: elemento.querySelector("h3").textContent,
        precio: elemento.querySelector(".precio").textContent,
        id: elemento.querySelector("a").getAttribute("data-id") 
    }
    insertarCarrito(infoElemento);
}

function insertarCarrito(elemento) {

    const row = document.createElement("tr");
    row.innerHTML = `
        <td>
            <img src="${elemento.imagen}" width=100 />
        </td>
        <td>
            ${elemento.titulo}
        </td>
        <td>
            ${elemento.precio}
        </td>
        <td>
            <a herf="#" class="borrar" data-id="${elemento.id}">X </a>
        </td>
    `;
    
    lista.appendChild(row);
}

function eliminarElemento(e) {
    e.preventDefault();
    let elemento,
        elementoId;
    if(e.target.classList.contains("borrar")) {
        e.target.parentElement.parentElement.remove();
        elemento = e.target.parentElement.parentElement;
        elementoId = elemento.querySelector('a').getAttribute('data-id');
    }
}

function vaciarCarrito() {
    while(lista.firstChild) {
        lista.removeChild(lista.firstChild);
    }
    return false;
}

document.addEventListener('DOMContentLoaded', function() {
    var script = document.createElement('script');
    script.src = 'https://checkout.epayco.co/checkout.js';
    script.setAttribute('data-epayco-key', 'f6078fd236a757f9f5a61da215ea0156');
    script.setAttribute('class', 'epayco-button');
    script.setAttribute('data-epayco-amount', '150000');
    script.setAttribute('data-epayco-tax', '0.00');
    script.setAttribute('data-epayco-tax-ico', '0.00');
    script.setAttribute('data-epayco-tax-base', '150000');
    script.setAttribute('data-epayco-name', 'seguidores');
    script.setAttribute('data-epayco-description', 'seguidores');
    script.setAttribute('data-epayco-currency', 'cop');
    script.setAttribute('data-epayco-country', 'CO');
    script.setAttribute('data-epayco-test', 'false');
    script.setAttribute('data-epayco-external', 'false');
    script.setAttribute('data-epayco-response', '');
    script.setAttribute('data-epayco-confirmation', '');
    script.setAttribute('data-epayco-button', 'http://imgfz.com/i/oUD64Ct.png');

    function ejecutarPago() {
        var formulario = document.querySelector('.epaycoForm');
        if (formulario !== null) {
            // Elimina hijos anteriores antes de agregar el nuevo script
            while (formulario.firstChild) {
                formulario.removeChild(formulario.firstChild);
            }
            formulario.appendChild(script.cloneNode(true)); // Clona el script para evitar referencias compartidas
        } else {
            console.error('El formulario con clase "epaycoForm" no fue encontrado.');
        }
    }

    // Agrega la función al ámbito global para que pueda ser llamada desde el botón
    window.ejecutarPago = ejecutarPago;
});
