<?php
/**
 * Typography
 *
 * @package Ideal Magazine
 */

$wp_customize->add_section(
	'ideal_magazine_typography',
	array(
		'panel' => 'ideal_magazine_theme_options',
		'title' => esc_html__( 'Typography', 'ideal-magazine' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'ideal_magazine_site_title_font',
	array(
		'default'           => 'Commissioner',
		'sanitize_callback' => 'ideal_magazine_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ideal_magazine_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'ideal-magazine' ),
		'section'  => 'ideal_magazine_typography',
		'settings' => 'ideal_magazine_site_title_font',
		'type'     => 'select',
		'choices'  => ideal_magazine_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'ideal_magazine_site_description_font',
	array(
		'default'           => 'Aleo',
		'sanitize_callback' => 'ideal_magazine_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ideal_magazine_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'ideal-magazine' ),
		'section'  => 'ideal_magazine_typography',
		'settings' => 'ideal_magazine_site_description_font',
		'type'     => 'select',
		'choices'  => ideal_magazine_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'ideal_magazine_header_font',
	array(
		'default'           => 'Montserrat Alternates',
		'sanitize_callback' => 'ideal_magazine_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ideal_magazine_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'ideal-magazine' ),
		'section'  => 'ideal_magazine_typography',
		'settings' => 'ideal_magazine_header_font',
		'type'     => 'select',
		'choices'  => ideal_magazine_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'ideal_magazine_body_font',
	array(
		'default'           => 'Noto Sans',
		'sanitize_callback' => 'ideal_magazine_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ideal_magazine_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'ideal-magazine' ),
		'section'  => 'ideal_magazine_typography',
		'settings' => 'ideal_magazine_body_font',
		'type'     => 'select',
		'choices'  => ideal_magazine_get_all_google_font_families(),
	)
);
