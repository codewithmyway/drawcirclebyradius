<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Circle With Degree</title> 
  <!--script src="http://maps.google.com/maps/api/js?key=AIzaSyD2cfJO3G7l9BwoZLI_jkakcZY7zpc8vrE" 
          type="text/javascript"></script-->
		  <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTqVv8bnWtcApNQ7VCErEt8r2N5gPs5TM&callback=initMap">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

</head> 
<body>
<p id="demo"></p>
<div class="radius">
Radius <input type="text" name="radius" id="radius"  />
</div>

<div class="degree">
degree <input type="text" name="degree" id="degree"  />
</div>
<div id="map" style="width: 1000px; height: 900px;"></div>



<script type="text/javascript">
 
 function initMap() {
var myLatlng = new google.maps.LatLng(23.553278,83.376868);
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

    var deg=90;
    deg = deg*( Math.PI / 180 );
    var rad=100000;
   
       var circle = new google.maps.Circle({
            center: myLatlng,
            map: map,
            radius: rad,          // IN METERS.
            fillColor: 'blue',
            fillOpacity: 0.5,
            strokeColor: "#FFF",
            strokeWeight: 0 ,
            degree:deg       
        });
       
/* Event Listner */
    google.maps.event.addListener(marker,'dragend',function(event) {
      let latitude=event.latLng.lat();
      let longitude=event.latLng.lng();
      var x = latitude + rad * Math.sin(deg);
      var y = longitude + rad * Math.cos(deg);
       console.log(latitude,longitude,x,y);
       circle.setCenter(new google.maps.LatLng(latitude,longitude,x,y));
    });



    // var newLatlng =  {
    //   lat:27.24424324607,
    //   lng:80.27872346875613
    // }

    var newMarker = new google.maps.Marker({
      position:newLatlng,
      map:map,
    
    });
    

 $("#radius").keyup(function(){
   console.log($(this).val());
   updateRadius(circle, $(this).val());

});

function updateRadius(circle, rad){
  circle.setRadius(+rad);
}

/* Degree Calulation */
$("#degree").keyup(function(){
   console.log($(this).val());
   updateDegree(circle,$(this).val());
});

function updateDegree(circle, deg){
    deg=+deg;
    return deg;
} 

/*pointer Update Position */
function updatePosition(){
  if(deg>=0 && deg<=90){
    console.log(rad+x,y);
  }else if(deg>90 && deg<=180){
   console.log(x,rad+y)
  }
}
google.maps.event.addDomListener(window, 'load', initMap);
}
</script>

</body>
</html>