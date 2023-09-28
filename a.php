<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
function pointsOnCircle({ radius, angle, cx, cy }){

angle = angle * ( Math.PI / 180 ); // Convert from Degrees to Radians
const x = cx + radius * Math.sin(angle);
const y = cy + radius * Math.cos(angle);
return [ x, y ];
}
const [ x, y ] = pointsOnCircle({ radius: 100, angle: 150, cx: 10, cy: 20 });
console.log( x, y );
    </script>

<?php
$radius=100;
$angle=360;
$latitude=150;
$longitude=150;
$angle = $angle*(3.14159265359/180);
$x = $radius * sin($angle);
$y =  $radius * cos($angle);

$updatedLat[] = $x+$latitude;
$updatedLng[] = $y+$longitude;
  echo "<pre>";
print_r($updatedLat);
echo "<br>";
print_r($updatedLng);



?>
</body>
</html>