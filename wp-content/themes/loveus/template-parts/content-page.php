<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package loveus
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-post-detail">
		<div class="inner">
			<div class="content">
				<?php
					the_content();
					wp_link_pages(
						array(
							'before' => '<div class="page-links">',
							'after' => '</div>',
						)
					);
				?>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->