<?php
/*
Plugin Name: LoveUs Core
Plugin URI:
Description: Helping for the SmartDataSoft theme.
Version: 2.1
Author: smartdatasoft
Author URI: http://smartdatasoft.com/
License: GPLv2 or later
Text Domain: loveuscore
Domain Path: /languages/
 */

/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
define( 'PLUGIN_DIR', dirname( __FILE__ ) . '/' );

if ( ! defined( 'LOVEUS_CORE_PLUGIN_URI' ) ) {
	define( 'LOVEUS_CORE_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
}
require_once PLUGIN_DIR . '/widgets/loveus-sidebar-latest-post-widget.php';
require_once PLUGIN_DIR . '/share/share-function.php';
require_once PLUGIN_DIR . '/breadcrumb-navxt/breadcrumb-navxt.php';
require_once PLUGIN_DIR . '/meta-box/config-meta-box.php';


function loveus_events_excerpt_support_for_cpt() {
	add_post_type_support( 'loveus_events', 'excerpt' );
}
add_action( 'init', 'loveus_events_excerpt_support_for_cpt' );

/**
 * addons Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'elementor-addons/init.php';

if ( ! function_exists( 'loveus_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function loveus_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
</div><!-- .post-thumbnail -->

<?php else : ?>

<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
	<?php
	the_post_thumbnail(
		'post-thumbnail',
		array(
			'alt' => the_title_attribute(
				array(
					'echo' => false,
				)
			),
		)
	);
	?>
</a>

	<?php
endif; // End is_singular().
	}
endif;

function widget_scripts() {
	// wp_register_script('owl-lib-loveus', plugins_url('/elementor-addons/assets/js/owl.js', __FILE__), ['jquery'], false, true);
	wp_register_script( 'mixitup-loveus', plugins_url( '/elementor-addons/assets/js/mixitup.js', __FILE__ ), array( 'jquery' ), false, true );
	wp_register_script( 'mixitup-active-loveus', plugins_url( '/elementor-addons/assets/js/addons-active/mixitup-active.js', __FILE__ ), array( 'jquery' ), false, true );
	wp_register_script( 'owl-slider-loveus', plugins_url( '/elementor-addons/assets/js/addons-active/slider-active.js', __FILE__ ), array( 'jquery' ), false, true );
	wp_register_script( 'count-up-loveus', plugins_url( '/elementor-addons/assets/js/addons-active/count-active.js', __FILE__ ), array( 'jquery' ), false, true );
}
add_action( 'elementor/frontend/after_register_scripts', 'widget_scripts' );

function widget_styles_css() {
	// wp_register_style( 'owl-carousel-loveus-me', plugins_url( '/loveus-core/elementor-addons/assets/css/owl.css' ) );
}
add_action( 'elementor/frontend/after_register_styles', 'widget_styles_css' );

