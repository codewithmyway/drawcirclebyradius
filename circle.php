<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <!--script src="http://maps.google.com/maps/api/js?key=AIzaSyD2cfJO3G7l9BwoZLI_jkakcZY7zpc8vrE" 
          type="text/javascript"></script-->
		  <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTqVv8bnWtcApNQ7VCErEt8r2N5gPs5TM&callback=initMap">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

</head> 
<body>
<p id="demo"></p>

Radius <input type="text" name="radius" id="radius"  />
<div id="map" style="width: 1000px; height: 900px;"></div>
<script type="text/javascript">
 
 function initMap() {
var myLatlng = new google.maps.LatLng(26.553278,80.376868);
var mapOptions = {
  zoom: 6,
  center: myLatlng
}
 
var map = new google.maps.Map(document.getElementById("map"), mapOptions);
/* Place a draggable marker on the map */
var marker = new google.maps.Marker({
    position: myLatlng,
    map: map,
    draggable:true,    
    });
    

    // var degree=90;
    // var x=(rad)*(cos(degree));
    // var y=(rad)*(sin(degree));

    var rad=222322;
       var circle = new google.maps.Circle({
            center: myLatlng,
            map: map,
            radius: rad,          // IN METERS.
            fillColor: '#FF6600',
            // draggable:true,
            fillOpacity: 0.5,
            strokeColor: "#FFF",
            strokeWeight: 0         
        });
        
    /* Drag to Map In center in 3 second */
     map.addListener("center_changed", () => {
    window.setTimeout(() => {
      map.panTo(marker.getPosition());
    }, 3000);
  });
/* Event Listner */
    google.maps.event.addListener(marker,'dragend',function(event) {
      let latitude=event.latLng.lat();
      let longitude=event.latLng.lng();
       console.log(latitude,longitude);
       circle.setCenter(new google.maps.LatLng(latitude,longitude));
     
       // document.getElementById('lat').value = this.position.lat();
        // document.getElementById('lng').value = this.position.lng();
        //alert('Drag end');
    });
  
    $("input").keyup(function(){
   console.log($(this).val());
   updateRadius(circle,$(this).val());
});

  

 function updateRadius(circle, rad){
  circle.setRadius(+rad);
}
 google.maps.event.addDomListener(window, 'load', initMap);
}
</script>

</body>
</html>