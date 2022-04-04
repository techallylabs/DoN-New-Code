<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package loveus
 */

get_header();
	if (is_active_sidebar('sidebar-1')) :
		$blog_class = 'col-lg-8';
	else :
		$blog_class = 'col-lg-12';
	endif;
	$blog_page_header_img = loveus_get_options('blog_page_header_img');
	$blog_page_header = loveus_get_options('blog_page_header');
	$blog_page_header_text = loveus_get_options('blog_page_header_text');
	$blog_page_breadcrumbs = loveus_get_options('blog_page_breadcrumbs');
?>
	<?php if($blog_page_header == '1' ) : ?>
		<section class="page-banner brd-index search-result-area-me-n">
			<?php if($blog_page_header_img) : ?>
				<div class="image-layer"></div>
			<?php endif; ?>
			<div class="bottom-rotten-curve"></div>
			<div class="auto-container">
				<h1>
					<?php
						echo esc_html__('Search results', 'loveus');
					?>
				</h1>
				<?php if($blog_page_breadcrumbs == '1') : ?>
					<?php if (function_exists('bcn_display')) : ?>
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
                <div class="content-side <?php echo esc_attr($blog_class); ?> col-md-12 col-sm-12">
                    <!--Blog Posts-->
                    <div class="blog-posts">
                        <div class="row clearfix">
							<?php
								if (have_posts()) :
									
									while (have_posts()) :
										the_post();
										get_template_part('template-parts/content', get_post_format());

									endwhile;
								else :
									get_template_part('template-parts/content', 'none');
								endif;
							?>
							<!--Styled Pagination-->
							<?php
								the_posts_pagination(array(
									'mid_size' => 2,
									'prev_text' => '<span class="fa fa-angle-left"></span>',
									'next_text' => '<span class="fa fa-angle-right"></span>'
								));
							?>
							<!--End Styled Pagination-->
                        </div>
                    </div>
                </div>
				<!--Sidebar Side-->
				<?php if (is_active_sidebar('sidebar-1')) { ?>
					<div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
            </div>
        </div>
    </div>
<?php
get_footer();
