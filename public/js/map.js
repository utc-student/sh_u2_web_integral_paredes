// Coordenadas iniciales
const coordinates = [25.555330833333, -100.9335338888]; // Coordenadas de la Universidad Tecnológica de Coahuila

function initMap() {
    // Crear el mapa y establecer las coordenadas iniciales y el nivel de zoom
    const map = L.map('map').setView(coordinates, 15);

    // Añadir el mapa base desde OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Añadir un marcador en las coordenadas
    L.marker(coordinates).addTo(map)
        .bindPopup('Universidad Tecnológica de Coahuila')
        .openPopup();
}

// Inicializar el mapa cuando se cargue el DOM
document.addEventListener('DOMContentLoaded', initMap);
