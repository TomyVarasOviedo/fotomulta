// ----Variables-----//
let template = document.getElementById('my-template').content
// ----Variables-----//

let mostrarArticulos = async ()=>{
    let resultado = await articulos()
    console.log(resultado)
    return resultado
}
let obtenerIdMulta = async (tbody, table)=>{
    $(tbody).on("click", ".btn-mapa", function () { 
        var data = table.row($(this).parents("tr")).data()
        // console.log(data)
        let alerta =Swal.fire({
                  title:`¿Que quieres ver de la multa ${data.n_multa}?`,
                  position: 'center-end',
                  toast: true,
                  confirmButtonText:'Mapa',
                  showConfirmButton: true,
                  showDenyButton: true,
                  denyButtonText: 'Articulos imfrinjidos',
                  showCancelButton: true,
                  cancelButtonText:'Imagen',
                  width: '30%',
                  customClass:{
                      content:'container-popup',
                      popup:'my-popup',
                      title:'titulo'
                  },
                  icon: 'question',
                }).then(result=>{
                    if (result.dismiss) {
                        Swal.fire({
                            title:data.n_patente,
                            text:`Fecha: ${data.fecha}`,
                            imageUrl:`../../img/${data.foto}`,
                            imageWidth: 400,
                            imageHeight: 200
                        })
                    }
                    else if (result.isDenied) {
                        fetch(`https://www.tecnica1lacosta.com.ar/multa/php/multa-articulo.php?multa=${data.n_multa}`)
                        .then(res=>res.json())
                        .then(respuesta=>{
                            articulos(respuesta)
                            Swal.fire({
                                title:'Articulos',
                                text: mostrarArticulos(),
                                showConfirmButton: true
                            })
                        })
                    }
                    else if (result.isconfirmed) {
                        console.log("hola")
                    }
                })
    })
}
let articulos = respuesta=>{
    respuesta.forEach(articulo => {
        texto = `pito`
        return texto
    })
    return new Promise((resolve, reject)=>{
        resolve(respuesta[0]) 
    }) 
}