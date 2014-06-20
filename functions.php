<?php
/***********************
 Set up various sidebars
 ***********************/
register_sidebar(array('name'=> 'Footer - Left',
	'before_widget' => '<section id="%1$s" class="panel widget %2$s">',
	'after_widget' => '</section>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

register_sidebar(array('name'=> 'Footer - Right',
	'before_widget' => '<section id="%1$s" class="panel widget %2$s">',
	'after_widget' => '</section>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

/*************************************
 Custom Shortcodes
 *************************************/

function tnw_shortcode_bookreference ( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'book' => 'Corebook',
		'page' => '*check index*'
	), $atts ) );
	return '<span data-tooltip class="has-tip tip-top" title="' . $book . ': pg. ' . $page . '">' . $content . '</span>';
}
add_shortcode( 'bookreference', 'tnw_shortcode_bookreference' );

function namespace_add_custom_types( $query ) {
  if( is_author() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'artifacts', 'encounters', 'cyphers', 'descriptors', 'equipment', 'foci', 'locations', 'mutations', 'oddities'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

/*************************
 Modified Plugin Functions
 *************************/

function tnw_wpfp_remove_favorite_link($post_id) {
    if (wpfp_is_user_can_edit()) {
        $wpfp_options = wpfp_get_options();
        $class = 'wpfp-link remove-parent';
        $link = "<a id='rem_$post_id' class='$class fi-x-circle' href='?wpfpaction=remove&amp;page=1&amp;postid=". $post_id ."' title='".wpfp_get_option('rem')."' rel='nofollow'></a>";
        $link = apply_filters( 'wpfp_remove_favorite_link', $link );
        echo $link;
    }
}

/***********************
 Site Specific Functions
 ***********************/

// Email me when someone submits content
function set_html_content_type() {
	return 'text/html';
}
function submission_alert( $post ) {
   $contacts = 'fienen@gmail.com';
   add_filter( 'wp_mail_content_type', 'set_html_content_type' );
   wp_mail( $contacts , "[The Ninth World] Content Submitted", 'New content has been submitted to the site.<dl><dt><strong>Title:</strong></dt><dd>'.$post->post_title.'</dd><dt><strong>Type:</strong></dt><dd>'.$post->post_type.'</dd><dt><strong>Submitted By:</strong></dt><dd>'.get_the_author_meta( 'display_name', $post->post_author ).'</dd><dt><strong>Saved At:</strong></dt><dd>'.$post->post_date.'</dd></dl>' );
   remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
}
add_action( 'new_to_draft', 'submission_alert' );

function the_download_thumbnail_caption() {
  global $dlm_download;

  $thumbnail_id    = get_post_thumbnail_id($dlm_download->id);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0]) && !empty($thumbnail_image[0]->post_excerpt)) {
    echo '<figcaption>'.$thumbnail_image[0]->post_excerpt.'</figcaption>';
  }
}

function tnw_edit_content($thePodType,$theContentID) {
	global $current_user;
    	get_currentuserinfo();
	
	if( is_user_logged_in() ):
		$author_id = get_the_author_meta('ID');
		if($author_id == $current_user->ID):
			echo '<a href="/submit/content/?type='.$thePodType.'&id='.$theContentID.'" class="button expand" onclick="ga(\'send\', \'event\', \'Toolbox\', \'click\', \'Edit Content\');">Edit Content</a>';
		endif;
	endif;
}

function tnw_is_new_content() {
	$today = new DateTime( date( 'Y-m-d' ) );
	$postdate = new DateTime( get_the_date( 'Y-m-d' ) );
	if( $today->diff($postdate)->days < 8 ):
		$is_new = true;
	else:
		$is_new = false;
	endif;
	return $is_new;
}

