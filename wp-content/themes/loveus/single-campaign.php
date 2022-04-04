<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package loveus
 */
get_header();
$campaign = charitable_get_current_campaign();

if ( is_active_sidebar( 'sidebar-1' ) ) :
	$blog_class = 'col-lg-8';
else :
	$blog_class = 'col-lg-12';
endif;
$blog_page_header_img  = loveus_get_options( 'blog_page_header_img' );
$blog_page_header      = loveus_get_options( 'blog_page_header' );
$blog_page_breadcrumbs = loveus_get_options( 'blog_page_breadcrumbs' );
?>
<?php if ( $blog_page_header == '1' ) : ?>
	<section class="page-banner brd-single-cmp">
		<div class="image-layer" ></div>
		<div class="bottom-rotten-curve"></div>
		<div class="auto-container">
			<h1><?php echo esc_html__( 'Single Causes', 'loveus' ); ?></h1>
			<?php if ( $blog_page_breadcrumbs == '1' ) : ?>
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
			<div class="content-side <?php echo esc_attr( $blog_class ); ?> col-md-12 col-sm-12">
				<div class="cause-details">
					<div class="inner-box">
						<?php
						while ( have_posts() ) :
							the_post();
							?>
										<div class="image-box">
							<?php loveus_post_thumbnail(); ?>
							<?php charitable_template_campaign_progress_bar( $campaign ); ?>
										</div>
										<div class="lower-content">
											<div class="text-content">
											<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
											</div>
										</div>
							<div class="link-box">
								<?php charitable_template_donate_button( $campaign ); ?>  
							</div>
							  
							<?php
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						endwhile;
						?>
					</div>
				</div>
			</div>
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
