<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ideal Magazine
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="main-wrap">
		<div class="blog-post-container grid-layout">
			<div class="blog-post-inner <?php echo esc_attr( has_post_thumbnail() ? '' : 'no-thumbnail' ); ?>">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="blog-post-image">
						<?php ideal_magazine_post_thumbnail(); ?>
					</div>
				<?php endif; ?>
				<div class="blog-post-detail">
					<?php if ( 'post' === get_post_type() ) : ?>
						<div class="post-categories">
							<?php ideal_magazine_categories_list(); ?>
						</div>
					<?php endif; ?>
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="post-main-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
					?>
					<div class="post-meta">
						<?php
						ideal_magazine_posted_by();
						ideal_magazine_posted_on();
						?>
					</div>
					<div class="post-excerpt">
						<?php the_excerpt(); ?>
					</div>
				</div>
			</div>
		</div>	
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
