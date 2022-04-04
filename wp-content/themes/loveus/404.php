<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package loveus
 */

get_header();
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
						echo esc_html__('404 Page', 'loveus');
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
<section class="sidebar-page-container error-area-404">
	<div class="auto-container">
		<div class="row clearfix">
			<div class="col-12">
				<div class="no-results not-found error-404 not-found">
						<h3>
							<span class="content-404">
								<?php esc_html_e('404', 'loveus'); ?>
							</span>
						</h3>
						<h2>
							<?php esc_html_e('Oops! That page can’t be found.', 'loveus'); ?>
						</h2>
						<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'loveus'); ?></p>
						<div class="nothing-found-search">
						<?php
							get_search_form();
						?>
						</div>
				</div><!-- .no-results -->
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
