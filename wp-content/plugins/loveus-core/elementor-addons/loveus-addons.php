<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
require_once plugin_dir_path( __FILE__ ) . 'register-categories.php';

define( 'LOVEUS_FILE', __FILE__ );
define( 'LOVEUS_PATH', dirname( LOVEUS_FILE ) );
define( 'LOVEUS_URL', plugins_url( '', LOVEUS_FILE ) );

if ( ! function_exists( 'loveus_custom_icon' ) ) {
	function loveus_custom_icon( $array ) {
		$plugin_url = plugins_url();
		return array(
			'custom-icon' => array(
				'name'          => 'custom-icon',
				'label'         => 'Loveus Icon',
				'url'           => '',
				'enqueue'       => array(
					$plugin_url . '/loveus-core/elementor-addons/assets/icon/style.css',
				),
				'prefix'        => '',
				'displayPrefix' => '',
				'labelIcon'     => 'fab fa-font-awesome-alt',
				'ver'           => '5.9.0',
				'fetchJson'     => $plugin_url . '/loveus-core/elementor-addons/assets/js/regular.js',
				'native'        => 1,
			),
		);
	}
}
add_filter( 'elementor/icons_manager/additional_tabs', 'loveus_custom_icon' );

/**
 * Main Love Us core Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Loveus_Elementor {


	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.6';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Loveus_Elementor The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Loveus_Elementor An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', array( $this, 'i18n' ) );
		add_action( 'plugins_loaded', array( $this, 'init' ) );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'loveuscore' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'init_widgets' ) );
		// add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'widget_scripts' ) );

	}


	public function widget_scripts() {
		wp_enqueue_script( 'lazyload', plugins_url( 'assets/js/lazyload.js', __FILE__ ), array( 'jquery' ), true, true );
		wp_enqueue_script( 'loveus-script', plugins_url( 'assets/js/addons-script.js', __FILE__ ), array( 'jquery' ), true, true );
	}



	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'loveuscore' ),
			'<strong>' . esc_html__( 'Love Us core', 'loveuscore' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'loveuscore' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'loveuscore' ),
			'<strong>' . esc_html__( 'Love Us core', 'loveuscore' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'loveuscore' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'loveuscore' ),
			'<strong>' . esc_html__( 'Love Us core', 'loveuscore' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'loveuscore' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {
		include_once __DIR__ . '/header-settings.php';
		include_once __DIR__ . '/addons/banner-slider-one.php';

		include_once __DIR__ . '/addons/action-area-one.php';
		include_once __DIR__ . '/addons/video-latest-activities.php';
		include_once __DIR__ . '/addons/mission-area-one.php';
		include_once __DIR__ . '/addons/mission-vision-one.php';

		include_once __DIR__ . '/addons/action-area-two.php';
		include_once __DIR__ . '/addons/volunteer-area.php';
		include_once __DIR__ . '/addons/loveus-counterup.php';
		include_once __DIR__ . '/addons/blog-one.php';
		include_once __DIR__ . '/addons/insta-gallery.php';

		include_once __DIR__ . '/addons/footer-site-info.php';
		include_once __DIR__ . '/addons/footer-menu-one.php';
		include_once __DIR__ . '/addons/footer-contact.php';
		include_once __DIR__ . '/addons/footer-top-new.php';
		include_once __DIR__ . '/addons/footer-button-menu.php';
		include_once __DIR__ . '/addons/how-it-works.php';
		include_once __DIR__ . '/addons/action-area-three.php';
		include_once __DIR__ . '/addons/people-talk.php';
		include_once __DIR__ . '/addons/events.php';
		include_once __DIR__ . '/addons/contact.php';

		include_once __DIR__ . '/addons/contact-map.php';
		include_once __DIR__ . '/addons/protfolio.php';
		include_once __DIR__ . '/addons/latest-post.php';
		include_once __DIR__ . '/addons/loveus-remived.php';
		include_once __DIR__ . '/addons/dornor-list.php';
		include_once __DIR__ . '/addons/loveus-sponsors.php';
		include_once __DIR__ . '/addons/about-area-two.php';
		include_once __DIR__ . '/addons/features-section.php';
		include_once __DIR__ . '/addons/feature-section-two.php';
		include_once __DIR__ . '/addons/about-area-three.php';
		include_once __DIR__ . '/addons/video-area-three.php';
		include_once __DIR__ . '/addons/protoflio-two.php';

		if ( class_exists( 'Charitable' ) ) {
			include_once __DIR__ . '/addons/loveus-cause.php';
		}
		if ( class_exists( 'WooCommerce' ) ) {
			include_once __DIR__ . '/addons/woo-products.php';
		}
		include_once __DIR__ . '/addons/faq.php';

	}
}
Loveus_Elementor::instance();



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
