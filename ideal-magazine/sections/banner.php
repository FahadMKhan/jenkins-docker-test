<?php
if ( ! get_theme_mod( 'ideal_magazine_enable_banner_section', false ) ) {
	return;
}

$main_banner_content_ids = $featured_content_ids = array();
$banner_content_type     = get_theme_mod( 'ideal_magazine_main_banner_content_type', 'post' );
$featured_content_type   = get_theme_mod( 'ideal_magazine_featured_posts_content_type', 'post' );

if ( $banner_content_type === 'post' ) {
	for ( $i = 1; $i <= 3; $i++ ) {
		$main_banner_content_ids[] = get_theme_mod( 'ideal_magazine_main_banner_content_post_' . $i );
	}
	$main_banner_args = array(
		'post_type'           => 'post',
		'post__in'            => array_filter( $main_banner_content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 3 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $main_banner_content_ids ) ) ) {
		$main_banner_args['post__in'] = array_filter( $main_banner_content_ids );
		$main_banner_args['orderby']  = 'post__in';
	} else {
		$main_banner_args['orderby'] = 'date';
	}
} else {
	$cat_content_id   = get_theme_mod( 'ideal_magazine_main_banner_content_category' );
	$main_banner_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 3 ),
	);
}
$main_banner_args = apply_filters( 'ideal_magazine_banner_section_args', $main_banner_args );

if ( $featured_content_type === 'post' ) {
	for ( $i = 1; $i <= 5; $i++ ) {
		$featured_content_ids[] = get_theme_mod( 'ideal_magazine_featured_posts_content_post_' . $i );
	}
	$featured_args = array(
		'post_type'           => 'post',
		'post__in'            => array_filter( $featured_content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $featured_content_ids ) ) ) {
		$featured_args['post__in'] = array_filter( $featured_content_ids );
		$featured_args['orderby']  = 'post__in';
	} else {
		$featured_args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'ideal_magazine_featured_posts_content_category' );
	$featured_args  = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 5 ),
	);
} 
$featured_args = apply_filters( 'ideal_magazine_banner_section_args', $featured_args );

ideal_magazine_render_banner_section( $main_banner_args, $featured_args );

/**
 * Render Banner Section.
 */
