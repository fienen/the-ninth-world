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
$post_id        = get_the_ID(); 
$theLevel       = get_post_meta($post_id,'level',true);
$theDifficulty  = $theLevel*3;
$theType        = get_post_meta($post_id,'encounter_type',true);
$theMotive      = get_post_meta($post_id,'motive',true);
$theEnvironment = get_post_meta($post_id,'environment',true);
$theHealth      = get_post_meta($post_id,'health',true);
$theDamage      = get_post_meta($post_id,'damage_inflicted',true);
$theArmor       = get_post_meta($post_id,'armor',true);
$theMovement    = get_post_meta($post_id,'movement',true);
$theMods        = get_post_meta($post_id,'modifications',true);
$theCombat      = apply_filters( 'the_content', get_post_meta( $post_id, 'combat', true) );
$theInteraction = get_post_meta($post_id,'interaction',true);
$theUse         = get_post_meta($post_id,'use',true);
$theLoot        = get_post_meta($post_id,'loot',true);
$theGM          = get_post_meta($post_id,'gm_intrusion',true);
$theNotes       = get_post_meta($post_id,'notes',true);
?>			
			<div class="entry-content">
				<?php get_template_part( 'partials', 'toolbox' ); ?>
				
				<?php if( $post->post_content != "" ): ?>
				<h2>Description</h2>
				<?php the_content(); 
				endif; ?>
				
				<h2>Details</h2>

				<?php if( has_post_thumbnail() ): ?>
				<figure class="panel main-image">
					<?php the_post_thumbnail( 'medium' ); ?>
				</figure>
				<?php endif; ?>

				<?php if( !empty( $theGM ) ): ?>
				<aside class="intrusion intrusion-block">
					<strong>GM Intrusion:</strong> <?php echo $theGM; ?></dd>
				</aside >  <!-- .intrusion.intrusion-block -->
				<?php endif; ?>

				<dl class="detail-list">
					<?php if(!empty($theLevel)) { ?>
					<dt>Level:</dt>
					<dd><?php echo $theLevel; ?> (<?php echo $theDifficulty; ?>)</dd>
					<?php }
					if(!empty($theMotive)) { ?>
					<dt>Motive:</dt>
					<dd><?php echo $theMotive; ?></dd>
					<?php }
					if(!empty($theEnvironment)) { ?>
					<dt>Environment:</dt>
					<dd><?php echo $theEnvironment; ?></dd>
					<?php }
					if(!empty($theHealth)) { ?>
					<dt>Health:</dt>
					<dd><?php echo $theHealth; ?></dd>
					<?php } 
					if(!empty($theDamage)) { ?>
					<dt>Damage:</dt>
					<dd><?php echo $theDamage; ?></dd>
					<?php } 
					if(!empty($theArmor)) { ?>
					<dt>Armor:</dt>
					<dd><?php echo $theArmor; ?></dd>
					<?php } 
					if(!empty($theMovement)) { ?>
					<dt>Movement:</dt>
					<dd><?php echo $theMovement; ?></dd>
					<?php } 
					if(!empty($theMods)) { ?>
					<dt>Modifications:</dt>
					<dd><?php echo $theMods; ?></dd>
					<?php } 
					if(!empty($theCombat)) { ?>
					<dt>Combat:</dt>
					<dd><?php echo $theCombat; ?></dd>
					<?php } 
					if(!empty($theInteraction)) { ?>
					<dt>Interaction:</dt>
					<dd><?php echo $theInteraction; ?></dd>
					<?php } 
					if(!empty($theUse)) { ?>
					<dt>Use:</dt>
					<dd><?php echo $theUse; ?></dd>
					<?php } 
					if(!empty($theLoot)) { ?>
					<dt>Loot:</dt>
					<dd><?php echo $theLoot; ?></dd>
					<?php } ?>
				</dl>  <!-- .detail-list -->

				<?php if( !empty( $theNotes ) ): ?>
				<div class="panel callout hide-for-print">
					<?php echo $theNotes; ?>
				</div>  <!-- .panel.callout.hide-for-print -->
				<?php endif; ?>
				
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