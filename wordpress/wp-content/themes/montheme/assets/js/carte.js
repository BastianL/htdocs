var map = L.map('map').setView([47.73368453979492, 7.3037214279174805], 9);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
var marker = L.marker([47.73368453979492, 7.3037214279174805]).addTo(map);
marker.bindPopup("Centre de réadaptation de Mulhouse").openPopup();
