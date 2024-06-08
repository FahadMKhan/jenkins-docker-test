<?php
/**
 * Header Options
 *
 * @package Ideal Magazine
 */

$wp_customize->add_section(
	'ideal_magazine_header_options',
	array(
		'panel' => 'ideal_magazine_theme_options',
		'title' => esc_html__( 'Header Options', 'ideal-magazine' ),
	)
);

// Header Section - Enable Topbar Section.
$wp_customize->add_setting(
	'ideal_magazine_enable_topbar_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ideal_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ideal_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ideal_magazine_enable_topbar_section',
		array(
			'label'    => esc_html__( 'Enable Topbar Section', 'ideal-magazine' ),
			'section'  => 'ideal_magazine_header_options',
			'settings' => 'ideal_magazine_enable_topbar_section',
		)
	)
);

// Header Options - Advertisement.
$wp_customize->add_setting(
	'ideal_magazine_header_advertisement',
	array(
		'default'           => '',
		'sanitize_callback' => 'ideal_magazine_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'ideal_magazine_header_advertisement',
		array(
			'label'    => esc_html__( 'Advertisement', 'ideal-magazine' ),
			'section'  => 'ideal_magazine_header_options',
			'settings' => 'ideal_magazine_header_advertisement',
		)
	)
);

// Header Options - Advertisement URL.
$wp_customize->add_setting(
	'ideal_magazine_header_advertisement_url',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'ideal_magazine_header_advertisement_url',
	array(
		'label'    => esc_html__( 'Advertisement URL', 'ideal-magazine' ),
		'section'  => 'ideal_magazine_header_options',
		'settings' => 'ideal_magazine_header_advertisement_url',
		'type'     => 'url',
	)
);
