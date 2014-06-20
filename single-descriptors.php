<?php get_header(); ?>
<?php if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_content', 'sharing_display', 19 ); ?>
<?php if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_excerpt', 'sharing_display', 19 ); ?>

<!-- Row for main content area -->
	<div class="small-12 large-12 columns" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1 class="entry-title"><?php the_title(); ?> : Descriptor</h1>
			<p id="byline">Published <?php the_date(); ?> by <?php the_author_posts_link(); ?></p>
			
			<hr>
			
			<div class="entry-content">
				<?php 
				get_template_part( 'partials', 'toolbox' ); 
				
				the_content(); 

				$post_id     = get_the_ID();
				$theBenefits = get_post_meta($post_id,'benefits',true);
				$theLinks    = get_post_meta($post_id,'initial_links',true);
				$theNotes    = get_post_meta($post_id,'notes',true);

				if(!empty($theBenefits)): 
					echo "<p>You gain the following benefits:</p>";
					echo $theBenefits;
				endif;

				if(!empty($theLinks)): 
					echo "<p><strong>Initial Link to the Starting Adventure:</strong> From the following list of options, choose how you became involved in the first adventure.</p>";
					echo $theLinks;
				endif;

				if( !empty( $theNotes ) ): 
					echo '<div class="panel callout">';
					echo $theNotes;
					echo '</div>  <!-- .panel.callout -->';
				endif;

				if ( function_exists( 'sharing_display' ) ) echo sharing_display();
				?>
			</div>  <!-- .entry-content -->
			
			<p><?php the_tags(); ?></p>
			
			<section id="comments">
			<?php comments_template(); ?>
			</section>
		</article>
	<?php endwhile; // End the loop ?>

	</div>  <!-- .small-12.large-12.columns  -->
		
<?php get_footer(); ?>