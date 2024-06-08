<?php
/**
 * Banner Section
 *
 * @package Ideal Magazine
 */

$wp_customize->add_section(
	'ideal_magazine_banner_section',
	array(
		'panel' => 'ideal_magazine_front_page_options',
		'title' => esc_html__( 'Banner Section', 'ideal-magazine' ),
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'ideal_magazine_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ideal_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ideal_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ideal_magazine_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'ideal-magazine' ),
			'section'  => 'ideal_magazine_banner_section',
			'settings' => 'ideal_magazine_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ideal_magazine_enable_banner_section',
		array(
			'selector' => '#ideal_magazine_banner_section .section-link',
			'settings' => 'ideal_magazine_enable_banner_section',
		)
	);
}

// Banner Section - Main Banner Title.
$wp_customize->add_setting(
	'ideal_magazine_main_banner_title',
	array(
		'default'           => __( 'Main Banner', 'ideal-magazine' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ideal_magazine_main_banner_title',
	array(
		'label'           => esc_html__( 'Main Banner Title Label', 'ideal-magazine' ),
		'section'         => 'ideal_magazine_banner_section',
		'settings'        => 'ideal_magazine_main_banner_title',
		'type'            => 'text',
		'active_callback' => 'ideal_magazine_is_banner_section_enabled',
	)
);

// Banner Section - Banner Slider Slider Content Type.
$wp_customize->add_setting(
	'ideal_magazine_main_banner_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ideal_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'ideal_magazine_main_banner_content_type',
	array(
		'label'           => esc_html__( 'Select Banner Content Type', 'ideal-magazine' ),
		'section'         => 'ideal_magazine_banner_section',
		'settings'        => 'ideal_magazine_main_banner_content_type',
		'type'            => 'select',
		'active_callback' => 'ideal_magazine_is_banner_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'ideal-magazine' ),
			'category' => esc_html__( 'Category', 'ideal-magazine' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Banner Section - Select Banner Slider Post.
	$wp_customize->add_setting(
		'ideal_magazine_main_banner_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ideal_magazine_main_banner_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ideal-magazine' ), $i ),
			'section'         => 'ideal_magazine_banner_section',
			'settings'        => 'ideal_magazine_main_banner_content_post_' . $i,
			'active_callback' => 'ideal_magazine_is_main_banner_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ideal_magazine_get_post_choices(),
		)
	);

}

// Banner Section - Select Banner Slider Category.
$wp_customize->add_setting(
	'ideal_magazine_main_banner_content_category',
	array(
		'sanitize_callback' => 'ideal_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'ideal_magazine_main_banner_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'ideal-magazine' ),
		'section'         => 'ideal_magazine_banner_section',
		'settings'        => 'ideal_magazine_main_banner_content_category',
		'active_callback' => 'ideal_magazine_is_main_banner_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => ideal_magazine_get_post_cat_choices(),
	)
);

// Banner Section - Main Banner Button Label.
$wp_customize->add_setting(
	'ideal_magazine_main_banner_button_label',
	array(
		'default'           => __( 'View All', 'ideal-magazine' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ideal_magazine_main_banner_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'ideal-magazine' ),
		'section'         => 'ideal_magazine_banner_section',
		'settings'        => 'ideal_magazine_main_banner_button_label',
		'type'            => 'text',
		'active_callback' => 'ideal_magazine_is_banner_section_enabled',
	)
);

