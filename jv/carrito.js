// variables 
const carrito = document.getElementById("carrito"),
        listaCursos = document.getElementById("lista-productos"),
        contenedorCarrito = document.querySelector('.buy-card.lista_de_productos'),
        vaciarCarritoBtn = document.querySelector('#vaciar_carrito');

let articulosCarrito=[ ];

registrarEventslisteners()

function registrarEventslisteners(){
    //cuando yo le de click a "agregar al carrito de compras"
    listaCursos.addEventListener('click', agregarCursos);

    //eliminar prendas del carrito 
    carrito.addEventListener('click',eliminarCurso);

    // vaciar el carrito
    vaciarCarritoBtn.addEventListener('click', e => {
        articulosCarrito = [];
        limpiarHTML()
    })
}
function agregarCursos(e){
    if (e.target.classList.contains("agregar-carrito")){
        const cursoSeleccionado = e.target.parentElement.parentElement;
        leerInfo(cursoSeleccionado)
    }
}
//elimina las prendas del carrito 
function eliminarCurso(e){
    if(e.target.classList.contains("borrar-curso")){
        const cursoId = e.target.getAttribute('data-id');

        //eliminar del arreglo del articulo por el data-id
        articulosCarrito = articulosCarrito.filter(curso => curso.id !== curso.Id)
        carritoHTML()
    }
}
//leer el contenido de nuestro html al que le dimos clicky extrar la info del curso
function leerInfo(curso){
    //crear un objeto con el contenido del curso actual
    const infoCurso = {
        imagen: curso.querySelector('img').src,
        titulo: curso.querySelector('h3').textContent,
        precio: curso.querySelector('.precio').textContent,
       id: curso.querySelector('button').getAttribute('data-id'), 
       cantidad : 1 
    }

    //revisa si un elemento ya existe en el carrito
    const existe = articulosCarrito.some(curso => curso.id === infoCurso.id)
    
    if (existe){
        //actualizar cantidad
        const cursos = articulosCarrito.map(curso =>{
            if(curso.id === infoCurso.id){
                curso.cantidad++;
                return curso
            }else {
                return curso;
            }
        })
        [articulosCarrito,infoCurso]
    
    } else{
        //agregamos elementos al carrito de compras
        articulosCarrito = [...articulosCarrito,infoCurso];
    }
    carritoHTML();
}
//muestra el carrito en el html

function carritoHTML() {
    
    //recorre el carrito de compras y genera el html
    articulosCarrito.forEach(curso => {
        const fila = document.createElement('div')
        fila.innerHTML = `
            <img src="${curso.imagen}"></img>
            <p>${curso.titulo}</p>
            <p>${curso.cantidad}</p>
            <p>${curso.precio}</p>
            <p><span class="borrar-curso" data-id="${curso.id}">X</span></p>
        `;
        contenedorCarrito.appendChild(fila)
    });
}

/*function carritoHTML() {
    // Verificar si contenedorCarrito está definido y no es nulo
    if (contenedorCarrito) {
        // Recorre el carrito de compras y genera el HTML
        articulosCarrito.forEach(curso => {
            const fila = document.createElement('div')
            fila.innerHTML = `
                <img src="${curso.imagen}"></img>
                <p>"${curso.titulo}"</p>
                <p>"${curso.cantidad}"</p>
                <p>"${curso.precio}"</p>
                <p><span class="borrar-curso" data-id="${curso.id}">X</span></p>
            `;
            contenedorCarrito.appendChild(fila)
        });
    } else {
        console.error('El contenedor del carrito no fue encontrado en el DOM.');
    }
}*/


//Elimina los cursos de la lista_de_productos
function limpiarHTML(){
    while(contenedorCarrito.firstChild){
        contenedorCarrito.removeChild(contenedorCarrito.firstChild)
        
    }


}