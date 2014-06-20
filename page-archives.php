<?php
/**
 * The template for displaying Archive pages
 *
 * Template Name: Archives
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage TheNinthWorld
 * @since The Ninth World 1.0
 */

get_header(); ?>

	<article class="large-12 columns" role="main">
	
	<?php if ( have_posts() ) : ?>
		<h1 class="entry-title">Site Archives</h1>
		
		<hr>
<div class="row">	
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
  <div class="large-6 columns">
		<h2>Archives by Month:</h2>
		<ul>
			<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
		</ul>
		</div>  <!-- .large-6.columns -->
  <div class="large-6 columns">
		<h2>Archives by Subject:</h2>
		<ul>
			 <?php wp_list_categories('show_count=1&title_li='); ?>
		</ul>
</div>  <!-- .large-6.columns -->
		<?php endwhile; ?>
</div>  <!-- .row -->		
	<?php endif; // end have_posts() check ?>
	
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

	</article>  <!-- .large-12.columns -->

<?php get_footer(); ?>