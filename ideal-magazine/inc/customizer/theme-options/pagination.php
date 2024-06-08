<?php
/**
 * Pagination
 *
 * @package Ideal Magazine
 */

$wp_customize->add_section(
	'ideal_magazine_pagination',
	array(
		'panel' => 'ideal_magazine_theme_options',
		'title' => esc_html__( 'Pagination', 'ideal-magazine' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'ideal_magazine_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'ideal_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ideal_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ideal_magazine_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'ideal-magazine' ),
			'section'  => 'ideal_magazine_pagination',
			'settings' => 'ideal_magazine_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'ideal_magazine_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'ideal_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'ideal_magazine_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'ideal-magazine' ),
		'section'         => 'ideal_magazine_pagination',
		'settings'        => 'ideal_magazine_pagination_type',
		'active_callback' => 'ideal_magazine_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default'  => __( 'Default (Older/Newer)', 'ideal-magazine' ),
			'numeric'  => __( 'Numeric', 'ideal-magazine' ),
		),
	)
);