function ideal_magazine_render_banner_section( $main_banner_args, $featured_args ) {

	$banner_title        = get_theme_mod( 'ideal_magazine_main_banner_title', __( 'Main Banner', 'ideal-magazine' ) );
	$banner_button       = get_theme_mod( 'ideal_magazine_main_banner_button_label', __( 'View All', 'ideal-magazine' ) );
	$banner_button_url   = get_theme_mod( 'ideal_magazine_main_banner_button_link' );
	$banner_content_type = get_theme_mod( 'ideal_magazine_main_banner_content_type', 'post' );
	if ( 'category' === $banner_content_type ) {
		$banner_category   = get_theme_mod( 'ideal_magazine_main_banner_content_category' );
		$banner_button_url = ! empty( $banner_button_url ) ? $banner_button_url : get_category_link( $banner_category );
	} else {
		$banner_button_url = ! empty( $banner_button_url ) ? $banner_button_url : '#';
	}

	$featured_title        = get_theme_mod( 'ideal_magazine_featured_posts_title', __( 'Featured Posts', 'ideal-magazine' ) );
	$featured_button       = get_theme_mod( 'ideal_magazine_featured_posts_button_label', __( 'View All', 'ideal-magazine' ) );
	$featured_button_url   = get_theme_mod( 'ideal_magazine_featured_posts_button_link' );
	$featured_content_type = get_theme_mod( 'ideal_magazine_featured_posts_content_type', 'post' );
	if ( 'category' === $featured_content_type ) {
		$featured_category   = get_theme_mod( 'ideal_magazine_featured_posts_content_category' );
		$featured_button_url = ! empty( $featured_button_url ) ? $featured_button_url : get_category_link( $featured_category );
	} else {
		$featured_button_url = ! empty( $featured_button_url ) ? $featured_button_url : '#';
	}

	?>

	<section id="ideal_magazine_banner_section" class="magazine-banner section-splitter banner-style-3">
		<?php
		if ( is_customize_preview() ) :
			ideal_magazine_section_link( 'ideal_magazine_banner_section' );
		endif;
		?>
		<div class="section-wrapper">
			<div class="banner-container-wrapper">
				<div class="banner-wrapper">

					<!-- Banner Slider -->
					<div class="banner-main-part">
						<?php if ( ! empty( $banner_title || $banner_button ) ) { ?>
							<div class="title-heading">
								<h3 class="section-title">
									<?php echo esc_html( $banner_title ); ?>
								</h3>
								<span class="title-dash"></span>
								<?php if ( ! empty( $banner_button ) ) { ?>
									<a href="<?php echo esc_url( $banner_button_url ); ?>" class="view-all"><?php echo esc_html( $banner_button ); ?></a>
								<?php } ?>
							</div>
						<?php } ?>
						<div class="banner-headline-wrap banner-main-carousel slick-button ">
							<?php
							$banner_query = new WP_Query( $main_banner_args );
							if ( $banner_query->have_posts() ) {
								while ( $banner_query->have_posts() ) :
									$banner_query->the_post();
									?>
									<div class="blog-post-container tile-layout">
										<div class="blog-post-inner <?php echo esc_attr( has_post_thumbnail() ? '' : 'no-thumbnail' ); ?>">
											<?php if( has_post_thumbnail() ) { ?>
												<div class="blog-post-image">
													<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail' ); ?></a>
												</div>
											<?php } ?>
											<div class="blog-post-detail">
												<div class="post-categories">
													<?php ideal_magazine_categories_list(); ?>
												</div>
												<h2 class="entry-title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h2>
												<div class="post-meta">
													<?php ideal_magazine_posted_by(); ?>
													<?php ideal_magazine_posted_on(); ?>
												</div>
												<p class="post-excerpt">
													<?php echo wp_kses_post( wp_trim_words( get_the_content(), 20 ) ); ?>
												</p>
											</div>
										</div>
									</div>
									<?php
								endwhile;
								wp_reset_postdata();
							}
							?>
						</div>
					</div>
					<!-- End Banner Slider -->

					<!-- Featured Posts -->
					<div class="featured-posts">
						<?php if ( ! empty( $featured_title || $featured_button ) ) { ?>
							<div class="title-heading">
								<h3 class="section-title">
									<?php echo esc_html( $featured_title ); ?>
								</h3>
								<span class="title-dash"></span>
								<?php if ( ! empty( $featured_button ) ) { ?>
									<a href="<?php echo esc_url( $featured_button_url ); ?>" class="view-all"><?php echo esc_html( $featured_button ); ?></a>
								<?php } ?>
							</div>
						<?php } ?>
						<div class="featured-posts-wrapper">
							<div class="featured-posts-carousel banner-featured-posts-wrap">
								<?php
								$featured_query = new WP_Query( $featured_args );
								if ( $featured_query->have_posts() ) {
									while ( $featured_query->have_posts() ) :
										$featured_query->the_post();
										?>
										<div class="blog-post-container list-layout">
											<div class="blog-post-inner <?php echo esc_attr( has_post_thumbnail() ? '' : 'no-thumbnail' ); ?>">
												<?php if( has_post_thumbnail() ) { ?>
													<div class="blog-post-image">
														<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail' ); ?></a>
													</div>
												<?php } ?>
												<div class="blog-post-detail">
													<h2 class="entry-title">
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</h2>
													<div class="post-meta">
														<div class="post-author">
															<?php ideal_magazine_posted_by(); ?>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php
									endwhile;
									wp_reset_postdata();
								}
								?>
							</div>

						</div>
					</div>
					<!-- End Featured Posts -->
					
				</div>

				<div class="adver-grid">
					<?php
					for ( $i = 1; $i <= 2; $i++ ) {
						$ads_image     = get_theme_mod( 'ideal_magazine_advertisement_image_' . $i );
						$ads_image_url = get_theme_mod( 'ideal_magazine_advertisement_image_url_' . $i );
						if ( ! empty( $ads_image ) ) :
							?>
							<a href="<?php echo esc_url( $ads_image_url ); ?>"><img src="<?php echo esc_url( $ads_image ); ?>" alt="<?php esc_attr_e( 'Advertisment Image', 'ideal-magazine' ); ?>"></a>

							<?php
						endif;
					}
					?>	
				</div>

			</div>
		</div>
	</section>

	<?php
}
