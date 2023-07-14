// ----Variables----//
let formulario = document.getElementById('formulario');
let inputs = formulario.querySelectorAll('input');
let errorDiv = document.querySelector('.errorDiv');
validacion = false
// ----Variables----//

// ----Funciones----//
const validarFormulario =()=>{
    console.log("Estoy aca")
    inputs.forEach(input=>{
        if (input.value == "") {
            errorDiv.classList.add('alert');
            errorDiv.classList.add('alert-danger');
            errorDiv.innerHTML = "!!Completar los Campos¡¡";
        }else{
            validacion = true
        }
    })
    if (validacion) {
        errorDiv.classList.remove('alert-danger')
        errorDiv.classList.add('alert')
        errorDiv.classList.add('alert-success')
        errorDiv.textContent = "Iniciando Session....."
    }
}
const iniciarSesion =()=>{
    let envio = new FormData(formulario)
    fetch("http://localhost/fotomulta/php/iniciar.php",{
        body: envio,
        method: "POST"
    }).then(res=>res.json())
    .then(respuesta=>{
        console.log(respuesta)
        if (respuesta.validacion_admin == true) {
            window.location.href = "backend/formulario.php"
            console.log("Soy admin")
        }else if (respuesta.validacion == true) {
            window.location.href = "frontend/login.php"
            console.log("Soy usuario")
        }else{
            errorDiv.classList.remove('alert-success')
            errorDiv.classList.add('alert')
            errorDiv.classList.add('alert-danger')
            errorDiv.textContent = "Usuario no Registrado"
        }
        inputs.forEach(input=>input.value = "")
    })
}
// ----Funciones----//

// ----Eventos----//
formulario.addEventListener('submit', (e)=>{
    e.preventDefault();
    validarFormulario();
    iniciarSesion()
});
// ----Eventos----//