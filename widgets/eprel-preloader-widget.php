<?php
namespace eprel_preloader_namespace\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

use Elementor\Utils;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Css_Filter;
use TheplusAddons\Theplus_Element_Load;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class EPREL_Effective_widgets extends Widget_Base {

	public function get_name() {
		return esc_html__( 'EffectivePreLoader', 'effective-pre-loader' );
	}

	public function get_title() {
		return esc_html__( 'Effective Pre Loader', 'effective-pre-loader' );
	}

	public function get_icon() {
		return 'eprel-effective-icon eicon-loading';
	}

	public function get_categories() {
		return [ 'bwdthebest_general_category' ];
	}

	
	public function get_keywords() {
		return ['preloader' , 'pre loader', 'load' , 'animation' , 'loader'];
	}
	
	protected function register_controls() {

		$this->start_controls_section(
			'contentSection',
			[
				'label' => esc_html__( 'Loader Content', 'effective-pre-loader' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();		
		$repeater->add_control(
			'plcSelect',
			[
				'label' => esc_html__( 'Choose Type', 'effective-pre-loader' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'Image',
				'options' => [
					'Image'  => esc_html__( 'Image', 'effective-pre-loader' ),
					'Icon'  => esc_html__( 'Icon', 'effective-pre-loader' ),					
					'TextContent'  => esc_html__( 'Text Content', 'effective-pre-loader' ),
					'PreDefined'  => esc_html__( 'Predefined', 'effective-pre-loader' ),
					'Lottie'  => esc_html__( 'Lottie', 'effective-pre-loader' ),
					'CustomCode'  => esc_html__( 'Custom Code', 'effective-pre-loader' ),
					'Shortcode'  => esc_html__( 'Shortcode', 'effective-pre-loader' ),
					'Progress'  => esc_html__( 'Progress', 'effective-pre-loader' ),
				],
			]
		);
		$repeater->add_control(
			'plcprecentagelayout',
			[
				'label' => esc_html__( 'Layout', 'effective-pre-loader' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'plcper1',
				'options' => [
					'plcper1'  => esc_html__( 'Layout 1', 'effective-pre-loader' ),
					'plcper2'  => esc_html__( 'Layout 2', 'effective-pre-loader' ),
					'plcper3'  => esc_html__( 'Layout 3', 'effective-pre-loader' ),
					'plcper4'  => esc_html__( 'Layout 4', 'effective-pre-loader' ),
					'plcper5'  => esc_html__( 'Layout 5', 'effective-pre-loader' ),
					'plcper6'  => esc_html__( 'Layout 6', 'effective-pre-loader' ),
				],
				'condition' => [
					'plcSelect' => 'Progress',
				],
			]
		);
		$repeater->add_control(
			'plcper3prefix',
			[
				'label' => esc_html__( 'Prefix', 'effective-pre-loader' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Enter Prefix', 'effective-pre-loader' ),
				'condition' => [
					'plcSelect' => 'Progress',
					'plcprecentagelayout' => 'plcper3',
				],
			]
		);
		$repeater->add_control(
			'plcper3postfix',
			[
				'label' => esc_html__( 'Postfix', 'effective-pre-loader' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Enter Postfix', 'effective-pre-loader' ),
				'condition' => [
					'plcSelect' => 'Progress',
					'plcprecentagelayout' => 'plcper3',
				],
			]
		);
		$repeater->add_control(
			'plcprecentagelayoueprelos',
			[
				'label' => esc_html__( 'Position', 'effective-pre-loader' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'plcperpostop',
				'options' => [
					'plcperpostop'  => esc_html__( 'Top', 'effective-pre-loader' ),
					'plcperposbottom'  => esc_html__( 'Bottom', 'effective-pre-loader' ),
				],
				'condition' => [
					'plcSelect' => 'Progress',
					'plcprecentagelayout' => 'plcper2',
				],
			]
		);
		$repeater->add_control(
			'plcsImage',
			[
				'type' => Controls_Manager::MEDIA,
				'label' => esc_html__('Image', 'effective-pre-loader'),
				'dynamic' => [ 'active'   => true, ],
				'condition' => [
					'plcSelect' => 'Image',
				],
			]
		);
		$repeater->add_control(
			'plcsImageLoader',
			[
				'label' => esc_html__( 'Loader on Image', 'effective-pre-loader' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'effective-pre-loader' ),
				'label_off' => esc_html__( 'Disable', 'effective-pre-loader' ),
				'default' => 'no',
				'condition' => [
					'plcSelect' => 'Image',
				],
			]
		);
		$repeater->add_control(
			'plcsIcons',
			[
				'label' => esc_html__( 'Icon', 'effective-pre-loader' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-spinner',
					'library' => 'solid',
				],
				'condition' => [
					'plcSelect' => 'Icon',
				],	
			]
		);
		$repeater->add_control(
			'plcsText',
			[
				'label' => esc_html__( 'Text', 'effective-pre-loader' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Process…', 'effective-pre-loader' ),
				'placeholder' => esc_html__( 'Type your loading text', 'effective-pre-loader' ),
				'condition' => [
					'plcSelect' => 'TextContent',
				],
			]
		);
		$repeater->add_control(
			'plcsTextLoader',
			[
				'label' => esc_html__( 'Loader on Text', 'effective-pre-loader' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'effective-pre-loader' ),
				'label_off' => esc_html__( 'Disable', 'effective-pre-loader' ),
				'default' => 'no',
				'condition' => [
					'plcSelect' => 'TextContent',
				],
			]
		);		
		$repeater->add_control(
			'plcsLottieUrl',
			[
				'label' => esc_html__( 'Lottie URL', 'effective-pre-loader' ),
				'type' => Controls_Manager::URL,				
				'placeholder' => esc_html__( 'https://www.demo-link.com', 'effective-pre-loader' ),
				'condition' => [
					'plcSelect' => 'Lottie',
				],
			]
		);
		$repeater->add_responsive_control(
			'plcsLottieWidth',
			[
				'label' => esc_html__( 'Width', 'effective-pre-loader' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 700,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 300,
				],
				'separator' => 'before',
				'condition' => [
					'plcSelect' => 'Lottie',
				],
			]
		);
		$repeater->add_responsive_control(
			'plcsLottieHeight',
			[
				'label' => esc_html__( 'Height', 'effective-pre-loader' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 700,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 300,
				],
				'condition' => [
					'plcSelect' => 'Lottie',
				],
			]
		);
		$repeater->add_responsive_control(
			'plcsLottieSpeed',
			[
				'label' => esc_html__( 'Speed', 'effective-pre-loader' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 10,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'condition' => [
					'plcSelect' => 'Lottie',
				],
			]
		);
		$repeater->add_control(
			'plcsLottieLoop',
			[
				'label' => esc_html__( 'Loop Animation', 'effective-pre-loader' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'effective-pre-loader' ),
				'label_off' => esc_html__( 'Disable', 'effective-pre-loader' ),
				'default' => 'yes',
				'separator' => 'before',
				'condition' => [
					'plcSelect' => 'Lottie',
				],
			]
		);
		$repeater->add_control(
			'plcsPreAnimation',
			[
				'label' => esc_html__( 'Select', 'effective-pre-loader' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'animation-1',
				'options' => [
					'animation-1'  => esc_html__( 'Animation 1', 'effective-pre-loader' ),
					'animation-2'  => esc_html__( 'Animation 2', 'effective-pre-loader' ),
					'animation-3'  => esc_html__( 'Animation 3', 'effective-pre-loader' ),
					'animation-4'  => esc_html__( 'Animation 4', 'effective-pre-loader' ),
					'animation-5'  => esc_html__( 'Animation 5', 'effective-pre-loader' ),
					'animation-6'  => esc_html__( 'Animation 6', 'effective-pre-loader' ),
					'animation-7'  => esc_html__( 'Animation 7', 'effective-pre-loader' ),
					'animation-8'  => esc_html__( 'Animation 8', 'effective-pre-loader' ),
					'animation-9'  => esc_html__( 'Animation 9', 'effective-pre-loader' ),
					'animation-10'  => esc_html__( 'Animation 10', 'effective-pre-loader' ),
					'animation-12'  => esc_html__( 'Animation 11', 'effective-pre-loader' ),
					'animation-14'  => esc_html__( 'Animation 12', 'effective-pre-loader' ),
					'animation-15'  => esc_html__( 'Animation 13', 'effective-pre-loader' ),
				],
				'condition' => [
					'plcSelect' => 'PreDefined',
				],
			]
		);
		$repeater->add_control(
			'plcsCustomCode',
			[
				'label' => esc_html__( 'Code', 'effective-pre-loader' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => '',
				'placeholder' => esc_html__( 'Enter Your Custom Code.', 'effective-pre-loader' ),
				'dynamic' => [ 'active'   => true, ],
				'condition' => [
					'plcSelect' => 'CustomCode',
				],
			]
		);
		$repeater->add_control(
			'plcsCustomShortCode',
			[
				'label' => esc_html__( 'Shortcode', 'effective-pre-loader' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'default' => '',
				'placeholder' => esc_html__( 'Enter Shortcode.', 'effective-pre-loader' ),
				'dynamic' => [ 'active'   => true, ],
				'condition' => [
					'plcSelect' => 'Shortcode',
				],
			]
		);
		$this->add_control(
			'preLoaderContent',
			[
				'label' => esc_html__( 'Pre Loader', 'effective-pre-loader' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'plcSelect' => 'Image',                       
					],
				],                
				'fields' => $repeater->get_controls(),
					'title_field' => '{{{ plcSelect }}}',				
			]
		);
		$this->add_control(
			'backpreloader',
			[
				'label' => esc_html__( 'PreLoad Visibility', 'effective-pre-loader' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'effective-pre-loader' ),
				'label_off' => esc_html__( 'Disable', 'effective-pre-loader' ),
				'default' => 'no',
				'description' => esc_html__('Note : It will show static preloader area just for design purpose.','effective-pre-loader'),
				'separator' => 'before',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'aniLoadFirstSection',
			[
				'label' => esc_html__( 'Load First', 'effective-pre-loader' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'alfSwitch',
			[
				'label' => esc_html__( 'Exclude Content', 'effective-pre-loader' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'effective-pre-loader' ),
				'label_off' => esc_html__( 'Disable', 'effective-pre-loader' ),
				'default' => 'no',
			]
		);
		$this->add_control(
			'alfExclude',
			[
				'label' => esc_html__( 'Exclude', 'effective-pre-loader' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'alfheader',
				'options' => [
					'alfheader'  => esc_html__( 'Header', 'effective-pre-loader' ),
					'alfcustom'  => esc_html__( 'Custom', 'effective-pre-loader' ),
				],
				'condition' => [
					'alfSwitch' => 'yes',
				],
			]
		);
		$this->add_control(
			'alfExcludecustom',
			[
				'label' => esc_html__( 'Class', 'effective-pre-loader' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => '',
				'placeholder' => esc_html__( '.your-class', 'effective-pre-loader' ),
				'dynamic' => [ 'active'   => true, ],
				'condition' => [
					'alfSwitch' => 'yes',
					'alfExclude' => 'alfcustom',
				],
			]
		);
		$this->add_control(
			'alfExcludeZIndexpos',
			[
				'label' => esc_html__( 'Position', 'effective-pre-loader' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [
					'top'  => esc_html__( 'Top', 'effective-pre-loader' ),
					'bottom'  => esc_html__( 'Bottom', 'effective-pre-loader' ),
				],
				'condition' => [
					'alfSwitch' => 'yes',
					'alfExclude' => 'alfcustom',
				],
			]
		);
		$this->add_control(
			'alfExcludeZIndex',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__('Z-Index', 'effective-pre-loader'),
				'size_units' => ['px'],
				'separator' => 'before',
				'default' => [
					'unit' => 'px',
					'size' => 12345,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 99999,
						'step' => 100,
					],
				],
				'condition' => [
					'alfSwitch' => 'yes',
				],
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'pageLoadSection',
			[
				'label' => esc_html__( 'Page Transition', 'effective-pre-loader' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'inTransition',
			[
				'label' => esc_html__( 'In Transition', 'effective-pre-loader' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'pageLoadTransition',
			[
				'label' => esc_html__( 'Transition', 'effective-pre-loader' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'pageloadfadein',
				'options' => [
					'pageloadfadein'  => esc_html__( 'Fade', 'effective-pre-loader' ),
					'pageloadslidein'  => esc_html__( 'Slide', 'effective-pre-loader' ),
					'pageloadtripleswoosh'  => esc_html__( 'Triple Swoosh', 'effective-pre-loader' ),
					'pageloadsimple'  => esc_html__( 'Simple', 'effective-pre-loader' ),
					'pageloadduomove'  => esc_html__( 'Duo Move', 'effective-pre-loader' ),
				],
			]
		);
		$this->add_control(
			'pageLoad4InDir',
			[
				'label' => esc_html__( 'Direction', 'effective-pre-loader' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  => esc_html__( 'Left', 'effective-pre-loader' ),
					'right'  => esc_html__( 'Right', 'effective-pre-loader' ),
					'top'  => esc_html__( 'Top', 'effective-pre-loader' ),
					'bottom'  => esc_html__( 'Bottom', 'effective-pre-loader' ),
					'topleft'  => esc_html__( 'Top Left', 'effective-pre-loader' ),
					'topright'  => esc_html__( 'Top Right', 'effective-pre-loader' ),
					'bottomleft'  => esc_html__( 'Bottom Left', 'effective-pre-loader' ),
					'bottomright'  => esc_html__( 'Bottom Right', 'effective-pre-loader' ),
				],
				'condition' => [
					'pageLoadTransition' => ['pageloadtripleswoosh','pageloadsimple','pageloadduomove'],
				],
			]
		);
		$this->add_control(
			'pageLoadSlideInDir',
			[
				'label' => esc_html__( 'Direction', 'effective-pre-loader' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  => esc_html__( 'Left', 'effective-pre-loader' ),
					'right'  => esc_html__( 'Right', 'effective-pre-loader' ),
					'top'  => esc_html__( 'Top', 'effective-pre-loader' ),
					'bottom'  => esc_html__( 'Bottom', 'effective-pre-loader' ),
				],
				'condition' => [
					'pageLoadTransition' => 'pageloadslidein',
				],
			]
		);
		$this->add_control(
			'outTransition',
			[
				'label' => esc_html__( 'Out Transition', 'effective-pre-loader' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'effective-pre-loader' ),
				'label_off' => esc_html__( 'Disable', 'effective-pre-loader' ),
				'default' => 'no',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'postLoadTransition',
			[
				'label' => esc_html__( 'Transition', 'effective-pre-loader' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'postloadfadeout',
				'options' => [
					'postloadfadeout'  => esc_html__( 'Fade', 'effective-pre-loader' ),
					'postloadslideout'  => esc_html__( 'Slide', 'effective-pre-loader' ),
					'postloadstripleswoosh'  => esc_html__( 'Triple Swoosh', 'effective-pre-loader' ),
					'postloadssimple'  => esc_html__( 'Simple', 'effective-pre-loader' ),
					'postloadsduomove'  => esc_html__( 'Duo Move', 'effective-pre-loader' ),
				],
				'condition' => [
					'outTransition' => 'yes',
				],
			]
		);
		$this->add_control(
			'postLoad4InDir',
			[
				'label' => esc_html__( 'Direction', 'effective-pre-loader' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  => esc_html__( 'Left', 'effective-pre-loader' ),
					'right'  => esc_html__( 'Right', 'effective-pre-loader' ),
					'top'  => esc_html__( 'Top', 'effective-pre-loader' ),
					'bottom'  => esc_html__( 'Bottom', 'effective-pre-loader' ),
					'topleft'  => esc_html__( 'Top Left', 'effective-pre-loader' ),
					'topright'  => esc_html__( 'Top Right', 'effective-pre-loader' ),
					'bottomleft'  => esc_html__( 'Bottom Left', 'effective-pre-loader' ),
					'bottomright'  => esc_html__( 'Bottom Right', 'effective-pre-loader' ),
				],
				'condition' => [
					'outTransition' => 'yes',
					'postLoadTransition' => ['postloadstripleswoosh','postloadssimple','postloadsduomove'],
				],
			]
		);
		$this->add_control(
			'postLoadSlideInDir',
			[
				'label' => esc_html__( 'Direction', 'effective-pre-loader' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  => esc_html__( 'Left', 'effective-pre-loader' ),
					'right'  => esc_html__( 'Right', 'effective-pre-loader' ),
					'top'  => esc_html__( 'Top', 'effective-pre-loader' ),
					'bottom'  => esc_html__( 'Bottom', 'effective-pre-loader' ),
				],
				'condition' => [
					'outTransition' => 'yes',
					'postLoadTransition' => 'postloadslideout',
				],
			]
		);
		$this->add_control(
			'postLoadExcludeCustom',
			[
				'label' => esc_html__( 'Exclude Class', 'effective-pre-loader' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => '',
				'placeholder' => esc_html__( 'Enter Exclude Class.', 'effective-pre-loader' ),
				'dynamic' => [ 'active'   => true, ],
				'condition' => [
					'outTransition' => 'yes',
				],
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'extraOptionsSection',
			[
				'label' => esc_html__( 'Extra Options', 'effective-pre-loader' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'loadtime',
			[
				'label' => esc_html__( 'Load Time', 'effective-pre-loader' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'loadtimedefault',
				'options' => [
					'loadtimedefault'  => esc_html__( 'Default', 'effective-pre-loader' ),
					'loadtimemin'  => esc_html__( 'Minimum', 'effective-pre-loader' ),					
					'loadtimemax'  => esc_html__( 'Maximum', 'effective-pre-loader' ),
				],
			]
		);
		$this->add_responsive_control(
			'loadmaxtime',
			[
				'label' => esc_html__( 'Time (Second)', 'effective-pre-loader' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 60,
						'step' => 1,
					],
				],
				'condition' => [
					'loadtime' => 'loadtimemax',
				],
			]
		);
		$this->add_responsive_control(
			'loadmintime',
			[
				'label' => esc_html__( 'Time (Second)', 'effective-pre-loader' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 60,
						'step' => 1,
					],
				],
				'condition' => [
					'loadtime' => 'loadtimemin',
				],
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'pr_image_styling',
			[
				'label' => esc_html__('Image', 'effective-pre-loader'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'pr_image_max_width',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__('Max Width', 'effective-pre-loader'),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
						'step' => 1,
					],
				],				
				'render_type' => 'ui',
				'selectors' => [
					'.eprel-loader-wrapper #eprel-loader #eprel-preloader-logo-img img,#eprel-img-loader .eprel-preloader-logo-img' => 'max-width: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'pr_image_margin',
			[
				'label' => esc_html__( 'Margin', 'effective-pre-loader' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em'],				
				'selectors' => [
					'.eprel-loader-wrapper #eprel-loader #eprel-preloader-logo-img img,
					#eprel-img-loader' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pr_image_border',
				'label' => esc_html__( 'Border', 'effective-pre-loader' ),
				'selector' => '.eprel-loader-wrapper #eprel-loader #eprel-preloader-logo-img img',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'pr_imageb_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'effective-pre-loader' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'.eprel-loader-wrapper #eprel-loader #eprel-preloader-logo-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',				
				],	
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'pr_image_shadow',
				'selector' => '.eprel-loader-wrapper #eprel-loader #eprel-preloader-logo-img img',				
			]
		);
		$this->add_control(
			'imageloaderheading',
			[
				'label' => esc_html__( 'Image Loader', 'effective-pre-loader' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->start_controls_tabs('il_tabs');
		$this->start_controls_tab('il_norm',
			[
				'label' => esc_html__( 'Normal', 'effective-pre-loader' ),
			]
		);
		$this->add_responsive_control(
			'if_n_i_opacity',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__('Opacity', 'effective-pre-loader'),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => .1,
						'max' => 1,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0.3,
				],
				'render_type' => 'ui',
				'selectors' => [
					'{{WRAPPER}} #eprel-img-loader .eprel-preloader-logo-img' => 'opacity: {{SIZE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'if_n_i_filters',
				'selector' => '{{WRAPPER}} #eprel-img-loader .eprel-preloader-logo-img',
				'separator' => 'before',
			]
		);	
		$this->end_controls_tab();
		$this->start_controls_tab('il_fill',
			[
				'label' => esc_html__( 'Fill', 'effective-pre-loader' ),
			]
		);
		$this->add_responsive_control(
			'if_f_i_opacity',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__('Opacity', 'effective-pre-loader'),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => .1,
						'max' => 1,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'render_type' => 'ui',
				'selectors' => [
					'{{WRAPPER}} .eprel-img-loader-wrap .eprel-img-loader-wrap-in' => 'opacity: {{SIZE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'if_f_i_filters',
				'selector' => '{{WRAPPER}} #eprel-img-loader-wrap .eprel-img-loader-wrap-in',
				'separator' => 'before',
			]
		);	
		$this->end_controls_tab();
		$this->end_controls_tabs();			
		$this->end_controls_section();
		
		$this->start_controls_section(
			'pr_icon_styling',
			[
				'label' => esc_html__('Icon', 'effective-pre-loader'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'pr_icon_size',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__('Size', 'effective-pre-loader'),
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
						'step' => 1,
					],
				],				
				'render_type' => 'ui',
				'selectors' => [
					'.eprel-loader-wrapper #eprel-loader .eprel-preloader-icon i' => 'font-size: {{SIZE}}{{UNIT}}',
					'.eprel-loader-wrapper #eprel-loader .eprel-preloader-icon svg' => 'width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'pr_icon_padding',
			[
				'label' => esc_html__( 'Padding', 'effective-pre-loader' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em'],				
				'selectors' => [
					'.eprel-loader-wrapper #eprel-loader .eprel-preloader-icon i,.eprel-loader-wrapper #eprel-loader .eprel-preloader-icon svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'pr_icon_margin',
			[
				'label' => esc_html__( 'Margin', 'effective-pre-loader' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em'],				
				'selectors' => [
					'.eprel-loader-wrapper #eprel-loader .eprel-preloader-icon i,.eprel-loader-wrapper #eprel-loader .eprel-preloader-icon svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'after',
			]
		);
		$this->add_control(
			'pr_icon_color',
			[
				'label' => esc_html__( 'Color', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.eprel-loader-wrapper #eprel-loader .eprel-preloader-icon i:before' => 'color: {{VALUE}};',
					'.eprel-loader-wrapper #eprel-loader .eprel-preloader-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'pr_icon_background',
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '.eprel-loader-wrapper #eprel-loader .eprel-preloader-icon i,.eprel-loader-wrapper #eprel-loader .eprel-preloader-icon svg',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pr_icon_border',
				'label' => esc_html__( 'Border', 'effective-pre-loader' ),
				'selector' => '.eprel-loader-wrapper #eprel-loader .eprel-preloader-icon i,.eprel-loader-wrapper #eprel-loader .eprel-preloader-icon svg',
			]
		);
		$this->add_responsive_control(
			'pr_iconb_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'effective-pre-loader' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'.eprel-loader-wrapper #eprel-loader .eprel-preloader-icon i,.eprel-loader-wrapper #eprel-loader .eprel-preloader-icon svg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',				
				],	
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'pr_icon_shadow',
				'selector' => '.eprel-loader-wrapper #eprel-loader .eprel-preloader-icon i,.eprel-loader-wrapper #eprel-loader .eprel-preloader-icon svg',				
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'pr_text_styling',
			[
				'label' => esc_html__('Text', 'effective-pre-loader'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'pr_text_padding',
			[
				'label' => esc_html__( 'Padding', 'effective-pre-loader' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em'],				
				'selectors' => [
					'.eprel-loader-wrapper #eprel-loader .eprel-preloader-animated-text span,
					.eprel-loader-wrapper .eprel-text-loader,.eprel-loader-wrapper .eprel-text-loader .eprel-text-loader-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'pr_text_margin',
			[
				'label' => esc_html__( 'Margin', 'effective-pre-loader' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em'],				
				'selectors' => [
					'.eprel-loader-wrapper #eprel-loader .eprel-preloader-animated-text span,
					.eprel-loader-wrapper .eprel-text-loader,.eprel-loader-wrapper .eprel-text-loader .eprel-text-loader-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'after',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pr_text_typography',
				'selector' => '.eprel-loader-wrapper #eprel-loader .eprel-preloader-animated-text span,
				.eprel-loader-wrapper .eprel-text-loader,.eprel-loader-wrapper .eprel-text-loader .eprel-text-loader-inner',
			]
		);		
		$this->add_control(
			'pr_text_color',
			[
				'label' => esc_html__( 'Color', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.eprel-loader-wrapper #eprel-loader .eprel-preloader-animated-text span,.eprel-loader-wrapper .eprel-text-loader' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'pr_text_background',
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '.eprel-loader-wrapper #eprel-loader .eprel-preloader-animated-text span,
				.eprel-loader-wrapper .eprel-text-loader',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pr_text_border',
				'label' => esc_html__( 'Border', 'effective-pre-loader' ),
				'selector' => '.eprel-loader-wrapper #eprel-loader .eprel-preloader-animated-text span,
				.eprel-loader-wrapper .eprel-text-loader',
			]
		);
		$this->add_responsive_control(
			'pr_textb_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'effective-pre-loader' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'.eprel-loader-wrapper #eprel-loader .eprel-preloader-animated-text span,
					.eprel-loader-wrapper .eprel-text-loader' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',				
				],	
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'pr_text_shadow',
				'selector' => '.eprel-loader-wrapper #eprel-loader .eprel-preloader-animated-text span,
				.eprel-loader-wrapper .eprel-text-loader',				
			]
		);
		$this->add_control(
			'textloaderheading',
			[
				'label' => esc_html__( 'Text Loader', 'effective-pre-loader' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'textloader_color',
			[
				'label' => esc_html__( 'Color', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eprel-loader-wrapper .eprel-text-loader .eprel-text-loader-inner' => 'color: {{VALUE}};',
				],
			]
		);		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'pr_predefined_styling',
			[
				'label' => esc_html__('Predefined', 'effective-pre-loader'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'pr_predefine_padding',
			[
				'label' => esc_html__( 'Padding', 'effective-pre-loader' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em'],				
				'selectors' => [
					'#eprel-loader > div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'pr_predefine_margin',
			[
				'label' => esc_html__( 'Margin', 'effective-pre-loader' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em'],				
				'selectors' => [
					'#eprel-loader > div' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'pr_predefined_color1',
			[
				'label' => esc_html__( 'Color 1', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.eprel-ball-grid-pulse>div,
					.eprel-rounded-triangle' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'pr_predefined_color2',
			[
				'label' => esc_html__( 'Color 2', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'pr_progress_styling',
			[
				'label' => esc_html__('Progress Bar', 'effective-pre-loader'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'progresswidth',
			[
				'label' => esc_html__( 'Width', 'effective-pre-loader' ),
				'type'  => Controls_Manager::SLIDER,
				'size_units' => [ '%' ,'px','vw'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 700,
						'step' => 1,
					],
					'%' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 300,
				],
				'selectors' => [
					'{{WRAPPER}} .eprel-preloader-wrap,
					{{WRAPPER}} .eprel-preloader-wrap4,
					{{WRAPPER}} .eprel-preloader-wrap6' => 'min-width: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'progressheight',
			[
				'label' => esc_html__( 'Height', 'effective-pre-loader' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 700,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .eprel-loader,{{WRAPPER}} .eprel-percentage,{{WRAPPER}} .percentagelayout' => 'height: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'progressmargin',
			[
				'label' => esc_html__( 'Margin', 'effective-pre-loader' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em'],				
				'selectors' => [
					'{{WRAPPER}} .eprel-preloader-wrap,
					{{WRAPPER}} .eprel-preloader-wrap4,
					{{WRAPPER}} .eprel-preloader-wrap6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);		
		$this->add_control(
			'progressbar',
			[
				'label' => esc_html__( 'Progress Bar', 'effective-pre-loader' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'progressbargradiantcolor',
			[
				'label' => esc_html__( 'Gradient Color', 'effective-pre-loader' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'effective-pre-loader' ),
				'label_off' => esc_html__( 'Disable', 'effective-pre-loader' ),
				'default' => 'no',				
			]
		);
		$this->add_control(
			'progressbarcolor1',
			[
				'label' => esc_html__( 'Color 1', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#6fc784',
				'condition' => [
					'progressbargradiantcolor!' => 'yes',
				],
			]
		);
		$this->add_control(
			'progressbarcolor2',
			[
				'label' => esc_html__( 'Color 2', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#6fc784d4',
				'selectors' => [
					'{{WRAPPER}} .eprel-loadbar,{{WRAPPER}} .percentagelayout,{{WRAPPER}} .eprel-preloader-wrap4.plcper4 .eprel-preloader-wrap4-in,
					{{WRAPPER}} .eprel-preloader-wrap5.plcper5 .eprel-pre-5' => 'background: repeating-linear-gradient(45deg,  {{progressbarcolor1.VALUE}}, {{progressbarcolor1.VALUE}} 10px, {{progressbarcolor2.VALUE}} 10px, {{progressbarcolor2.VALUE}} 20px);',
					'{{WRAPPER}} .eprel-glow' => 'box-shadow: 0 0 60px 10px {{progressbarcolor1.VALUE}};',
				],
				'condition' => [
					'progressbargradiantcolor!' => 'yes',
				],
			]
		);
		$this->add_control(
			'progressbarcolorg1',
			[
				'label' => esc_html__( 'Color 1', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffd33d',
				'condition' => [
					'progressbargradiantcolor' => 'yes',
				],
			]
		);
		$this->add_control(
			'progressbarcolorg2',
			[
				'label' => esc_html__( 'Color 2', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ff5a6e',
				'condition' => [
					'progressbargradiantcolor' => 'yes',
				],
			]
		);
		$this->add_control(
			'progressbarcolorg3',
			[
				'label' => esc_html__( 'Color 3', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#8072fc',
				'condition' => [
					'progressbargradiantcolor' => 'yes',
				],
			]
		);
		$this->add_control(
			'progressbarcolorg4',
			[
				'label' => esc_html__( 'Color 4', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#6fc784',
				'condition' => [
					'progressbargradiantcolor' => 'yes',
				],
			]
		);
		$this->add_control(
			'progressbarcolorg5',
			[
				'label' => esc_html__( 'Color 5', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f7d782',
				'condition' => [
					'progressbargradiantcolor' => 'yes',
				],
			]
		);
		$this->add_control(
			'progressbarcolorg6',
			[
				'label' => esc_html__( 'Color 6', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ff5a6e',
				'condition' => [
					'progressbargradiantcolor' => 'yes',
				],
			]
		);
		$this->add_control(
			'progressbarcolorg7',
			[
				'label' => esc_html__( 'Color 7', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#8072fc',
				'selectors' => [
					'{{WRAPPER}} .eprel-loadbar,{{WRAPPER}} .percentagelayout,{{WRAPPER}} .eprel-preloader-wrap4.plcper4 .eprel-preloader-wrap4-in,
					{{WRAPPER}} .eprel-preloader-wrap5.plcper5 .eprel-pre-5' => 'background: linear-gradient(90deg,{{progressbarcolorg1.VALUE}},{{progressbarcolorg2.VALUE}} 17%,{{progressbarcolorg3.VALUE}} 34%,{{progressbarcolorg4.VALUE}} 51%,{{progressbarcolorg5.VALUE}} 68%,{{progressbarcolorg6.VALUE}} 85%,{{progressbarcolorg7.VALUE}});',
					'{{WRAPPER}} .eprel-glow' => 'box-shadow: 0 0 60px 10px {{progressbarcolorg1.VALUE}};',
				],
				'condition' => [
					'progressbargradiantcolor' => 'yes',
				],
			]
		);
		$this->add_control(
			'progressbarcolorempty',
			[
				'label' => esc_html__( 'Progress Empty Color (Layout 4)', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff7d',
				'selectors' => [
					'{{WRAPPER}} .eprel-preloader-wrap4.plcper4' => 'background-color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'progressbar5size',
			[
				'label' => esc_html__( 'Progress Size (Layout 5)', 'effective-pre-loader' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 25,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 3,
				],
				'selectors' => [
					'{{WRAPPER}} .eprel-preloader-wrap5.plcper5 .eprel-pre-5-in3,{{WRAPPER}}  .eprel-preloader-wrap5.plcper5 .eprel-pre-5-in4' => 'height: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .eprel-preloader-wrap5.plcper5 .eprel-pre-5-in1,{{WRAPPER}}  .eprel-preloader-wrap5.plcper5 .eprel-pre-5-in2' => 'width: {{SIZE}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'progressbordercolor',
				'label' => esc_html__( 'Border', 'effective-pre-loader' ),
				'selector' => '{{WRAPPER}} .eprel-percentage.eprel-percentage-load',				
				'separator' => 'before',
			]
	    );
		$this->add_responsive_control(
			'progressborderradious',
			[
				'label' => esc_html__( 'Border Radius', 'effective-pre-loader' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eprel-loadbar,.percentagelayout,{{WRAPPER}} .eprel-percentage.eprel-percentage-load' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'progresstext_styling',
			[
				'label' => esc_html__('Progress Number', 'effective-pre-loader'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progresstexttypography',
				'label' => esc_html__( 'Typography', 'effective-pre-loader' ),
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .eprel-percentage.eprel-percentage-load,{{WRAPPER}} .eprel-preloader-wrap.plcper3 div#eprel-precent3,
				{{WRAPPER}} .eprel-preloader-wrap4.plcper4 .eprel-preloader-wrap4-in',
				
			]
		);
		$this->add_control(
			'progresstextcolor',
			[
				'label' => esc_html__( 'Color', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .eprel-percentage.eprel-percentage-load,{{WRAPPER}} .eprel-preloader-wrap.plcper3 div#eprel-precent3,
					{{WRAPPER}} .eprel-preloader-wrap4.plcper4 .eprel-preloader-wrap4-in' => 'color: {{VALUE}}',
				],
				
			]
		);
		$this->add_control(
			'progresstexeprelrepostheading',
			[
				'label' => esc_html__( 'Progress Layout 3', 'effective-pre-loader' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'progresstexeprelrefix',
			[
				'label' => esc_html__( 'Prefix', 'effective-pre-loader' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progresstexeprelrefixtypography',
				'label' => esc_html__( 'Typography', 'effective-pre-loader' ),
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .eprel-preloader-wrap.plcper3 span.eprel-perc-prepostfix.eprel-perc-pre',
				
			]
		);
		$this->add_control(
			'progresstexeprelrefixcolor',
			[
				'label' => esc_html__( 'Color', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .eprel-preloader-wrap.plcper3 span.eprel-perc-prepostfix.eprel-perc-pre' => 'color: {{VALUE}}',
				],
				
			]
		);
		$this->add_control(
			'progresstexeprelostfix',
			[
				'label' => esc_html__( 'Postfix', 'effective-pre-loader' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progresstexeprelostfixtypography',
				'label' => esc_html__( 'Typography', 'effective-pre-loader' ),
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .eprel-preloader-wrap.plcper3 span.eprel-perc-prepostfix.eprel-perc-post',
				
			]
		);
		$this->add_control(
			'progresstexeprelostfixcolor',
			[
				'label' => esc_html__( 'Color', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .eprel-preloader-wrap.plcper3 span.eprel-perc-prepostfix.eprel-perc-post' => 'color: {{VALUE}}',
				],
				
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'progresscircle_styling',
			[
				'label' => esc_html__('Progress Circle', 'effective-pre-loader'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'pctextemptycolor',
			[
				'label' => esc_html__( 'Empty Color', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff36',
				
			]
		);
		$this->add_control(
			'pctextfillcolor',
			[
				'label' => esc_html__( 'Fill Color', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				
			]
		);
		$this->add_responsive_control(
			'pctextstrocksize',
			[
				'label' => esc_html__( 'Stroke Width', 'effective-pre-loader' ),
				'type'  => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 20,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 4,
				],
			]
		);
		$this->add_control(
			'pctextheading',
			[
				'label' => esc_html__( 'Percentage Styling', 'effective-pre-loader' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pctexttypography',
				'label' => esc_html__( 'Typography', 'effective-pre-loader' ),
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .eprel-preloader-wrap6.plcper6 .eprel-percentage.eprel-percentage-load',
				
			]
		);
		$this->add_control(
			'pctextcolor',
			[
				'label' => esc_html__( 'Color', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .eprel-preloader-wrap6.plcper6 .eprel-percentage.eprel-percentage-load' => 'color: {{VALUE}}',
				],
				
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'pr_extra_transition_styling',
			[
				'label' => esc_html__('Transition Effect', 'effective-pre-loader'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'pageLoadTransition' => ['pageloadtripleswoosh','pageloadsimple','pageloadduomove'],
				],
			]
		);
		$this->add_control(
			'eprel4color1',
			[
				'label' => esc_html__( 'Color 1', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ff5a6e',
			]
		);
		$this->add_control(
			'eprel4color2',
			[
				'label' => esc_html__( 'Color 2', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#8072fc',
				'conditions'   => [
					'terms' => [
						[
							'relation' => 'or',
							'terms'    => [								
								[
									'name'     => 'pageLoadTransition','operator' => '==','value'    => 'pageloadtripleswoosh',
								],
								[
									'name'     => 'pageLoadTransition','operator' => '==','value'    => 'pageloadduomove',
								],
							],
						],
					],
				],
			]
		);
		$this->add_control(
			'eprel4color3',
			[
				'label' => esc_html__( 'Color 3', 'effective-pre-loader' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#6fc784',
				'conditions'   => [
					'terms' => [
						[
							'relation' => 'or',
							'terms'    => [								
								[
									'name'     => 'pageLoadTransition','operator' => '==','value'    => 'pageloadtripleswoosh',
								],
							],
						],
					],
				],
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'pr_box_styling',
			[
				'label' => esc_html__('Box', 'effective-pre-loader'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'pr_box_width',
			[
				'label' => esc_html__( 'Width', 'effective-pre-loader' ),
				'type'  => Controls_Manager::SLIDER,
				'size_units' => [ '%' ,'px','vw'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 700,
						'step' => 1,
					],
					'%' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eprel-loader-wrapper #eprel-loader' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
				'pr_box_padding',
				[
					'label'      => esc_html__( 'Padding', 'effective-pre-loader' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors'  => [
						'#eprel-loader-wrapper #eprel-loader' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],				
				]
		);
		$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'pr_box_BG',
					'label' => esc_html__( 'Background Type', 'effective-pre-loader' ),
				    'types' => [ 'classic', 'gradient' ],
				    'selector' => '#eprel-loader-wrapper #eprel-loader',
				   
				]
		);
		 $this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'pr_box_Border',
					'label' => esc_html__( 'Border', 'effective-pre-loader' ),
					'selector' => '#eprel-loader-wrapper #eprel-loader',
				]
	    );
		$this->add_responsive_control(
			'pr_box_BRadius',
			[
				'label'      => esc_html__( 'Border Radius', 'effective-pre-loader' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'#eprel-loader-wrapper #eprel-loader' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pr_box_Shadow',
				'label' => esc_html__( 'Box Shadow', 'effective-pre-loader' ),
				'selector' => '#eprel-loader-wrapper #eprel-loader',
				
			]
		);
		$this->add_control(
			'whole_pr_box',
			[
				'label' => esc_html__( 'Whole Background', 'effective-pre-loader' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'pr_whole_box_BG',
					'label' => esc_html__( 'Background Type', 'effective-pre-loader' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '#eprel-loader-wrapper',
				]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$preLoaderContent=$settings["preLoaderContent"];
		
		if(\Elementor\Plugin::$instance->editor->is_edit_mode() && (!empty($settings['backpreloader']) && $settings['backpreloader']=='yes')){
			echo '<style>.eprel-loaded #eprel-loader-wrapper{visibility:visible;opacity:1}.eprel-loaded #eprel-loader{opacity:1}.eprel-loadbar{width:50%}.eprel-percentage{border:2px solid #6fc784}</style>';
		}

		$pageLoadTransition=!empty($settings["pageLoadTransition"]) ? $settings["pageLoadTransition"] : 'pageloadfadein';
		$pageLoadSlideInDir=!empty($settings["pageLoadSlideInDir"]) ? $settings["pageLoadSlideInDir"] : 'left';
		$pageLoad4InDir=!empty($settings["pageLoad4InDir"]) ? $settings["pageLoad4InDir"] : 'left';
		
		$postLoadTransition=!empty($settings["postLoadTransition"]) ? $settings["postLoadTransition"] : 'postloadfadeout';
		$postLoadSlideInDir=!empty($settings["postLoadSlideInDir"]) ? $settings["postLoadSlideInDir"] : 'left';
		$postLoad4InDir=!empty($settings["postLoad4InDir"]) ? $settings["postLoad4InDir"] : 'left';

		
		$preloaderSrc=$slideinclass=$slideoutclass=$slideinclasseclass='';
		
		if(!empty($pageLoadTransition) && $pageLoadTransition=='pageloadslidein' && !empty($pageLoadSlideInDir)){
			$slideinclass = 'eprel-duo-move-'.esc_attr($pageLoadSlideInDir);
		}
		
		if(!empty($postLoadTransition) && $postLoadTransition=='postloadslideout' && !empty($pageLoadSlideInDir)){
			$slideoutclass = 'eprel-out-duo-move-'.esc_attr($postLoadSlideInDir);
		}
		
		if(!empty($pageLoadTransition) && ($pageLoadTransition=='pageloadtripleswoosh' || $pageLoadTransition=='pageloadsimple' || $pageLoadTransition=='pageloadduomove' || $postLoadTransition=='postloadstripleswoosh' || $postLoadTransition=='postloadssimple' || $postLoadTransition=='postloadsduomove')){
			$slideinclasseclass='eprel-preload-transion4';
		}
				
		if(!empty($pageLoadTransition) && $pageLoadTransition=='pageloadtripleswoosh' && !empty($pageLoad4InDir)){
			$slideinclass = 'eprel-tripleswoosh eprel-4-preload-'.esc_attr($pageLoad4InDir);
		}
		
		if(!empty($postLoadTransition) && $postLoadTransition=='postloadstripleswoosh' && !empty($postLoad4InDir)){
			$slideoutclass = 'eprel-tripleswoosh eprel-4-postload-'.esc_attr($postLoad4InDir);
		}
		
		if(!empty($pageLoadTransition) && $pageLoadTransition=='pageloadsimple' && !empty($pageLoad4InDir)){
			$slideinclass = 'eprel-simple eprel-4-preload-'.esc_attr($pageLoad4InDir);
		}
		if(!empty($postLoadTransition) && $postLoadTransition=='postloadssimple' && !empty($postLoad4InDir)){
			$slideoutclass = 'eprel-tripleswoosh eprel-4-postload-'.esc_attr($postLoad4InDir);
		}
		if(!empty($pageLoadTransition) && $pageLoadTransition=='pageloadduomove' && !empty($pageLoad4InDir)){
			$slideinclass = 'eprel-duomove2 eprel-4-preload-'.esc_attr($pageLoad4InDir);
		}
		if(!empty($postLoadTransition) && $postLoadTransition=='postloadsduomove' && !empty($postLoad4InDir)){
			$slideoutclass = 'eprel-tripleswoosh eprel-4-postload-'.esc_attr($postLoad4InDir);
		}
		$preload_opt = [];
		$data_attr='';
		$preload_opt["post_load_opt"] ='disablepostload';
		if(!empty($settings['outTransition']) && $settings['outTransition']=='yes'){
			$preload_opt["post_load_opt"] ='enablepostload';
			if(!empty($settings['postLoadExcludeCustom'])){
				$preload_opt["post_load_exclude_class"] = $settings['postLoadExcludeCustom'];			
			}
		}

		if(!empty($settings['loadtime']) && $settings['loadtime']!='loadtimedefault'){
			if($settings['loadtime']=='loadtimemin' && isset($settings['loadmintime']) && !empty($settings['loadmintime']['size'])){
				$preload_opt["loadtime"] = 'loadtimemin';
				$preload_opt["loadmintime"] = $settings['loadmintime']['size'];
			}else if($settings['loadtime']=='loadtimemax' && isset($settings['loadmaxtime']) && !empty($settings['loadmaxtime']['size'])){
				$preload_opt["loadtime"] = 'loadtimemax';
				$preload_opt["loadmaxtime"] = $settings['loadmaxtime']['size'];
			}
		}

		$data_attr = ' data-plec=\'' . json_encode($preload_opt) . '\'';
		if(!empty($preLoaderContent)) {
			$index=0;
			$sectioncolumn='body';
			$preloaderSrc .='<div id="eprel-loader-wrapper" class="eprel-loader-wrapper '.esc_attr($slideinclass).' '.esc_attr($slideoutclass).' '.esc_attr($slideinclasseclass).'" '.$data_attr.' data-post_load_opt='.$preload_opt["post_load_opt"].'>';
			
			foreach($preLoaderContent as $item1) {			
				
				if((!empty($item1["plcSelect"]) && $item1["plcSelect"]=='Progress') && (!empty($item1['plcprecentagelayout']) && $item1['plcprecentagelayout']=='plcper2')){					
					$plcposclass="";	
					if(!empty($item1['plcprecentagelayoueprelos'])){
						if($item1['plcprecentagelayoueprelos']=='plcperpostop'){
							$plcposclass = 'eprel-perc-top';							
						}else if($item1['plcprecentagelayoueprelos']=='plcperposbottom'){
							$plcposclass = 'eprel-perc-bottom';
						} 
					}					
					$preloaderSrc .='<span class="percentagelayout '.esc_attr($plcposclass).'"></span>';
				}else if($item1["plcSelect"]=='Progress' && (!empty($item1['plcprecentagelayout']) && $item1['plcprecentagelayout']=='plcper5')){
					$preloaderSrc .='<div class="eprel-preloader-wrap5 '.esc_attr($item1['plcprecentagelayout']).'">
					<div class="eprel-pre-5 eprel-pre-5-in1" id="eprel-precent5"></div>
					<div class="eprel-pre-5 eprel-pre-5-in2" id="eprel-precent5"></div>
					<div class="eprel-pre-5 eprel-pre-5-in3" id="eprel-precent5"></div>
					<div class="eprel-pre-5 eprel-pre-5-in4" id="eprel-precent5"></div>
					</div>';
				}
				$index++;
			}
			
			
			$preloaderSrc .='<div id="eprel-loader">';
			foreach($preLoaderContent as $item) {							
				
				$plcSelect=!empty($item["plcSelect"]) ? $item["plcSelect"] : 'Image';
				if(!empty($plcSelect)){
					//image
					if($plcSelect=='Image' && !empty($item["plcsImage"]["url"])){						
						$plcsImage=$item['plcsImage']['url'];													
						$image_id=$item["plcsImage"]["id"];
						$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
						if(!$image_alt){
							$image_alt = get_the_title($image_id);
						}else if(!$image_alt){
							$image_alt = 'Image';
						}
	
						if(isset($item['plcsImageLoader']) && $item['plcsImageLoader']=='yes'){
							$preloaderSrc .="<div id='eprel-img-loader'>
								<div class='eprel-img-loader-wrap'>
									<span style='background-image: url(".esc_url($plcsImage).");' data-no-lazy='1' class='eprel-img-loader-wrap-in skip-lazy'></span>
									</div>
									<img data-no-lazy='1' class='eprel-preloader-logo-img skip-lazy' alt='".esc_attr($image_alt)."' src='".esc_url($plcsImage)."'>
								</div>";							
						}else{
							$preloaderSrc .='<div id="eprel-preloader-logo-img" class="img"><img class="eprel-preloader-image" src='.esc_url($plcsImage).' alt="'.esc_attr($image_alt).'" /></div>';
						}	
					}
					//icon
					if($plcSelect=='Icon' && !empty($item['plcsIcons'])){
						ob_start();
						\Elementor\Icons_Manager::render_icon( $item['plcsIcons'], [ 'aria-hidden' => 'true' ]);
						$preloaderIconSrc = ob_get_contents();
						ob_end_clean();
						$preloaderSrc .='<div id="eprel-preloader-logo-img" class="icon"><span class="eprel-preloader-icon">'.$preloaderIconSrc.'</span></div>';
					}
					//text
					if($plcSelect=='TextContent' && !empty($item['plcsText'])){
						if(isset($item['plcsTextLoader']) && $item['plcsTextLoader']=='yes'){	
							$preloaderSrc .="<div class='eprel-text-loader'>".esc_html($item['plcsText'])."<div class='eprel-text-loader-inner'>".esc_html($item['plcsText'])."</div></div>";
						}else{
							$preloaderSrc .='<div class="eprel-preloader-animated-text"><span>'.esc_html($item['plcsText']).'</span></div>';
						}
						
					}
					//predefine animation
					if($plcSelect=='PreDefined' && !empty($item['plcsPreAnimation'])){
						if($item['plcsPreAnimation']=='animation-1'){
							$preloaderSrc .='<div class="eprel-ball-grid-pulse"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>';
						}else if($item['plcsPreAnimation']=='animation-2'){
							$preloaderSrc .='<div class="eprel-ball-triangle-path"><div></div><div></div><div></div></div>';
						}else if($item['plcsPreAnimation']=='animation-3'){
							$preloaderSrc .='<div class="eprel-ball-scale-ripple-multiple"><div></div><div></div><div></div></div>';
						}else if($item['plcsPreAnimation']=='animation-4'){
							$preloaderSrc .='<div class="eprel-triangle-skew-spin"><div></div></div>';
						}else if($item['plcsPreAnimation']=='animation-5'){
							$preloaderSrc .='<div class="eprel-rounded-triangle"></div>';
						}else if($item['plcsPreAnimation']=='animation-6'){
							$preloaderSrc .='<div class="eprel_preloader_audio_wave"><span></span><span></span><span></span><span></span><span></span></div>';
						}else if($item['plcsPreAnimation']=='animation-7'){
							$preloaderSrc .='<div class="eprel_typing_loader"></div>';
						}else if($item['plcsPreAnimation']=='animation-8'){
							$preloaderSrc .='<div class="eprel-preloader-help"></div>';
						}else if($item['plcsPreAnimation']=='animation-9'){
							$preloaderSrc .='<div class="eprel-preloader-cord">
								<div class="eprel-cord eprel-leftMove"><div class="eprel-ball"></div></div>
								  <div class="eprel-cord"><div class="eprel-ball"></div></div>
								  <div class="eprel-cord"><div class="eprel-ball"></div></div>
								  <div class="eprel-cord"><div class="eprel-ball"></div></div>
								  <div class="eprel-cord"><div class="eprel-ball"></div></div>
								  <div class="eprel-cord"><div class="eprel-ball"></div></div>
								<div class="eprel-cord eprel-rightMove"><div class="eprel-ball" id="eprel-first"></div></div>
								<div class="eprel-shadows"><div class="eprel-leftShadow"></div>
									<div></div><div></div><div></div><div></div><div></div>
									<div class="eprel-rightShadow"></div>
								</div>
							</div>';
						}else if($item['plcsPreAnimation']=='animation-10'){
							$preloaderSrc .='<div class="eprel-preloader-dot">
									<span class="eprel-preloader-dots"></span>
								  <span class="eprel-preloader-dots"></span>
								  <span class="eprel-preloader-dots"></span>
								  <span class="eprel-preloader-dots"></span>
								  <span class="eprel-preloader-dots"></span>
								  <span class="eprel-preloader-dots"></span>
								  <span class="eprel-preloader-dots"></span>
								  <span class="eprel-preloader-dots"></span>
								  <span class="eprel-preloader-dots"></span>
								  <span class="eprel-preloader-dots"></span>
								 </div>';
						}else if($item['plcsPreAnimation']=='animation-12'){
							$preloaderSrc .='<div class="eprel-preloader-12-main">
										<span class="eprel-preloader-12 eprel_dot_1"></span>
										<span class="eprel-preloader-12 eprel_dot_2"></span>
										<span class="eprel-preloader-12 eprel_dot_3"></span>
										<span class="eprel-preloader-12 eprel_dot_4"></span>
									</div>';
						}else if($item['plcsPreAnimation']=='animation-14'){
							$preloaderSrc .='<div class="eprel_preloader_the_shake"><span></span><span></span><span></span><span></span><span></span></div>';
						}else if($item['plcsPreAnimation']=='animation-15'){
							$preloaderSrc .='<div class="eprel_preloader_spinning_disc_block"><div class="eprel_preloader_spinning_disc"></div></div>';
						}
					}
					//predefine animation
					if($plcSelect=='Lottie' && !empty($item['plcsLottieUrl']['url'])){
						$ext = pathinfo($item['plcsLottieUrl']['url'], PATHINFO_EXTENSION);			
						if($ext!='json'){
							echo '<h3 class="effective-pre-loader-posts-not-found">'.esc_html__("Opps!! Please Enter Only JSON File Extension.",'effective-pre-loader').'</h3>';
							return false;
						}else{
							$plcsLottieWidth = isset($item['plcsLottieWidth']['size']) ? $item['plcsLottieWidth']['size'] : 300;
							$plcsLottieHeight = isset($item['plcsLottieHeight']['size']) ? $item['plcsLottieHeight']['size'] : 300;
							$plcsLottieSpeed = isset($item['plcsLottieSpeed']['size']) ? $item['plcsLottieSpeed']['size'] : 1;
							$plcsLottieLoop = isset($item['plcsLottieLoop']) ? $item['plcsLottieLoop'] : 'no';
							$plcsLottieLoopValue='';
							if(!empty($item['plcsLottieLoop']) && $item['plcsLottieLoop']=='yes'){
								$plcsLottieLoopValue='loop'; 
							}
							$preloaderSrc .='<lottie-player src="'.esc_url($item['plcsLottieUrl']['url']).'" style="width: '.esc_attr($plcsLottieWidth).'px; height: '.esc_attr($plcsLottieHeight).'px;" '.esc_attr($plcsLottieLoopValue).'  speed="'.esc_attr($plcsLottieSpeed).'" autoplay></lottie-player>';
						}						
					}
					//custom
					if($plcSelect=='CustomCode' && !empty($item['plcsCustomCode'])){
						$preloaderSrc .='<div class="eprel-preloader-custom">'.$item['plcsCustomCode'].'</div>';
					}
					
					if($plcSelect=='Shortcode' && !empty($item['plcsCustomShortCode'])){
						$preloaderSrc .='<div class="eprel-preloader-custom-shortcode">'.do_shortcode( shortcode_unautop( $item['plcsCustomShortCode'] ) ).'</div>';
					}
					
					if($plcSelect=='Progress' && (!empty($item['plcprecentagelayout']) && $item['plcprecentagelayout']=='plcper1')){
						$preloaderSrc .='<div class="eprel-preloader-wrap"><div class="eprel-percentage" id="eprel-precent"></div><div class="eprel-loader"><div class="p-trackbar"><div class="eprel-loadbar"></div></div><div class="eprel-glow"></div></div></div>';
					}else if($plcSelect=='Progress' && (!empty($item['plcprecentagelayout']) && $item['plcprecentagelayout']=='plcper3')){
						$percpre=$percpost='';
						if(!empty($item['plcper3prefix'])){
							$percpre='<span class="eprel-perc-prepostfix eprel-perc-pre">'.esc_html($item['plcper3prefix']).'</span>';
						}
						if(!empty($item['plcper3postfix'])){
							$percpost='<span class="eprel-perc-prepostfix eprel-perc-post">'.esc_html($item['plcper3postfix']).'</span>';
						}
						$preloaderSrc .='<div class="eprel-preloader-wrap '.esc_attr($item['plcprecentagelayout']).'">'.$percpre.'<div class="eprel-percentage" id="eprel-precent3"></div>'.$percpost.'</div>';
					}else if($plcSelect=='Progress' && (!empty($item['plcprecentagelayout']) && $item['plcprecentagelayout']=='plcper4')){
						$preloaderSrc .='<div class="eprel-preloader-wrap4 '.esc_attr($item['plcprecentagelayout']).'"><div class="eprel-preloader-wrap4-in" id="eprel-precent4"></div></div>';
					}else if($item["plcSelect"]=='Progress' && (!empty($item['plcprecentagelayout']) && $item['plcprecentagelayout']=='plcper6')){
					$pctextemptycolor = !empty($settings['pctextemptycolor']) ? $settings['pctextemptycolor'] : '#ffffff36';
					$pctextfillcolor = !empty($settings['pctextfillcolor']) ? $settings['pctextfillcolor'] : '#fff';
					$pctextstrocksize = !empty($settings['pctextstrocksize']) ? $settings['pctextstrocksize']['size'] : 4;
					$preloaderSrc .='<div class="eprel-preloader-wrap6 '.esc_attr($item['plcprecentagelayout']).'">
							<svg class="progress-ring" width="120" height="120">
								<circle id="eprel-precent6" class="progress-ring__circle progress-ring1" style="stroke-dasharray: 326.726, 326.726;stroke-dashoffset: 326.726;" stroke="'.esc_attr($pctextfillcolor).'" stroke-width="'.esc_attr($pctextstrocksize).'" fill="transparent" r="52" cx="60" cy="60"/>
							</svg>
							<svg class="progress-ring progress-ring2" width="120" height="120">
								<circle class="progress-ring__circle" style="stroke-dasharray: 326.726, 326.726;stroke-dashoffset:0;" stroke="'.esc_attr($pctextemptycolor).'" stroke-width="'.esc_attr($pctextstrocksize).'" fill="transparent" r="52" cx="60"    cy="60"/>
							</svg>
							<div class="eprel-percentage" id="eprel-precent3"></div>
						</div>';
					}
					
				}				
				$index++;
			}
			
			$get_ele_pre = '.elementor-element'.$this->get_unique_selector();
			$pd_color_1 = !empty($settings['pr_predefined_color1']) ? $settings['pr_predefined_color1'] : '';
			$pd_color_2 = !empty($settings['pr_predefined_color2']) ? $settings['pr_predefined_color2'] : '';
			$preloaderSrc .='<style>'.$get_ele_pre.' .eprel-preloader-help:after,'.$get_ele_pre.' .eprel-preloader-cord .eprel-ball,'.$get_ele_pre.' .eprel-preloader-dots:before,'.$get_ele_pre.' .eprel_preloader_the_shake span{
					background:'.$pd_color_1.';
				}
				'.$get_ele_pre.' .eprel-ball-triangle-path>div,'.$get_ele_pre.'  .eprel-ball-scale-ripple-multiple>div,'.$get_ele_pre.' .eprel-preloader-help{
					border-color:'.$pd_color_1.';
				}
				'.$get_ele_pre.' .eprel-triangle-skew-spin>div{
					 border-bottom-color:'.$pd_color_1.';
				}
				'.$get_ele_pre.' .eprel_dot_1,.eprel-preloader-dot .eprel-preloader-dots:after{
					background:'.$pd_color_2.';
				}
				'.$get_ele_pre.' .eprel_preloader_spinning_disc:after{
					border-top:10px solid '.$pd_color_2.';
					border-bottom:10px solid '.$pd_color_2.';
				}
				@-webkit-keyframes eprel_typing_loader {
					0% {
						background-color: '.$pd_color_1.';
						box-shadow: 12px 0 0 0 '.$pd_color_1.'33,24px 0 0 0 '.$pd_color_1.'33
					}

					25% {
						background-color: '.$pd_color_1.'66;
						box-shadow: 12px 0 0 0 '.$pd_color_1.'33,24px 0 0 0 '.$pd_color_1.'33
					}

					75% {
						background-color: '.$pd_color_1.'66;
						box-shadow: 12px 0 0 0 '.$pd_color_1.'33,24px 0 0 0 '.$pd_color_1.'
					}
				}

				@-moz-keyframes eprel_typing_loader {
					0% {
						background-color: '.$pd_color_1.';
						box-shadow: 12px 0 0 0 '.$pd_color_1.'33,24px 0 0 0 '.$pd_color_1.'33
					}

					25% {
						background-color: '.$pd_color_1.'66;
						box-shadow: 12px 0 0 0 '.$pd_color_1.'33,24px 0 0 0 '.$pd_color_1.'33
					}

					75% {
						background-color: '.$pd_color_1.'66;
						box-shadow: 12px 0 0 0 '.$pd_color_1.'33,24px 0 0 0 '.$pd_color_1.'
					}
				}

				@keyframes eprel_typing_loader {
					0% {
						background-color: '.$pd_color_1.';
						box-shadow: 12px 0 0 0 '.$pd_color_1.'33,24px 0 0 0 '.$pd_color_1.'33
					}

					25% {
						background-color: '.$pd_color_1.'66;
						box-shadow: 12px 0 0 0 '.$pd_color_1.'33,24px 0 0 0 '.$pd_color_1.'33
					}

					75% {
						background-color: '.$pd_color_1.'66;
						box-shadow: 12px 0 0 0 '.$pd_color_1.'33,24px 0 0 0 '.$pd_color_1.'
					}
				}

				@-webkit-keyframes eprel_preloader_1 {
					0% {height:5px;-webkit-transform:translateY(0px);-ms-transform:translateY(0px);-moz-transform:translateY(0px);-o-transform: translateY(0px);	transform:translateY(0px);background:'.$pd_color_1.';}
					25% {height:30px;-webkit-transform:translateY(15px);-ms-transform:translateY(15px);-moz-transform:translateY(15px);-o-transform: translateY(15px);	transform:translateY(15px);background:'.$pd_color_2.';}
					50% {height:5px;-webkit-transform:translateY(0px);-ms-transform:translateY(0px);-moz-transform:translateY(0px);-o-transform: translateY(0px);	transform:translateY(0px);background:'.$pd_color_1.';}
					100% {height:5px;-webkit-transform:translateY(0px);-ms-transform:translateY(0px);-moz-transform:translateY(0px);-o-transform: translateY(0px);	transform:translateY(0px);background:'.$pd_color_1.';}
				}
				@-moz-keyframes eprel_preloader_1 {
					0% {height:5px;-moz-transform:translateY(0px);background:'.$pd_color_1.';}
					25% {height:30px;-moz-transform:translateY(15px);background:'.$pd_color_2.';}
					50% {height:5px;-moz-transform:translateY(0px);background:'.$pd_color_1.';}
					100% {height:5px;-moz-transform:translateY(0px);background:'.$pd_color_1.';}
				}
				@keyframes eprel_preloader_1 {
					0% {height:5px;transform:translateY(0px);background:'.$pd_color_1.';}
					25% {height:30px;transform:translateY(15px);background:'.$pd_color_2.';}
					50% {height:5px;transform:translateY(0px);background:'.$pd_color_1.';}
					100% {height:5px;transform:translateY(0px);background:'.$pd_color_1.';}
				}
				.eprel_preloader_circular_square span,.eprel-preloader-12,.eprel_preloader_spinning_disc{	
					background:'.$pd_color_1.';
				}
				@-webkit-keyframes eprel_preloader_5 {
					0% {-webkit-transform: rotate(0deg);}
					50% {-webkit-transform: rotate(180deg);background:'.$pd_color_2.';}
					100% {-webkit-transform: rotate(360deg);}
				}
				@-webkit-keyframes eprel_preloader_5_after {
					0% {border-top:10px solid '.$pd_color_2.';border-bottom:10px solid '.$pd_color_2.';}
					50% {border-top:10px solid '.$pd_color_1.';border-bottom:10px solid '.$pd_color_1.';}
					100% {border-top:10px solid '.$pd_color_2.';border-bottom:10px solid '.$pd_color_2.';}
				}
				@-moz-keyframes eprel_preloader_5 {
					0% {-moz-transform: rotate(0deg);}
					50% {-moz-transform: rotate(180deg);background:'.$pd_color_2.';}
					100% {-moz-transform: rotate(360deg);}
				}
				@-moz-keyframes eprel_preloader_5_after {
					0% {border-top:10px solid '.$pd_color_2.';border-bottom:10px solid '.$pd_color_2.';}
					50% {border-top:10px solid '.$pd_color_1.';border-bottom:10px solid '.$pd_color_1.';}
					100% {border-top:10px solid '.$pd_color_2.';border-bottom:10px solid '.$pd_color_2.';}
				}
				@keyframes eprel_preloader_5 {
					0% {transform: rotate(0deg);}
					50% {transform: rotate(180deg);background:'.$pd_color_2.';}
					100% {transform: rotate(360deg);}
				}
				@keyframes eprel_preloader_5_after {
					0% {border-top:10px solid '.$pd_color_2.';border-bottom:10px solid '.$pd_color_2.';}
					50% {border-top:10px solid '.$pd_color_1.';border-bottom:10px solid '.$pd_color_1.';}
					100% {border-top:10px solid '.$pd_color_2.';border-bottom:10px solid '.$pd_color_2.';}
				}
				@-webkit-keyframes eprel_preloader_4 {
					0% {opacity: 0.3; -webkit-transform:translateY(0px);	-webkit-box-shadow:0px 0px 3px rgba(0, 0, 0, 0.1);  box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.1);}
					50% {opacity: 1; -webkit-transform: translateY(-10px); background:'.$pd_color_2.';	-webkit-box-shadow:0px 20px 3px rgba(0, 0, 0, 0.05); box-shadow: 0px 20px 3px rgba(0, 0, 0, 0.05);}
					100%  {opacity: 0.3; -webkit-transform:translateY(0px);	-webkit-box-shadow:0px 0px 3px rgba(0, 0, 0, 0.1); box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.1);}
				}
				@-moz-keyframes eprel_preloader_4 {
					0% {opacity: 0.3; -moz-transform:translateY(0px);	-moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.1); box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.1);}
					50% {opacity: 1; -moz-transform: translateY(-10px); background:'.$pd_color_2.';	-moz-box-shadow: 0px 20px 3px rgba(0, 0, 0, 0.05);box-shadow: 0px 20px 3px rgba(0, 0, 0, 0.05);}
					100%  {opacity: 0.3; -moz-transform:translateY(0px);-moz-box-shadow:0px 0px 3px rgba(0, 0, 0, 0.1);	box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.1);}
				}
				@-ms-keyframes eprel_preloader_4 {
					0% {opacity: 0.3; -ms-transform:translateY(0px);	-webkit-box-shadow:0px 0px 3px rgba(0, 0, 0, 0.1); box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.1);}
					50% {opacity: 1; -ms-transform: translateY(-10px); background:'.$pd_color_2.';	-webkit-box-shadow:0px 20px 3px rgba(0, 0, 0, 0.05); -moz-box-shadow:0px 20px 3px rgba(0, 0, 0, 0.05);box-shadow: 0px 20px 3px rgba(0, 0, 0, 0.05);}
					100%  {opacity: 0.3; -ms-transform:translateY(0px);	-webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.1);-moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.1);box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.1);}
				}
				@keyframes eprel_preloader_4 {
					0% {opacity: 0.3; transform:translateY(0px);-webkit-box-shadow:0px 0px 3px rgba(0, 0, 0, 0.1);-moz-box-shadow:0px 0px 3px rgba(0, 0, 0, 0.1);	box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.1);}
					50% {opacity: 1; transform: translateY(-10px); background:'.$pd_color_2.';	-webkit-box-shadow:0px 20px 3px rgba(0, 0, 0, 0.05); -moz-box-shadow:0px 20px 3px rgba(0, 0, 0, 0.05);box-shadow: 0px 20px 3px rgba(0, 0, 0, 0.05);}
					100%  {opacity: 0.3; transform:translateY(0px);	-webkit-box-shadow:0px 0px 3px rgba(0, 0, 0, 0.1);-moz-box-shadow:0px 0px 3px rgba(0, 0, 0, 0.1); box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.1);}
				}</style>';

			$preloaderSrc .='</div>';
			if(($pageLoadTransition && $pageLoadTransition=='pageloadtripleswoosh')){
				$preloaderSrc .='<div class="eprel-preload-reveal-layer-box"><div style="background:'.$settings['eprel4color1'].'" class="eprel-preload-reveal-layer"></div>
				<div style="background:'.$settings['eprel4color2'].'" class="eprel-preload-reveal-layer"></div>
				<div style="background:'.$settings['eprel4color3'].'" class="eprel-preload-reveal-layer"></div></div>';
			}else if(($pageLoadTransition && $pageLoadTransition=='pageloadsimple')){
				$preloaderSrc .='<div class="eprel-preload-reveal-layer-box"><div style="background:'.$settings['eprel4color1'].'" class="eprel-preload-reveal-layer"></div></div>';
			}else if(($pageLoadTransition && $pageLoadTransition=='pageloadduomove')){
				$preloaderSrc .='<div class="eprel-preload-reveal-layer-box"><div style="background:'.$settings['eprel4color1'].'" class="eprel-preload-reveal-layer"></div>
				<div style="background:'.$settings['eprel4color2'].'" class="eprel-preload-reveal-layer"></div></div>';
			}
			$preloaderSrc .='</div>';
			
			if((!empty($settings['alfSwitch']) && $settings['alfSwitch']=='yes') && (!empty($settings['alfExclude']) && $settings['alfExclude']=='alfcustom') && !empty($settings['alfExcludecustom']) && !empty($settings['alfExcludeZIndex']['size']) && !empty($settings['alfExcludeZIndexpos'])){
				$topbottom = '';
				if($settings['alfExcludeZIndexpos'] == 'top'){
					$topbottom = 'top:0';
				}else if($settings['alfExcludeZIndexpos'] == 'bottom'){
					$topbottom = 'bottom:0';
				}
				$preloaderSrc .='<style>body:not(.eprel-loaded):not(.eprel-out-loaded) '.$settings['alfExcludecustom'].'{z-index : '.$settings['alfExcludeZIndex']['size'].';width:100%;position:fixed;'.$topbottom.'}</style>';				
			}else if((!empty($settings['alfSwitch']) && $settings['alfSwitch']=='yes') && (!empty($settings['alfExclude']) && $settings['alfExclude']=='alfheader') && !empty($settings['alfExcludeZIndex']['size'])){
				$preloaderSrc .='<style>body:not(.eprel-loaded):not(.eprel-out-loaded) header{z-index : '.$settings['alfExcludeZIndex']['size'].' !important;width:100% !important;position:fixed !important;}</style>';
			}
			echo $preloaderSrc;
		}
	}
}