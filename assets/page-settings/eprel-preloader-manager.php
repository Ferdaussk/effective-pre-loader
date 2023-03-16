<?php
namespace eprel_preloader_namespace\PageSettings;

use Elementor\Controls_Manager;
use Elementor\Core\DocumentTypes\PageBase;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class Page_Settings {

	const PANEL_TAB = 'new-tab';

	public function __construct() {
		add_action( 'elementor/init', [ $this, 'eprel_adpreloader_add_panel_tab' ] );
		add_action( 'elementor/documents/register_controls', [ $this, 'eprel_adpreloader_register_document_controls' ] );
	}

	public function eprel_adpreloader_add_panel_tab() {
		Controls_Manager::add_tab( self::PANEL_TAB, esc_html__( 'Effective Pre Loader', 'effective-pre-loader' ) );
	}

	public function eprel_adpreloader_register_document_controls( $document ) {
		if ( ! $document instanceof PageBase || ! $document::get_property( 'has_elements' ) ) {
			return;
		}

		$document->start_controls_section(
			'eprel_new_section',
			[
				'label' => esc_html__( 'Settings', 'effective-pre-loader' ),
				'tab' => self::PANEL_TAB,
			]
		);

		$document->add_control(
			'eprel_text',
			[
				'label' => esc_html__( 'Title', 'effective-pre-loader' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'effective-pre-loader' ),
			]
		);

		$document->end_controls_section();
	}
}
