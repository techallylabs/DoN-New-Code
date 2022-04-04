<?php
/**
 * The template for displaying campaign content within loops.
 *
 * Override this template by copying it to yourtheme/charitable/campaign-loop/campaign.php
 *
 * @author  Studio 164a
 * @package Charitable/Templates/Campaign
 * @since   1.0.0
 * @version 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$campaign = charitable_get_current_campaign();



?>


		<div class="image-box">
	<?php
	/**
	 * @hook charitable_campaign_content_loop_before
	 */
	do_action( 'charitable_campaign_content_loop_before', $campaign, $view_args );

	?>
		
	<?php
	/**
	 * @hook charitable_campaign_content_loop_before_title
	 */
	do_action( 'charitable_campaign_content_loop_before_title', $campaign, $view_args );
	?>
		</div>
		
	<?php
	/**
	 * @hook charitable_campaign_content_loop_after_title
	 */
	charitable_template_campaign_progress_bar( $campaign, $view_args );

	?>
		
		<div class="lower-content">

			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<div class="text"><?php charitable_template_campaign_description( $campaign, $view_args ); ?></div>
			<div class="link-box"><a href="<?php the_permalink(); ?>" class="theme-btn btn-style-two"><span class="btn-title"><?php echo esc_html__( 'Read More', 'loveus' ); ?></span></a></div>
		</div>    

	<?php

	/**
	 * @hook charitable_campaign_content_loop_after
	 */
	// do_action( 'charitable_campaign_content_loop_after', $campaign, $view_args );

	?>
