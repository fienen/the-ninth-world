<?php
$upVotes   = get_post_meta( get_the_ID(), '_thumbs_rating_up', true );
$downVotes = get_post_meta( get_the_ID(), '_thumbs_rating_down', true );
if( empty( $upVotes ) ):
	$upVotes = 0;
endif;
if( empty( $downVotes ) ):
	$downVotes = 0;
endif;
$votePercent = 0;
if( $upVotes > 0 || $downVotes > 0 ):
	$voteWeight  = 100 * ( $upVotes / ( $upVotes + $downVotes ) );
	$votePercent = round( $voteWeight, 2 );
endif;
?>

<div id="toolbox" class="hide-for-print">
	<?php tnw_edit_content(get_post_type(),get_the_ID()); ?>
	<?php if (is_user_logged_in() && function_exists('wpfp_link')) { wpfp_link(); } else { ?>
        <a class="button expand" href="/wp-login.php" title="Login to Add to Favorites" onclick="ga('send', 'event', 'Toolbox', 'click', 'Login to Favorite');">Login to Favorite</a>
        <?php } ?>
	<?=function_exists('thumbs_rating_getlink') ? thumbs_rating_getlink() : ''?>

<?php if( $upVotes > 0 || $downVotes > 0 ): ?>
	<div class="round progress success voteBar">
		<div class="meter" style="width:<?php echo $votePercent; ?>%"></div>
	</div>  <!-- .round.progress.success.voteBar -->
<?php endif; ?>
</div>  <!-- #toolbox -->