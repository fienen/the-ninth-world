<?php
	if( is_author() ):
		$thisPage = get_the_author() . "'s Submissions";
	else:
		$thisPage = get_the_title();
	endif;
?>
<nav class="breadcrumbs">
	<a href="/"><span class="fi-home"></span> Home</a>
	<a href="/wp-admin/profile.php">My Account</a>
	<a class="current"><?php echo $thisPage; ?></a>
</nav>