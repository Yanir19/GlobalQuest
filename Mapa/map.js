window.onload = function() {
var mapDiv = document.getElementById('mapas');
var catalunya = new google.maps.LatLng(41.652393,1.691895);
var options = {
center: catalunya,
zoom: 8,
mapTypeId: google.maps.MapTypeId.ROADMAP
};
var mapa = new google.maps.Map(mapDiv, options);
}