<?php
/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_prefix = 'loveus_';
$opt_name   = 'loveus_options';
/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
	// TYPICAL -> Change these values as you need/desire
	'opt_name'             => $opt_name,
	// This is where your data is stored in the database and also becomes your global variable name.
	'display_name'         => $theme->get( 'Name' ),
	// Name that appears at the top of your panel
	'display_version'      => $theme->get( 'Version' ),
	// Version that appears at the top of your panel
	'menu_type'            => 'menu',
	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
	'allow_sub_menu'       => true,
	// Show the sections below the admin menu item or not
	'menu_title'           => esc_html__( 'Loveus Options', 'loveus' ),
	'page_title'           => esc_html__( 'Loveus Options', 'loveus' ),
	// You will need to generate a Google API key to use this feature.
	// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
	'google_api_key'       => '',
	// Set it you want google fonts to update weekly. A google_api_key value is required.
	'google_update_weekly' => false,
	// Must be defined to add google fonts to the typography module
	'async_typography'     => true,
	// Use a asynchronous font on the front end or font string
	// 'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
	'admin_bar'            => true,
	// Show the panel pages on the admin bar
	'admin_bar_icon'       => 'dashicons-portfolio',
	// Choose an icon for the admin bar menu
	'admin_bar_priority'   => 50,
	// Choose an priority for the admin bar menu
	'global_variable'      => '',
	// Set a different name for your global variable other than the opt_name
	'dev_mode'             => false,
	// Show the time the page took to load, etc
	'update_notice'        => true,
	// If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
	'customizer'           => true,
	// Enable basic customizer support
	// 'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
	// 'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
	// OPTIONAL -> Give you extra features
	'page_priority'        => null,
	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_parent'          => 'themes.php',
	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	'page_permissions'     => 'manage_options',
	// Permissions needed to access the options panel.
	'menu_icon'            => '',
	// Specify a custom URL to an icon
	'last_tab'             => '',
	// Force your panel to always open to a specific tab (by id)
	'page_icon'            => 'icon-themes',
	// Icon displayed in the admin panel next to your menu_title
	'page_slug'            => '_options',
	// Page slug used to denote the panel
	'save_defaults'        => true,
	// On load save the defaults to DB before user clicks save or not
	'default_show'         => false,
	// If true, shows the default value next to each field that is not the default value.
	'default_mark'         => '',
	// What to print by the field's title if the value shown is default. Suggested: *
	'show_import_export'   => true,
	// Shows the Import/Export panel when not used as a field.
	// CAREFUL -> These options are for advanced use only
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => true,
	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
	'output_tag'           => true,
	// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
	// 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	'database'             => '',
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'use_cdn'              => true,
	// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
	// 'compiler'             => true,
);
Redux::setArgs( $opt_name, $args );
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'theme typography option', 'loveus' ),
		'id'     => 'typography_theme_option',
		'desc'   => esc_html__( 'Chnage typography theme option here', 'loveus' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'       => 'enable_typography',
				'type'     => 'switch',
				'title'    => esc_html__( 'Typography', 'loveus' ),
				'subtitle' => esc_html__( 'Enable or Disable Typography', 'loveus' ),
				'default'  => false,
				'off'      => esc_html__( 'Disable', 'loveus' ),
				'on'       => esc_html__( 'Enable', 'loveus' ),
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . 'body_typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'Body Typography', 'loveus' ),
				'subtitle'   => esc_html__( 'Select body font family, size, line height, color and weight.', 'loveus' ),
				'text-align' => false,
				'subsets'    => false,
				'output'     => array( 'body' ),

			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . 'heading_1_typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H1 Font', 'loveus' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'loveus' ),
				'google'     => true,
				'text-align' => false,
				'output'     => array( 'h1' ),
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . 'heading_2_typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H2 Font', 'loveus' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'loveus' ),
				'google'     => true,
				'text-align' => false,
				'output'     => array( 'h2' ),

			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . 'heading_3_typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H3 Font', 'loveus' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'loveus' ),
				'google'     => true,
				'text-align' => false,
				'output'     => array( 'h3' ),
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . 'heading_4_typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H4 Font', 'loveus' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'loveus' ),
				'google'     => true,
				'text-align' => false,
				'output'     => array( 'h4' ),
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . 'heading_5_typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H5 Font', 'loveus' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'loveus' ),
				'google'     => true,
				'text-align' => false,
				'output'     => array( 'h5' ),
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . 'heading_6_typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H6 Font', 'loveus' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'loveus' ),
				'google'     => true,
				'text-align' => false,
				'output'     => array( 'h6' ),
			),
		),
	)
);
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Base theme option', 'loveus' ),
		'id'     => 'base_theme_option',
		'desc'   => esc_html__( 'Change Base theme option here', 'loveus' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'      => $opt_prefix . 'preloader_on_off',
				'type'    => 'switch',
				'title'   => esc_html__( 'Preloader on off switch', 'loveus' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'loveus' ),
				'off'     => esc_html__( 'Disable', 'loveus' ),
			),
			array(
				'id'    => $opt_prefix . 'preloader_img',
				'type'  => 'media',
				'url'   => true,
				'title' => __( 'Preloader Image', 'loveus' ),
			),
			array(
				'id'      => $opt_prefix . 'back_to_top_on_off',
				'type'    => 'switch',
				'title'   => esc_html__( 'Back To Top on off switch', 'loveus' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'loveus' ),
				'off'     => esc_html__( 'Disable', 'loveus' ),
			),

			array(
				'id'       => $opt_prefix . 'shop_image',
				'type'     => 'media',
				'url'      => true,
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'loveus' ),
				'subtitle' => esc_html__( 'Add/Upload Background Image using the WordPress native uploader', 'loveus' ),
				'title'    => esc_html__( 'Shop Breadcrumb Image', 'loveus' ),
			),

			array(
				'id'       => $opt_prefix . 'event_image',
				'type'     => 'media',
				'url'      => true,
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'loveus' ),
				'subtitle' => esc_html__( 'Add/Upload Background Image using the WordPress native uploader', 'loveus' ),
				'title'    => esc_html__( 'Event Breadcrumb Image', 'loveus' ),
			),

		),
	)
);
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Header Top Bar option', 'loveus' ),
		'id'     => 'header_top_bar',
		'desc'   => esc_html__( 'Chnage Header Top Bar here', 'loveus' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'      => $opt_prefix . 'header_topbar_onoff',
				'type'    => 'switch',
				'title'   => esc_html__( 'header topbar ono off switch', 'loveus' ),
				'default' => 0,
				'on'      => esc_html__( 'Enable', 'loveus' ),
				'off'     => esc_html__( 'Disable', 'loveus' ),
			),
			array(
				'required' => array( $opt_prefix . 'header_topbar_onoff', '=', '1' ),
				'id'       => $opt_prefix . 'header_topbar_social_onoff',
				'type'     => 'switch',
				'title'    => esc_html__( 'Topbar Social on off switch', 'loveus' ),
				'default'  => false,
				'on'       => esc_html__( 'Enable', 'loveus' ),
				'off'      => esc_html__( 'Disable', 'loveus' ),
			),
			array(
				'required' => array( $opt_prefix . 'header_topbar_social_onoff', '=', '1' ),
				'id'       => $opt_prefix . 'header_topbar_social',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'topbar social link and text', 'loveus' ),
				'subtitle' => esc_html__( 'copy free icon code, visit: ', 'loveus' ) . '<a href="https://fontawesome.com/icons?d=gallery" target="_blank">fontawesome</a>',
				'default'  => wp_kses_post(
					'<ul class="social-links clearfix">
            <li class="social-title">Follow Us:</li>
            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
            <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
            <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
        </ul>'
				),
			),
			array(
				'required' => array( $opt_prefix . 'header_topbar_onoff', '=', '1' ),
				'id'       => $opt_prefix . 'header_search_onoff',
				'type'     => 'switch',
				'title'    => esc_html__( 'topbar search on off switch', 'loveus' ),
				'default'  => false,
				'on'       => esc_html__( 'Enable', 'loveus' ),
				'off'      => esc_html__( 'Disable', 'loveus' ),
			),
			array(
				'required' => array( 'loveus_header_topbar_onoff', '=', '1' ),
				'id'       => $opt_prefix . 'header_info_bar',
				'type'     => 'sortable',
				'title'    => esc_html__( 'topbar info', 'loveus' ),
				'mode'     => 'text',
				'options'  => array(
					'1' => '123 4561 5523',
					'2' => 'info@loveuscharity.com',
				),
			),
		),
	)
);
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Header Menu option', 'loveus' ),
		'id'     => 'header_menu_option',
		'desc'   => esc_html__( 'Chnage Header Menu option here', 'loveus' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'      => $opt_prefix . 'header_style',
				'type'    => 'select',
				'title'   => esc_html__( 'Header style', 'loveus' ),
				'options' => array(
					'1' => esc_html__( 'Header style one', 'loveus' ),
					'2' => esc_html__( 'Header style two', 'loveus' ),
					'3' => esc_html__( 'Header style three', 'loveus' ),
					'4' => esc_html__( 'Header with elementor builder template', 'loveus' ),
				),
				'default' => '1',
			),
			array(
				'required' => array( $opt_prefix . 'header_style', '=', '4' ),
				'id'       => $opt_prefix . 'header_area_elementor',
				'type'     => 'select',
				'title'    => esc_html__( 'Header Elementor template', 'loveus' ),
				'options'  => get_elementor_library(),
			),
			array(
				'id'      => $opt_prefix . 'header_cart_icon',
				'type'    => 'switch',
				'title'   => esc_html__( 'header cart icon on off switch', 'loveus' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'loveus' ),
				'off'     => esc_html__( 'Disable', 'loveus' ),
			),
			array(
				'id'      => $opt_prefix . 'header_donate_button',
				'type'    => 'switch',
				'title'   => esc_html__( 'header donate button on off switch', 'loveus' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'loveus' ),
				'off'     => esc_html__( 'Disable', 'loveus' ),
			),
			array(
				'required' => array( $opt_prefix . 'header_donate_button', '=', '1' ),
				'id'       => $opt_prefix . 'header_donate_button_text',
				'type'     => 'text',
				'title'    => esc_html__( 'donate button text', 'loveus' ),
				'default'  => esc_html__( 'Donate Now', 'loveus' ),
			),
			array(
				'required' => array( $opt_prefix . 'header_donate_button', '=', '1' ),
				'id'       => $opt_prefix . 'header_donate_button_link',
				'type'     => 'text',
				'title'    => esc_html__( 'donate button link', 'loveus' ),
			),
		),
	)
);
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'sticky header Menu', 'loveus' ),
		'id'     => 'sticky_header_menu_option',
		'desc'   => esc_html__( 'Chnage Header Menu option here', 'loveus' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'      => $opt_prefix . 'sticky_header_on',
				'type'    => 'switch',
				'title'   => esc_html__( 'sticky header on off switch', 'loveus' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'loveus' ),
				'off'     => esc_html__( 'Disable', 'loveus' ),
			),
			array(
				'id'    => $opt_prefix . 'sticky_header_logo',
				'type'  => 'media',
				'url'   => true,
				'title' => esc_html__( 'sticky header logo', 'loveus' ),
			),
		),
	)
);
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Responsive Menu', 'loveus' ),
		'id'     => 'responsive_menu_option',
		'desc'   => esc_html__( 'Chnage Responsive Menu option here', 'loveus' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'    => $opt_prefix . 'sticky_header_logos',
				'type'  => 'media',
				'url'   => true,
				'title' => esc_html__( 'Responsive mobile menu top logo', 'loveus' ),
			),
			array(
				'id'      => $opt_prefix . 'responsive_menu_social_onoff',
				'type'    => 'switch',
				'title'   => esc_html__( 'responsive menu Social on off switch', 'loveus' ),
				'default' => 0,
				'on'      => esc_html__( 'Enable', 'loveus' ),
				'off'     => esc_html__( 'Disable', 'loveus' ),
			),
			array(
				'required' => array( $opt_prefix . 'responsive_menu_social_onoff', '=', '1' ),
				'id'       => $opt_prefix . 'responsive_menu_social_icon',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'responsive menu link and icon', 'loveus' ),
				'subtitle' => esc_html__( 'copy free icon code, visit: ', 'loveus' ) . '<a href="https://fontawesome.com/icons?d=gallery" target="_blank">fontawesome</a>',
				'default'  => wp_kses_post(
					'<ul class="clearfix">
            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
            <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
            <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
            <li><a href="#"><span class="fab fa-youtube"></span></a></li>
        </ul>'
				),
			),
		),
	)
);
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Elementor widget option', 'loveus' ),
		'id'     => 'footer_widget_elementor_lib',
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'      => $opt_prefix . 'get_involv_elementor',
				'type'    => 'select',
				'title'   => esc_html__( 'Get Involved Widget', 'loveus' ),
				'options' => get_elementor_library(),
			),
			array(
				'id'      => $opt_prefix . 'footer_widget_elementor',
				'type'    => 'select',
				'multi'   => true,
				'title'   => esc_html__( 'Footer widget list', 'loveus' ),
				'options' => get_elementor_library(),
			),
		),
	)
);
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Blog option', 'loveus' ),
		'id'     => 'blog_area',
		'desc'   => esc_html__( 'Change blog option here', 'loveus' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'      => $opt_prefix . 'blog_style',
				'type'    => 'select',
				'title'   => esc_html__( 'Blog style', 'loveus' ),
				'options' => array(
					'1' => esc_html__( 'Blog style one', 'loveus' ),
					'2' => esc_html__( 'Blog style two', 'loveus' ),
				),
				'default' => '1',
			),
			array(
				'id'    => $opt_prefix . 'blog_page_header_img',
				'type'  => 'media',
				'url'   => true,
				'title' => esc_html__( 'Blog page header bg', 'loveus' ),
			),
			array(
				'id'      => $opt_prefix . 'blog_page_header',
				'type'    => 'switch',
				'title'   => esc_html__( 'Blog page header on off switch', 'loveus' ),
				'default' => 0,
				'on'      => esc_html__( 'Enable', 'loveus' ),
				'off'     => esc_html__( 'Disable', 'loveus' ),
			),
			array(
				'required' => array( $opt_prefix . 'blog_page_header', '=', '1' ),
				'id'       => $opt_prefix . 'blog_page_header_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Blog page header text', 'loveus' ),
				'default'  => esc_html__( 'Blog Page', 'loveus' ),
			),
			array(
				'required' => array( $opt_prefix . 'blog_page_header', '=', '1' ),
				'id'       => $opt_prefix . 'blog_page_breadcrumbs',
				'type'     => 'switch',
				'title'    => esc_html__( 'Blog page breadcrumbs on off switch', 'loveus' ),
				'default'  => 0,
				'on'       => esc_html__( 'Enable', 'loveus' ),
				'off'      => esc_html__( 'Disable', 'loveus' ),
			),
		),
	)
);
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Blog Signle option', 'loveus' ),
		'id'     => 'blog_signle_area',
		'desc'   => esc_html__( 'Change blog Signle option here', 'loveus' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'      => $opt_prefix . 'blog_signle_tag',
				'type'    => 'switch',
				'title'   => esc_html__( 'blog signle tag on off switch', 'loveus' ),
				'default' => 1,
				'on'      => esc_html__( 'Enable', 'loveus' ),
				'off'     => esc_html__( 'Disable', 'loveus' ),
			),
			array(
				'required' => array( $opt_prefix . 'blog_signle_tag', '=', '1' ),
				'id'       => $opt_prefix . 'blog_signle_tag_text',
				'type'     => 'text',
				'title'    => esc_html__( 'blog signle tag  text', 'loveus' ),
				'default'  => esc_html__( 'Tags : ', 'loveus' ),
			),
			array(
				'id'      => $opt_prefix . 'blog_signle_share',
				'type'    => 'switch',
				'title'   => esc_html__( 'blog signle post share on off switch', 'loveus' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'loveus' ),
				'off'     => esc_html__( 'Disable', 'loveus' ),
			),
			array(
				'required' => array( $opt_prefix . 'blog_signle_share', '=', '1' ),
				'id'       => $opt_prefix . 'blog_signle_share_text',
				'type'     => 'text',
				'title'    => esc_html__( 'blog signle share  text', 'loveus' ),
				'default'  => esc_html__( ' Share : ', 'loveus' ),
			),
			array(
				'id'      => $opt_prefix . 'blog_single_post_thumb',
				'type'    => 'switch',
				'title'   => esc_html__( 'Blog single post thumb off of elementor', 'loveus' ),
				'default' => 1,
				'on'      => esc_html__( 'Enable', 'loveus' ),
				'off'     => esc_html__( 'Disable', 'loveus' ),
			),
			array(
				'id'    => $opt_prefix . 'blog_single_page_header_img',
				'type'  => 'media',
				'url'   => true,
				'title' => esc_html__( 'Blog single page header bg', 'loveus' ),
			),
			array(
				'id'      => $opt_prefix . 'blog_single_page_header',
				'type'    => 'switch',
				'title'   => esc_html__( 'Blog single page header on off switch', 'loveus' ),
				'default' => 0,
				'on'      => esc_html__( 'Enable', 'loveus' ),
				'off'     => esc_html__( 'Disable', 'loveus' ),
			),
			array(
				'required' => array( $opt_prefix . 'blog_single_page_header', '=', '1' ),
				'id'       => $opt_prefix . 'blog_single_page_header_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Blog single page header text', 'loveus' ),
				'default'  => esc_html__( 'Blog Details', 'loveus' ),
			),
			array(
				'required' => array( $opt_prefix . 'blog_single_page_header', '=', '1' ),
				'id'       => $opt_prefix . 'blog_single_page_breadcrumbs',
				'type'     => 'switch',
				'title'    => esc_html__( 'Blog single page breadcrumbs on off switch', 'loveus' ),
				'default'  => 0,
				'on'       => esc_html__( 'Enable', 'loveus' ),
				'off'      => esc_html__( 'Disable', 'loveus' ),
			),

		),
	)
);
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Footer option', 'loveus' ),
		'id'     => 'loveus_footer_area',
		'desc'   => esc_html__( 'Chnage footer option here', 'loveus' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'      => $opt_prefix . 'footer_copyright',
				'type'    => 'text',
				'title'   => esc_html__( 'Copyright text', 'loveus' ),
				'default' => esc_html__( '© 2019 loveus. All rights reserved.', 'loveus' ),
			),
			array(
				'id'      => $opt_prefix . 'footer_link',
				'type'    => 'editor',
				'title'   => esc_html__( 'Add you footer importent link', 'loveus' ),
				'default' => wp_kses_post(
					'<ul class="bottom-links">
            <li>Terms of Service</li>
            <li>Privacy Policy</li>
        </ul>'
				),
			),
		),
	)
);
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Color option', 'loveus' ),
		'id'     => 'loveus_color_area',
		'desc'   => esc_html__( 'Chnage footer option here', 'loveus' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'          => $opt_prefix . 'main_color',
				'type'        => 'color',
				'title'       => __( 'Primary Color', 'loveus' ),
				'subtitle'    => __( 'Pick a color for the theme.', 'loveus' ),
				'validate'    => 'color',
				'transparent' => false,
			),
			array(
				'id'          => $opt_prefix . 'font_color',
				'type'        => 'color',
				'title'       => __( 'Font Color', 'loveus' ),
				'subtitle'    => __( 'Pick a color for the theme.', 'loveus' ),
				'validate'    => 'color',
				'transparent' => false,
			),
		),
	)
);
