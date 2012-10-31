<h1>Загальна карта</h1>

<?php echo $this->Session->flash(); ?>

<div id="map_canvas" class="generalMap"></div>

<div class="fix"></div>


<script type="text/javascript">

	<?php if(!$children): ?>
	    initializeSingleAddressMap('Україна, м. Тернопіль');
	<?php else: ?>

			var children = JSON.parse('<?php echo addslashes($childrenJSON); ?>');

		    geocoder = new google.maps.Geocoder();
		    var myOptions = {
		        mapTypeId: google.maps.MapTypeId.ROADMAP
		    };
		    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

		    var infoWindow;

		    var errors = 0;
		    var zIndex = 0;

		    //var locationSet = false;

		    var defaultLocation = new google.maps.LatLng(49.550823, 25.592834);

		    map.setCenter(defaultLocation);

		    $.each(children, function(key, child){

		    	//console.log(child);

		    	var address = "Україна, м. Тернопіль, вул. " + child.Street.title + ", " + child.Child.house;
			    var name = child.Child.last_name + ' ' + child.Child.first_name + ' ' + child.Child.third_name;

			    findAndAddMarker(address, name, infoWindow);

		    });

		    map.setZoom(13);

		    if(errors) {
		    	alert(errors + ' адрес не знайдено.');
		    }

	<?php endif; ?>

	function showItem(map, marker, infoWindow)
	{
		infoWindow.close();
	    infoWindow.setContent(marker.text);
	    infoWindow.open(map, marker);
	    //marker.setZIndex(zIndex++);
	}

	function findAndAddMarker(address, name, infoWindow)
	{
		geocoder.geocode({'address': address}, function(results, status) {
			        
	        //console.log(results);
	        //console.log(status);

	        if (status == google.maps.GeocoderStatus.OK) {
	            
	            /*if(!locatioinSet) {*/
//	            	map.setCenter(results[0].geometry.location);
	            	//console.log(results[0].geometry.location);
	            	//alert(wetwet);
	            	/*locationSet = true;
	            }*/

				infoWindow = new google.maps.InfoWindow();
				var marker = new google.maps.Marker({
					position: results[0].geometry.location,
					map: map,
					title: name,
					text: '<div><b>' + name + '</b><br />' + address + '</div>'
				});
				//console.log(marker);
				google.maps.event.addListener(marker, 'click', function() {
					showItem(map, this, infoWindow);
					/*infoWindow.close();
			        infoWindow.setContent(marker.text);
			        infoWindow.open(map, marker);*/
			        //marker.setZIndex(zIndex++);
				});
	        } else {
	        	setTimeout('findAndAddMarker("' + address + '", "' + name + '", infoWindow)', getRandomInt(200, 2000));
	        	errors++;
	        	//console.log('not found:' + address);
	            //alert('Адресу "' + address + '" не знайдено на карті.'); // 'Код помилки: ' + status
	        }
	    });
	}

</script>