<?php get_header(); ?>

<!-- Row for main content area -->
	<article class="small-12 large-12 columns" role="main">
		<h1 class="entry-title">Mutations Archive</h1>
		
		<hr>

		<div id="filter-bar" class="row">
			<div class="small-12 columns text-center">
				<ul id="types" class="button-group round">
					<li><label class="tiny button disabled">Types</label></li>
					<li><button data-filter="*" class="active tiny button secondary">all</button></li>
  					<li><button data-filter=".Powerful" class="tiny button secondary">powerful</button></li>
  					<li><button data-filter=".Beneficial" class="tiny button secondary">beneficial</button></li>
					<li><button data-filter=".Harmful" class="tiny button secondary">harmful</button></li>
					<li><button data-filter=".Distinctive" class="tiny button secondary">distinctive</button></li>
				</ul>	
				<ul id="sorts" class="button-group round">
					<li><label class="tiny button disabled">sort</label></li>
  					<li><button data-sort-by="name" data-sort-asc="false" class="active tiny button secondary">name <span class="direction fi-arrow-up"></span></button></li>
  					<li><button data-sort-by="votes" data-sort-asc="false" class="tiny button secondary">votes <span class="direction"></span></button></li>
				</ul>
			</div>
		</div>
		
	<?php if ( have_posts() ) : ?>

		<ul id="filter-list" class="rated-item-list col-2">
		<?php /* Start the Loop */ ?>
		<?php query_posts($query_string . '&orderby=title&order=ASC&posts_per_page=-1'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
					<li class="<?php echo get_post_meta( get_the_ID(), 'mutation_type', true); ?>"><?php if(function_exists('thumbs_rating_show_up_votes')) { ?><span class="votesBadgeUp"><?php echo thumbs_rating_show_up_votes(); ?></span><?php } ?><?php if(function_exists('thumbs_rating_show_down_votes')) { ?><span class="votesBadgeDown"><?php echo thumbs_rating_show_down_votes(); ?></span><?php } ?><a class="name" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php if(tnw_is_new_content()): ?><span title="Newly posted!" class="new-content-icon fi-burst-new"></span><?php endif; ?></li>
		<?php endwhile; ?>
		</ul>

		<script>
			var filterlist = jQuery('#filter-list');
			jQuery(filterlist).isotope({	
  				itemSelector: 'li',
  				layoutMode: 'fitRows',
				getSortData: {
    					name: '.name',
					votes: '.votesBadgeUp parseInt',
				}
			});
			jQuery('#types').on( 'click', 'button', function( event ) {
				if ( jQuery( this ).hasClass( 'active' ) ) { return; }
				var optionSet = jQuery( this ).parents('.button-group');
      				optionSet.find('.active').removeClass('active');
      				jQuery(this).addClass('active');

  				var filtr = jQuery(this).attr('data-filter');
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
			
	<?php else :
		get_template_part( 'content', 'none' );	
	endif; // end have_posts() check ?>

	<div class="text-center">
		<a class="button" href="/submit/content/?type=mutations">Submit a Mutation</a>
	</div>  <!-- .text-center -->
</article>  <!-- .small-12.large-12.columns -->
		
<?php get_footer(); ?>