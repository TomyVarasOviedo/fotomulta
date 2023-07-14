console.log(posiciones)
let ultimaCapa; // Para removerla cada vez que se selecciona otra categoría
let ZOOM = 15;
let usuarioResultado = document.getElementById('resultadoUsuario')
let formulario = document.getElementById('formulario')
let listaArticulos = document.getElementById('lista-articulos')
let patenteH1 = document.getElementById('patente')
let imagen = document.getElementById('imagen')
let primerIntento = false
// --------FUNCIONES PARA MAPA--------//
const mapa = new ol.Map({
    target: 'map', // el id del elemento en donde se monta
    layers: [
        new ol.layer.Tile({
            source: new ol.source.OSM()
        })
    ],
    view: new ol.View({
        center: ol.proj.fromLonLat([posiciones.longitud, posiciones.latitud]),
        zoom: ZOOM,
    })
});
const refrescarMapaConCategoria = (categoria, patente) => {
    fetch(`https://www.tecnica1lacosta.com.ar/multa/php/mapa-infractores.php?categoria=${categoria}&patente=${patente}`)
        .then(datos => datos.json())
        .then(coordenadasConIcono => {
            if (primerIntento == true) {
                if (coordenadasConIcono.coordenadas.length == 0) {
                    Swal.fire({
                        title:'Patente no encontrada',
                        text:'No pudimos encontrar su patente probablemente la escribio mal vuelva a intentar',
                        icon:'error',
                        iconColor:'rgb(0, 156, 161)'
                    })
                }else{
                    dibujarMarcadoresEnMapa(coordenadasConIcono);
                    usuarioResultado.classList.add('active')
                    formulario.classList.add('desaparecer')
                    coordenadasConIcono.coordenadas.forEach(multa => {
                        patenteH1.innerText = `Patente: ${multa[1]}`
                        imagen.setAttribute("src", `../img/${multa[5]}`)
                    });
                }
            }
            primerIntento = true
        });
};
const dibujarMarcadoresEnMapa = coordenadasConIcono => {
    if (ultimaCapa) {
        mapa.removeLayer(ultimaCapa);
    }
    // const { icono, coordenadas } = coordenadasConIcono;
    let coordenadas = coordenadasConIcono.coordenadas
    let icono = coordenadasConIcono.icono
    console.log(coordenadasConIcono)
    let marcadores = [];
    coordenadas.forEach(coordenadas => {
        let marcador = new ol.Feature({
            geometry: new ol.geom.Point(
                ol.proj.fromLonLat([coordenadas[3],coordenadas[4]])
            ),
        });
        marcador.setStyle(new ol.style.Style({
            image: new ol.style.Icon(({
                src: icono,
                scale: '0.03',
            }))
        }));
        marcador.setId([coordenadas[1],coordenadas[0]])
        marcadores.push(marcador);
        console.log(marcadores);
    });
    ultimaCapa = new ol.layer.Vector({
        source: new ol.source.Vector({
            features: marcadores,
        }),
    });
    mapa.addLayer(ultimaCapa);
};


const $select = document.querySelector("#selectCategorias");
const obtenerCategoriaSeleccionada = () => $select.options[$select.selectedIndex].value;

const refrescarMapaConCategoriaSeleccionada = () => refrescarMapaConCategoria(obtenerCategoriaSeleccionada())
// Cuando seleccionen otra opción, refrescar el mapa
$select.addEventListener("change", refrescarMapaConCategoriaSeleccionada);


// Algunos eventos que podrían ser de utilidad

mapa.on('singleclick', function(evt) {
    var feature = mapa.forEachFeatureAtPixel(evt.pixel, function(feature, layer) {
        // Aquí se puede filtrar la feature
        return feature;
    });
    if (feature) {
        Swal.fire({
            title:`Patente: ${feature.getId()[0]}`,
            text: `N° ${feature.getId()[1]}`,
            customClass: {
                title: 'popup-titulo'
            }
        })
    }
});



let zoomActual = mapa.getView().getZoom();
mapa.on('moveend', function(e) {
    let nuevoZoom = mapa.getView().getZoom();
    if (zoomActual != nuevoZoom) {
        // console.log('Nuevo zoom: ' + nuevoZoom);
        zoomActual = nuevoZoom;
    }
});

// Al inicio de todo, obtener con la primer categoría
refrescarMapaConCategoriaSeleccionada();
document.addEventListener('DOMContentLoaded', (Event)=>{
    inicarGeo()
    // refrescarMapaConCategoria()
});
// --------FUNCIONES PARA MAPA--------//
// --------FUNCIONES--------//
// --------FUNCIONES--------//
// --------EVENTOS--------//
formulario.addEventListener('submit', (e)=>{
    e.preventDefault()
    let input = formulario.querySelector('input')
    if (input.value != "") {
        refrescarMapaConCategoria(1, input.value.toUpperCase())
        
    }else{
        Swal.fire({
            title:'Error',
            text:'!Por favor escriba su patente para buscarla¡',
            icon:'error',
            iconColor: 'rgb(0, 156, 161)'
        })
    }
})
// --------EVENTOS--------//


