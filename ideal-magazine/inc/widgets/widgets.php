<?php

// List Posts Thumbnail Widget.
require get_template_directory() . '/inc/widgets/list-posts-thumbnail-widget.php';

// List Posts Widget.
require get_template_directory() . '/inc/widgets/list-posts-widget.php';

// Grid Posts Widget.
require get_template_directory() . '/inc/widgets/grid-posts-widget.php';

// Trending Posts Widget.
require get_template_directory() . '/inc/widgets/trending-posts-widget.php';

// Slider Widget.
require get_template_directory() . '/inc/widgets/slider-widget.php';

// Social Icons Widget.
require get_template_directory() . '/inc/widgets/social-icons-widget.php';

/**
 * Register Widgets
 */
function ideal_magazine_register_widgets() {

	register_widget( 'Ideal_Magazine_List_Posts_Thumbnail_Widget' );

	register_widget( 'Ideal_Magazine_List_Posts_Widget' );

	register_widget( 'Ideal_Magazine_Grid_Posts_Widget' );

	register_widget( 'Ideal_Magazine_Trending_Posts_Widget' );

	register_widget( 'Ideal_Magazine_Slider_Widget' );

	register_widget( 'Ideal_Magazine_Social_Icons_Widget' );

}
add_action( 'widgets_init', 'ideal_magazine_register_widgets' );
