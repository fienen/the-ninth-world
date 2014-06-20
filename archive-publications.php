<?php get_header(); ?>

<!-- Row for main content area -->
	<article class="small-12 large-12 columns" role="main">
		<h1 class="entry-title">Community Publications</h1>
		
		<hr>
		
		<p>The following items are the result of the hard work and contributions of the people in the Numenera community. Most of these items are created and released under the Numenera Fan Use Policy or the Limited License, and aren't official source materal created by Monte Cook Games. However, it's through their efforts that the world is made that much more rich by releasing these supplements. Be sure to check them out, and drop the authors a couple bucks if you like the content (especially the free stuff) so that we see more in the future.</p>

		<p>Know of a user publication not listed here? <a href="http://theninthworld.com/contact/">Tell us about it</a>!</p>

	<?php if ( have_posts() ) : ?>
		<?php /* Start the Loop */ ?>
		<?php query_posts($query_string . '&orderby=title&order=ASC&posts_per_page=-1'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="row library-entry">
		<?php 
			$post_id         = get_the_ID(); 
			$theAuthors      = get_post_meta($post_id,'authors',true);
			$theLink         = get_post_meta($post_id,'link',true);
			$theAvailability = get_post_meta($post_id,'availability',true);
			$titleString     = get_the_title();
			if( !empty( $theLink ) ) :
				$titleString = '<a href="' . $theLink . '" onclick="_gaq.push([\'_trackEvent\', \'Publications\', \'click\', \'' . $titleString . '\']);">' . $titleString . '</a>';
			endif;
			if( $theAvailability == 'soon' ) :
				$titleString = $titleString . ' <span class="comingSoon">(Coming Soon!)</span>';
			endif;
		?>		
			<div class="large-3 small-4 columns">	
		<?php if( has_post_thumbnail() ) :
			echo '<figure class="panel">';
  			the_post_thumbnail( 'medium' );
  			echo "</figure>  <!-- .panel -->";
  		endif; ?>
			</div>  <!-- .large-3.small-4.columns -->

  			<div class="large-9 small-8 columns">
  				<h2><?php echo $titleString;?></h2>
  				<h3>by <?php echo $theAuthors; ?></h3>
				<?php the_content(); ?>
			</div>  <!-- .large-9.small-8.columns -->
		</div>  <!-- .row.library-entry -->
		<?php endwhile; ?>
	<?php endif; // end have_posts() check ?>

		<hr>

		<p><small><em>Disclaimer: Inclusion of a product in the library does not constitute an endorsement of the product or its author, but rather simply an acknowledgement of its existence. The Ninth World does not claim to be the owner or creator of anything listed here (unless specifically noted on the item). All products are owned by the respective authors.</em></small></p>
	</article>  <!-- .small-12.large-12.columns -->
		
<?php get_footer(); ?>