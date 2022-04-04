<?php
// Charitable Campaign
function loveus_campaigns_use_page_template( $template ) {
	global $wp_query;
	if ( is_main_query() && is_singular( 'campaign' ) && ! isset( $wp_query->query_vars['widget'] ) ) {
		$template = locate_template(
			array(
				'single-campaign.php',
				'page.php',
				'index.php',
			)
		);
	}
	return $template;
}
add_filter( 'template_include', 'loveus_campaigns_use_page_template' );
function loveus_remove_campaign_summary_block() {
	remove_action( 'charitable_campaign_content_before', 'charitable_template_campaign_summary', 6 );
}
add_action( 'after_setup_theme', 'loveus_remove_campaign_summary_block', 11 );
function loveus_charitable_add_snippet_before_form_fields( $form ) {
	if ( ! is_a( $form, 'Charitable_Donation_Form' ) ) {
		return;
	}
	$campaign       = charitable_get_current_campaign();
	$display_option = charitable_get_option( 'donation_form_display', 'separate_page' );

	?>

<section class="donate-section">
	<div class="auto-container">
		<div class="tabs-box">
			<div class="row clearfix">

				<!--Title Column-->
				<?php
				if ( $display_option != 'modal' ) {
					?>
				<div class="title-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner">
						<h2><?php the_title(); ?></h2>
						<div class="text"><?php charitable_template_campaign_description( $campaign ); ?></div>
						<figure class="image-box"><?php loveus_post_thumbnail(); ?></figure>
					</div>
				</div>
					<?php
				}
				if ( $display_option != 'modal' ) {
					?>
				<div class="form-column col-lg-6 col-md-12 col-sm-12">
					<?php
				} else {
					?>
				<div class="form-column col-lg-12 col-md-12 col-sm-12">
					<?php
				}
				?>
					<div class="inner">
						<div class="donate-form">
							<?php
}
add_action( 'charitable_form_before_fields', 'loveus_charitable_add_snippet_before_form_fields' );

function loveus_charitable_add_snippet_after_form_fields( $form ) {
	if ( ! is_a( $form, 'Charitable_Donation_Form' ) ) {
		return;
	}

	$campaign = charitable_get_current_campaign();

	/**
	 * Next we close the PHP tags so that we can just display some HTML.
	 */
	?>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>

	<?php
}

add_action( 'charitable_form_after_fields', 'loveus_charitable_add_snippet_after_form_fields' );
