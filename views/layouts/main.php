<!DOCTYPE html>
<html>
<head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
        #map {
            height: 100%;
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div id="map"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php echo $content ?>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0IswlL9RmRK6iOgT2JBoBoGp9EQAURaA&callback=initMap">
</script>

</body>
</html>