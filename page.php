<?php 
/*
Template Name: Full Width Page Template
*/ 

get_header(); ?>

	<article id="post-<?php the_ID(); ?>" class="large-12 columns" role="main">

<?php 
if ( have_posts() ) : while ( have_posts() ): 
	the_post();

	if(is_page( 'My Favorites' )):
		get_template_part( 'accounts/user', 'favorites' );
	elseif(is_page( 'My Submissions' )):
		get_template_part( 'accounts/user', 'submissions' );
	elseif(is_page( 'World Map' )):
		get_template_part( 'partials', 'map');
	else: ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
			
		<hr>
			
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	<?php endif;
endwhile; endif;
?>

	</article>  <!-- #post-<?php the_ID(); ?>.large-12.columns  -->

<?php get_footer(); ?>