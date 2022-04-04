<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package loveus
 */

$get_involved_area       = get_post_meta( get_the_ID(), 'loveus_metabox_get_involved_area', true );
$back_to_top_on_off      = loveus_get_options( 'back_to_top_on_off' );
$footer_widget_elementor = loveus_get_options( 'footer_widget_elementor' );

if ( class_exists( '\\Elementor\\Plugin' ) ) {
	if ( is_array( $footer_widget_elementor ) && ! empty( $footer_widget_elementor ) ) {
		$pluginElementor = \Elementor\Plugin::instance();
		if ( ! isset( $footer_widget_elementor[0] ) ) {
			$footer_widget_elementor[0] = null;
		}
		$footer_widget_elementor_print_0 = $pluginElementor->frontend->get_builder_content( $footer_widget_elementor['0'] );
		if ( ! isset( $footer_widget_elementor[1] ) ) {
			$footer_widget_elementor[1] = null;
		}
		$footer_widget_elementor_print_1 = $pluginElementor->frontend->get_builder_content( $footer_widget_elementor['1'] );
	}
}

$get_involv_elementor = loveus_get_options( 'get_involv_elementor' );
if ( class_exists( '\\Elementor\\Plugin' ) ) {
	$pluginElementor       = \Elementor\Plugin::instance();
	$get_involv_elementoro = $pluginElementor->frontend->get_builder_content( $get_involv_elementor );
}
?>
<?php
if ( class_exists( '\\Elementor\\Plugin' ) ) {
	if ( is_array( $footer_widget_elementor ) && ! empty( $footer_widget_elementor ) ) :
		if ( $get_involved_area != 'off' ) :
			echo wp_kses_post( $get_involv_elementoro );
			endif;
		echo wp_kses_post( $footer_widget_elementor_print_0 );
		if ( isset( $footer_widget_elementor_print_1 ) ) {
			echo wp_kses_post( $footer_widget_elementor_print_1 );
		}
	endif;
}
get_template_part( 'components/footer/footer' );
?>
</div>
<?php
if ( $back_to_top_on_off == '1' ) :
	do_action( 'back_to_top' );
endif;
?>
<?php wp_footer(); ?>
</body>
</html>
