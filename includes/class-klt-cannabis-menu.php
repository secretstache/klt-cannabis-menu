<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       kultivate.tech
 * @since      0.1.0
 *
 * @package    Klt_Cannabis_Menu
 * @subpackage Klt_Cannabis_Menu/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.1.0
 * @package    Klt_Cannabis_Menu
 * @subpackage Klt_Cannabis_Menu/includes
 * @author     Rich Staats <rich@secretstache.com>
 */
class Klt_Cannabis_Menu {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    0.1.0
	 * @access   protected
	 * @var      Klt_Cannabis_Menu_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    0.1.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    0.1.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    0.1.0
	 */
	public function __construct() {

		$this->plugin_name = 'klt-cannabis-menu';
		$this->version = '0.1.1';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Klt_Cannabis_Menu_Loader. Orchestrates the hooks of the plugin.
	 * - Klt_Cannabis_Menu_i18n. Defines internationalization functionality.
	 * - Klt_Cannabis_Menu_Admin. Defines all hooks for the admin area.
	 * - Klt_Cannabis_Menu_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    0.1.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-klt-cannabis-menu-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-klt-cannabis-menu-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-klt-cannabis-menu-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-klt-cannabis-menu-public.php';

		$this->loader = new Klt_Cannabis_Menu_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Klt_Cannabis_Menu_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    0.1.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Klt_Cannabis_Menu_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Klt_Cannabis_Menu_Admin( $this->get_plugin_name(), $this->get_version() );

		//$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		//$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_cannabis_menu' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_flower_cpt' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_edible_cpt' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_concentrate_cpt' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_topical_cpt' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_seed_cpt' );
		$this->loader->add_action( 'init', $plugin_admin, 'shared_cannabis_fields' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_cannabis_strain_tax' );
		$this->loader->add_action( 'init', $plugin_admin, 'insert_defined_strain_terms' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_cannabis_taste_tax' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_cannabis_scent_tax' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_cannabis_feeling_tax' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_edible_type_tax' );
		$this->loader->add_action( 'init', $plugin_admin, 'insert_default_edible_type_terms' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_concentrate_type_tax' );
		$this->loader->add_action( 'init', $plugin_admin, 'insert_default_concentrate_type_terms' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_topical_type_tax' );
		$this->loader->add_action( 'init', $plugin_admin, 'insert_default_topical_type_terms' );
		$this->loader->add_filter( 'admin_body_class', $plugin_admin, 'klt_admin_body_classes' );

		// if ( class_exists('acf') ) {
		// 	$this->loader->add_filter( 'acf/settings/load_json', $plugin_admin, 'klt_acf_load_point', 10, 1 );
		// }

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Klt_Cannabis_Menu_Public( $this->get_plugin_name(), $this->get_version() );

		//$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		//$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    0.1.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     0.1.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     0.1.0
	 * @return    Klt_Cannabis_Menu_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     0.1.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
