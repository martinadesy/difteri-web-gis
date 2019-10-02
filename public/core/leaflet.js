$(document).ready(function () {
    loadScript('leaflet', function () {
        var lat = parseFloat('-6.1741');
        var lng = parseFloat('106.8296');
        lat = isNaN(lat) ? 0 : lat;
        lng = isNaN(lng) ? 0 : lng;
        var mymap = L.map('log-map-inner').setView([lat, lng], 13);
        var marker = L.marker([lat, lng]).addTo(mymap);

        mymap.touchZoom.disable();
        mymap.doubleClickZoom.disable();
        mymap.scrollWheelZoom.disable();
        mymap.boxZoom.disable();
        mymap.keyboard.disable();

        if (navigator.onLine) {
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mymap);
        }
    });
})