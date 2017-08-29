<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       kultivate.tech
 * @since      1.0.0
 *
 * @package    Klt_Cannabis_Menu
 * @subpackage Klt_Cannabis_Menu/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Klt_Cannabis_Menu
 * @subpackage Klt_Cannabis_Menu/admin
 * @author     Rich Staats <rich@secretstache.com>
 */
class Klt_Cannabis_Menu_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Klt_Cannabis_Menu_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Klt_Cannabis_Menu_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/klt-cannabis-menu-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Klt_Cannabis_Menu_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Klt_Cannabis_Menu_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/klt-cannabis-menu-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Creates the "Cannabis Menu" menu
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_post_type()
	 */
	public function add_cannabis_menu() {	

		add_menu_page(
			__( 'Cannabis Menu', 'klt-cannabis-menu' ), // page_title
			'Cannabis Menu', // menu_title
			'manage_options', // capability
			'cannabis-menu.php', // menu_slug
			'', // function
			'dashicons-layout', // icon
			5 // position
		);
	}

	/**
	 * Creates the klt_flower post type
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_post_type()
	 */
	public function register_flower_cpt() {

		$cap_type 		= 'page';
		$plural 		= 'Flowers';
		$single 		= 'Flower';
		$cpt_name 		= 'klt_flower';
		$text_domain 	= 'klt-cannabis-menu';

		$opts['can_export']								= TRUE;
		$opts['capability_type']						= $cap_type;
		$opts['description']							= '';
		$opts['exclude_from_search']					= FALSE;
		$opts['has_archive']							= TRUE;
		$opts['hierarchical']							= FALSE;
		$opts['map_meta_cap']							= TRUE;
		$opts['menu_icon']								= 'dashicons-products';
		$opts['menu_position']							= 25;
		$opts['public']									= FALSE;
		$opts['publicly_querable']						= TRUE;
		$opts['query_var']								= TRUE;
		$opts['register_meta_box_cb']					= '';
		$opts['rewrite']								= FALSE;
		$opts['show_in_admin_bar']						= TRUE;
		$opts['show_in_menu']							= 'cannabis-menu.php';
		$opts['show_in_nav_menu']						= TRUE;
		$opts['show_ui']								= TRUE;
		$opts['supports']								= array( 'title', 'thumbnail', 'editor' );
		$opts['taxonomies']								= array();

		$opts['capabilities']['delete_others_posts']	= "delete_others_{$cap_type}s";
		$opts['capabilities']['delete_post']			= "delete_{$cap_type}";
		$opts['capabilities']['delete_posts']			= "delete_{$cap_type}s";
		$opts['capabilities']['delete_private_posts']	= "delete_private_{$cap_type}s";
		$opts['capabilities']['delete_published_posts']	= "delete_published_{$cap_type}s";
		$opts['capabilities']['edit_others_posts']		= "edit_others_{$cap_type}s";
		$opts['capabilities']['edit_post']				= "edit_{$cap_type}";
		$opts['capabilities']['edit_posts']				= "edit_{$cap_type}s";
		$opts['capabilities']['edit_private_posts']		= "edit_private_{$cap_type}s";
		$opts['capabilities']['edit_published_posts']	= "edit_published_{$cap_type}s";
		$opts['capabilities']['publish_posts']			= "publish_{$cap_type}s";
		$opts['capabilities']['read_post']				= "read_{$cap_type}";
		$opts['capabilities']['read_private_posts']		= "read_private_{$cap_type}s";

		$opts['labels']['add_new']						= esc_html__( "Add New {$single}", $text_domain );
		$opts['labels']['add_new_item']					= esc_html__( "Add New {$single}", $text_domain );
		$opts['labels']['all_items']					= esc_html__( $plural, $text_domain );
		$opts['labels']['edit_item']					= esc_html__( "Edit {$single}", $text_domain );
		$opts['labels']['menu_name']					= esc_html__( $plural, $text_domain );
		$opts['labels']['name']							= esc_html__( $plural, $text_domain );
		$opts['labels']['name_admin_bar']				= esc_html__( $single, $text_domain );
		$opts['labels']['new_item']						= esc_html__( "New {$single}", $text_domain );
		$opts['labels']['not_found']					= esc_html__( "No {$plural} Found", $text_domain );
		$opts['labels']['not_found_in_trash']			= esc_html__( "No {$plural} Found in Trash", $text_domain );
		$opts['labels']['parent_item_colon']			= esc_html__( "Parent {$plural} :", $text_domain );
		$opts['labels']['search_items']					= esc_html__( "Search {$plural}", $text_domain );
		$opts['labels']['singular_name']				= esc_html__( $single, $text_domain );
		$opts['labels']['view_item']					= esc_html__( "View {$single}", $text_domain );

		$opts['rewrite']['ep_mask']						= EP_PERMALINK;
		$opts['rewrite']['feeds']						= FALSE;
		$opts['rewrite']['pages']						= TRUE;
		$opts['rewrite']['slug']						= esc_html__( strtolower( $plural ), $text_domain );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'klt-flower-cpt-options', $opts );

		register_post_type( strtolower( $cpt_name ), $opts );

	}

	
	/**
	 * Creates the klt_edible post type
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_post_type()
	 */
	public function register_edible_cpt() {

		$cap_type 		= 'page';
		$plural 		= 'Edibles';
		$single 		= 'Edible';
		$cpt_name 		= 'klt_edible';
		$text_domain 	= 'klt-cannabis-menu';

		$opts['can_export']								= TRUE;
		$opts['capability_type']						= $cap_type;
		$opts['description']							= '';
		$opts['exclude_from_search']					= FALSE;
		$opts['has_archive']							= TRUE;
		$opts['hierarchical']							= FALSE;
		$opts['map_meta_cap']							= TRUE;
		$opts['menu_icon']								= 'dashicons-products';
		$opts['menu_position']							= 25;
		$opts['public']									= FALSE;
		$opts['publicly_querable']						= TRUE;
		$opts['query_var']								= TRUE;
		$opts['register_meta_box_cb']					= '';
		$opts['rewrite']								= FALSE;
		$opts['show_in_admin_bar']						= TRUE;
		$opts['show_in_menu']							= 'cannabis-menu.php';
		$opts['show_in_nav_menu']						= TRUE;
		$opts['show_ui']								= TRUE;
		$opts['supports']								= array( 'title', 'thumbnail', 'editor' );
		$opts['taxonomies']								= array();

		$opts['capabilities']['delete_others_posts']	= "delete_others_{$cap_type}s";
		$opts['capabilities']['delete_post']			= "delete_{$cap_type}";
		$opts['capabilities']['delete_posts']			= "delete_{$cap_type}s";
		$opts['capabilities']['delete_private_posts']	= "delete_private_{$cap_type}s";
		$opts['capabilities']['delete_published_posts']	= "delete_published_{$cap_type}s";
		$opts['capabilities']['edit_others_posts']		= "edit_others_{$cap_type}s";
		$opts['capabilities']['edit_post']				= "edit_{$cap_type}";
		$opts['capabilities']['edit_posts']				= "edit_{$cap_type}s";
		$opts['capabilities']['edit_private_posts']		= "edit_private_{$cap_type}s";
		$opts['capabilities']['edit_published_posts']	= "edit_published_{$cap_type}s";
		$opts['capabilities']['publish_posts']			= "publish_{$cap_type}s";
		$opts['capabilities']['read_post']				= "read_{$cap_type}";
		$opts['capabilities']['read_private_posts']		= "read_private_{$cap_type}s";

		$opts['labels']['add_new']						= esc_html__( "Add New {$single}", $text_domain );
		$opts['labels']['add_new_item']					= esc_html__( "Add New {$single}", $text_domain );
		$opts['labels']['all_items']					= esc_html__( $plural, $text_domain );
		$opts['labels']['edit_item']					= esc_html__( "Edit {$single}", $text_domain );
		$opts['labels']['menu_name']					= esc_html__( $plural, $text_domain );
		$opts['labels']['name']							= esc_html__( $plural, $text_domain );
		$opts['labels']['name_admin_bar']				= esc_html__( $single, $text_domain );
		$opts['labels']['new_item']						= esc_html__( "New {$single}", $text_domain );
		$opts['labels']['not_found']					= esc_html__( "No {$plural} Found", $text_domain );
		$opts['labels']['not_found_in_trash']			= esc_html__( "No {$plural} Found in Trash", $text_domain );
		$opts['labels']['parent_item_colon']			= esc_html__( "Parent {$plural} :", $text_domain );
		$opts['labels']['search_items']					= esc_html__( "Search {$plural}", $text_domain );
		$opts['labels']['singular_name']				= esc_html__( $single, $text_domain );
		$opts['labels']['view_item']					= esc_html__( "View {$single}", $text_domain );

		$opts['rewrite']['ep_mask']						= EP_PERMALINK;
		$opts['rewrite']['feeds']						= FALSE;
		$opts['rewrite']['pages']						= TRUE;
		$opts['rewrite']['slug']						= esc_html__( strtolower( $plural ), $text_domain );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'klt-edible-cpt-options', $opts );

		register_post_type( strtolower( $cpt_name ), $opts );

	}

	
	/**
	 * Creates the klt_concentrate post type
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_post_type()
	 */
	public function register_concentrate_cpt() {

		$cap_type 		= 'page';
		$plural 		= 'Concentrates';
		$single 		= 'Concentrate';
		$cpt_name 		= 'klt_concentrate';
		$text_domain 	= 'klt-cannabis-menu';

		$opts['can_export']								= TRUE;
		$opts['capability_type']						= $cap_type;
		$opts['description']							= '';
		$opts['exclude_from_search']					= FALSE;
		$opts['has_archive']							= TRUE;
		$opts['hierarchical']							= FALSE;
		$opts['map_meta_cap']							= TRUE;
		$opts['menu_icon']								= 'dashicons-products';
		$opts['menu_position']							= 25;
		$opts['public']									= FALSE;
		$opts['publicly_querable']						= TRUE;
		$opts['query_var']								= TRUE;
		$opts['register_meta_box_cb']					= '';
		$opts['rewrite']								= FALSE;
		$opts['show_in_admin_bar']						= TRUE;
		$opts['show_in_menu']							= 'cannabis-menu.php';
		$opts['show_in_nav_menu']						= TRUE;
		$opts['show_ui']								= TRUE;
		$opts['supports']								= array( 'title', 'thumbnail', 'editor' );
		$opts['taxonomies']								= array();

		$opts['capabilities']['delete_others_posts']	= "delete_others_{$cap_type}s";
		$opts['capabilities']['delete_post']			= "delete_{$cap_type}";
		$opts['capabilities']['delete_posts']			= "delete_{$cap_type}s";
		$opts['capabilities']['delete_private_posts']	= "delete_private_{$cap_type}s";
		$opts['capabilities']['delete_published_posts']	= "delete_published_{$cap_type}s";
		$opts['capabilities']['edit_others_posts']		= "edit_others_{$cap_type}s";
		$opts['capabilities']['edit_post']				= "edit_{$cap_type}";
		$opts['capabilities']['edit_posts']				= "edit_{$cap_type}s";
		$opts['capabilities']['edit_private_posts']		= "edit_private_{$cap_type}s";
		$opts['capabilities']['edit_published_posts']	= "edit_published_{$cap_type}s";
		$opts['capabilities']['publish_posts']			= "publish_{$cap_type}s";
		$opts['capabilities']['read_post']				= "read_{$cap_type}";
		$opts['capabilities']['read_private_posts']		= "read_private_{$cap_type}s";

		$opts['labels']['add_new']						= esc_html__( "Add New {$single}", $text_domain );
		$opts['labels']['add_new_item']					= esc_html__( "Add New {$single}", $text_domain );
		$opts['labels']['all_items']					= esc_html__( $plural, $text_domain );
		$opts['labels']['edit_item']					= esc_html__( "Edit {$single}", $text_domain );
		$opts['labels']['menu_name']					= esc_html__( $plural, $text_domain );
		$opts['labels']['name']							= esc_html__( $plural, $text_domain );
		$opts['labels']['name_admin_bar']				= esc_html__( $single, $text_domain );
		$opts['labels']['new_item']						= esc_html__( "New {$single}", $text_domain );
		$opts['labels']['not_found']					= esc_html__( "No {$plural} Found", $text_domain );
		$opts['labels']['not_found_in_trash']			= esc_html__( "No {$plural} Found in Trash", $text_domain );
		$opts['labels']['parent_item_colon']			= esc_html__( "Parent {$plural} :", $text_domain );
		$opts['labels']['search_items']					= esc_html__( "Search {$plural}", $text_domain );
		$opts['labels']['singular_name']				= esc_html__( $single, $text_domain );
		$opts['labels']['view_item']					= esc_html__( "View {$single}", $text_domain );

		$opts['rewrite']['ep_mask']						= EP_PERMALINK;
		$opts['rewrite']['feeds']						= FALSE;
		$opts['rewrite']['pages']						= TRUE;
		$opts['rewrite']['slug']						= esc_html__( strtolower( $plural ), $text_domain );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'klt-concentrate-cpt-options', $opts );

		register_post_type( strtolower( $cpt_name ), $opts );

	}


	/**
	 * Creates the klt_topical post type
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_post_type()
	 */
	public function register_topical_cpt() {

		$cap_type 		= 'page';
		$plural 		= 'Topicals';
		$single 		= 'Topical';
		$cpt_name 		= 'klt_topical';
		$text_domain 	= 'klt-cannabis-menu';

		$opts['can_export']								= TRUE;
		$opts['capability_type']						= $cap_type;
		$opts['description']							= '';
		$opts['exclude_from_search']					= FALSE;
		$opts['has_archive']							= TRUE;
		$opts['hierarchical']							= FALSE;
		$opts['map_meta_cap']							= TRUE;
		$opts['menu_icon']								= 'dashicons-products';
		$opts['menu_position']							= 25;
		$opts['public']									= FALSE;
		$opts['publicly_querable']						= TRUE;
		$opts['query_var']								= TRUE;
		$opts['register_meta_box_cb']					= '';
		$opts['rewrite']								= FALSE;
		$opts['show_in_admin_bar']						= TRUE;
		$opts['show_in_menu']							= 'cannabis-menu.php';
		$opts['show_in_nav_menu']						= TRUE;
		$opts['show_ui']								= TRUE;
		$opts['supports']								= array( 'title', 'thumbnail', 'editor' );
		$opts['taxonomies']								= array();

		$opts['capabilities']['delete_others_posts']	= "delete_others_{$cap_type}s";
		$opts['capabilities']['delete_post']			= "delete_{$cap_type}";
		$opts['capabilities']['delete_posts']			= "delete_{$cap_type}s";
		$opts['capabilities']['delete_private_posts']	= "delete_private_{$cap_type}s";
		$opts['capabilities']['delete_published_posts']	= "delete_published_{$cap_type}s";
		$opts['capabilities']['edit_others_posts']		= "edit_others_{$cap_type}s";
		$opts['capabilities']['edit_post']				= "edit_{$cap_type}";
		$opts['capabilities']['edit_posts']				= "edit_{$cap_type}s";
		$opts['capabilities']['edit_private_posts']		= "edit_private_{$cap_type}s";
		$opts['capabilities']['edit_published_posts']	= "edit_published_{$cap_type}s";
		$opts['capabilities']['publish_posts']			= "publish_{$cap_type}s";
		$opts['capabilities']['read_post']				= "read_{$cap_type}";
		$opts['capabilities']['read_private_posts']		= "read_private_{$cap_type}s";

		$opts['labels']['add_new']						= esc_html__( "Add New {$single}", $text_domain );
		$opts['labels']['add_new_item']					= esc_html__( "Add New {$single}", $text_domain );
		$opts['labels']['all_items']					= esc_html__( $plural, $text_domain );
		$opts['labels']['edit_item']					= esc_html__( "Edit {$single}", $text_domain );
		$opts['labels']['menu_name']					= esc_html__( $plural, $text_domain );
		$opts['labels']['name']							= esc_html__( $plural, $text_domain );
		$opts['labels']['name_admin_bar']				= esc_html__( $single, $text_domain );
		$opts['labels']['new_item']						= esc_html__( "New {$single}", $text_domain );
		$opts['labels']['not_found']					= esc_html__( "No {$plural} Found", $text_domain );
		$opts['labels']['not_found_in_trash']			= esc_html__( "No {$plural} Found in Trash", $text_domain );
		$opts['labels']['parent_item_colon']			= esc_html__( "Parent {$plural} :", $text_domain );
		$opts['labels']['search_items']					= esc_html__( "Search {$plural}", $text_domain );
		$opts['labels']['singular_name']				= esc_html__( $single, $text_domain );
		$opts['labels']['view_item']					= esc_html__( "View {$single}", $text_domain );

		$opts['rewrite']['ep_mask']						= EP_PERMALINK;
		$opts['rewrite']['feeds']						= FALSE;
		$opts['rewrite']['pages']						= TRUE;
		$opts['rewrite']['slug']						= esc_html__( strtolower( $plural ), $text_domain );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'klt-topical-cpt-options', $opts );

		register_post_type( strtolower( $cpt_name ), $opts );

	}


	/**
	 * Creates the klt_seed post type
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_post_type()
	 */
	public function register_seed_cpt() {

		$cap_type 		= 'page';
		$plural 		= 'Seeds';
		$single 		= 'Seed';
		$cpt_name 		= 'klt_seed';
		$text_domain 	= 'klt-cannabis-menu';

		$opts['can_export']								= TRUE;
		$opts['capability_type']						= $cap_type;
		$opts['description']							= '';
		$opts['exclude_from_search']					= FALSE;
		$opts['has_archive']							= TRUE;
		$opts['hierarchical']							= FALSE;
		$opts['map_meta_cap']							= TRUE;
		$opts['menu_icon']								= 'dashicons-products';
		$opts['menu_position']							= 25;
		$opts['public']									= FALSE;
		$opts['publicly_querable']						= TRUE;
		$opts['query_var']								= TRUE;
		$opts['register_meta_box_cb']					= '';
		$opts['rewrite']								= FALSE;
		$opts['show_in_admin_bar']						= TRUE;
		$opts['show_in_menu']							= 'cannabis-menu.php';
		$opts['show_in_nav_menu']						= TRUE;
		$opts['show_ui']								= TRUE;
		$opts['supports']								= array( 'title', 'thumbnail', 'editor' );
		$opts['taxonomies']								= array();

		$opts['capabilities']['delete_others_posts']	= "delete_others_{$cap_type}s";
		$opts['capabilities']['delete_post']			= "delete_{$cap_type}";
		$opts['capabilities']['delete_posts']			= "delete_{$cap_type}s";
		$opts['capabilities']['delete_private_posts']	= "delete_private_{$cap_type}s";
		$opts['capabilities']['delete_published_posts']	= "delete_published_{$cap_type}s";
		$opts['capabilities']['edit_others_posts']		= "edit_others_{$cap_type}s";
		$opts['capabilities']['edit_post']				= "edit_{$cap_type}";
		$opts['capabilities']['edit_posts']				= "edit_{$cap_type}s";
		$opts['capabilities']['edit_private_posts']		= "edit_private_{$cap_type}s";
		$opts['capabilities']['edit_published_posts']	= "edit_published_{$cap_type}s";
		$opts['capabilities']['publish_posts']			= "publish_{$cap_type}s";
		$opts['capabilities']['read_post']				= "read_{$cap_type}";
		$opts['capabilities']['read_private_posts']		= "read_private_{$cap_type}s";

		$opts['labels']['add_new']						= esc_html__( "Add New {$single}", $text_domain );
		$opts['labels']['add_new_item']					= esc_html__( "Add New {$single}", $text_domain );
		$opts['labels']['all_items']					= esc_html__( $plural, $text_domain );
		$opts['labels']['edit_item']					= esc_html__( "Edit {$single}", $text_domain );
		$opts['labels']['menu_name']					= esc_html__( $plural, $text_domain );
		$opts['labels']['name']							= esc_html__( $plural, $text_domain );
		$opts['labels']['name_admin_bar']				= esc_html__( $single, $text_domain );
		$opts['labels']['new_item']						= esc_html__( "New {$single}", $text_domain );
		$opts['labels']['not_found']					= esc_html__( "No {$plural} Found", $text_domain );
		$opts['labels']['not_found_in_trash']			= esc_html__( "No {$plural} Found in Trash", $text_domain );
		$opts['labels']['parent_item_colon']			= esc_html__( "Parent {$plural} :", $text_domain );
		$opts['labels']['search_items']					= esc_html__( "Search {$plural}", $text_domain );
		$opts['labels']['singular_name']				= esc_html__( $single, $text_domain );
		$opts['labels']['view_item']					= esc_html__( "View {$single}", $text_domain );

		$opts['rewrite']['ep_mask']						= EP_PERMALINK;
		$opts['rewrite']['feeds']						= FALSE;
		$opts['rewrite']['pages']						= TRUE;
		$opts['rewrite']['slug']						= esc_html__( strtolower( $plural ), $text_domain );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'klt-seed-cpt-options', $opts );

		register_post_type( strtolower( $cpt_name ), $opts );

	}


	/**
	 * Creates the klt_cannabis_strain taxonomy for all cannabis menu items
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_taxonomy()
	 */
	public static function register_cannabis_strain_tax() {

		$plural 		= 'Strains';
		$single 		= 'Strain';
		$tax_name 		= 'klt_cannabis_strain';
		$text_domain 	= 'klt-cannabis-menu';

		$opts['hierarchical']							= FALSE;
		//$opts['meta_box_cb'] 							= '';
		$opts['public']									= TRUE;
		$opts['query_var']								= $tax_name;
		$opts['show_admin_column'] 						= TRUE;
		$opts['show_in_nav_menus']						= TRUE;
		$opts['show_tag_cloud'] 						= FALSE;
		$opts['show_ui']								= TRUE;
		$opts['sort'] 									= '';
		//$opts['update_count_callback'] 					= '';

		$opts['capabilities']['assign_terms'] 			= 'edit_posts';
		$opts['capabilities']['delete_terms'] 			= 'manage_categories';
		$opts['capabilities']['edit_terms'] 			= 'manage_categories';
		$opts['capabilities']['manage_terms'] 			= 'manage_categories';

		$opts['labels']['add_new_item'] 				= esc_html__( "Add New {$single}", $text_domain );
		$opts['labels']['add_or_remove_items'] 			= esc_html__( "Add or remove {$plural}", $text_domain );
		$opts['labels']['all_items'] 					= esc_html__( $plural, $text_domain );
		$opts['labels']['choose_from_most_used'] 		= esc_html__( "Choose from most used {$plural}", $text_domain );
		$opts['labels']['edit_item'] 					= esc_html__( "Edit {$single}", $text_domain);
		$opts['labels']['menu_name'] 					= esc_html__( $plural, $text_domain );
		$opts['labels']['name'] 						= esc_html__( $plural, $text_domain );
		$opts['labels']['new_item_name'] 				= esc_html__( "New {$single} Name", $text_domain );
		$opts['labels']['not_found'] 					= esc_html__( "No {$plural} Found", $text_domain );
		$opts['labels']['parent_item'] 					= esc_html__( "Parent {$single}", $text_domain );
		$opts['labels']['parent_item_colon'] 			= esc_html__( "Parent {$single}:", $text_domain );
		$opts['labels']['popular_items'] 				= esc_html__( "Popular {$plural}", $text_domain );
		$opts['labels']['search_items'] 				= esc_html__( "Search {$plural}", $text_domain );
		$opts['labels']['separate_items_with_commas'] 	= esc_html__( "Separate {$plural} with commas", $text_domain );
		$opts['labels']['singular_name'] 				= esc_html__( $single, $text_domain );
		$opts['labels']['update_item'] 					= esc_html__( "Update {$single}", $text_domain );
		$opts['labels']['view_item'] 					= esc_html__( "View {$single}", $text_domain );

		$opts['rewrite']['ep_mask']						= EP_NONE;
		$opts['rewrite']['hierarchical']				= FALSE;
		$opts['rewrite']['slug']						= esc_html__( strtolower( $tax_name ), $text_domain );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'klt-cannabis-strain-tax-options', $opts );

		register_taxonomy( $tax_name, array('klt_flower', 'klt_edible', 'klt_concentrate', 'klt_topical', 'klt_seed'), $opts );

	}


	/**
	 * Creates the defined set of choices (terms) for klt_cannabis_strain
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	wp_insert_term()
	 */
	public static function insert_defined_strain_terms() {

		$defined_terms = array('Sativa', 'Indica', 'Hybrid');

		$taxonomy = 'klt_cannabis_strain';

		foreach ( $defined_terms as $term ) {
			wp_insert_term( $term, $taxonomy );
		} 

	}


	/**
	 * Removed the ability for user generated terms for klt_cannabis_strain
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	pre_insert_term()
	 */
	public static function prevent_new_strain_terms ( $term, $taxonomy ) {
		if ( 'klt_cannabis_strain' === $taxonomy && !current_user_can( 'activate_plugins' ) ) {
		return new WP_Error( 'term_addition_blocked', __( 'You cannot add terms to this taxonomy' ) );
		}

		return $term;
	}

	/**
	 * Creates the klt_cannabis_taste taxonomy for select cannabis menu items
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_taxonomy()
	 */
	public static function register_cannabis_taste_tax() {

		$plural 		= 'Tastes';
		$single 		= 'Taste';
		$tax_name 		= 'klt_cannabis_taste';
		$text_domain 	= 'klt-cannabis-menu';

		$opts['hierarchical']							= FALSE;
		//$opts['meta_box_cb'] 							= '';
		$opts['public']									= TRUE;
		$opts['query_var']								= $tax_name;
		$opts['show_admin_column'] 						= FALSE;
		$opts['show_in_nav_menus']						= TRUE;
		$opts['show_tag_cloud'] 						= FALSE;
		$opts['show_ui']								= TRUE;
		$opts['sort'] 									= '';
		//$opts['update_count_callback'] 					= '';

		$opts['capabilities']['assign_terms'] 			= 'edit_posts';
		$opts['capabilities']['delete_terms'] 			= 'manage_categories';
		$opts['capabilities']['edit_terms'] 			= 'manage_categories';
		$opts['capabilities']['manage_terms'] 			= 'manage_categories';

		$opts['labels']['add_new_item'] 				= esc_html__( "Add New {$single}", $text_domain );
		$opts['labels']['add_or_remove_items'] 			= esc_html__( "Add or remove {$plural}", $text_domain );
		$opts['labels']['all_items'] 					= esc_html__( $plural, $text_domain );
		$opts['labels']['choose_from_most_used'] 		= esc_html__( "Choose from most used {$plural}", $text_domain );
		$opts['labels']['edit_item'] 					= esc_html__( "Edit {$single}", $text_domain);
		$opts['labels']['menu_name'] 					= esc_html__( $plural, $text_domain );
		$opts['labels']['name'] 						= esc_html__( $plural, $text_domain );
		$opts['labels']['new_item_name'] 				= esc_html__( "New {$single} Name", $text_domain );
		$opts['labels']['not_found'] 					= esc_html__( "No {$plural} Found", $text_domain );
		$opts['labels']['parent_item'] 					= esc_html__( "Parent {$single}", $text_domain );
		$opts['labels']['parent_item_colon'] 			= esc_html__( "Parent {$single}:", $text_domain );
		$opts['labels']['popular_items'] 				= esc_html__( "Popular {$plural}", $text_domain );
		$opts['labels']['search_items'] 				= esc_html__( "Search {$plural}", $text_domain );
		$opts['labels']['separate_items_with_commas'] 	= esc_html__( "Separate {$plural} with commas", $text_domain );
		$opts['labels']['singular_name'] 				= esc_html__( $single, $text_domain );
		$opts['labels']['update_item'] 					= esc_html__( "Update {$single}", $text_domain );
		$opts['labels']['view_item'] 					= esc_html__( "View {$single}", $text_domain );

		$opts['rewrite']['ep_mask']						= EP_NONE;
		$opts['rewrite']['hierarchical']				= FALSE;
		$opts['rewrite']['slug']						= esc_html__( strtolower( $tax_name ), $text_domain );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'klt-cannabis-taste-tax-options', $opts );

		register_taxonomy( $tax_name, array('klt_flower', 'klt_edible', 'klt_concentrate'), $opts );

	}

	/**
	 * Creates the klt_cannabis_scent taxonomy for select cannabis menu items
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_taxonomy()
	 */
	public static function register_cannabis_scent_tax() {

		$plural 		= 'Scents';
		$single 		= 'Scent';
		$tax_name 		= 'klt_cannabis_scent';
		$text_domain 	= 'klt-cannabis-menu';

		$opts['hierarchical']							= FALSE;
		//$opts['meta_box_cb'] 							= '';
		$opts['public']									= TRUE;
		$opts['query_var']								= $tax_name;
		$opts['show_admin_column'] 						= FALSE;
		$opts['show_in_nav_menus']						= TRUE;
		$opts['show_tag_cloud'] 						= FALSE;
		$opts['show_ui']								= TRUE;
		$opts['sort'] 									= '';
		//$opts['update_count_callback'] 					= '';

		$opts['capabilities']['assign_terms'] 			= 'edit_posts';
		$opts['capabilities']['delete_terms'] 			= 'manage_categories';
		$opts['capabilities']['edit_terms'] 			= 'manage_categories';
		$opts['capabilities']['manage_terms'] 			= 'manage_categories';

		$opts['labels']['add_new_item'] 				= esc_html__( "Add New {$single}", $text_domain );
		$opts['labels']['add_or_remove_items'] 			= esc_html__( "Add or remove {$plural}", $text_domain );
		$opts['labels']['all_items'] 					= esc_html__( $plural, $text_domain );
		$opts['labels']['choose_from_most_used'] 		= esc_html__( "Choose from most used {$plural}", $text_domain );
		$opts['labels']['edit_item'] 					= esc_html__( "Edit {$single}", $text_domain);
		$opts['labels']['menu_name'] 					= esc_html__( $plural, $text_domain );
		$opts['labels']['name'] 						= esc_html__( $plural, $text_domain );
		$opts['labels']['new_item_name'] 				= esc_html__( "New {$single} Name", $text_domain );
		$opts['labels']['not_found'] 					= esc_html__( "No {$plural} Found", $text_domain );
		$opts['labels']['parent_item'] 					= esc_html__( "Parent {$single}", $text_domain );
		$opts['labels']['parent_item_colon'] 			= esc_html__( "Parent {$single}:", $text_domain );
		$opts['labels']['popular_items'] 				= esc_html__( "Popular {$plural}", $text_domain );
		$opts['labels']['search_items'] 				= esc_html__( "Search {$plural}", $text_domain );
		$opts['labels']['separate_items_with_commas'] 	= esc_html__( "Separate {$plural} with commas", $text_domain );
		$opts['labels']['singular_name'] 				= esc_html__( $single, $text_domain );
		$opts['labels']['update_item'] 					= esc_html__( "Update {$single}", $text_domain );
		$opts['labels']['view_item'] 					= esc_html__( "View {$single}", $text_domain );

		$opts['rewrite']['ep_mask']						= EP_NONE;
		$opts['rewrite']['hierarchical']				= FALSE;
		$opts['rewrite']['slug']						= esc_html__( strtolower( $tax_name ), $text_domain );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'klt-cannabis-scent-tax-options', $opts );

		register_taxonomy( $tax_name, array('klt_flower', 'klt_edible', 'klt_concentrate', 'klt_topical'), $opts );

	}

	/**
	 * Creates the klt_cannabis_feeling taxonomy for select cannabis menu items
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_taxonomy()
	 */
	public static function register_cannabis_feeling_tax() {

		$plural 		= 'Feelings';
		$single 		= 'Feeling';
		$tax_name 		= 'klt_cannabis_feeling';
		$text_domain 	= 'klt-cannabis-menu';

		$opts['hierarchical']							= FALSE;
		//$opts['meta_box_cb'] 							= '';
		$opts['public']									= TRUE;
		$opts['query_var']								= $tax_name;
		$opts['show_admin_column'] 						= FALSE;
		$opts['show_in_nav_menus']						= TRUE;
		$opts['show_tag_cloud'] 						= FALSE;
		$opts['show_ui']								= TRUE;
		$opts['sort'] 									= '';
		//$opts['update_count_callback'] 					= '';

		$opts['capabilities']['assign_terms'] 			= 'edit_posts';
		$opts['capabilities']['delete_terms'] 			= 'manage_categories';
		$opts['capabilities']['edit_terms'] 			= 'manage_categories';
		$opts['capabilities']['manage_terms'] 			= 'manage_categories';

		$opts['labels']['add_new_item'] 				= esc_html__( "Add New {$single}", $text_domain );
		$opts['labels']['add_or_remove_items'] 			= esc_html__( "Add or remove {$plural}", $text_domain );
		$opts['labels']['all_items'] 					= esc_html__( $plural, $text_domain );
		$opts['labels']['choose_from_most_used'] 		= esc_html__( "Choose from most used {$plural}", $text_domain );
		$opts['labels']['edit_item'] 					= esc_html__( "Edit {$single}", $text_domain);
		$opts['labels']['menu_name'] 					= esc_html__( $plural, $text_domain );
		$opts['labels']['name'] 						= esc_html__( $plural, $text_domain );
		$opts['labels']['new_item_name'] 				= esc_html__( "New {$single} Name", $text_domain );
		$opts['labels']['not_found'] 					= esc_html__( "No {$plural} Found", $text_domain );
		$opts['labels']['parent_item'] 					= esc_html__( "Parent {$single}", $text_domain );
		$opts['labels']['parent_item_colon'] 			= esc_html__( "Parent {$single}:", $text_domain );
		$opts['labels']['popular_items'] 				= esc_html__( "Popular {$plural}", $text_domain );
		$opts['labels']['search_items'] 				= esc_html__( "Search {$plural}", $text_domain );
		$opts['labels']['separate_items_with_commas'] 	= esc_html__( "Separate {$plural} with commas", $text_domain );
		$opts['labels']['singular_name'] 				= esc_html__( $single, $text_domain );
		$opts['labels']['update_item'] 					= esc_html__( "Update {$single}", $text_domain );
		$opts['labels']['view_item'] 					= esc_html__( "View {$single}", $text_domain );

		$opts['rewrite']['ep_mask']						= EP_NONE;
		$opts['rewrite']['hierarchical']				= FALSE;
		$opts['rewrite']['slug']						= esc_html__( strtolower( $tax_name ), $text_domain );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'klt-cannabis-feeling-tax-options', $opts );

		register_taxonomy( $tax_name, array('klt_flower', 'klt_edible', 'klt_concentrate', 'klt_topical'), $opts );

	}

	/**
	 * Creates the klt_edible_type taxonomy for select cannabis menu items
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_taxonomy()
	 */
	public static function register_edible_type_tax() {

		$plural 		= 'Types';
		$single 		= 'Type';
		$tax_name 		= 'klt_edible_type';
		$text_domain 	= 'klt-cannabis-menu';

		$opts['hierarchical']							= FALSE;
		//$opts['meta_box_cb'] 							= '';
		$opts['public']									= TRUE;
		$opts['query_var']								= $tax_name;
		$opts['show_admin_column'] 						= TRUE;
		$opts['show_in_nav_menus']						= TRUE;
		$opts['show_tag_cloud'] 						= FALSE;
		$opts['show_ui']								= TRUE;
		$opts['sort'] 									= '';
		//$opts['update_count_callback'] 					= '';

		$opts['capabilities']['assign_terms'] 			= 'edit_posts';
		$opts['capabilities']['delete_terms'] 			= 'manage_categories';
		$opts['capabilities']['edit_terms'] 			= 'manage_categories';
		$opts['capabilities']['manage_terms'] 			= 'manage_categories';

		$opts['labels']['add_new_item'] 				= esc_html__( "Add New {$single}", $text_domain );
		$opts['labels']['add_or_remove_items'] 			= esc_html__( "Add or remove {$plural}", $text_domain );
		$opts['labels']['all_items'] 					= esc_html__( $plural, $text_domain );
		$opts['labels']['choose_from_most_used'] 		= esc_html__( "Choose from most used {$plural}", $text_domain );
		$opts['labels']['edit_item'] 					= esc_html__( "Edit {$single}", $text_domain);
		$opts['labels']['menu_name'] 					= esc_html__( $plural, $text_domain );
		$opts['labels']['name'] 						= esc_html__( $plural, $text_domain );
		$opts['labels']['new_item_name'] 				= esc_html__( "New {$single} Name", $text_domain );
		$opts['labels']['not_found'] 					= esc_html__( "No {$plural} Found", $text_domain );
		$opts['labels']['parent_item'] 					= esc_html__( "Parent {$single}", $text_domain );
		$opts['labels']['parent_item_colon'] 			= esc_html__( "Parent {$single}:", $text_domain );
		$opts['labels']['popular_items'] 				= esc_html__( "Popular {$plural}", $text_domain );
		$opts['labels']['search_items'] 				= esc_html__( "Search {$plural}", $text_domain );
		$opts['labels']['separate_items_with_commas'] 	= esc_html__( "Separate {$plural} with commas", $text_domain );
		$opts['labels']['singular_name'] 				= esc_html__( $single, $text_domain );
		$opts['labels']['update_item'] 					= esc_html__( "Update {$single}", $text_domain );
		$opts['labels']['view_item'] 					= esc_html__( "View {$single}", $text_domain );

		$opts['rewrite']['ep_mask']						= EP_NONE;
		$opts['rewrite']['hierarchical']				= FALSE;
		$opts['rewrite']['slug']						= esc_html__( strtolower( $tax_name ), $text_domain );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'klt-edible-type-tax-options', $opts );

		register_taxonomy( $tax_name, array('klt_edible'), $opts );

	}


	/**
	 * Creates the default set of choices (terms) for klt_edible_type
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	wp_insert_term()
	 */
	public static function insert_default_edible_type_terms() {

		$default_terms = array('Cookie', 'Brownie', 'Honey', 'Tea', 'Tonic', 'Coffee', 'Soda');

		$taxonomy = 'klt_edible_type';

		foreach ( $default_terms as $term ) {
			wp_insert_term( $term, $taxonomy );
		} 

	}


	/**
	 * Creates the klt_concentrate_type taxonomy for select cannabis menu items
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_taxonomy()
	 */
	public static function register_concentrate_type_tax() {

		$plural 		= 'Types';
		$single 		= 'Type';
		$tax_name 		= 'klt_concentrate_type';
		$text_domain 	= 'klt-cannabis-menu';

		$opts['hierarchical']							= FALSE;
		//$opts['meta_box_cb'] 							= '';
		$opts['public']									= TRUE;
		$opts['query_var']								= $tax_name;
		$opts['show_admin_column'] 						= TRUE;
		$opts['show_in_nav_menus']						= TRUE;
		$opts['show_tag_cloud'] 						= FALSE;
		$opts['show_ui']								= TRUE;
		$opts['sort'] 									= '';
		//$opts['update_count_callback'] 					= '';

		$opts['capabilities']['assign_terms'] 			= 'edit_posts';
		$opts['capabilities']['delete_terms'] 			= 'manage_categories';
		$opts['capabilities']['edit_terms'] 			= 'manage_categories';
		$opts['capabilities']['manage_terms'] 			= 'manage_categories';

		$opts['labels']['add_new_item'] 				= esc_html__( "Add New {$single}", $text_domain );
		$opts['labels']['add_or_remove_items'] 			= esc_html__( "Add or remove {$plural}", $text_domain );
		$opts['labels']['all_items'] 					= esc_html__( $plural, $text_domain );
		$opts['labels']['choose_from_most_used'] 		= esc_html__( "Choose from most used {$plural}", $text_domain );
		$opts['labels']['edit_item'] 					= esc_html__( "Edit {$single}", $text_domain);
		$opts['labels']['menu_name'] 					= esc_html__( $plural, $text_domain );
		$opts['labels']['name'] 						= esc_html__( $plural, $text_domain );
		$opts['labels']['new_item_name'] 				= esc_html__( "New {$single} Name", $text_domain );
		$opts['labels']['not_found'] 					= esc_html__( "No {$plural} Found", $text_domain );
		$opts['labels']['parent_item'] 					= esc_html__( "Parent {$single}", $text_domain );
		$opts['labels']['parent_item_colon'] 			= esc_html__( "Parent {$single}:", $text_domain );
		$opts['labels']['popular_items'] 				= esc_html__( "Popular {$plural}", $text_domain );
		$opts['labels']['search_items'] 				= esc_html__( "Search {$plural}", $text_domain );
		$opts['labels']['separate_items_with_commas'] 	= esc_html__( "Separate {$plural} with commas", $text_domain );
		$opts['labels']['singular_name'] 				= esc_html__( $single, $text_domain );
		$opts['labels']['update_item'] 					= esc_html__( "Update {$single}", $text_domain );
		$opts['labels']['view_item'] 					= esc_html__( "View {$single}", $text_domain );

		$opts['rewrite']['ep_mask']						= EP_NONE;
		$opts['rewrite']['hierarchical']				= FALSE;
		$opts['rewrite']['slug']						= esc_html__( strtolower( $tax_name ), $text_domain );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'klt-concentrate-type-tax-options', $opts );

		register_taxonomy( $tax_name, array('klt_concentrate'), $opts );

	}


	/**
	 * Creates the default set of choices (terms) for klt_concentrate_type
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	wp_insert_term()
	 */
	public static function insert_default_concentrate_type_terms() {

		$default_terms = array('Cartridge', 'Resin', 'Wax', 'Shatter', 'Kief', 'Vape');

		$taxonomy = 'klt_concentrate_type';

		foreach ( $default_terms as $term ) {
			wp_insert_term( $term, $taxonomy );
		} 

	}


	/**
	 * Creates the klt_topical_type taxonomy for select cannabis menu items
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_taxonomy()
	 */
	public static function register_topical_type_tax() {

		$plural 		= 'Types';
		$single 		= 'Type';
		$tax_name 		= 'klt_topical_type';
		$text_domain 	= 'klt-cannabis-menu';

		$opts['hierarchical']							= FALSE;
		//$opts['meta_box_cb'] 							= '';
		$opts['public']									= TRUE;
		$opts['query_var']								= $tax_name;
		$opts['show_admin_column'] 						= TRUE;
		$opts['show_in_nav_menus']						= TRUE;
		$opts['show_tag_cloud'] 						= FALSE;
		$opts['show_ui']								= TRUE;
		$opts['sort'] 									= '';
		//$opts['update_count_callback'] 					= '';

		$opts['capabilities']['assign_terms'] 			= 'edit_posts';
		$opts['capabilities']['delete_terms'] 			= 'manage_categories';
		$opts['capabilities']['edit_terms'] 			= 'manage_categories';
		$opts['capabilities']['manage_terms'] 			= 'manage_categories';

		$opts['labels']['add_new_item'] 				= esc_html__( "Add New {$single}", $text_domain );
		$opts['labels']['add_or_remove_items'] 			= esc_html__( "Add or remove {$plural}", $text_domain );
		$opts['labels']['all_items'] 					= esc_html__( $plural, $text_domain );
		$opts['labels']['choose_from_most_used'] 		= esc_html__( "Choose from most used {$plural}", $text_domain );
		$opts['labels']['edit_item'] 					= esc_html__( "Edit {$single}", $text_domain);
		$opts['labels']['menu_name'] 					= esc_html__( $plural, $text_domain );
		$opts['labels']['name'] 						= esc_html__( $plural, $text_domain );
		$opts['labels']['new_item_name'] 				= esc_html__( "New {$single} Name", $text_domain );
		$opts['labels']['not_found'] 					= esc_html__( "No {$plural} Found", $text_domain );
		$opts['labels']['parent_item'] 					= esc_html__( "Parent {$single}", $text_domain );
		$opts['labels']['parent_item_colon'] 			= esc_html__( "Parent {$single}:", $text_domain );
		$opts['labels']['popular_items'] 				= esc_html__( "Popular {$plural}", $text_domain );
		$opts['labels']['search_items'] 				= esc_html__( "Search {$plural}", $text_domain );
		$opts['labels']['separate_items_with_commas'] 	= esc_html__( "Separate {$plural} with commas", $text_domain );
		$opts['labels']['singular_name'] 				= esc_html__( $single, $text_domain );
		$opts['labels']['update_item'] 					= esc_html__( "Update {$single}", $text_domain );
		$opts['labels']['view_item'] 					= esc_html__( "View {$single}", $text_domain );

		$opts['rewrite']['ep_mask']						= EP_NONE;
		$opts['rewrite']['hierarchical']				= FALSE;
		$opts['rewrite']['slug']						= esc_html__( strtolower( $tax_name ), $text_domain );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'klt-topical-type-tax-options', $opts );

		register_taxonomy( $tax_name, array('klt_topical'), $opts );

	}


	/**
	 * Creates the default set of choices (terms) for klt_topical_type
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	wp_insert_term()
	 */
	public static function insert_default_topical_type_terms() {

		$default_terms = array('Oil', 'Balm', 'Lotion', 'Body Wash', 'Salve', 'Spray');

		$taxonomy = 'klt_topical_type';

		foreach ( $default_terms as $term ) {
			wp_insert_term( $term, $taxonomy );
		} 

	}

	
	/**
	 * Creates a new load point for ACF Pro
	 *
	 * @since 	1.0.0
	 * @access 	public
	 */
	public static function klt_acf_load_point( $paths ) { 
	    
	    $paths[] = KLT_CANNABIS_MENU_DIR . 'acf-local';

	    return $paths;
	    
	}


	/**
	 * Admin body classes
	 *
	 * @since 	1.0.0
	 * @access 	public
	 */
	function klt_admin_body_classes( $classes ) {
		
		$screen = get_current_screen();
		
		if ( class_exists('acf') ) {

			if ( 'post' == $screen->base ) {
				$classes .= 'acf';
			}

		}
		
		return $classes;
	}


}
