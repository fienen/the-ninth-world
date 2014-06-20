<?php get_header(); ?>

<?php if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_content', 'sharing_display', 19 ); ?>
<?php if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_excerpt', 'sharing_display', 19 ); ?>
<!-- Row for main content area -->
	<div class="small-12 large-12 columns" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1 class="entry-title"><?php the_title(); ?> : Cypher</h1>
			<p id="byline">Published <?php the_date(); ?> by <?php the_author_posts_link(); ?></p>
			
			<hr>
			
			<div class="entry-content">
				<?php get_template_part( 'partials', 'toolbox' ); ?>
				
				<?php if($post->post_content != "") { ?>
				<h2>Description</h2>
				<?php the_content(); 
				} ?>
				
				<h2>Details</h2>
				<dl id="itemDetails">
					<?php 
					$post_id     = get_the_ID(); 
					$theLevel    = get_post_meta($post_id,'level',true);
					$theInternal = get_post_meta($post_id,'internal',true);
					$theWearable = get_post_meta($post_id,'wearable',true);
					$theUsable   = get_post_meta($post_id,'usable',true);
					$theEffect   = apply_filters( 'the_content', get_post_meta( $post_id,'effect', true ) );
					$theType     = get_post_meta($post_id,'kind',true);
					?>
					<?php if(isset($theLevel) && strlen($theLevel) > 0) { ?>
					<dt>Level:</dt>
					<dd><?php echo $theLevel; ?></dd>
					<?php }
					if(isset($theType) && strlen($theType) > 0) { ?>
					<dt>Type:</dt>
					<dd><?php echo $theType; ?></dd>
					<?php }
					if(isset($theInternal) && strlen($theInternal) > 0) { ?>
					<dt>Internal:</dt>
					<dd><?php echo $theInternal; ?></dd>
					<?php }
					if(isset($theWearable) && strlen($theWearable) > 0) { ?>
					<dt>Wearable:</dt>
					<dd><?php echo $theWearable; ?></dd>
					<?php }
					if(isset($theUsable) && strlen($theUsable) > 0) { ?>
					<dt>Usable:</dt>
					<dd><?php echo $theUsable; ?></dd>
					<?php }
					if(isset($theEffect) && strlen($theEffect) > 0) { ?>
					<dt>Effect:</dt>
					<dd><?php echo $theEffect; ?></dd>
					<?php } ?>
				</dl>
				
				<?php if ( function_exists( 'sharing_display' ) ) echo sharing_display(); ?>
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