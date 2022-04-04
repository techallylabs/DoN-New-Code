<?php
class Loveus_Style {
	public function __construct() {
		 add_action( 'wp_enqueue_scripts', array( $this, 'loveus_enqueue_style' ), 20 );
	}
	public function loveus_enqueue_style() {
		wp_enqueue_style( 'bootstrap', LOVEUS_CSS_URL . 'bootstrap.css', false, '1' );
		wp_enqueue_style( 'fontawesome', LOVEUS_CSS_URL . 'fontawesome-all.css', false, '1' );
		wp_enqueue_style( 'animate', LOVEUS_CSS_URL . 'animate.css', false, '1' );
		wp_enqueue_style( 'flaticon', LOVEUS_CSS_URL . 'flaticon.css', false, '1' );
		wp_enqueue_style( 'owl-carousel', LOVEUS_CSS_URL . 'owl.css', false, '1' );
		wp_enqueue_style( 'jquery-fancybox', LOVEUS_CSS_URL . 'jquery.fancybox.min.css', false, '1' );
		wp_enqueue_style( 'line-awesome', LOVEUS_CSS_URL . 'line-awesome.css', false, '1' );
		wp_enqueue_style( 'loveus-style', get_stylesheet_uri(), null, time() );
		wp_enqueue_style( 'loveus-responsive', LOVEUS_CSS_URL . 'responsive.css', false, '1' );
		wp_enqueue_style( 'loveus-theme-default', LOVEUS_CSS_URL . 'theme-default/theme-default.css', false, '1' );
		wp_enqueue_style( 'loveus-shop-sidebar', LOVEUS_CSS_URL . 'theme-default/shop-sidebar.css', false, '1' );
	}
}
$loveus_style = new Loveus_Style();
