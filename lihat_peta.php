

<script type="text/javascript" src="js/maps_js.js"></script>
<script type="text/javascript">
function init(){
 var service = new google.maps.DirectionsService;
 var view = new google.maps.DirectionsRenderer;

 var info_window = new google.maps.InfoWindow();
 var zoom = 10;

 var pos = new google.maps.LatLng(-6.989719, 110.422726);
 var options = {
  'center': pos,
  'zoom': zoom,
  'mapTypeId': google.maps.MapTypeId.ROADMAP
 };

 var map = new google.maps.Map(document.getElementById('map'), options);
 view.setMap(map);
 info_window = new google.maps.InfoWindow({
  'content': 'loading...'
 });

 var result = function(){
  lihat(service, view);
 }
 document.getElementById('lihat').addEventListener('click', result)
}
function lihat(service, view){
 var start = document.getElementById('start').value;
 var end = document.getElementById('end').value;

 var request = {
  origin: start,
  destination: end,
  travelMode: google.maps.TravelMode.DRIVING
 };

 service.route(request, function(response, status){
  if(status == google.maps.DirectionsStatus.OK){
   view.setDirections(response);
  }else{
   window.alert('Directions request failed due to ' + status);
  }
 });
}
google.maps.event.addDomListener(window, 'load', init);
</script>


<div id="map" style="width: 100%; height: 400px;"></div>
<div id="directions"></div>";