<?php
// Register Artifacts Custom Post Type
function tnw_cpt_artifacts() {
	$labels = array(
		'name'                  => _x( 'Artifacts', 'Post Type General Name', 'the-ninth-world' ),
		'singular_name'         => _x( 'Artifact', 'Post Type Singular Name', 'the-ninth-world' ),
		'menu_name'             => __( 'Artifacts', 'the-ninth-world' ),
		'name_admin_bar'        => __( 'Artifact', 'the-ninth-world' ),
		'archives'              => __( 'Artifact Archives', 'the-ninth-world' ),
		'attributes'            => __( 'Artifact Attributes', 'the-ninth-world' ),
		'parent_item_colon'     => __( 'Parent Artifact:', 'the-ninth-world' ),
		'all_items'             => __( 'All Artifacts', 'the-ninth-world' ),
		'add_new_item'          => __( 'Add New Artifact', 'the-ninth-world' ),
		'add_new'               => __( 'Add New', 'the-ninth-world' ),
		'new_item'              => __( 'New Artifact', 'the-ninth-world' ),
		'edit_item'             => __( 'Edit Artifact', 'the-ninth-world' ),
		'update_item'           => __( 'Update Artifact', 'the-ninth-world' ),
		'view_item'             => __( 'View Artifact', 'the-ninth-world' ),
		'view_items'            => __( 'View Artifacts', 'the-ninth-world' ),
		'search_items'          => __( 'Search Artifact', 'the-ninth-world' ),
		'not_found'             => __( 'Not found', 'the-ninth-world' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'the-ninth-world' ),
		'featured_image'        => __( 'Featured Image', 'the-ninth-world' ),
		'set_featured_image'    => __( 'Set featured image', 'the-ninth-world' ),
		'remove_featured_image' => __( 'Remove featured image', 'the-ninth-world' ),
		'use_featured_image'    => __( 'Use as featured image', 'the-ninth-world' ),
		'insert_into_item'      => __( 'Insert into artifact', 'the-ninth-world' ),
		'uploaded_to_this_item' => __( 'Uploaded to this artifact', 'the-ninth-world' ),
		'items_list'            => __( 'Artifacts list', 'the-ninth-world' ),
		'items_list_navigation' => __( 'Artifacts list navigation', 'the-ninth-world' ),
		'filter_items_list'     => __( 'Filter artifacts list', 'the-ninth-world' ),
	);
	$args = array(
		'label'                 => __( 'Artifact', 'the-ninth-world' ),
		'description'           => __( 'Artifact item types', 'the-ninth-world' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'revisions' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-appearance',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'artifacts', $args );
}
add_action( 'init', 'tnw_cpt_artifacts', 0 );

// Register Cyphers Custom Post Type
function tnw_cpt_cyphers() {
	$labels = array(
		'name'                  => _x( 'Cyphers', 'Post Type General Name', 'the-ninth-world' ),
		'singular_name'         => _x( 'Cypher', 'Post Type Singular Name', 'the-ninth-world' ),
		'menu_name'             => __( 'Cyphers', 'the-ninth-world' ),
		'name_admin_bar'        => __( 'Cypher', 'the-ninth-world' ),
		'archives'              => __( 'Cypher Archives', 'the-ninth-world' ),
		'attributes'            => __( 'Cypher Attributes', 'the-ninth-world' ),
		'parent_item_colon'     => __( 'Parent Cypher:', 'the-ninth-world' ),
		'all_items'             => __( 'All Cyphers', 'the-ninth-world' ),
		'add_new_item'          => __( 'Add New Cypher', 'the-ninth-world' ),
		'add_new'               => __( 'Add New Cypher', 'the-ninth-world' ),
		'new_item'              => __( 'New Cypher', 'the-ninth-world' ),
		'edit_item'             => __( 'Edit Cypher', 'the-ninth-world' ),
		'update_item'           => __( 'Update Cypher', 'the-ninth-world' ),
		'view_item'             => __( 'View Cypher', 'the-ninth-world' ),
		'view_items'            => __( 'View Cyphers', 'the-ninth-world' ),
		'search_items'          => __( 'Search Cypher', 'the-ninth-world' ),
		'not_found'             => __( 'Not found', 'the-ninth-world' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'the-ninth-world' ),
		'featured_image'        => __( 'Featured Image', 'the-ninth-world' ),
		'set_featured_image'    => __( 'Set featured image', 'the-ninth-world' ),
		'remove_featured_image' => __( 'Remove featured image', 'the-ninth-world' ),
		'use_featured_image'    => __( 'Use as featured image', 'the-ninth-world' ),
		'insert_into_item'      => __( 'Insert into Descriptor', 'the-ninth-world' ),
		'uploaded_to_this_item' => __( 'Uploaded to this cypher', 'the-ninth-world' ),
		'items_list'            => __( 'Cyphers list', 'the-ninth-world' ),
		'items_list_navigation' => __( 'Cyphers list navigation', 'the-ninth-world' ),
		'filter_items_list'     => __( 'Filter cyphers list', 'the-ninth-world' ),
	);
	$args = array(
		'label'                 => __( 'Cypher', 'the-ninth-world' ),
		'description'           => __( 'Cypher item types', 'the-ninth-world' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-album',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'cyphers', $args );
}
add_action( 'init', 'tnw_cpt_cyphers', 0 );

// Register Descriptor Post Type
function tnw_cpt_descriptors() {
	$labels = array(
		'name'                  => _x( 'Descriptors', 'Post Type General Name', 'the-ninth-world' ),
		'singular_name'         => _x( 'Descriptor', 'Post Type Singular Name', 'the-ninth-world' ),
		'menu_name'             => __( 'Descriptors', 'the-ninth-world' ),
		'name_admin_bar'        => __( 'Descriptor', 'the-ninth-world' ),
		'archives'              => __( 'Descriptor Archives', 'the-ninth-world' ),
		'attributes'            => __( 'Descriptor Attributes', 'the-ninth-world' ),
		'parent_item_colon'     => __( 'Parent Descriptor:', 'the-ninth-world' ),
		'all_items'             => __( 'All Descriptors', 'the-ninth-world' ),
		'add_new_item'          => __( 'Add New Descriptor', 'the-ninth-world' ),
		'add_new'               => __( 'Add New Descriptor', 'the-ninth-world' ),
		'new_item'              => __( 'New Descriptor', 'the-ninth-world' ),
		'edit_item'             => __( 'Edit Descriptor', 'the-ninth-world' ),
		'update_item'           => __( 'Update Descriptor', 'the-ninth-world' ),
		'view_item'             => __( 'View Descriptor', 'the-ninth-world' ),
		'view_items'            => __( 'View Descriptors', 'the-ninth-world' ),
		'search_items'          => __( 'Search Descriptor', 'the-ninth-world' ),
		'not_found'             => __( 'Not found', 'the-ninth-world' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'the-ninth-world' ),
		'featured_image'        => __( 'Featured Image', 'the-ninth-world' ),
		'set_featured_image'    => __( 'Set featured image', 'the-ninth-world' ),
		'remove_featured_image' => __( 'Remove featured image', 'the-ninth-world' ),
		'use_featured_image'    => __( 'Use as featured image', 'the-ninth-world' ),
		'insert_into_item'      => __( 'Insert into Descriptor', 'the-ninth-world' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Descriptor', 'the-ninth-world' ),
		'items_list'            => __( 'Descriptors list', 'the-ninth-world' ),
		'items_list_navigation' => __( 'Descriptors list navigation', 'the-ninth-world' ),
		'filter_items_list'     => __( 'Filter Descriptors list', 'the-ninth-world' ),
	);
	$args = array(
		'label'                 => __( 'Descriptor', 'the-ninth-world' ),
		'description'           => __( 'Character Descriptor types', 'the-ninth-world' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-id-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'descriptors', $args );
}
add_action( 'init', 'tnw_cpt_descriptors', 0 );

// Register Encounter Post Type
function tnw_cpt_encounters() {
	$labels = array(
		'name'                  => _x( 'Encounters', 'Post Type General Name', 'the-ninth-world' ),
		'singular_name'         => _x( 'Encounter', 'Post Type Singular Name', 'the-ninth-world' ),
		'menu_name'             => __( 'Encounters', 'the-ninth-world' ),
		'name_admin_bar'        => __( 'Encounter', 'the-ninth-world' ),
		'archives'              => __( 'Encounter Archives', 'the-ninth-world' ),
		'attributes'            => __( 'Encounter Attributes', 'the-ninth-world' ),
		'parent_item_colon'     => __( 'Parent Encounter:', 'the-ninth-world' ),
		'all_items'             => __( 'All Encounters', 'the-ninth-world' ),
		'add_new_item'          => __( 'Add New Encounter', 'the-ninth-world' ),
		'add_new'               => __( 'Add New Encounter', 'the-ninth-world' ),
		'new_item'              => __( 'New Encounter', 'the-ninth-world' ),
		'edit_item'             => __( 'Edit Encounter', 'the-ninth-world' ),
		'update_item'           => __( 'Update Encounter', 'the-ninth-world' ),
		'view_item'             => __( 'View Encounter', 'the-ninth-world' ),
		'view_items'            => __( 'View Encounters', 'the-ninth-world' ),
		'search_items'          => __( 'Search Encounter', 'the-ninth-world' ),
		'not_found'             => __( 'Not found', 'the-ninth-world' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'the-ninth-world' ),
		'featured_image'        => __( 'Featured Image', 'the-ninth-world' ),
		'set_featured_image'    => __( 'Set featured image', 'the-ninth-world' ),
		'remove_featured_image' => __( 'Remove featured image', 'the-ninth-world' ),
		'use_featured_image'    => __( 'Use as featured image', 'the-ninth-world' ),
		'insert_into_item'      => __( 'Insert into Encounter', 'the-ninth-world' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Encounter', 'the-ninth-world' ),
		'items_list'            => __( 'Encounters list', 'the-ninth-world' ),
		'items_list_navigation' => __( 'Encounters list navigation', 'the-ninth-world' ),
		'filter_items_list'     => __( 'Filter Encounters list', 'the-ninth-world' ),
	);
	$args = array(
		'label'                 => __( 'Encounter', 'the-ninth-world' ),
		'description'           => __( 'Character Encounter types', 'the-ninth-world' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'encounters', $args );
}
add_action( 'init', 'tnw_cpt_encounters', 0 );

// Register Equipment Post Type
function tnw_cpt_equipment() {
	$labels = array(
		'name'                  => _x( 'Equipment', 'Post Type General Name', 'the-ninth-world' ),
		'singular_name'         => _x( 'Equipment', 'Post Type Singular Name', 'the-ninth-world' ),
		'menu_name'             => __( 'Equipment', 'the-ninth-world' ),
		'name_admin_bar'        => __( 'Equipment', 'the-ninth-world' ),
		'archives'              => __( 'Equipment Archives', 'the-ninth-world' ),
		'attributes'            => __( 'Equipment Attributes', 'the-ninth-world' ),
		'parent_item_colon'     => __( 'Parent Equipment:', 'the-ninth-world' ),
		'all_items'             => __( 'All Equipment', 'the-ninth-world' ),
		'add_new_item'          => __( 'Add New Equipment', 'the-ninth-world' ),
		'add_new'               => __( 'Add New Equipment', 'the-ninth-world' ),
		'new_item'              => __( 'New Equipment', 'the-ninth-world' ),
		'edit_item'             => __( 'Edit Equipment', 'the-ninth-world' ),
		'update_item'           => __( 'Update Equipment', 'the-ninth-world' ),
		'view_item'             => __( 'View Equipment', 'the-ninth-world' ),
		'view_items'            => __( 'View Equipment', 'the-ninth-world' ),
		'search_items'          => __( 'Search Equipment', 'the-ninth-world' ),
		'not_found'             => __( 'Not found', 'the-ninth-world' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'the-ninth-world' ),
		'featured_image'        => __( 'Featured Image', 'the-ninth-world' ),
		'set_featured_image'    => __( 'Set featured image', 'the-ninth-world' ),
		'remove_featured_image' => __( 'Remove featured image', 'the-ninth-world' ),
		'use_featured_image'    => __( 'Use as featured image', 'the-ninth-world' ),
		'insert_into_item'      => __( 'Insert into Equipment', 'the-ninth-world' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Equipment', 'the-ninth-world' ),
		'items_list'            => __( 'Equipment list', 'the-ninth-world' ),
		'items_list_navigation' => __( 'Equipment list navigation', 'the-ninth-world' ),
		'filter_items_list'     => __( 'Filter Equipment list', 'the-ninth-world' ),
	);
	$args = array(
		'label'                 => __( 'Equipment', 'the-ninth-world' ),
		'description'           => __( 'Equipment item types', 'the-ninth-world' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-shield-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'equipment', $args );
}
add_action( 'init', 'tnw_cpt_equipment', 0 );

// Register Foci Post Type
function tnw_cpt_foci() {
	$labels = array(
		'name'                  => _x( 'Foci', 'Post Type General Name', 'the-ninth-world' ),
		'singular_name'         => _x( 'Focus', 'Post Type Singular Name', 'the-ninth-world' ),
		'menu_name'             => __( 'Foci', 'the-ninth-world' ),
		'name_admin_bar'        => __( 'Focus', 'the-ninth-world' ),
		'archives'              => __( 'Focus Archives', 'the-ninth-world' ),
		'attributes'            => __( 'Focus Attributes', 'the-ninth-world' ),
		'parent_item_colon'     => __( 'Parent Focus:', 'the-ninth-world' ),
		'all_items'             => __( 'All Foci', 'the-ninth-world' ),
		'add_new_item'          => __( 'Add New Focus', 'the-ninth-world' ),
		'add_new'               => __( 'Add New Focus', 'the-ninth-world' ),
		'new_item'              => __( 'New Focus', 'the-ninth-world' ),
		'edit_item'             => __( 'Edit Focus', 'the-ninth-world' ),
		'update_item'           => __( 'Update Focus', 'the-ninth-world' ),
		'view_item'             => __( 'View Focus', 'the-ninth-world' ),
		'view_items'            => __( 'View Foci', 'the-ninth-world' ),
		'search_items'          => __( 'Search Focus', 'the-ninth-world' ),
		'not_found'             => __( 'Not found', 'the-ninth-world' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'the-ninth-world' ),
		'featured_image'        => __( 'Featured Image', 'the-ninth-world' ),
		'set_featured_image'    => __( 'Set featured image', 'the-ninth-world' ),
		'remove_featured_image' => __( 'Remove featured image', 'the-ninth-world' ),
		'use_featured_image'    => __( 'Use as featured image', 'the-ninth-world' ),
		'insert_into_item'      => __( 'Insert into Focus', 'the-ninth-world' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Focus', 'the-ninth-world' ),
		'items_list'            => __( 'Foci list', 'the-ninth-world' ),
		'items_list_navigation' => __( 'Foci list navigation', 'the-ninth-world' ),
		'filter_items_list'     => __( 'Filter Foci list', 'the-ninth-world' ),
	);
	$args = array(
		'label'                 => __( 'Focus', 'the-ninth-world' ),
		'description'           => __( 'Character Focus types', 'the-ninth-world' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-id',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'foci', $args );

}
add_action( 'init', 'tnw_cpt_foci', 0 );

// Register Locations Post Type
function tnw_cpt_locations() {
	$labels = array(
		'name'                  => _x( 'Locations', 'Post Type General Name', 'the-ninth-world' ),
		'singular_name'         => _x( 'Location', 'Post Type Singular Name', 'the-ninth-world' ),
		'menu_name'             => __( 'Locations', 'the-ninth-world' ),
		'name_admin_bar'        => __( 'Location', 'the-ninth-world' ),
		'archives'              => __( 'Location Archives', 'the-ninth-world' ),
		'attributes'            => __( 'Location Attributes', 'the-ninth-world' ),
		'parent_item_colon'     => __( 'Parent Location:', 'the-ninth-world' ),
		'all_items'             => __( 'All Locations', 'the-ninth-world' ),
		'add_new_item'          => __( 'Add New Location', 'the-ninth-world' ),
		'add_new'               => __( 'Add New Location', 'the-ninth-world' ),
		'new_item'              => __( 'New Location', 'the-ninth-world' ),
		'edit_item'             => __( 'Edit Location', 'the-ninth-world' ),
		'update_item'           => __( 'Update Location', 'the-ninth-world' ),
		'view_item'             => __( 'View Location', 'the-ninth-world' ),
		'view_items'            => __( 'View Locations', 'the-ninth-world' ),
		'search_items'          => __( 'Search Location', 'the-ninth-world' ),
		'not_found'             => __( 'Not found', 'the-ninth-world' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'the-ninth-world' ),
		'featured_image'        => __( 'Featured Image', 'the-ninth-world' ),
		'set_featured_image'    => __( 'Set featured image', 'the-ninth-world' ),
		'remove_featured_image' => __( 'Remove featured image', 'the-ninth-world' ),
		'use_featured_image'    => __( 'Use as featured image', 'the-ninth-world' ),
		'insert_into_item'      => __( 'Insert into Location', 'the-ninth-world' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Location', 'the-ninth-world' ),
		'items_list'            => __( 'Locations list', 'the-ninth-world' ),
		'items_list_navigation' => __( 'Locations list navigation', 'the-ninth-world' ),
		'filter_items_list'     => __( 'Filter Locations list', 'the-ninth-world' ),
	);
	$args = array(
		'label'                 => __( 'Location', 'the-ninth-world' ),
		'description'           => __( 'Location types', 'the-ninth-world' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-location-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'locations', $args );

}
add_action( 'init', 'tnw_cpt_locations', 0 );
