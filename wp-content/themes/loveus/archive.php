<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package loveus
 */

get_header();
	if (is_active_sidebar('sidebar-1')) :
		$blog_class = 'col-lg-8';
	else :
		$blog_class = 'col-lg-12';
	endif;
?>
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
