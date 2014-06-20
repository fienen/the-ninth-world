<?php get_header(); ?>

<?php if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_content', 'sharing_display', 19 ); ?>
<?php if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_excerpt', 'sharing_display', 19 ); ?>
<!-- Row for main content area -->
	<div class="small-12 large-12 columns" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1 class="entry-title"><?php the_title(); ?> : Artifact</h1>
			<p id="byline">Published <?php the_date(); ?> by <?php the_author_posts_link(); ?></p>
			
			<hr>
			
			<div class="entry-content">
				<?php get_template_part( 'partials', 'toolbox' ); ?>

				<?php if($post->post_content != "") { ?>
				<h2>Description</h2>
				<?php the_content(); 
				} ?>
				
				<h2>Details</h2>
				<dl class="detail-list">
					<?php 
					$post_id      = get_the_ID(); 
					$theLevel     = get_post_meta($post_id,'level',true);
					$theForm      = get_post_meta($post_id,'form',true);
					$theDepletion = get_post_meta($post_id,'depletion',true);
					$theEffect    = apply_filters( 'the_content', get_post_meta($post_id,'effect',true) );
					?>
					<?php if(isset($theLevel)) { ?>
					<dt>Level:</dt>
					<dd>
<?php if( has_post_thumbnail() ): ?>
				<figure class="panel main-image right">
					<?php the_post_thumbnail( 'medium' ); ?>
					<figcaption><?php the_title(); ?></figcaption>
				</figure>
				<?php endif; ?>
<?php echo $theLevel; ?></dd>
					<?php }
					if(isset($theForm)) { ?>
					<dt>Form:</dt>
					<dd><?php echo $theForm; ?></dd>
					<?php }
					if(isset($theDepletion)) { ?>
					<dt>Depletion:</dt>
					<dd><?php echo $theDepletion; ?></dd>
					<?php }
					if(isset($theEffect)) { ?>
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