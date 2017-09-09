// Register Custom Taxonomy
function tnw_tax_encounters() {
	$labels = array(
		'name'                       => _x( 'Encounter Types', 'Taxonomy General Name', 'the-ninth-world' ),
		'singular_name'              => _x( 'Encounter Type', 'Taxonomy Singular Name', 'the-ninth-world' ),
		'menu_name'                  => __( 'Encounter Types', 'the-ninth-world' ),
		'all_items'                  => __( 'All Encounter Types', 'the-ninth-world' ),
		'parent_item'                => __( 'Parent Encounter Type', 'the-ninth-world' ),
		'parent_item_colon'          => __( 'Parent Encounter Type:', 'the-ninth-world' ),
		'new_item_name'              => __( 'New Encounter Type', 'the-ninth-world' ),
		'add_new_item'               => __( 'Add New Encounter Type', 'the-ninth-world' ),
		'edit_item'                  => __( 'Edit Encounter Type', 'the-ninth-world' ),
		'update_item'                => __( 'Update Encounter Type', 'the-ninth-world' ),
		'view_item'                  => __( 'View Encounter Type', 'the-ninth-world' ),
		'separate_items_with_commas' => __( 'Separate Encounter Types with commas', 'the-ninth-world' ),
		'add_or_remove_items'        => __( 'Add or remove Encounter Types', 'the-ninth-world' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'the-ninth-world' ),
		'popular_items'              => __( 'Popular Encounter Types', 'the-ninth-world' ),
		'search_items'               => __( 'Search Encounter Types', 'the-ninth-world' ),
		'not_found'                  => __( 'Not Found', 'the-ninth-world' ),
		'no_terms'                   => __( 'No Encounter Types', 'the-ninth-world' ),
		'items_list'                 => __( 'Encounter Types list', 'the-ninth-world' ),
		'items_list_navigation'      => __( 'Encounter Types list navigation', 'the-ninth-world' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'encounter-type', array( 'encounters' ), $args );
}
add_action( 'init', 'tnw_tax_encounters', 0 );
