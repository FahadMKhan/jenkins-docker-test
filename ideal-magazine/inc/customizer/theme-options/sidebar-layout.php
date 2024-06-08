<?php
/**
 * Sidebar Option
 *
 * @package Ideal Magazine
 */

$wp_customize->add_section(
	'ideal_magazine_sidebar_option',
	array(
		'title' => esc_html__( 'Layout', 'ideal-magazine' ),
		'panel' => 'ideal_magazine_theme_options',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'ideal_magazine_sidebar_position',
	array(
		'sanitize_callback' => 'ideal_magazine_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ideal_magazine_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'ideal-magazine' ),
		'section' => 'ideal_magazine_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ideal-magazine' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ideal-magazine' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'ideal_magazine_post_sidebar_position',
	array(
		'sanitize_callback' => 'ideal_magazine_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ideal_magazine_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'ideal-magazine' ),
		'section' => 'ideal_magazine_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ideal-magazine' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ideal-magazine' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'ideal_magazine_page_sidebar_position',
	array(
		'sanitize_callback' => 'ideal_magazine_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ideal_magazine_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'ideal-magazine' ),
		'section' => 'ideal_magazine_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ideal-magazine' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ideal-magazine' ),
		),
	)
);
