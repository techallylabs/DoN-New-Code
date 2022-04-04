<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package loveus
 */
	$preloader_on_off = loveus_get_options( 'preloader_on_off' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<div class="page-wrapper">
		<?php
		if ( $preloader_on_off == '1' ) :
			do_action( 'loveus_preloader' );
			endif;
			get_template_part( 'components/header/header' );
			get_template_part( 'components/search-popup/search-popup' );

		if ( is_blog() ) {
			if ( is_archive() ) {
				get_template_part( 'components/header/breadcrumb/breadcrumb-archive' );
			} else {
				get_template_part( 'components/header/breadcrumb/breadcrumb-blog' );
			}
		} else {
			if ( ! is_home() && ! is_front_page() && ! is_search() && ! is_404() ) {
				get_template_part( 'components/header/breadcrumb/breadcrumb-page' );
			}
		}
		?>
