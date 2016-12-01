<?php
/**
 * SSM Services
 *
 * @package   SSM_Services
 * @license   GPL-2.0+
 */

/**
 * Register post types and taxonomies.
 *
 * @package SSM_Services
 */
class SSM_Services_Registrations {

	public $post_type = 'service';

	// public $taxonomies = array( 'service-category' );

	public function init() {
		// Add the SSM Services and taxonomies
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 *
	 * @uses SSM_Services_Registrations::register_post_type()
	 * @uses SSM_Services_Registrations::register_taxonomy_category()
	 */
	public function register() {
		$this->register_post_type();
		$this->register_taxonomy_category();
	}

	/**
	 * Register the custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	protected function register_post_type() {
		$labels = array(
			'name'               => __( 'Services', 'ssm-services' ),
			'singular_name'      => __( 'Service', 'ssm-services' ),
			'add_new'            => __( 'Add Service', 'ssm-services' ),
			'add_new_item'       => __( 'Add Service', 'ssm-services' ),
			'edit_item'          => __( 'Edit Service', 'ssm-services' ),
			'new_item'           => __( 'New Service', 'ssm-services' ),
			'view_item'          => __( 'View Service', 'ssm-services' ),
			'search_items'       => __( 'Search Services', 'ssm-services' ),
			'not_found'          => __( 'No services found', 'ssm-services' ),
			'not_found_in_trash' => __( 'No services in the trash', 'ssm-services' ),
			'featured_image'			=>	__( 'Service Icon', 'ssm-services' ),
			'set_featured_image'			=>	__( 'Set Service Icon', 'ssm-services' ),
			'remove_featured_image'			=>	__( 'Remove Service Icon', 'ssm-services' ),
			'use_featured_image'			=>	__( 'Use as Service Icon', 'ssm-services' ),
		);

		$supports = array(
			'title',
			'thumbnail'
		);

		$args = array(
			'labels'          		=> $labels,
			'supports'        		=> $supports,
			'public'          		=> false,
			'capability_type' 		=> 'page',
			'publicly_queriable'	=> true,
			'show_ui' 						=> true,
			'show_in_nav_menus' 	=> false,
			'rewrite'         		=> false,
			'menu_position'   		=> 30,
			'menu_icon'       		=> 'dashicons-feedback',
			'has_archive'					=> false,
			'exclude_from_search'	=> false
		);

		$args = apply_filters( 'SSM_Services_args', $args );

		register_post_type( $this->post_type, $args );
	}

	/**
	 * Register a taxonomy for Project Categories.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_category() {
		$labels = array(
			'name'                       => __( 'Service Categories', 'ssm-services' ),
			'singular_name'              => __( 'Service Category', 'ssm-services' ),
			'menu_name'                  => __( 'Categories', 'ssm-services' ),
			'edit_item'                  => __( 'Edit Service Category', 'ssm-services' ),
			'update_item'                => __( 'Update Service Category', 'ssm-services' ),
			'add_new_item'               => __( 'Add New Service Category', 'ssm-services' ),
			'new_item_name'              => __( 'New Service Category Name', 'ssm-services' ),
			'parent_item'                => __( 'Parent Service Category', 'ssm-services' ),
			'parent_item_colon'          => __( 'Parent Service Category:', 'ssm-services' ),
			'all_items'                  => __( 'All Service Categories', 'ssm-services' ),
			'search_items'               => __( 'Search Service Categories', 'ssm-services' ),
			'popular_items'              => __( 'Popular Service Categories', 'ssm-services' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'ssm-services' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'ssm-services' ),
			'choose_from_most_used'      => __( 'Choose from the most used categories', 'ssm-services' ),
			'not_found'                  => __( 'No categories found.', 'ssm-services' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => true,
			'rewrite'           => array( 'slug' => 'service-category' ),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$args = apply_filters( 'SSM_Services_category_args', $args );

		register_taxonomy( $this->taxonomies[0], $this->post_type, $args );
	}
}