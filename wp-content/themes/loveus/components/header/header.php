<?php
$header_style = loveus_get_options( 'header_style' );

$header_type = get_query_var( 'header_type' );
if ( ! $header_type ) {
	$header_type = $header_style;
}

$header_style_class = '';
if ( $header_style == '2' || $header_type == 2 ) :
	$header_style_class = 'header-style-two';
elseif ( $header_style == '3' || $header_type == 3 ) :
	$header_style_class = 'header-style-three';
endif;
?>
<?php
$header_style = loveus_get_options( 'header_style' );
if ( $header_style != 4 ) :
	?>
	<!-- Main Header -->
	<header class="main-header <?php echo esc_attr( $header_style_class ); ?>">

	<?php
	if ( $header_type == 1 ) :
		get_template_part( 'components/header/header-top' );
		endif;
	?>

		<!-- Header Upper -->
		<div class="header-upper">
			<div class="auto-container">
				<div class="inner-container clearfix">
				<?php
					do_action( 'loveus_logo_fun' );
				?>
				<?php get_template_part( 'components/header/main-menu' ); ?>
				</div>
			</div>
		</div>
		<!--End Header Upper-->
		<?php get_template_part( 'components/header/sticky-header' ); ?>
		<?php get_template_part( 'components/header/mobile-menu' ); ?>
	</header>
	<?php
	endif;
if ( $header_style == 4 ) :
	$header_area_elementor = loveus_get_options( 'header_area_elementor' );
	if ( class_exists( '\\Elementor\\Plugin' ) ) {
		$pluginElementor       = \Elementor\Plugin::instance();
		$get_involv_elementoro = $pluginElementor->frontend->get_builder_content( $header_area_elementor );
	}
	echo wp_kses_post( $get_involv_elementoro );

	endif;
?>
