<?php
/**
 * Post Options
 *
 * @package Ideal Magazine
 */

$wp_customize->add_section(
	'ideal_magazine_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'ideal-magazine' ),
		'panel' => 'ideal_magazine_theme_options',
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'ideal_magazine_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'ideal_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ideal_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ideal_magazine_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'ideal-magazine' ),
			'section' => 'ideal_magazine_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'ideal_magazine_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'ideal_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ideal_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ideal_magazine_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'ideal-magazine' ),
			'section' => 'ideal_magazine_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'ideal_magazine_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'ideal_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ideal_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ideal_magazine_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'ideal-magazine' ),
			'section' => 'ideal_magazine_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'ideal_magazine_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'ideal_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ideal_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ideal_magazine_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'ideal-magazine' ),
			'section' => 'ideal_magazine_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'ideal_magazine_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'ideal-magazine' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ideal_magazine_post_related_post_label',
	array(
		'label'           => esc_html__( 'Related Posts Label', 'ideal-magazine' ),
		'section'         => 'ideal_magazine_post_options',
		'settings'        => 'ideal_magazine_post_related_post_label',
		'type'            => 'text',
	)
);
