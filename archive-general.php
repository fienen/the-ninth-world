	<?php if ( have_posts() ) : ?>
		<h1 class="entry-title"> 
			<?php if(is_category()) {
				single_cat_title();
			} ?>
		Archives</h1>
		
		<hr>	
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

		<div class="post-blurb">
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<h3>Posted by <?php the_author_posts_link(); ?></h3>
			<div class="postExcerpt">
				<?php the_excerpt(); ?>
			</div>  <!-- .postExcerpt -->
		</div>
		<?php endwhile; ?>
		
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		
	<?php endif; // end have_posts() check ?>
	
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>