<?php
/**
 * Displays the campaign loop.
 *
 * Override this template by copying it to yourtheme/charitable/campaign-loop.php
 *
 * @author  Studio 164a
 * @package Charitable/Templates/Campaign
 * @since   1.0.0
 * @version 1.5.7
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$campaigns = $view_args['campaigns'];

if ( ! $campaigns->have_posts() ) :
	return;
endif;

$loop_class = charitable_campaign_loop_class( $view_args );
$args       = charitable_campaign_loop_args( $view_args );

/**
 * Add something before the campaign loop.
 *
 * @since   1.5.0
 *
 * @param   WP_Query $campaigns The campaigns.
 * @param   array    $args      Loop args.
 */
do_action( 'charitable_campaign_loop_before', $campaigns, $args );

$coloumn_class = 'col-lg-6';


if ( $view_args['columns'] == '1' ) {
	$coloumn_class = 'col-lg-12';
} elseif ( $view_args['columns'] == '2' ) {
	$coloumn_class = 'col-lg-6';
} elseif ( $view_args['columns'] == '3' ) {
	$coloumn_class = 'col-lg-4';
} elseif ( $view_args['columns'] == '4' ) {
	$coloumn_class = 'col-lg-3';
}

?>

<section class="causes-section <?php echo esc_attr( $loop_class ); ?>">
		<div class="auto-container">     
			<div class="row clearfix">

<?php
while ( $campaigns->have_posts() ) :

	$campaigns->the_post();
	?>
<div id="campaign-<?php echo get_the_ID(); ?>" class=" cause-block <?php echo esc_attr($coloumn_class); ?> col-md-6 col-sm-12">
	<div class="inner-box wow fadeInUp" data-wow-delay="0ms">
	<?php

	charitable_template( 'campaign-loop/campaign.php', $args );

	?>

</div>
</div>
	<?php

endwhile;

wp_reset_postdata();
?>
			</div>
		</div>
</section>
<?php

/**
 * Add something after the campaign loop.
 *
 * @since   1.5.0
 *
 * @param   WP_Query $campaigns The campaigns.
 * @param   array    $args      Loop args.
 */
do_action( 'charitable_campaign_loop_after', $campaigns, $args );
