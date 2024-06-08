<?php

/**
 * Active Callbacks
 *
 * @package Ideal Magazine
 */

// Theme Options.
function ideal_magazine_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'ideal_magazine_enable_pagination' )->value() );
}
function ideal_magazine_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'ideal_magazine_enable_breadcrumb' )->value() );
}

// Flash News Section.
function ideal_magazine_is_flash_news_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ideal_magazine_enable_flash_news_section' )->value() );
}
function ideal_magazine_is_flash_news_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ideal_magazine_flash_news_content_type' )->value();
	return ( ideal_magazine_is_flash_news_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ideal_magazine_is_flash_news_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ideal_magazine_flash_news_content_type' )->value();
	return ( ideal_magazine_is_flash_news_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Banner Section.
function ideal_magazine_is_banner_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ideal_magazine_enable_banner_section' )->value() );
}

// Banner Section - Main Banner.
function ideal_magazine_is_main_banner_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ideal_magazine_main_banner_content_type' )->value();
	return ( ideal_magazine_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ideal_magazine_is_main_banner_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ideal_magazine_main_banner_content_type' )->value();
	return ( ideal_magazine_is_banner_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Banner Section - Featured Posts.
function ideal_magazine_is_featured_posts_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ideal_magazine_featured_posts_content_type' )->value();
	return ( ideal_magazine_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ideal_magazine_is_featured_posts_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ideal_magazine_featured_posts_content_type' )->value();
	return ( ideal_magazine_is_banner_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Check if static home page is enabled.
function ideal_magazine_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}
