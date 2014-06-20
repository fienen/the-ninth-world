<?php 
	global $current_user, $user_identity;
	get_template_part( 'accounts/user', 'nav' ); 
?>

<h1 class="entry-title"><?php echo $user_identity; ?>'s Favorites</h1>
<hr>

<div class="entry-content">
<?php 
	$showTypes = array( 'post', 'artifacts', 'encounters', 'cyphers', 'descriptors', 'foci', 'locations', 'mutations', 'oddities' );
	$fav_ids  = wpfp_get_users_favorites();

	if( sizeof($fav_ids) > 0 ):
		foreach($showTypes as $post_type):
			query_posts(array('post_type' => $post_type, 'post__in' => $fav_ids, 'order' => 'ASC', 'orderby' => 'title'));
			if ( have_posts() ) : 
				$post_type_obj = get_post_type_object( $post_type ); ?>
	<h2><?php echo $post_type_obj->labels->name; ?></h2>
	<ul>
				<?php while ( have_posts() ) : the_post(); ?>
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php tnw_wpfp_remove_favorite_link( get_the_ID() ); ?></li>
		<?php 
				endwhile;
			endif; 
		?>
	</ul>
		<?php endforeach;
	else: ?>
	<div data-alert class="alert-box alert">
		Sorry, you don't appear to have favorites yet. Come back once you have used the favorite button on some content.
	</div>
	<?php endif; ?>
</div>  <!-- .entry-content -->