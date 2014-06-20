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

<?php 
	$post_id         = get_the_ID(); 
	$theConnection   = get_post_meta($post_id,'connection',true);
	$theEquipment    = get_post_meta($post_id,'additional_equipment',true);
	$theEsoteries    = apply_filters( 'the_content', get_post_meta($post_id,'esoteries',true) );
	$theMinorEffects = get_post_meta($post_id,'minor_effect_suggestions',true);
	$theMajorEffects = get_post_meta($post_id,'major_effect_suggestions',true);
	$theGM           = get_post_meta($post_id,'gm_intrusion',true);
	$theTier1        = apply_filters( 'the_content', get_post_meta($post_id,'tier_1',true) );
	$theTier2        = apply_filters( 'the_content', get_post_meta($post_id,'tier_2',true) );
	$theTier3        = apply_filters( 'the_content', get_post_meta($post_id,'tier_3',true) );
	$theTier4        = apply_filters( 'the_content', get_post_meta($post_id,'tier_4',true) );
	$theTier5        = apply_filters( 'the_content', get_post_meta($post_id,'tier_5',true) );
	$theTier6        = apply_filters( 'the_content', get_post_meta($post_id,'tier_6',true) );
?>			
			<div class="entry-content">
				<?php get_template_part( 'partials', 'toolbox' ); ?>
				
				<?php if($post->post_content != "") { ?>
				<h2>Description</h2>
				<?php the_content(); 
				} ?>
				
				<h2>Details</h2>
				
				<?php if(!empty($theGM)) { ?>
				<div class="intrusion gm-intrusion right">
					<p><strong>GM Intrusion:</strong> <?php echo $theGM; ?></p>
				</div>  <!-- .itemIntrusion -->
				<?php } ?>

				<dl class="detail-list">
					<?php if(!empty($theConnection)) { ?>
					<dt>Connection:</dt>
					<dd><?php echo $theConnection; ?></dd>
					<?php }
					if(!empty($theEquipment)) { ?>
					<dt>Additional Equipment:</dt>
					<dd><?php echo $theEquipment; ?></dd>
					<?php }
					if(!empty($theEsoteries)) { ?>
					<dt>Esotery Effects:</dt>
					<dd><?php echo $theEsoteries; ?></dd>
					<?php }
					if(!empty($theMinorEffects)) { ?>
					<dt>Minor Effect Suggestions:</dt>
					<dd><?php echo $theMinorEffects; ?></dd>
					<?php } 
					if(!empty($theMajorEffects)) { ?>
					<dt>Major Effect Suggestions:</dt>
					<dd><?php echo $theMajorEffects; ?></dd>
					<?php } 
					if(!empty($theTier1)) { ?>
					<dt>Tier 1:</dt>
					<dd><?php echo $theTier1; ?></dd>
					<?php } 
					if(!empty($theTier2)) { ?>
					<dt>Tier 2:</dt>
					<dd><?php echo $theTier2; ?></dd>
					<?php } 
					if(!empty($theTier3)) { ?>
					<dt>Tier 3:</dt>
					<dd><?php echo $theTier3; ?></dd>
					<?php } 
					if(!empty($theTier4)) { ?>
					<dt>Tier 4:</dt>
					<dd><?php echo $theTier4; ?></dd>
					<?php } 
					if(!empty($theTier5)) { ?>
					<dt>Tier 5:</dt>
					<dd><?php echo $theTier5; ?></dd>
					<?php } 
					if(!empty($theTier6)) { ?>
					<dt>Tier 6:</dt>
					<dd><?php echo $theTier6; ?></dd>
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