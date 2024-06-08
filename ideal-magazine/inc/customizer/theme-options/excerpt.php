<?php
/**
 * Excerpt
 *
 * @package Ideal Magazine
 */

$wp_customize->add_section(
	'ideal_magazine_excerpt_options',
	array(
		'panel' => 'ideal_magazine_theme_options',
		'title' => esc_html__( 'Excerpt', 'ideal-magazine' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'ideal_magazine_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'ideal_magazine_sanitize_number_range',
		'validate_callback' => 'ideal_magazine_validate_excerpt_length',
	)
);

$wp_customize->add_control(
	'ideal_magazine_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'ideal-magazine' ),
		'description' => esc_html__( 'Note: Min 1 & Max 100. Please input the valid number and save. Then refresh the page to see the change.', 'ideal-magazine' ),
		'section'     => 'ideal_magazine_excerpt_options',
		'settings'    => 'ideal_magazine_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
		),
	)
);
