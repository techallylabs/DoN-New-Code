<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package loveus
 */
get_header();
if ( is_active_sidebar( 'sidebar-1' ) ) :
	$blog_class = 'col-lg-8';
else :
	$blog_class = 'col-lg-12';
endif;
$blog_single_page_header_img  = loveus_get_options( 'blog_single_page_header_img' );
$blog_single_page_header      = loveus_get_options( 'blog_single_page_header' );
$blog_single_page_header_text = loveus_get_options( 'blog_single_page_header_text' );
$blog_single_page_breadcrumbs = loveus_get_options( 'blog_single_page_breadcrumbs' );
?>
	<?php if ( $blog_single_page_header == '1' ) : ?>
		<section class="page-banner blog-single">
			<div class="image-layer"></div>
			<div class="bottom-rotten-curve"></div>
			<div class="auto-container">
				<h1><?php echo wp_kses_post( $blog_single_page_header_text ); ?></h1>
				<?php if ( $blog_single_page_breadcrumbs == '1' ) : ?>
					<?php if ( function_exists( 'bcn_display' ) ) : ?>
						<div class="bread-crumb clearfix">
							<?php bcn_display(); ?>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>
	<!--Sidebar Page Container-->
	<div class="sidebar-page-container">
		<div class="auto-container">
			<div class="row clearfix">
				<!--Content Side / Blog Sidebar-->
				<div class="content-side <?php echo esc_attr( $blog_class ); ?> col-md-12 col-sm-12">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/single/content', get_post_format() );
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
							endif;

						endwhile; // End of the loop.
					?>
				</div>
				<!--Sidebar Side-->
				<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
					<div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php
get_footer();
