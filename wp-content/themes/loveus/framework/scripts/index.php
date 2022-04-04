<?php
class Loveus_Scripts {
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'loveus_enqueue_scripts' ) );
	}
	public function loveus_enqueue_scripts() {
		wp_enqueue_script( 'popper', LOVEUS_JS_URL . 'popper.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'bootstrap', LOVEUS_JS_URL . 'bootstrap.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'jquery-fancybox', LOVEUS_JS_URL . 'jquery.fancybox.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'owl-carousel', LOVEUS_JS_URL . 'owl.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'appear', LOVEUS_JS_URL . 'appear.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'wow', LOVEUS_JS_URL . 'wow.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'loveus-scripts', LOVEUS_JS_URL . 'script.js', array( 'jquery' ), '', true );
	}
}
$loveus_scripts = new Loveus_Scripts();
