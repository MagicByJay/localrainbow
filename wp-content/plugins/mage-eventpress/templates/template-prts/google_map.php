<?php 
add_action('mep_event_map','ggmap');	
function ggmap(){
global $post,$event_meta,$user_api;
$map_type = mep_get_option( 'mep_google_map_type', 'general_setting_sec', 'iframe');	
$location_sts = get_post_meta($post->ID,'mep_org_address',true);


if($location_sts){
	$org_arr 	= get_the_terms( $post->ID, 'mep_org' );
	$org_id 	= $org_arr[0]->term_id;
	$lat 		= get_term_meta( $org_id, 'latitude', true );
	$lon 		= get_term_meta( $org_id, 'longitude', true );
}else{
	$lat 		= $event_meta['latitude'][0];
	$lon 		= $event_meta['longitude'][0];
}






if($map_type=='iframe'){
?>
<div class="mep-gmap-sec">
 <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo mep_get_event_locaion_item($post->ID,'mep_location_venue'); ?>&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style='width: 100%;min-height: 250px;'></iframe>
</div>
<?php
}else{





	 if($event_meta['mep_sgm'][0]){ if($user_api){ ?>
		<div class="mep-gmap-sec">
			<div id="map" class='mep_google_map'></div>
		</div>
				    <script>
				      var map;
				      function initMap() {
				        map = new google.maps.Map(document.getElementById('map'), {
				          center: {lat: <?php echo $lat; ?>, lng: <?php echo $lon; ?>},
				          zoom: 17
				        });
				        marker = new google.maps.Marker({
				          map: map,
				          draggable: false,
				          animation: google.maps.Animation.DROP,
				          position: {lat: <?php echo $lat; ?>, lng: <?php echo $lon; ?>}
				        });
				        marker.addListener('click', toggleBounce);				        
				      }
				      function toggleBounce() {
				        if (marker.getAnimation() !== null) {
				          marker.setAnimation(null);
				        } else {
				          marker.setAnimation(google.maps.Animation.BOUNCE);
				        }
				      }
				    </script>
				  	<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $user_api; ?>&callback=initMap"
				    async defer></script>		
<?php } } } }?>