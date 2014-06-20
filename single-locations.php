<?php get_header(); ?>

<?php if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_content', 'sharing_display', 19 ); ?>
<?php if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_excerpt', 'sharing_display', 19 ); ?>
<!-- Row for main content area -->
	<div class="small-12 large-12 columns" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<p id="byline">Published <?php the_date(); ?> by <?php the_author_posts_link(); ?></p>
			
			<hr>

<?php 
$post_id       = get_the_ID(); 
$theRulers     = get_post_meta($post_id,'rulers',true);
$thePopulation = get_post_meta($post_id,'population',true);
$theCapital    = get_post_meta($post_id,'capital',true);
$theRegion     = get_post_meta($post_id,'region',true);
$theHearsay    = apply_filters( 'the_content', get_post_meta( $post_id, 'hearsay', true) );
$theWeird      = apply_filters( 'the_content', get_post_meta( $post_id, 'weird', true) );
$thePOI        = apply_filters( 'the_content', get_post_meta( $post_id, 'points_of_interest', true) );
$theMap        = get_post_meta($post_id,'map',true);
$theMapX       = get_post_meta($post_id,'map_x',true);
$theMapY       = get_post_meta($post_id,'map_y',true);
?>			
			<div class="entry-content">
				<?php get_template_part( 'partials', 'toolbox' ); ?>
				
				<?php if( $post->post_content != "" ): ?>
				<h2>Description</h2>
				<?php 
				if( !empty( $theMapX ) && !empty( $theMapY ) ): 
					$type = wp_get_post_terms( $post_id, 'location_type', array('fields' => 'names') );
					$locationType = $type[0];
					switch( $locationType ):
						case 'City':
							$theIcon = 'cityIcon';
							break;
						case 'Town or Village':
							$theIcon = 'townIcon';
							break;
						case 'Ruin or Mystery':
							$theIcon = 'ruinIcon';
							break;
						default:
							$theIcon = 'otherIcon';
							break;
					endswitch;
				?>

				<div id="map-insert-wrapper" class="right hide-for-small-only">
					<div id="map-insert"></div>
					<a href="/resources/world-map/" class="button round small">View Full Map</a>
				</div>  <!-- #map-insert-wrapper.right.hide-for-small-only -->

				<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/leaflet/leaflet.css">
				<script src="<?php echo get_template_directory_uri(); ?>/js/leaflet/leaflet.js"></script>
				<script src="<?php echo get_template_directory_uri(); ?>/js/leaflet/L.TileLayer.Zoomify.js"></script>  
				<script>
				// Some base properties
				var map_width  = 4536;
				var map_height = 2956;

				var townIcon = L.icon({
				    iconUrl: '/wp-content/themes/theninthworld/images/map/smallcity.png',
				    iconSize: [32, 37],
				    popupAnchor: [0,-17]
				}), cityIcon = L.icon({
				    iconUrl: '/wp-content/themes/theninthworld/images/map/bigcity.png',
				    iconSize: [32, 37],
				    popupAnchor: [0,-17]
				}), ruinIcon = L.icon({
				    iconUrl: '/wp-content/themes/theninthworld/images/map/ruin.png',
				    iconSize: [32, 37],
				    popupAnchor: [0,-17]
				}), otherIcon = L.icon({
				    iconUrl: '/wp-content/themes/theninthworld/images/map/other.png',
				    iconSize: [32, 37],
				    popupAnchor: [0,-17]
				});

				var map = L.map('map-insert',{maxZoom:5,minZoom:2,crs:L.CRS.Simple}).setView([0,0],3);
				var center    = map.unproject([<?php echo $theMapX; ?>,<?php echo $theMapY; ?>],map.getMaxZoom());

				L.tileLayer.zoomify(
				  '/wp-content/uploads/map/map-tileset/', 
				  { 
				    width: map_width, 
				    height: map_height,
				    tolerance: 0.8,
				    attribution:''
				  }
				).addTo(map);
				map.setView(center,3);

				var southWest = map.unproject([0,map_height], map.getMaxZoom());
				var northEast = map.unproject([map_width,0], map.getMaxZoom());
				map.setMaxBounds(new L.LatLngBounds(southWest, northEast));

				new L.marker(center, {alt:"<?php the_title(); ?>", icon: <?php echo $theIcon; ?>, title:"<?php the_title(); ?>"}).addTo(map);
				</script>

				<?php	
					endif;
					the_content(); 
				endif; ?>
				
				<h2>Details</h2>
				
				<?php if(!empty($theMap)) { ?>
				<figure class="panel location-map">
					<a href="<?php echo pods_image_url($theMap,'original' ); ?>" title="Map of <?php the_title(); ?>"><?php echo pods_image($theMap,'medium'); ?></a>
					<figcaption>Map of <?php the_title(); ?></figcaption>
				</figure>
				<?php } ?>
				
				<dl class="detail-list">
					<?php if(!empty($theRulers)) { ?>
					<dt>Rulers:</dt>
					<dd><?php echo $theRulers; ?></dd>
					<?php }
					if(!empty($thePopulation)) { ?>
					<dt>Population:</dt>
					<dd><?php echo $thePopulation; ?></dd>
					<?php }
					if(!empty($theCapital)) { ?>
					<dt>Capital:</dt>
					<dd><?php echo $theCapital; ?></dd>
					<?php }
					if(!empty($theRegion)) { ?>
					<dt>Region:</dt>
					<dd><?php echo $theRegion; ?></dd>
					<?php } 
					if(!empty($theHearsay)) { ?>
					<dt><?php the_title(); ?> Hearsay:</dt>
					<dd><?php echo $theHearsay; ?></dd>
					<?php } 
					if(!empty($theWeird)) { ?>
					<dt>The Weird of <?php the_title(); ?>:</dt>
					<dd><?php echo $theWeird; ?></dd>
					<?php } 
					if(!empty($thePOI)) { ?>
					<dt>Points of Interest:</dt>
					<dd><?php echo $thePOI; ?></dd>
					<?php } ?>
				</dl>
				
				<?php if ( function_exists( 'sharing_display' ) ) echo sharing_display(); ?>
			</div>  <!-- .entry-content -->
			
			<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
			<p><?php the_tags(); ?></p>
			
			<section id="comments">
			<?php comments_template(); ?>
			</section>
		</article>
	<?php endwhile; // End the loop ?>

	</div>  <!-- .small-12.large-12.columns  -->
		
<?php get_footer(); ?>