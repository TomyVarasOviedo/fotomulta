//-----Variables-----//
let ultimaCapa; // Para removerla cada vez que se selecciona otra categoría
let ZOOM = 15;
//-----Variables-----//

//-----Funciones-----//
let obtenerMapa =(tbody, table)=>{
  $(tbody).on("click", ".btn-mapa", function () { 
    var data = table.row($(this).parents("tr")).data()
    let usuario = data.dni
    Swal.fire({
      title:'Mapa',
      html:`<select id="selectCategorias">
              <option value="multas">Multas</option>
            </select>` +'<div id="map" class="map"></div>',
      customClass:{
        container:'swal-container'
      }
    })
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
  const refrescarMapaConCategoria = categoria => {
      fetch(`https://www.tecnica1lacosta.com.ar/multa/tutorial-openlayers-master/coordenadas.php?categoria=${categoria}&usuario=${usuario}`)
          .then(datos => datos.json())
          .then(coordenadasConIcono => {
              dibujarMarcadoresEnMapa(coordenadasConIcono);
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
                  ol.proj.fromLonLat([coordenadas[0],coordenadas[1]])
              ),
          });
          marcador.setStyle(new ol.style.Style({
              image: new ol.style.Icon(({
                  src: icono,
                  scale: '0.03',
              }))
          }));
          marcador.setId([coordenadas[2],coordenadas[3]])
          marcadores.push(marcador);
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
   })
}
let obtenerdata = function (tbody, table) { 
  $(tbody).on("click", "button.btn-danger", function () {
    var data = table.row($(this).parents("tr")).data()
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-info mx-2',
        cancelButton: 'btn btn-danger mx-2'
      },
      buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
      title: '¿Quieres eliminar a este agente?',
      text: "No podras volver a recuperarlo!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, estoy dispuesto',
      cancelButtonText: 'No, cancelar!',
      iconColor: 'rgb(0, 156, 161)',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        let id = data.dni
        fetch(`https://www.tecnica1lacosta.com.ar/multa/backend/Registro_de_Agentes/eliminar.php?id=${id}`)
        .then(res=>res.json())
        .then(respuesta=>{
          swalWithBootstrapButtons.fire({
            title:'Agente Eliminado',
            text:'El agente se elimino con exito',
            icon:'success',
            iconColor: 'rgb(0, 156, 161)',
          })
          location.reload()
        })
      }
    })
  })
 }
//-----Funciones-----//

//-----Eventos-----//
//-----Eventos-----//

// import {latitud, longitud} from 'fotomulta/frontend/js/geolocalizacion.js'
console.log(posiciones)