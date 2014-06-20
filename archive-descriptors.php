<?php get_header(); ?>

<!-- Row for main content area -->
	<article class="small-12 large-12 columns" role="main">
		<h1 class="entry-title">Descriptor Archive</h1>
		
		<hr>

		<div id="filter-bar" class="row">
			<div class="small-12 columns text-center">
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
			<li><?php if(function_exists('thumbs_rating_show_up_votes')) { ?><span class="votesBadgeUp"><?php echo thumbs_rating_show_up_votes(); ?></span><?php } ?><?php if(function_exists('thumbs_rating_show_down_votes')) { ?><span class="votesBadgeDown"><?php echo thumbs_rating_show_down_votes(); ?></span><?php } ?><a class="name" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php if(tnw_is_new_content()): ?><span title="Newly posted!" class="new-content-icon fi-burst-new"></span><?php endif; ?></li>
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
	
	<!--
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists('reverie_pagination') ) { reverie_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
		</nav>
	<?php } ?>
	-->

		<p class="text-center">
			<a class="button" href="/submit/content/?type=descriptors">Submit an Descriptor</a>
		</p>  <!-- .text-center -->
	</article>  <!-- .small-12.large-12.columns -->
		
<?php get_footer(); ?>