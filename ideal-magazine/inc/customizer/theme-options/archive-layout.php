<?php
/**
 * Archive Layout
 *
 * @package Ideal Magazine
 */

$wp_customize->add_section(
	'ideal_magazine_archive_layout',
	array(
		'title' => esc_html__( 'Archive Layout', 'ideal-magazine' ),
		'panel' => 'ideal_magazine_theme_options',
	)
);

// Archive Layout - Column Layout.
$wp_customize->add_setting(
	'ideal_magazine_archive_column_layout',
	array(
		'default'           => 'column-2',
		'sanitize_callback' => 'ideal_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'ideal_magazine_archive_column_layout',
	array(
		'label'   => esc_html__( 'Column Layout', 'ideal-magazine' ),
		'section' => 'ideal_magazine_archive_layout',
		'type'    => 'select',
		'choices' => array(
			'column-2' => __( 'Column 2', 'ideal-magazine' ),
			'column-3' => __( 'Column 3', 'ideal-magazine' ),
		),
	)
);
