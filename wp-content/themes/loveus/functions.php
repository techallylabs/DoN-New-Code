<?php
/**
 * loveus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package loveus
 */
defined( 'LOVEUS_THEME_URI' ) or define( 'LOVEUS_THEME_URI', get_template_directory_uri() );
define( 'LOVEUS_THEME_DRI', get_template_directory() );
define( 'LOVEUS_IMG_URL', LOVEUS_THEME_URI . '/assets/images/' );
define( 'LOVEUS_CSS_URL', LOVEUS_THEME_URI . '/assets/css/' );
define( 'LOVEUS_JS_URL', LOVEUS_THEME_URI . '/assets/js/' );
define( 'LOVEUS_FRAMEWORK_DRI', LOVEUS_THEME_DRI . '/framework/' );

require_once LOVEUS_FRAMEWORK_DRI . 'styles/index.php';
require_once LOVEUS_FRAMEWORK_DRI . 'scripts/index.php';
require_once LOVEUS_FRAMEWORK_DRI . 'redux/redux-config.php';
require_once LOVEUS_FRAMEWORK_DRI . 'plugin-list.php';
require_once LOVEUS_FRAMEWORK_DRI . 'tgm/class-tgm-plugin-activation.php';
require_once LOVEUS_FRAMEWORK_DRI . 'tgm/config-tgm.php';
require_once LOVEUS_FRAMEWORK_DRI . '/dashboard/class-loveus-dashboard.php';
require_once LOVEUS_THEME_DRI . '/woocommerce-functions.php';
require_once LOVEUS_THEME_DRI . '/charitable-single.php';
require_once LOVEUS_THEME_DRI . '/assets/css/custom_style.php';

/**
 * Theme option compatibility.
 */
if ( ! function_exists( 'loveus_get_options' ) ) :
	function loveus_get_options( $key ) {
		global $loveus_options;
		$opt_pref = 'loveus_';
		if ( empty( $loveus_options ) ) {
			$loveus_options = get_option( $opt_pref . 'options' );
		}
		$index = $opt_pref . $key;
		if ( ! isset( $loveus_options[ $index ] ) ) {
			return '';
		}
		return $loveus_options[ $index ];
	}
endif;

