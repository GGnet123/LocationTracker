<script>
    function initMap() {
        var mapOptions = {
            zoom: 18,
            center: new google.maps.LatLng(<?php echo $model->lat; echo ','; echo $model->lng; ?>),
            mapTypeId: 'roadmap'
        };
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        var position = {<?php echo 'lat:'. $model->lat; echo ','; echo 'lng:'.$model->lng; ?>};
        var marker = new google.maps.Marker({
            position: position,
            map: map,
            title: 'Your Location'
        });

    }
</script>