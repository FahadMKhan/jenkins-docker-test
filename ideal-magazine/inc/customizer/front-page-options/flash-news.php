<?php
/**
 * Flash News Section
 *
 * @package Ideal Magazine
 */

$wp_customize->add_section(
	'ideal_magazine_flash_news_section',
	array(
		'panel' => 'ideal_magazine_front_page_options',
		'title' => esc_html__( 'Flash News Section', 'ideal-magazine' ),
	)
);

// Flash News Section - Enable Section.
$wp_customize->add_setting(
	'ideal_magazine_enable_flash_news_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ideal_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ideal_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ideal_magazine_enable_flash_news_section',
		array(
			'label'    => esc_html__( 'Enable Flash News Section', 'ideal-magazine' ),
			'section'  => 'ideal_magazine_flash_news_section',
			'settings' => 'ideal_magazine_enable_flash_news_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ideal_magazine_enable_flash_news_section',
		array(
			'selector' => '#ideal_magazine_flash_news_section .section-link',
			'settings' => 'ideal_magazine_enable_flash_news_section',
		)
	);
}

// Flash News Section - Section Title.
$wp_customize->add_setting(
	'ideal_magazine_flash_news_title',
	array(
		'default'           => __( 'Flash News', 'ideal-magazine' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ideal_magazine_flash_news_title',
	array(
		'label'           => esc_html__( 'Section Title', 'ideal-magazine' ),
		'section'         => 'ideal_magazine_flash_news_section',
		'settings'        => 'ideal_magazine_flash_news_title',
		'type'            => 'text',
		'active_callback' => 'ideal_magazine_is_flash_news_section_enabled',
	)
);

// Flash News Section - Speed Controller.
$wp_customize->add_setting(
	'ideal_magazine_flash_news_speed_controller',
	array(
		'default'           => 30,
		'sanitize_callback' => 'ideal_magazine_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'ideal_magazine_flash_news_speed_controller',
	array(
		'label'           => esc_html__( 'Speed Controller', 'ideal-magazine' ),
		'description'     => esc_html__( 'Note: Default speed value is 30.', 'ideal-magazine' ),
		'section'         => 'ideal_magazine_flash_news_section',
		'settings'        => 'ideal_magazine_flash_news_speed_controller',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
		),
		'active_callback' => 'ideal_magazine_is_flash_news_section_enabled',
	)
);

// Flash News Section - Content Type.
$wp_customize->add_setting(
	'ideal_magazine_flash_news_content_type',
	array(
		'default'           => 'category',
		'sanitize_callback' => 'ideal_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'ideal_magazine_flash_news_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'ideal-magazine' ),
		'section'         => 'ideal_magazine_flash_news_section',
		'settings'        => 'ideal_magazine_flash_news_content_type',
		'type'            => 'select',
		'active_callback' => 'ideal_magazine_is_flash_news_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'ideal-magazine' ),
			'category' => esc_html__( 'Category', 'ideal-magazine' ),
		),
	)
);

for ( $i = 1; $i <= 6; $i++ ) {
	// Flash News Section - Select Post.
	$wp_customize->add_setting(
		'ideal_magazine_flash_news_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ideal_magazine_flash_news_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ideal-magazine' ), $i ),
			'section'         => 'ideal_magazine_flash_news_section',
			'settings'        => 'ideal_magazine_flash_news_content_post_' . $i,
			'active_callback' => 'ideal_magazine_is_flash_news_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ideal_magazine_get_post_choices(),
		)
	);

}

// Flash News Section - Select Category.
$wp_customize->add_setting(
	'ideal_magazine_flash_news_content_category',
	array(
		'sanitize_callback' => 'ideal_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'ideal_magazine_flash_news_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'ideal-magazine' ),
		'section'         => 'ideal_magazine_flash_news_section',
		'settings'        => 'ideal_magazine_flash_news_content_category',
		'active_callback' => 'ideal_magazine_is_flash_news_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => ideal_magazine_get_post_cat_choices(),
	)
);
