<?php
/**
 * Plugin Name: Effective Pre Loader
 * Description: Effective Pre Loader plugin for Elementor with 20+ responsive and modern preloader designs.
 * Plugin URI:  https://bwdplugins.com/plugins/effective-pre-loader
 * Version:     1.0
 * Author:      Best WP Developer
 * Author URI:  https://bestwpdeveloper.com/
 * Text Domain: effective-pre-loader
 * Elementor tested up to: 3.0.0
 * Elementor Pro tested up to: 3.7.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once ( plugin_dir_path(__FILE__) ) . '/includes/eprel-plugin-activition.php';
final class eprel_swiper_preloader{

	const VERSION = '1.0';

	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

	const MINIMUM_PHP_VERSION = '7.0';

	public function __construct() {
		// Load translation
		add_action( 'eprel_init', array( $this, 'eprel_loaded_textdomain' ) );
		// eprel_init Plugin
		add_action( 'plugins_loaded', array( $this, 'eprel_init' ) );
	}

	public function eprel_loaded_textdomain() {
		load_plugin_textdomain( 'effective-pre-loader' );
	}

	public function eprel_init() {
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', 'eprel_addon_failed_load');
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'eprel_admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'eprel_admin_notice_minimum_php_version' ) );
			return;
		}

		// Once we get here, We have passed all validation checks so we can safely include our plugin
		require_once( 'eprel-preloader-boots.php' );
	}

	public function eprel_admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'effective-pre-loader' ),
			'<strong>' . esc_html__( 'Effective Pre Loader', 'effective-pre-loader' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'effective-pre-loader' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>' . esc_html__('%1$s', 'effective-pre-loader') . '</p></div>', $message );
	}

	public function eprel_admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'effective-pre-loader' ),
			'<strong>' . esc_html__( 'Effective Pre Loader', 'effective-pre-loader' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'effective-pre-loader' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>' . esc_html__('%1$s', 'effective-pre-loader') . '</p></div>', $message );
	}
}

// Instantiate preloader.
new eprel_swiper_preloader();
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );