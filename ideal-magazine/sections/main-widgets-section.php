<?php

if ( is_active_sidebar( 'primary-widgets-area' ) && is_active_sidebar( 'secondary-widgets-area' ) && is_active_sidebar( 'tertiary-widgets-area' ) ) {
	$sidebar_classes = 'triple-widget-area';
} elseif ( is_active_sidebar( 'primary-widgets-area' ) && is_active_sidebar( 'secondary-widgets-area' ) ) {
	$sidebar_classes = 'single-left-sidebar';
} elseif ( is_active_sidebar( 'primary-widgets-area' ) && is_active_sidebar( 'tertiary-widgets-area' ) ) {
	$sidebar_classes = 'single-right-sidebar';
} elseif ( is_active_sidebar( 'secondary-widgets-area' ) && is_active_sidebar( 'tertiary-widgets-area' ) ) {
	$sidebar_classes = 'double-sidebar';
} elseif ( ! is_active_sidebar( 'primary-widgets-area' ) && ! is_active_sidebar( 'secondary-widgets-area' ) ) {
	$sidebar_classes = 'no-sidebar';
} elseif ( ! is_active_sidebar( 'primary-widgets-area' ) && ! is_active_sidebar( 'tertiary-widgets-area' ) ) {
	$sidebar_classes = 'no-sidebar';
} elseif ( ! is_active_sidebar( 'secondary-widgets-area' ) && ! is_active_sidebar( 'tertiary-widgets-area' ) ) {
	$sidebar_classes = 'no-sidebar';
}

if ( is_active_sidebar( 'primary-widgets-area' ) || is_active_sidebar( 'secondary-widgets-area' ) || is_active_sidebar( 'tertiary-widgets-area' ) ) :
	?>
<div class="main-widget-area section-splitter">
	<div class="section-wrapper">
		<div class="widget-area-wrapper <?php echo esc_attr( $sidebar_classes ); ?>">
			<?php if ( is_active_sidebar( 'primary-widgets-area' ) ) : ?>
			<div class="primary-widgets-area">
				<?php dynamic_sidebar( 'primary-widgets-area' ); ?>
			</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'secondary-widgets-area' ) ) : ?>
			<div class="secondary-widgets-area">
				<?php dynamic_sidebar( 'secondary-widgets-area' ); ?>
			</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'tertiary-widgets-area' ) ) : ?>
			<div class="tertiary-widgets-area">
				<?php dynamic_sidebar( 'tertiary-widgets-area' ); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php endif; ?>
