<?php
/**
 * Displays the campaign progress bar.
 *
 * Override this template by copying it to yourtheme/charitable/campaign/progress-bar.php
 *
 * @author  Studio 164a
 * @since   1.0.0
 * @version 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @var Charitable_Campaign
 */
$campaign        = $view_args['campaign'];
$currency_helper = charitable_get_currency_helper();

if ( ! $campaign->has_goal() ) :
	return;
endif;

?>
<div class="donate-info">
	<div class="progress-box">
		<div class="bar">
			<div class="bar-inner count-bar" data-percent="<?php echo  esc_attr($campaign->get_percent_donated_raw() . '%'); ?>">
				<div class="count-text"><?php echo esc_html(floor($campaign->get_percent_donated_raw()) . '%'); ?></div>
			</div>
		</div>
	</div>
	<div class="donation-count clearfix">
				<span class="raised"><strong><?php echo esc_html__('Raised:','loveus');  ?></strong>  <?php echo esc_html($currency_helper->get_monetary_amount( $campaign->get_donated_amount() )); ?></span> 
		<span class="goal"><strong><?php echo esc_html__('Goal:','loveus');  ?></strong> <?php echo esc_html($currency_helper->get_monetary_amount( $campaign->get_goal() )); ?></span>
	</div>
</div>