// Banner Section - Main Banner Button Link.
$wp_customize->add_setting(
	'ideal_magazine_main_banner_button_link',
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'ideal_magazine_main_banner_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'ideal-magazine' ),
		'section'         => 'ideal_magazine_banner_section',
		'settings'        => 'ideal_magazine_main_banner_button_link',
		'type'            => 'url',
		'active_callback' => 'ideal_magazine_is_banner_section_enabled',
	)
);

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'ideal_magazine_banner_slider_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Ideal_Magazine_Customize_Horizontal_Line(
		$wp_customize,
		'ideal_magazine_banner_slider_horizontal_line',
		array(
			'section'         => 'ideal_magazine_banner_section',
			'settings'        => 'ideal_magazine_banner_slider_horizontal_line',
			'active_callback' => 'ideal_magazine_is_banner_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Banner Section - Featured Posts Title.
$wp_customize->add_setting(
	'ideal_magazine_featured_posts_title',
	array(
		'default'           => __( 'Featured Posts', 'ideal-magazine' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ideal_magazine_featured_posts_title',
	array(
		'label'           => esc_html__( 'Featured Posts Title Label', 'ideal-magazine' ),
		'section'         => 'ideal_magazine_banner_section',
		'settings'        => 'ideal_magazine_featured_posts_title',
		'type'            => 'text',
		'active_callback' => 'ideal_magazine_is_banner_section_enabled',
	)
);

// Banner Section - Featured Posts Content Type.
$wp_customize->add_setting(
	'ideal_magazine_featured_posts_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ideal_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'ideal_magazine_featured_posts_content_type',
	array(
		'label'           => esc_html__( 'Select Featured Posts Content Type', 'ideal-magazine' ),
		'section'         => 'ideal_magazine_banner_section',
		'settings'        => 'ideal_magazine_featured_posts_content_type',
		'type'            => 'select',
		'active_callback' => 'ideal_magazine_is_banner_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'ideal-magazine' ),
			'category' => esc_html__( 'Category', 'ideal-magazine' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {
	// Banner Section - Select Post.
	$wp_customize->add_setting(
		'ideal_magazine_featured_posts_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ideal_magazine_featured_posts_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ideal-magazine' ), $i ),
			'section'         => 'ideal_magazine_banner_section',
			'settings'        => 'ideal_magazine_featured_posts_content_post_' . $i,
			'active_callback' => 'ideal_magazine_is_featured_posts_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ideal_magazine_get_post_choices(),
		)
	);

}

// Banner Section - Select Category.
$wp_customize->add_setting(
	'ideal_magazine_featured_posts_content_category',
	array(
		'sanitize_callback' => 'ideal_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'ideal_magazine_featured_posts_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'ideal-magazine' ),
		'section'         => 'ideal_magazine_banner_section',
		'settings'        => 'ideal_magazine_featured_posts_content_category',
		'active_callback' => 'ideal_magazine_is_featured_posts_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => ideal_magazine_get_post_cat_choices(),
	)
);

// Banner Section - Featured Posts Button Label.
$wp_customize->add_setting(
	'ideal_magazine_featured_posts_button_label',
	array(
		'default'           => __( 'View All', 'ideal-magazine' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ideal_magazine_featured_posts_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'ideal-magazine' ),
		'section'         => 'ideal_magazine_banner_section',
		'settings'        => 'ideal_magazine_featured_posts_button_label',
		'type'            => 'text',
		'active_callback' => 'ideal_magazine_is_banner_section_enabled',
	)
);

// Banner Section - Featured Posts Button Link.
$wp_customize->add_setting(
	'ideal_magazine_featured_posts_button_link',
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'ideal_magazine_featured_posts_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'ideal-magazine' ),
		'section'         => 'ideal_magazine_banner_section',
		'settings'        => 'ideal_magazine_featured_posts_button_link',
		'type'            => 'url',
		'active_callback' => 'ideal_magazine_is_banner_section_enabled',
	)
);

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'ideal_magazine_advertisement_images_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Ideal_Magazine_Customize_Horizontal_Line(
		$wp_customize,
		'ideal_magazine_advertisement_images_horizontal_line',
		array(
			'section'         => 'ideal_magazine_banner_section',
			'settings'        => 'ideal_magazine_advertisement_images_horizontal_line',
			'active_callback' => 'ideal_magazine_is_banner_section_enabled',
			'type'            => 'hr',
		)
	)
);

for ( $i = 1; $i <= 2; $i++ ) {

	// Banner Section - Advertisement Image.
	$wp_customize->add_setting(
		'ideal_magazine_advertisement_image_' . $i,
		array(
			'sanitize_callback' => 'ideal_magazine_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'ideal_magazine_advertisement_image_' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Advertisement %d', 'ideal-magazine' ), $i ),
				'section'         => 'ideal_magazine_banner_section',
				'settings'        => 'ideal_magazine_advertisement_image_' . $i,
				'active_callback' => 'ideal_magazine_is_banner_section_enabled',
			)
		)
	);

	// Banner Section - Advertisement Image URL.
	$wp_customize->add_setting(
		'ideal_magazine_advertisement_image_url_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'ideal_magazine_advertisement_image_url_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Advertisement URL %d', 'ideal-magazine' ), $i ),
			'section'         => 'ideal_magazine_banner_section',
			'settings'        => 'ideal_magazine_advertisement_image_url_' . $i,
			'type'            => 'url',
			'active_callback' => 'ideal_magazine_is_banner_section_enabled',
		)
	);

}
