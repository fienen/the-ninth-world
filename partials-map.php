<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/leaflet/leaflet.css">
<script src="<?php echo get_template_directory_uri(); ?>/js/leaflet/leaflet.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/leaflet/L.TileLayer.Zoomify.js"></script>  

<h1 class="entry-title">Ninth World Locations</h1>
<div id="map"></div>

<script>
// Some base properties
var map_width  = 4536;
var map_height = 2956;

var city = new L.LayerGroup(), ruin = new L.LayerGroup(), town = new L.LayerGroup(), other = new L.LayerGroup();

var townIcon = L.icon({
    iconUrl: '<?php echo get_template_directory_uri(); ?>/images/map/smallcity.png',
    iconSize: [32, 37],
    popupAnchor: [0,-17]
}), cityIcon = L.icon({
    iconUrl: '<?php echo get_template_directory_uri(); ?>/images/map/bigcity.png',
    iconSize: [32, 37],
    popupAnchor: [0,-17]
}), ruinIcon = L.icon({
    iconUrl: '<?php echo get_template_directory_uri(); ?>/images/map/ruin.png',
    iconSize: [32, 37],
    popupAnchor: [0,-17]
}), otherIcon = L.icon({
    iconUrl: '<?php echo get_template_directory_uri(); ?>/images/map/other.png',
    iconSize: [32, 37],
    popupAnchor: [0,-17]
});

var map = L.map('map', {
    layers: [city,ruin,town,other],
    maxZoom: 5,
    minZoom: 2,
    crs:L.CRS.Simple
}).setView([0,0], 3);

<?php
$locations = new WP_Query(array('posts_per_page' => -1, 'post_type' => 'locations'));
while( $locations->have_posts() ) : 
	$locations->the_post();
	$theX     = get_post_meta(get_the_ID(),'map_x',true);
	$theY     = get_post_meta(get_the_ID(),'map_y',true);
        $theMap   = get_post_meta(get_the_ID(),'map',true);

	if(!empty($theMap)):
		$locationImg = '<br>'.pods_image($theMap,'thumbnail');
	endif;
	
	$firstType = wp_get_post_terms( get_the_ID(), 'location_type', array('fields' => 'names') );
	$locationType = $firstType[0];
	switch( $locationType ):
		case 'City':
			$theLayer = 'city';
			$theIcon = 'cityIcon';
			break;
		case 'Town or Village':
			$theLayer = 'town';
			$theIcon = 'townIcon';
			break;
		case 'Ruin or Mystery':
			$theLayer = 'ruin';
			$theIcon = 'ruinIcon';
			break;
		default:
			$theLayer = 'other';
			$theIcon = 'otherIcon';
			break;
	endswitch;
	
	if( !empty( $theX ) && !empty( $theY ) ):
?>
new L.marker(map.unproject([<?php echo $theX; ?>,<?php echo $theY; ?>], map.getMaxZoom()), {alt:"<?php the_title(); ?>", icon: <?php echo $theIcon; ?>, title:"<?php the_title(); ?>"}).bindPopup('<a href="<?php the_permalink(); ?>"><?php the_title(); ?><?php echo $locationImg; ?></a>',{keepInView:true}).addTo(<?php echo $theLayer ;?>);
<?php
	endif;

	$locationImg = '';
endwhile;
wp_reset_postdata();
?>

var southWest = map.unproject([0,map_height], map.getMaxZoom());
var northEast = map.unproject([map_width,0], map.getMaxZoom());
map.setMaxBounds(new L.LatLngBounds(southWest, northEast));

var overlays = {
  "Cities":city,
  "Ruins or Mysteries":ruin,
  "Towns or Villages":town,
  "Other Places":other
};

L.tileLayer.zoomify(
  '/wp-content/uploads/map/map-tileset/', 
  { 
    width: map_width, 
    height: map_height,
    tolerance: 0.8,
    attribution:''
  }
).addTo(map);
L.control.layers(null,overlays).addTo(map);
// L.control.scale().addTo(map);
</script>