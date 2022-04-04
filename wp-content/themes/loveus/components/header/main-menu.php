<?php
$header_cart_icon     = loveus_get_options( 'header_cart_icon' );
$header_donate_button = loveus_get_options( 'header_donate_button' );
$main_menu_right      = '';
if ( ! $header_cart_icon && ! $header_donate_button ) :
	$main_menu_right = 'main-menu-right';
endif;
?>

<!--Nav Box-->
<div class="nav-outer clearfix">
	<!--Mobile Navigation Toggler-->
	<div class="mobile-nav-toggler"><span class="icon flaticon-menu-1"></span></div>

	<!-- Main Menu -->
	<nav class="main-menu navbar-expand-md navbar-light <?php echo esc_attr( $main_menu_right ); ?>">
		<div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_class'     => 'navigation clearfix',
							'container'      => 'ul',
						)
					);
			} else {
				wp_nav_menu(
					array(
						'menu_class' => 'navigation clearfix',
						'container'  => 'ul',
					)
				);
			}
			?>
		</div>
	</nav>
	<!-- Main Menu End-->
	<?php get_template_part( 'components/header/menu-info' ); ?>
</div>
