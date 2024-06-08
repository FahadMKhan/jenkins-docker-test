<?php
/**
 * Breadcrumb
 *
 * @package Ideal Magazine
 */

$wp_customize->add_section(
	'ideal_magazine_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'ideal-magazine' ),
		'panel' => 'ideal_magazine_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'ideal_magazine_enable_breadcrumb',
	array(
		'sanitize_callback' => 'ideal_magazine_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Ideal_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ideal_magazine_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'ideal-magazine' ),
			'section' => 'ideal_magazine_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'ideal_magazine_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'ideal_magazine_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'ideal-magazine' ),
		'active_callback' => 'ideal_magazine_is_breadcrumb_enabled',
		'section'         => 'ideal_magazine_breadcrumb',
	)
);
