let conteoAgentes = document.getElementById("contaAgentes");
let conteoArticulos = document.getElementById("contaArticulo")
let conteoMultas = document.getElementById("contaMultas");
let conteoAdmin = document.getElementById("contaAdmin");

const contarMultas =()=>{
    fetch("https://www.tecnica1lacosta.com.ar/multa/backend/inicio/conmultas.php")
    .then(res=> res.json())
    .then(respuesta=>{
        conteoMultas.innerText = respuesta.multa
        conteoAgentes.innerText = respuesta.agentes
        conteoArticulos.innerText = respuesta.articulo
        conteoAdmin.innerText = respuesta.admin
    }).catch(e=>{
        console.log(e)
        clearInterval('contarMultas()', 1000)
    })
}
document.addEventListener("DOMContentLoaded", ()=>{
    contarMultas()
})
setInterval('contarMultas()', 1000);