<?php
/**
 * The template for displaying Search Results
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage TheNinthWorld
 * @since The Ninth World 1.0
 */

get_header(); ?>

	<div class="large-12 columns" role="main">
	
	<?php if ( have_posts() ) : ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1 class="entry-title">Results for "<?php echo get_search_query(); ?>"</h1>
		
			<hr>	
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<section class="post-blurb">
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<h3>Posted by <?php the_author_posts_link(); ?></h3>
				<div class="postExcerpt">
					<?php the_excerpt(); ?>
				</div>  <!-- .postExcerpt -->
			</section>
		<?php endwhile; ?>
		</article>
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
		
	<?php endif; // end have_posts() check ?>
	
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

	</div>  <!-- .large-12.columns -->

<?php get_footer(); ?>