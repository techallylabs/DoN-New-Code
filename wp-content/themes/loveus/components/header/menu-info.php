<?php
$header_cart_icon          = loveus_get_options( 'header_cart_icon' );
$header_donate_button      = loveus_get_options( 'header_donate_button' );
$header_donate_button_text = loveus_get_options( 'header_donate_button_text' );
$header_donate_button_link = loveus_get_options( 'header_donate_button_link' );

$header_style        = loveus_get_options( 'header_style' );
$header_button_class = 'btn-style-one';
if ( $header_style == '2' ) :
	$header_button_class = 'btn-style-one';
elseif ( $header_style == '3' ) :
	$header_button_class = 'btn-style-five';
endif;
?>

<?php if ( $header_cart_icon || $header_donate_button ) : ?>
	<div class="link-box clearfix">
		<?php if ( $header_donate_button === '1' ) : ?>
			<div class="donate-link"><a href="<?php echo esc_url( $header_donate_button_link ); ?>" class="theme-btn <?php echo esc_attr( $header_button_class ); ?>"><span class="btn-title"><?php echo wp_kses_post( $header_donate_button_text ); ?></span></a></div>
		<?php endif; ?>
		<?php if ( $header_cart_icon === '1' ) : ?>
			<div class="cart-link">
				<?php if ( class_exists( 'WooCommerce' ) ) { ?>
					<?php $count = WC()->cart->cart_contents_count; ?>
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="theme-btn">
						<span class="icon flaticon-paper-bag"></span>
					</a>
				<?php } ?>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>
