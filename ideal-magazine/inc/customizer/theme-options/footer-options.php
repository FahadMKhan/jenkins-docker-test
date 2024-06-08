<?php
/**
 * Footer Options
 *
 * @package Ideal Magazine
 */

$wp_customize->add_section(
	'ideal_magazine_footer_options',
	array(
		'panel' => 'ideal_magazine_theme_options',
		'title' => esc_html__( 'Footer Options', 'ideal-magazine' ),
	)
);

// Footer Options - Copyright Text.
/* translators: 1: Year, 2: Site Title with home URL. */
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'ideal-magazine' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'ideal_magazine_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'ideal_magazine_footer_copyright_text',
	array(
		'label'           => esc_html__( 'Copyright Text', 'ideal-magazine' ),
		'section'         => 'ideal_magazine_footer_options',
		'settings'        => 'ideal_magazine_footer_copyright_text',
		'type'            => 'textarea',
	)
);
