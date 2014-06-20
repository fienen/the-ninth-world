<?php get_header(); ?>

<!-- Row for main content area -->
	<article class="small-12 large-12 columns" role="main">
		<h1 class="entry-title">Location Archive</h1>
		
		<hr>

		<div id="filter-bar" class="row">
			<div class="small-12 columns text-center">
				<ul id="types" class="button-group round" data-filter-group="type">
					<li><label class="tiny button disabled">type</label></li>
					<li><button data-filter="" class="active tiny button secondary">all</button></li>
  					<!-- li><button data-filter=".capital-city" class="tiny button secondary">capital city</button></li -->
  					<li><button data-filter=".city" class="tiny button secondary">city</button></li>
					<!-- li><button data-filter=".floating-relic" class="tiny button secondary">floating relic</button></li -->
					<!-- li><button data-filter=".fortress-or-stronghold" class="tiny button secondary">fortress/stronghold</button></li -->
					<li><button data-filter=".ruin-or-mystery" class="tiny button secondary">ruin/mystery</button></li>
					<li><button data-filter=".town-or-village" class="tiny button secondary">town/village</button></li>
					<li><button data-filter=".other" class="tiny button secondary">other</button></li>
				</ul>	
				<ul id="areas" class="button-group round" data-filter-group="area">
					<li><label class="tiny button disabled">area</label></li>
					<li><button data-filter="" class="active tiny button secondary">all</button></li>
  					<li><button data-filter=".The-Steadfast" class="tiny button secondary">steadfast</button></li>
  					<li><button data-filter=".The-Beyond" class="tiny button secondary">beyond</button></li>
					<li><button data-filter=".Other" class="tiny button secondary">other</button></li>
				</ul>	
				<ul id="sorts" class="button-group round">
					<li><label class="tiny button disabled">sort</label></li>
  					<li><button data-sort-by="name" data-sort-asc="false" class="active tiny button secondary">name <span class="direction fi-arrow-up"></span></button></li>
  					<li><button data-sort-by="votes" data-sort-asc="false" class="tiny button secondary">votes <span class="direction"></span></button></li>
				</ul>
			</div>
		</div>
		
	<?php if ( have_posts() ) : ?>

		<ul id="filter-list" class="rated-item-list col-3">
		<?php /* Start the Loop */ ?>
		<?php query_posts($query_string . '&orderby=title&order=ASC&posts_per_page=-1'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php $terms = get_the_terms( $post->ID, 'location_type' );
			if ( $terms && ! is_wp_error( $terms ) ) : 
				$location_types = array();
				foreach ( $terms as $term ) {
					$location_types[] = $term->slug;
				}
				$location_types = join( " ", $location_types );
			endif; ?>
					<li class="<?php echo str_replace(" ","-",get_post_meta( get_the_ID(), 'region', true)); ?> <?php echo $location_types; ?>"><?php if(function_exists('thumbs_rating_show_up_votes')) { ?><span class="votesBadgeUp"><?php echo thumbs_rating_show_up_votes(); ?></span><?php } ?><?php if(function_exists('thumbs_rating_show_down_votes')) { ?><span class="votesBadgeDown"><?php echo thumbs_rating_show_down_votes(); ?></span><?php } ?><a class="name" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php if(tnw_is_new_content()): ?><span title="Newly posted!" class="new-content-icon fi-burst-new"></span><?php endif; ?></li>
		<?php endwhile; ?>
		</ul>

		<div data-alert class="alert-box hide">No results matched your combination of filters. Please try a different combination.</div>

		<script>
			var filterlist = jQuery( '#filter-list' );
			jQuery(filterlist).isotope({	
  				itemSelector: 'li',
  				layoutMode: 'fitRows',
				getSortData: {
    					name: '.name',
					votes: '.votesBadgeUp parseInt',
				}
			});
			jQuery(filterlist).isotope( 'on', 'layoutComplete', function( isoInstance, laidOutItems ) {
    				if ( laidOutItems.length == 0 ) { jQuery('.alert-box').fadeIn('slow'); } 
 			});

			jQuery( '#areas, #types' ).on( 'click', 'button', function( event ) {
      				if ( jQuery( this ).hasClass( 'active' ) ) { return; }
				if( jQuery('.alert-box').is(":visible")) {
					jQuery('.alert-box').fadeOut('fast');
				}
      
      				var optionSet = jQuery( this ).parents('.button-group');
      				optionSet.find('.active').removeClass('active');
      				jQuery(this).addClass('active');
      
				var filters = [];
				jQuery( '#areas .active, #types .active' ).each(function() {
					filters.push(jQuery(this).attr('data-filter'));
				});
				filtr = filters.join('');
  				jQuery(filterlist).isotope({ filter: filtr });
			});
			jQuery('#sorts').on( 'click', 'button', function() {
				if ( !jQuery( this ).hasClass( 'active' ) ) {
					jQuery(' #sorts .active .direction').removeClass('fi-arrow-up fi-arrow-down');
					jQuery(' #sorts .active ').removeClass('active');
      					jQuery(this).addClass('active');
				}

  				var sorter    = jQuery(this).attr('data-sort-by');
				var sorterAsc = jQuery(this).attr('data-sort-asc');
				if(sorterAsc == 'false') {
					sorterAsc = false;
					jQuery(this).find('.direction').addClass('fi-arrow-down').removeClass('fi-arrow-up');
					jQuery(this).attr('data-sort-asc','true');
				} else {
					sorterAsc = true;
					jQuery(this).find('.direction').addClass('fi-arrow-up').removeClass('fi-arrow-down');
					jQuery(this).attr('data-sort-asc','false');
				}
  				jQuery(filterlist).isotope({ sortBy: sorter, sortAscending: sorterAsc });
			});
		</script>

	<?php endif; // end have_posts() check ?>

	<div class="text-center">
		<a class="button" href="/resources/world-map/">Switch to Map View</a> 
		<a class="button" href="/submit/content/?type=locations">Submit a Location</a>
	</div>  <!-- .text-center -->
</article>  <!-- .small-12.large-12.columns -->
		
<?php get_footer(); ?>