<h1>Перегляд вулиці</h1>

<?php echo $this->Session->flash(); ?>

<div class="page_streets view">
    
    <p class="street_title">м.Тернопіль, вул. <?php echo $street['Street']['title']; ?></p>

</div>

<div id="map_canvas" class="streetViewMap"></div>

<div class="fix"></div>

<p class="street_view_childrenlist_title">Діти, які проживають на цій вулиці</p>
<?php echo $this->element('children/list'); ?>

<div class="fix"></div>

<div class="actions_box box-01">
	<?php echo $this->Html->link('Редагувати вулицю', array('action' => 'edit', $street['Street']['id']), array('class' => 'ico-edit')); ?>
</div>

<script type="text/javascript">

	<?php if(!$children): ?>
    initializeSingleAddressMap('Україна, м. Тернопіль, вул. <?php echo $street['Street']['title']; ?>', 15);
	<?php else: ?>

			var children = JSON.parse('<?php echo addslashes($childrenJSON); ?>');
    		//console.log(children);

		    geocoder = new google.maps.Geocoder();
		    var myOptions = {
		        mapTypeId: google.maps.MapTypeId.ROADMAP
		    };
		    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

		    var infoWindow;

		    var errors = 0;
		    var zIndex = 0;

		    $.each(children, function(key, child){

				child = child.Child;

		    	var address = "Україна, м. Тернопіль, вул. <?php echo $street['Street']['title']; ?>, " + child.house;
			    var name = child.last_name + ' ' + child.first_name + ' ' + child.third_name;
			    
			    geocoder.geocode({'address': address}, function(results, status) {
			        if (status == google.maps.GeocoderStatus.OK) {
			            map.setCenter(results[0].geometry.location);
						infoWindow = new google.maps.InfoWindow();
						var marker = new google.maps.Marker({
							position: results[0].geometry.location,
							map: map,
							title: name,
							text: '<div><b>' + name + '</b><br />' + address + '</div>'
						});
						google.maps.event.addListener(marker, 'click', function() {
							//showItem(map, this, infoWindow);
							infoWindow.close();
					        infoWindow.setContent(marker.text);
					        infoWindow.open(map, marker);
					        marker.setZIndex(zIndex++);
						});
			        } else {
			        	errors++;
			            //alert('Адресу "' + address + '" не знайдено на карті.'); // 'Код помилки: ' + status
			        }
			    });
		    });

		    map.setZoom(15);

		    if(errors) {
		    	alert(errors + ' адрес не знайдено.');
		    }

	<?php endif; ?>

</script>