// -----Variables-----//
let formuarioAgregar = document.getElementById('formulario');
let formularioBuscar = document.getElementById('formularioBuscar');
let input = formuarioAgregar.querySelectorAll('input');
let errorDiv = formuarioAgregar.querySelector('.errorDiv');
let toggle = document.querySelector('.toggle');
let sidebar = document.querySelector('.sidebar');
let navbarBottom = document.querySelectorAll('.bot-link')
let link = document.querySelectorAll('.link');
let tabla = document.querySelector('table tbody');
let templateTabla = document.getElementById('tabla-fila').content;
let validacion;
let date = new Date()
let fecha = date.getFullYear()+"-"+(date.getMonth()+ 1)+"-"+date.getDate()+"-"+date.getHours()+"-"+date.getMinutes() + "-"+ date.getSeconds();
let fragmento = document.createDocumentFragment();
let nMulta = document.getElementById('contarMultas')
let patente = document.getElementById('patente')
let numero = document.getElementById('numero')
let fechaText = document.getElementById('fecha')

console.log(fecha);
// -----Variables-----//
// -----Geolocalizacion-----//
// -----Geolocalizacion-----//

// -----Funciones-----//
const cargarMultas =()=>{
    let usuario = document.getElementById('inputUsuario').value
    let buscar = formularioBuscar.querySelector('input').value
    fetch(`http://localhost/fotomulta/php/mostrarMultas.php?buscar=${buscar}&usuario=${usuario}`)
    .then(res=>res.json())
    .then(respuesta=>{
        console.log(respuesta)
        if (respuesta != null) {
            let clone;
            respuesta.forEach(fila=> {
                tabla.innerHTML += `<tr>
                                        <th scope="row">${fila.n_multa}</th>
                                        <td>${fila.n_patente}</td>
                                        <td>${fila.fecha}</td>
                                    </tr>`
                // templateTabla.querySelector('tr th').textContent = fila.n_multa
                // templateTabla.querySelectorAll('tr td')[0].textContent = fila.n_patente.toUpperCase()
                // templateTabla.querySelectorAll('tr td')[1].textContent = fila.fecha
                // clone = templateTabla.cloneNode(true)
                // console.log(clone)
                // fragmento.appendChild(clone)
            });
        }else{
            // templateTabla.querySelector('tr th').textContent = respuesta
            // clone = templateTabla.cloneNode(true)
            // fragmento.appendChild(clone)
        }
        // tabla.appendChild(fragmento)
    })
}
const validarFormulario =()=>{
    for (let i = 0; i < input.length; i++) {
        validacion = false
        if (input[i].value == "") {
            errorDiv.classList.add('alert');
            errorDiv.classList.add('alert-danger');
            errorDiv.innerHTML = "!!Completar los Campos¡¡";
        }
        else{
            validacion = true
        }
    }
    if (validacion) {
        Swal.fire({
            title: 'Cargando...',
            allowOutsideClick: false,
            didOpen: ()=>{
                Swal.showLoading()
            }
        })
        validacion = false
        let envio = new FormData(formuarioAgregar);
        envio.set("latitud", posiciones.latitud)
        envio.set("longitud", posiciones.longitud)
        envio.set("fecha", fecha)
       fetch("https://www.tecnica1lacosta.com.ar/multa/php/agregarMulta.php",{
           method:"POST",
           body: envio
        })
        .then(res=>{
            res.json()
        })
        .then(respuesta=>{
            errorDiv.classList.remove('alert');
            errorDiv.classList.remove('alert-danger');
            errorDiv.innerHTML = "";
            Swal.fire({
                title:'Multa Realizada',
                text: respuesta,
                icon: 'success',
                iconColor: 'rgb(0, 156, 161)',
                showConfirmButton: false,
                timer: 1200
            })
            
        })
        .catch(e=>console.log(e))
        contarMultas()
        ultimaMulta()
        input.forEach(input => input.value = "");
    }
}
const cerrarNavbar =()=>{
    sidebar.classList.remove('menu-active')
}
let contarMultas =()=>{
    fetch(`https://www.tecnica1lacosta.com.ar/multa/php/cuentaMultas.php?usuario=${usuario}`)
    .then(res=>res.json())
    .then(respuesta=>{
        nMulta.innerText = respuesta
    })
}
let ultimaMulta =()=>{
    let usuario = document.getElementById('inputUsuario').value

    fetch(`https://www.tecnica1lacosta.com.ar/multa/php/ultimaMulta.php?usuario=${usuario}`)
    .then(res=>res.json())
    .then(respuesta=>{
        if (respuesta.patente != null) {
            patente.innerText = `N° de Patente: ${respuesta.patente}`
            numero.innerText = `N° de Multa: ${respuesta.id}`
            fechaText.innerText = `Fecha: ${respuesta.fecha}`
        }else{
            patente.innerText = `N° de Patente: Aun no hay multa`
            numero.innerText = `N° de Multa: Aun no hay multa`
            fechaText.innerText = `Fecha: Aun no hay multa`
        }
    })
}
let obtenerArticulos =()=>{
    fetch("https://www.tecnica1lacosta.com.ar/multa/php/mostrarArticulos.php")
    .then(res=>res.json())
    .then(respuesta=>{
        let select = document.getElementById('articulos')
        respuesta.forEach(articulo => {
            select.innerHTML += `<option value="${articulo.id_articulo}">
                                    Articulo ${articulo.n_articulo} (${articulo.inciso}): ${articulo.descripcion} 
                                </option>`
        });
    })
}
// -----Funciones-----//
// -----Eventos-----//
document.addEventListener('DOMContentLoaded',()=>{
    contarMultas()
    ultimaMulta()
    obtenerArticulos()
});
formularioBuscar.addEventListener('submit', (e)=>{
    e.preventDefault()
    cargarMultas()
})
formuarioAgregar.addEventListener('submit', (e)=>{
    e.preventDefault();
    validarFormulario();
});
toggle.addEventListener("click", ()=>{
    sidebar.classList.add('menu-active');
});
for (let i = 0; i < link.length; i++) {
    link[i].addEventListener('click', ()=>sidebar.classList.remove('menu-active'));
}
// -----Eventos-----//
