<?php
$responsive_logo              = loveus_get_options( 'sticky_header_logos' );
$responsive_menu_social_onoff = loveus_get_options( 'responsive_menu_social_onoff' );
$responsive_menu_social_icon  = loveus_get_options( 'responsive_menu_social_icon' );
?>
<div class="mobile-menu">
	<div class="menu-backdrop"></div>
	<div class="close-btn"><span class="icon flaticon-cancel"></span></div>
	<nav class="menu-box">
		<div class="nav-logo">
			<?php if ( isset( $responsive_logo['url'] ) && $responsive_logo['url'] != '' ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" ><img src="<?php echo esc_url( $responsive_logo['url'], 'loveus' ); ?>"></a>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" ><img src="<?php echo esc_url( LOVEUS_IMG_URL . 'logo.svg' ); ?>" alt="<?php esc_attr_e( 'Logo', 'loveus' ); ?>"></a>
			<?php endif; ?>
		</div>
		<div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
		<div class="social-links">
			<?php if ( $responsive_menu_social_onoff === '1' ) : ?>
				<?php echo sprintf( __( '%s', 'loveus' ), $responsive_menu_social_icon ); ?>
			<?php endif; ?>
		</div>
	</nav>
</div>
