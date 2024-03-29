<?php
/**
 * The template for displaying Archive pages
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

<article id="post-<?php the_ID(); ?>" class="large-12 columns" role="main">
	
	<?php if( is_author() ):
		get_template_part( 'accounts/user', 'archives' );
	else: 
		get_template_part( 'archive', 'general');
	endif; ?>

</article>  <!-- .large-12.columns -->

<?php get_footer(); ?>