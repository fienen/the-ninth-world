<?php
require_once('includes/data/post-types.php');
require_once('includes/data/meta-boxes.php');

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
   wp_mail( $contacts , "[The Ninth World] Content Submitted", 'New content has been submitted to the site.<dl><dt><strong>Title:</strong></dt><dd>'.$post->post_title.'</dd><dt><strong>Type:</strong></dt><dd>'.$post->post_type.'</dd><dt><strong>Submitted By:</strong></dt><dd>'.get_the_author_meta( 'display_name', $post->post_author ).'</dd><dt><strong>Saved At:</strong></dt><dd>'.$post->post_date.'</dd><dt><strong>Review Link</strong></dt><dd><a href="http://theninthworld.com/wp-admin/post.php?post='.$post->ID.'&action=edit">http://theninthworld.com/wp-admin/post.php?post='.$post->ID.'&action=edit</a></dd></dl>' );
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
