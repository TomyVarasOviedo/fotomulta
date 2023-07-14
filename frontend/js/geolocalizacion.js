// ----Geolocalizacion----//
const geolocalizacion = navigator.geolocation;
let posiciones;
function posicion(pos){
    let coordenadas = pos.coords
    posiciones = {
        latitud: coordenadas.latitude,
        longitud: coordenadas.longitude
    }
    return posiciones
}
function inicarGeo(){
    return geolocalizacion.getCurrentPosition((pos)=>{
        return posicion(pos)
    });
} 
inicarGeo();
// ----Geolocalizacion----//