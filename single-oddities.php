<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-12 columns" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1 class="entry-title">You've Discovered an Oddity</h1>
			<p id="byline">Published <?php the_date(); ?> by <?php the_author_posts_link(); ?></p>
			
			<hr>
			
			<div class="entry-content">
				<?php get_template_part( 'partials', 'toolbox' ); ?>
				<?php the_content(); ?>
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