<?php
$sticky_header_on   = loveus_get_options( 'sticky_header_on' );
$sticky_header_logo = loveus_get_options( 'sticky_header_logo' );
?>
<?php if ( $sticky_header_on == '1' ) : ?>
<!-- Sticky Header  -->
<div class="sticky-header">
	<div class="auto-container clearfix">
		<!--Logo-->
		<div class="logo pull-left">
			<?php if ( $sticky_header_logo['url'] ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" ><img src="<?php echo esc_url( $sticky_header_logo['url'], 'loveus' ); ?>"></a>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" ><img src="<?php echo esc_url( LOVEUS_IMG_URL . 'sticky-logo.png' ); ?>" alt="<?php esc_attr_e( 'Logo', 'loveus' ); ?>"></a>
			<?php endif; ?>
		</div>
		<!--Right Col-->
		<div class="pull-right">
			<!-- Main Menu -->
			<nav class="main-menu clearfix">
				<!--Keep This Empty / Menu will come through Javascript-->
			</nav><!-- Main Menu End-->
		</div>
	</div>
</div>
<!-- End Sticky Menu -->
<?php endif; ?>
