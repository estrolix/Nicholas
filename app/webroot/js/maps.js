function initializeSingleAddressMap(address, zoom)
{
    geocoder = new google.maps.Geocoder();
    var myOptions = {
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);      
    
    geocoder.geocode({'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
			var infoWindow = new google.maps.InfoWindow();
			var info =  '<div>' + address + '</div>';
			var marker = new google.maps.Marker({
				position: results[0].geometry.location,
				map: map,
				title: '',
				text: info
			});
			google.maps.event.addListener(marker, 'click', function() {
				infoWindow.close();
				infoWindow.setContent(marker.text);
				infoWindow.open(map, marker);
			});
        } else {
            alert('Адресу "' + address + '" не знайдено на карті.'); // 'Код помилки: ' + status
        }
    });

    map.setZoom(zoom ? zoom : 17);
}