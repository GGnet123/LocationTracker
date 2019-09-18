<script>
    var map, infoWindow;
    function addMarker(location, map) {
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }



    var request = new XMLHttpRequest();

    request.open('GET', ' http://ac3e8a0a.ngrok.io/', true);

    var data = JSON.parse(this.response);
    request.onload = function() {
        console.log(data);

    };


    request.send();
    //var arr = http.get('http://6f3bf001.ngrok.io');
    function initMap(<?php echo 'latt='. $model->lat; echo ','; echo 'lngg='.$model->lng; ?>) {

        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: latt,
                    lng: lngg},
            zoom: 3
        });
        infoWindow = new google.maps.InfoWindow;

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
					lat: latt,
                    lng: lngg
                };

                addMarker(pos,map);
              
                map.setCenter(pos);
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {

            handleLocationError(false, infoWindow, map.getCenter());
        }
		$(document).ready(function(){
		  $(latt).change(function(){
			alert("The text has been changed.");
			navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
					lat: latt,
                    lng: lngg
                };
                addMarker(pos,map);

                map.setCenter(pos);
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            })
		  });
		});

		
	}


    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            addMarker(pos,map) :
            'Error: Your browser doesn\'t support geolocation.');
    }
</script>
