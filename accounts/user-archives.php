<?php 
	global $author;
	$author = get_userdata( get_query_var('author') );

	get_template_part( 'accounts/user', 'nav' ); 
?>

<h1 class="entry-title"><?php echo get_the_author(); ?>'s Submissions</h1>
<hr>

<div class="entry-content">
<?php
	if ( have_posts() ) :
		$showTypes = array( 'post', 'artifacts', 'encounters', 'cyphers', 'descriptors', 'foci', 'locations', 'mutations', 'oddities' );
?>
	<section class="submission-type">
<?php
		foreach($showTypes as $post_type):
			query_posts(array('post_type' => $post_type, 'post_author' => the_author_meta('ID'), 'order' => 'ASC', 'orderby' => 'title', 'posts_per_page' => -1));
			if ( have_posts() ) : 
				$post_type_obj = get_post_type_object( $post_type ); ?>
	<h2><?php echo $post_type_obj->labels->name; ?></h2>
	<ul>
				<?php while ( have_posts() ) : the_post(); ?>
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php 
				endwhile;
			endif; 
		?>
	</ul>
		<?php endforeach;
?>
				
	</section>  <!-- .submission-type -->
<?php
	endif;
?>
</div>  <!-- .entry-content -->