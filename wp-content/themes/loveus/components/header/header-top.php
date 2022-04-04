<?php
$header_topbar_onoff        = loveus_get_options( 'header_topbar_onoff' );
$header_topbar_social_onoff = loveus_get_options( 'header_topbar_social_onoff' );
$header_topbar_social       = loveus_get_options( 'header_topbar_social' );
$header_search_onoff        = loveus_get_options( 'header_search_onoff' );
$header_info_bar            = loveus_get_options( 'header_info_bar' );
?>

<?php if ( $header_topbar_onoff ) : ?>
	<div class="header-top">
		<div class="auto-container">
			<div class="inner clearfix">
				<?php if ( $header_topbar_social_onoff === '1' ) : ?>
					<div class="top-left">
						<?php
						if ( $header_topbar_social ) :
							echo sprintf( __( '%s', 'loveus' ), $header_topbar_social );
							endif;
						?>
					</div>
				<?php endif; ?>
				<?php if ( $header_search_onoff || $header_info_bar[1] || $header_info_bar[2] ) : ?>
					<div class="top-right">
						<ul class="info clearfix">
							<?php if ( $header_search_onoff === '1' ) : ?>
								<li class="search-btn"><button type="button" class="theme-btn search-toggler"><span class="fa fa-search"></span></button></li>
							<?php endif; ?>
							
							<?php if ( $header_info_bar[1] ) : ?>
								<li><a href="tel:<?php echo esc_html( $header_info_bar[1] ); ?>"><span class="icon fa fa-phone-alt"></span><?php echo esc_html( $header_info_bar[1] ); ?></a></li>
							<?php endif; ?>

							<?php if ( $header_info_bar[2] ) : ?>
								<li><a href="mailto:<?php echo esc_html( $header_info_bar[2] ); ?>"><span class="icon fa fa-envelope"></span><?php echo esc_html( $header_info_bar[2] ); ?></a></li>
							<?php endif; ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif; ?>
