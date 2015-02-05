<?php get_header(); ?>
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class(array('large-12','columns')) ?> id="post-<?php the_ID(); ?>" role="main">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<p id="byline">Published <?php the_date(); ?> by <?php the_author_posts_link(); ?> in <?php the_category(', ') ?></p>
			
			<hr>
			
			<div class="entry-content">
				<?php get_template_part( 'partials', 'toolbox' ); ?>
				<?php the_content(); ?>
			</div>
			
			<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
			<p class="meta-tags"><?php the_tags(); ?></p>
			
			<section id="comments">
				<?php comments_template(); ?>
			</section>
		</article>
	<?php endwhile; // End the loop ?>
<?php get_footer(); ?>