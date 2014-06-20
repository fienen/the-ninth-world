<?php get_header(); ?>

<?php if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_content', 'sharing_display', 19 ); ?>
<?php if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_excerpt', 'sharing_display', 19 ); ?>
<!-- Row for main content area -->
	<div class="small-12 large-12 columns" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1 class="entry-title"><?php the_title(); ?></h1>
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
					$post_id   = get_the_ID(); 
					$thePrice  = get_post_meta($post_id,'price',true);
					$theRarity = get_post_meta($post_id,'item_rarity',true);
					$theNotes  = get_post_meta($post_id,'notes',true);
					?>
					<?php if(isset($thePrice)) { ?>
					<dt>Price:</dt>
					<dd><?php echo $thePrice; ?> Shin(s)</dd>
					<?php }
					if(isset($theRarity)) { ?>
					<dt>Rarity:</dt>
					<dd><?php echo $theRarity; ?></dd>
					<?php }
					if(isset($theNotes)) { ?>
					<dt>Additional Notes:</dt>
					<dd><?php echo $theNotes; ?></dd>
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