function tnw_list_user_content( $thePodTypes ) {
	// WHO'S SHIT SHOULD WE LOOK FOR?
	if( is_author() ):
		global $userHasContent;
		$queryID        = get_the_author_meta('ID');
	else:
		global $user_ID;
		$queryID        = $user_ID;
		$userHasContent = false;
	endif;

	// LET'S LOOP THE HELL OUTTA THIS SHIT
	foreach( $thePodTypes as $thePodType ):
		// ODD SHIT NEEDS TO GET ITS SHIT STRAIGHT
		switch($thePodType):
			case 'oddities':
				$theSort = 'post_content';
				break;
			default:
				$theSort = 'post_title';
		endswitch;
		// QUERY VARS FOR PULLING THAT SHIT OUT
		$theParams = array( 
			'orderby' => 't.' . $theSort . ' ASC',
			'limit'   => -1,  
			'where'   => 't.post_author = ' . $queryID
		);

		// GO GET THAT SHIT ALREADY
		$thePodResults = pods( $thePodType, $theParams );

		// ANY SHITS TO SHOW?
		if( $thePodResults->total_found() > 0 ):
			// TURN OFF THAT NO CONTENT ALERT BULLSHIT
			$userHasContent = true;

			// START SPITTING THE SHITS OUT
			echo '<section class="submission-type">
	<h2>' . $thePodResults->pod_data[ 'label' ] . '</h2>';
			while ( $thePodResults->fetch() ):
				// HOW GOOD IS THIS SHIT?
				$upVotes   = get_post_meta( $thePodResults->id(), '_thumbs_rating_up', true );
				$downVotes = get_post_meta( $thePodResults->id(), '_thumbs_rating_down', true );
				if( empty( $upVotes ) ):
					$upVotes = 0;
				endif;
				if( empty( $downVotes ) ):
					$downVotes = 0;
				endif;
				
				// IS THIS SHIT ODD?
				switch( $thePodType ):
					case 'oddities':
						$theItemTitle = $thePodResults->field( 'post_content' );
						// IS THIS SHIT LONG AS HELL?
						if( strlen( $theItemTitle ) > 140 ):
							$theItemTitle = wordwrap( $theItemTitle, 137 );
							$theItemTitle = substr( $theItemTitle, 0, strpos( $theItemTitle, "\n" ) ) . '...';
						endif;
						break;
					default:
						$theItemTitle = $thePodResults->field( 'post_title' );
				endswitch;

				// PREACH THAT SHIT BROTHER, PREACH IT
				if( !is_author() ):
					$editLink = '<a class="fi-page-edit" href="/submit/content/?type=' . $thePodType . '&id=' . $thePodResults->id() . '"></a> ';
				endif;
				echo '<div class="userContentItem">' . $editLink . '<a data-tooltip class="has-tip tip-top fi-heart" title="Ratings: +' . $upVotes . ', -' . $downVotes . '"></a> <a href="'.$thePodResults->field( 'permalink' ).'">' . $theItemTitle . '</a>
		</div>  <!-- .userContentItem -->'; 
			endwhile;

			echo '</section>  <!-- .submission-type -->';
		endif;
	endforeach;

	if(!$userHasContent): 
		if( is_author() ):
			echo '<div data-alert class="alert-box alert">Sorry, this user doesn\'t appear to have submitted any content yet.</div>' ;
		else:
			echo '<div data-alert class="alert-box alert">Sorry, you don\'t appear to have submitted any content yet. You should definitely <a href="/submit/">fix that</a>.</div>' ;
		endif;
	endif;
}

function tnw_list_equipment( $theType ) {
	// PRINT THIS SHIT'S HEADER
	$anchor = strtolower( str_replace ( ' ' , '-' , $theType ) );
	echo '<tr><td colspan="4"><h3><a name="' . $anchor . '"></a>' . $theType . '</h3></td></tr>';

	// WHAT SHIT DO WE NEED?
	$params = array( 
		'orderby' => 't.post_title ASC',  
        'where'   => 'equipment_type.name = "' . $theType . '"', 
        'limit'   => -1  
    ); 

	// FETCH ME SOME SHIT
    $equipment = pods( 'equipment', $params ); 

    // DO WE HAVE SOME SHIT TO DEAL WITH?
    if ( 0 < $equipment->total() ):
    	// THEN DEAL WITH THAT SHIT ALREADY 
        while ( $equipment->fetch() ): 
        	// LET'S LINK THIS SHIT UP
        	$theTitle = $equipment->field('post_title');
        	if($equipment->field('post_content') != ''):
        		$theTitle = '<a href="' . $equipment->field('permalink') . '">' . $theTitle . '</a>';
        	endif;

        	// SPIT THAT SHIT OUT
		    echo '<tr>
		      <td><strong>' . $theTitle . '</strong></td>
		      <td>' . $equipment->display('price') . ' Shins</td>
		      <td>' . $equipment->display('item_rarity') . '</td>
		      <td>' . $equipment->display('notes') . '</td>
		    </tr>';
		endwhile;
	endif;
}
?>