<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package loveus
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses loveus_header_style()
 */
function loveus_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'loveus_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'loveus_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'loveus_custom_header_setup' );

if ( ! function_exists( 'loveus_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see loveus_custom_header_setup().
	 */
	function loveus_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		if (!display_header_text()) {
            $loveus_cus_css = ".site-title,
                .site-description {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
                }";
            wp_add_inline_style('loveus-style', $loveus_cus_css);
        } else {
            $loveus_cus_css = ".site-title a,
                .site-description {
                color: #" . esc_attr($header_text_color) . "
                }
               ";
            wp_add_inline_style('loveus-style', $loveus_cus_css);
        }
	}
endif;
