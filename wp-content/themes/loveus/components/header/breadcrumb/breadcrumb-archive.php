<?php
$loveus_show_breadcrumb = get_post_meta( get_the_ID(), 'loveus_metabox_show_breadcrumb', true );
?>
<?php if ( $loveus_show_breadcrumb != 'off' ) : ?>
	<section class="page-banner brd-page">
			<div class="image-layer"></div>
			<div class="bottom-rotten-curve"></div>
			<div class="auto-container">
				<h1><?php echo get_the_archive_title(); ?></h1>
				<?php if ( function_exists( 'bcn_display' ) ) : ?>
					<div class="bread-crumb clearfix">
						<?php bcn_display(); ?>
					</div>
				<?php endif; ?>
			</div>
	</section>
<?php endif; ?>
