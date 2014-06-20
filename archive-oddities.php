<?php get_header(); ?>

<!-- Row for main content area -->
	<article class="small-12 large-12 columns" role="main">
		<h1 class="entry-title">Oddity Archive</h1>
		
		<hr>
		
	<?php if ( have_posts() ) : ?>
	<?php $args=array('post_type'=>'oddities', 'orderby'=>'rand', 'posts_per_page'=>'1');
	$oddity=new WP_Query($args);
	while ($oddity->have_posts()) : $oddity->the_post(); ?>
    <a id="randomItem" class="button right" href="<?php the_permalink() ?>">Random Oddity</a>
    <?php endwhile;
	wp_reset_postdata(); ?>
	
		<ul class="ratedItemList">
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<li><?php if(function_exists('thumbs_rating_show_up_votes')) { ?><span class="votesBadgeUp"><?php echo thumbs_rating_show_up_votes(); ?></span><?php } ?><?php if(function_exists('thumbs_rating_show_down_votes')) { ?><span class="votesBadgeDown"><?php echo thumbs_rating_show_down_votes(); ?></span><?php } ?><a href="<?php the_permalink(); ?>"><?php echo get_the_content(); ?></a> <?php if(tnw_is_new_content()): ?><span title="Newly posted!" class="new-content-icon fi-burst-new"></span><?php endif; ?></li>
		<?php endwhile; ?>
		</ul>

	<?php else :
		get_template_part( 'content', 'none' );	
	endif; // end have_posts() check ?>
	
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
	</article>  <!-- .small-12.large-12.columns -->
		
<?php get_footer(); ?>