if ( ! function_exists( 'loveus_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function loveus_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on love us, use a find and replace
		 * to change 'loveus' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'loveus', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'loveus' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'loveus_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'woocommerce' );
	}
endif;
add_action( 'after_setup_theme', 'loveus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function loveus_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'loveus_content_width', 640 );
}
add_action( 'after_setup_theme', 'loveus_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function loveus_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'loveus' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'loveus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	if ( class_exists( 'woocommerce' ) ) {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Woo Shop Sidebar', 'loveus' ),
				'id'            => 'woo_shop_sideber',
				'before_widget' => '<div class="%2$s single-sidebar widget" id="%1$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title"><h3>',
				'after_title'   => '</h3></div>',
			)
		);
	}
}
add_action( 'widgets_init', 'loveus_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function loveus_scripts() {
	wp_enqueue_script( 'loveus-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'loveus-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'loveus_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * preloader compatibility.
 */
function loveus_preloader_fun() {

	$preloader_img = loveus_get_options( 'preloader_img' );
	?>
<div class="preloader">
	<?php if ( isset( $preloader_img['url'] ) ) { ?>
	<img src="<?php echo esc_url( $preloader_img['url'] ); ?>" alt="<?php esc_attr_e( 'preloader', 'loveus' ); ?>">
	<?php } else { ?>
  <div class="icon"></div>
	  <?php } ?>
</div>
	<?php
}
add_action( 'loveus_preloader', 'loveus_preloader_fun' );
/**
 * back to top compatibility.
 */
function loveus_back_to_top_fun() {
	?>
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-up-arrow"></span></div>
	<?php
}
add_action( 'back_to_top', 'loveus_back_to_top_fun' );
/**
 * google font compatibility.
 */
function loveus_google_font() {
	$protocol   = is_ssl() ? 'https' : 'http';
	$subsets    = 'latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese';
	$variants   = ':400,400i,600,600i,700,700i,800,800i';
	$query_args = array(
		'family' => 'Open+Sans|Yeseva+One' . $variants,
		'family' => 'Open+Sans' . $variants . '%7CYeseva+One' . $variants,
		'subset' => $subsets,
	);
	$font_url   = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css?display=swap' );
	wp_enqueue_style( 'loveus-google-fonts', $font_url, array(), null );
}
add_action( 'init', 'loveus_google_font' );
/**
 * is_blog compatibility.
 */
function is_blog() {
	if ( ( is_archive() ) || ( is_author() ) || ( is_category() ) || ( is_home() ) || ( is_single() ) || ( is_tag() ) ) {
		return true;
	} else {
		return false;
	}
}
/**
 * excerpt_length compatibility.
 */
function loveus_excerpt_length( $length ) {
	return 9;
}
add_filter( 'excerpt_length', 'loveus_excerpt_length', 999 );

function get_elementor_library() {
	$pageslist = get_posts(
		array(
			'post_type'      => 'elementor_library',
			'posts_per_page' => -1,
		)
	);
	$pagearray = array();
	if ( ! empty( $pageslist ) ) {
		foreach ( $pageslist as $page ) {
			$pagearray[ $page->ID ] = $page->post_title;
		}
	}
	return $pagearray;
}

function loveus_add_query_vars_filter( $vars ) {
	$vars[] = 'header_type';
	$vars[] = 'skin_color';
	return $vars;
}
add_filter( 'query_vars', 'loveus_add_query_vars_filter' );

// Disable REST API link tag
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

// Disable oEmbed Discovery Links
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

// Disable REST API link in HTTP headers
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );

function loveus_custom_css() {
	$blog_single_page_header_img_url = '';
	$blog_single_page_header_img     = loveus_get_options( 'blog_single_page_header_img' );
	if ( isset( $blog_single_page_header_img ) && ! empty( $blog_single_page_header_img ) ) :
		$blog_single_page_header_img_url = $blog_single_page_header_img['url'];
	endif;

	$blog_page_header_img_url = '';
	$blog_page_header_img     = loveus_get_options( 'blog_page_header_img' );
	if ( isset( $blog_page_header_img ) && ! empty( $blog_page_header_img ) ) :
		$blog_page_header_img_url = $blog_page_header_img['url'];
	endif;

	$featured_img_url    = get_the_post_thumbnail_url( get_the_ID(), 'full' );
	$reveal_woo_banner   = loveus_get_options( 'shop_image' );
	$reveal_event_image  = loveus_get_options( 'event_image' );
	$loveus_c_custom_css = '';

	if ( $featured_img_url ) {
		$loveus_c_custom_css .= "
		.brd-page .image-layer {
			background-image: url('" . esc_url( $featured_img_url ) . "');
		}";
	}
	if ( isset( $reveal_event_image['url'] ) ) {
		$loveus_c_custom_css .= "	.brd-event .image-layer {
		background-image: url('" . esc_url( $reveal_event_image['url'] ) . "');
	}";
	}

	if ( isset( $reveal_woo_banner['url'] ) ) {
		$loveus_c_custom_css .= "
		.woo-banner .image-layer {
			background-image: url('" . esc_url( $reveal_woo_banner['url'] ) . "');
		}";
	}
	if ( $blog_page_header_img_url != '' ) {
		$loveus_c_custom_css .= "
		.brd-single-cmp .image-layer {
			background-image: url('" . esc_url( $blog_page_header_img_url ) . "');
		}
		.brd-index .image-layer {
			background-image: url('" . esc_url( $blog_page_header_img_url ) . "');
		}";
	}
	if ( $blog_single_page_header_img_url != '' ) {
		$loveus_c_custom_css .= "
		.blog-single .image-layer {
			background-image: url('" . esc_url( $blog_single_page_header_img_url ) . "');
		}";
	}

	if ( function_exists( 'loveus_get_custom_styles' ) ) {
		$loveus_custom_inline_style = loveus_get_custom_styles();
	}
	wp_add_inline_style( 'loveus-style', $loveus_custom_inline_style );

	wp_add_inline_style( 'loveus-style', $loveus_c_custom_css );
}
add_action( 'wp_enqueue_scripts', 'loveus_custom_css', 20 );

add_action(
	'elementor/frontend/after_register_styles',
	function() {
		foreach ( array( 'solid', 'regular', 'brands' ) as $style ) {
			wp_deregister_style( 'elementor-icons-fa-' . $style );
		}
	},
	20
);

