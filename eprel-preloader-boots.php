<?php
namespace eprel_preloader_namespace;

use eprel_preloader_namespace\PageSettings\Page_Settings;
define( "EPREL_ASFSK_ASSETS_PUBLIC_DIR_FILE", plugin_dir_url( __FILE__ ) . "assets/public" );
define( "EPREL_ASFSK_ASSETS_ADMIN_DIR_FILE", plugin_dir_url( __FILE__ ) . "assets/admin" );
class Classepreleffective {

	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function eprel_admin_editor_scripts() {
		add_filter( 'script_loader_tag', [ $this, 'eprel_admin_editor_scripts_as_a_module' ], 10, 2 );
	}

	public function eprel_admin_editor_scripts_as_a_module( $tag, $handle ) {
		if ( 'eprel_effective_editor' === $handle ) {
			$tag = str_replace( '<script', '<script type="module"', $tag );
		}

		return $tag;
	}

	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/eprel-preloader-widget.php' );
	}

	public function eprel_register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register WidgetsF
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\EPREL_Effective_widgets());
	}

	private function add_page_settings_controls() {
		require_once( __DIR__ . '/page-settings/eprel-preloader-manager.php' );
		new Page_Settings();
	}

	// Register Category
	function eprel_add_elementor_widget_categories($elements_manager){
		$elements_manager->add_category(
			'bwdthebest_general_category',
			[
				'title' => esc_html__( 'BWD General Group', 'effective-pre-loader' ),
				'icon' => 'eicon-person',
			]
		);
	}

	//css-js-link-here
	public function eprel_all_assets_for_the_public(){
		wp_enqueue_style( 'eprel-effective-sdffestyle', plugin_dir_url( __FILE__ ) . 'assets/public/css/eprel-loader.css', null, '1.0', 'all' );
		wp_enqueue_style( 'eprel-effective-sdstyle', plugin_dir_url( __FILE__ ) . 'assets/public/css/eprel-loader.min.css', null, '1.0', 'all' );

		wp_enqueue_script( 'eprel-effective-rpreloader', plugin_dir_url( __FILE__ ) . 'assets/public/js/eprel-loader-extra-transition.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'eprel-effective-emin-preloader', plugin_dir_url( __FILE__ ) . 'assets/public/js/eprel-loader-extra-transition.min.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'eprel-effective-wpreloaderwww', plugin_dir_url( __FILE__ ) . 'assets/public/js/eprel-loader.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'eprel-effective-qmin-preloaderqqqq', plugin_dir_url( __FILE__ ) . 'assets/public/js/eprel-loader.min.js', array('jquery'), '1.0', true );
	}

	//admin-icon
	public function eprel_all_assets_for_elementor_editor_admin(){
		$all_css_js_file = array(
			'eprel_effective_admin_main_css' => array('eprel_path_admin_define'=>EPREL_ASFSK_ASSETS_ADMIN_DIR_FILE . '/icon.css'),
		);
		foreach($all_css_js_file as $handle => $fileinfo){
			wp_enqueue_style( $handle, $fileinfo['eprel_path_admin_define'], null, '1.0', 'all');
		}
	}
	
	public function __construct() {

		// For public assets
		add_action('wp_enqueue_scripts', [$this, 'eprel_all_assets_for_the_public']);

		// For Elementor Editor
		add_action('elementor/editor/before_enqueue_scripts', [$this, 'eprel_all_assets_for_elementor_editor_admin']);
		
		// Register Category
		add_action( 'elementor/elements/categories_registered', [ $this, 'eprel_add_elementor_widget_categories' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'eprel_register_widgets' ] );

		// Register editor scripts
		add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'eprel_admin_editor_scripts' ] );
		
		$this->add_page_settings_controls();
	}
}

// Instantiate Plugin Class
Classepreleffective::instance();