<?php 
	global $current_user, $user_identity;
	get_template_part( 'accounts/user', 'nav' ); 
?>

<h1 class="entry-title"><?php echo $user_identity; ?>'s Submissions</h1>
<hr>

<div class="entry-content">
<?php 
	$userHasContent = false;
	$showTypes = array( 'artifacts', 'encounters', 'cyphers', 'descriptors', 'equipment', 'foci', 'locations', 'mutations', 'oddities' );
	tnw_list_user_content($showTypes); 
?>
</div>  <!-- .entry-content -->