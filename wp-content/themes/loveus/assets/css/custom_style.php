<?php
/*
 * print css with cheking value is empty or not
 *
 */

function loveus_print_css( $props = '', $values = array(), $vkey = '', $pre_fix = '', $post_fix = '' ) {
	if ( isset( $values[ $vkey ] ) && ! empty( $values[ $vkey ] ) ) {
		print wp_kses_post( $props . ':' . $pre_fix . $values[ $vkey ] . $post_fix . ";\n" );
	}
}

function loveus_color_brightness( $colourstr, $steps, $darken = false ) {
	$colourstr = str_replace( '#', '', $colourstr );
	$rhex      = substr( $colourstr, 0, 2 );
	$ghex      = substr( $colourstr, 2, 2 );
	$bhex      = substr( $colourstr, 4, 2 );

	$r = hexdec( $rhex );
	$g = hexdec( $ghex );
	$b = hexdec( $bhex );

	if ( $darken ) {
		$steps = $steps * -1;
	}

	$r = max( 0, min( 255, $r + $steps ) );
	$g = max( 0, min( 255, $g + $steps ) );
	$b = max( 0, min( 255, $b + $steps ) );

	$hex  = '#';
	$hex .= str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT );
	$hex .= str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT );
	$hex .= str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );

	return $hex;
}

function loveus_get_custom_styles() {
	global $loveus_options;
	$redix_opt_prefix = 'loveus_';

	$loveus_main_color = ' <?php echo esc_html($loveus_main_color);?>';
	$loveus_font_color = '#25283a';

	if ( ( isset( $loveus_options[ $redix_opt_prefix . 'main_color' ] ) ) && ( ! empty( $loveus_options[ $redix_opt_prefix . 'main_color' ] ) ) ) {

		$loveus_main_color = $loveus_options[ $redix_opt_prefix . 'main_color' ];

	}
	if ( ( isset( $loveus_options[ $redix_opt_prefix . 'font_color' ] ) ) && ( ! empty( $loveus_options[ $redix_opt_prefix . 'font_color' ] ) ) ) {

		$loveus_font_color = $loveus_options[ $redix_opt_prefix . 'font_color' ];

	}
	 $skin_color = get_query_var( 'skin_color' );
	if ( isset( $skin_color ) && ! empty( $skin_color ) ) {
		switch ( $skin_color ) {
			case 'crimsonlight':
				$loveus_main_color = '#ff6b70';
				break;
			case 'crimson':
				$loveus_main_color = '#fc2c62';
				break;
			case 'youllow':
				$loveus_main_color = '#f7a900';
				break;
			case 'green':
				$loveus_main_color = '#ff6b70';
				break;
			default:
				$loveus_main_color = '#25283a';
		}
	}
	ob_start();

	?>
	/* Default Color File  */
	body {
	color: <?php echo esc_html( $loveus_font_color ); ?>;
}
 a{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .theme_color{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 .blog-post-detail .content ul li:before{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 .btn-style-one .btn-title{
	 background-color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .btn-style-one .btn-title:before{
	 background-color: <?php echo esc_html( $loveus_font_color ); ?>;	
 }
 
 .btn-style-three .btn-title{
	 background-color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .btn-style-three .btn-title:before{
	 background-color: <?php echo esc_html( $loveus_font_color ); ?>;		
 }
 
 .btn-style-two:hover{
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .btn-style-five{
	 color: <?php echo esc_html( $loveus_font_color ); ?>;	
 }
 
 .btn-style-five .btn-title:before{
	 background-color: <?php echo esc_html( $loveus_font_color ); ?>;
 }
 
 .preloader:after{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
  
 .scroll-to-top{
	 box-shadow: 2px 2px 0px <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .scroll-to-top:hover{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .main-header .header-top .info li a .icon{
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .main-header .header-top .info li a:hover{
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .main-header .header-top .info .search-toggler:hover{
	 color: <?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .main-header .header-top .social-links li a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .main-header .header-upper .logo-box .logo{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .main-header .header-upper .logo-box .logo:before{
	 background: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .main-header .nav-outer .link-box .cart-link a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .main-menu .navigation > li > a:before{
	 border-bottom:2px solid <?php echo esc_html( $loveus_main_color ); ?>;
 }
  
 .main-menu .navigation > li > ul{
	 border-top: 2px solid <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .main-menu .navigation > li > ul > li:before{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .main-menu .navigation > li > ul > li:hover > a{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .main-menu .navigation > li > ul > li > ul{
	 border-top: 2px solid <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .main-menu .navigation > li > ul > li > ul > li:before{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .main-menu .navigation > li > ul > li > ul > li:hover > a{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .search-popup .search-form fieldset input[type="submit"]{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .search-popup .search-form fieldset input[type="submit"]:hover{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .search-popup .recent-searches li a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .sticky-header .main-menu .navigation > li:hover > a,
 .sticky-header .main-menu .navigation > li.current > a,
 .sticky-header .main-menu .navigation > li.current-menu-item > a{
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .nav-outer .mobile-nav-toggler{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .mobile-menu .menu-backdrop{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .mobile-menu .close-btn:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .mobile-menu .navigation li > a:before{
	 border-left:5px solid <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .mobile-menu .navigation li.current > a,
 .mobile-menu .navigation li > a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .mobile-menu .navigation li.dropdown .dropdown-btn.open{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .mobile-menu .social-links li a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .banner-section .owl-nav .owl-prev:hover, 
 .banner-section .owl-nav .owl-next:hover{
	 background: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .banner-section .owl-dots .owl-dot.active span{
	 background: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .sec-title .sub-title{
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .about-feature .inner-box:before{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .about-section .about-feature:nth-child(2) .inner-box:before{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .about-section .about-feature:nth-child(3) .inner-box:before{
	 background:#f7a900;	
 }
 
 .about-section .about-feature:nth-child(4) .inner-box:before{
	 background:#21d7d9;	
 }
 
 .about-feature .icon-box{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .about-section .about-feature:nth-child(2) .icon-box{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .about-section .about-feature:nth-child(3) .icon-box{
	 color:#f7a900;	
 }
 
 .about-section .about-feature:nth-child(4) .icon-box{
	 color:#21d7d9;	
 }
 
 .cause-block .inner-box .progress-box .bar-inner{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .causes-section .cause-block:nth-child(1) .inner-box .progress-box .bar-inner{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .causes-section .cause-block:nth-child(2) .inner-box .progress-box .bar-inner{
	 background:#ae64fd;	
 }
 
 .causes-section .cause-block:nth-child(3) .inner-box .progress-box .bar-inner{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .causes-section .cause-block:nth-child(4) .inner-box .progress-box .bar-inner{
	 background:#2ea4ff;	
 }
 
 .causes-section .cause-block:nth-child(5) .inner-box .progress-box .bar-inner{
	 background:#21d7d9;	
 }
 
 .causes-section .cause-block:nth-child(6) .inner-box .progress-box .bar-inner{
	 background:#f7a900;	
 }
 
 .cause-block .inner-box .progress-box .count-text{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .causes-section .cause-block:nth-child(1) .inner-box .progress-box .count-text{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .causes-section .cause-block:nth-child(2) .inner-box .progress-box .count-text{
	 background:#ae64fd;	
 }
 
 .causes-section .cause-block:nth-child(3) .inner-box .progress-box .count-text{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .causes-section .cause-block:nth-child(4) .inner-box .progress-box .count-text{
	 background:#2ea4ff;	
 }
 
 .causes-section .cause-block:nth-child(5) .inner-box .progress-box .count-text{
	 background:#21d7d9;	
 }
 
 .causes-section .cause-block:nth-child(6) .inner-box .progress-box .count-text{
	 background:#f7a900;	
 }
 
 .cause-block .inner-box .progress-box .count-text:after{
	 border-top:6px solid <?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .causes-section .cause-block:nth-child(1) .inner-box .progress-box .count-text:after{
	 border-top-color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .causes-section .cause-block:nth-child(2) .inner-box .progress-box .count-text:after{
	 border-top-color:#ae64fd;	
 }
 
 .causes-section .cause-block:nth-child(3) .inner-box .progress-box .count-text:after{
	 border-top-color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .causes-section .cause-block:nth-child(4) .inner-box .progress-box .count-text:after{
	 border-top-color:#2ea4ff;	
 }
 
 .causes-section .cause-block:nth-child(5) .inner-box .progress-box .count-text:after{
	 border-top-color:#21d7d9;	
 }
 
 .causes-section .cause-block:nth-child(6) .inner-box .progress-box .count-text:after{
	 border-top-color:#f7a900;	
 }
 
 .cause-block .inner-box h3 a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .cause-block .inner-box:hover .btn-style-two{
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .service-block .icon-box{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .service-block .icon-box:after{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .what-we-do .service-block:nth-child(1) .icon-box,
 .services .service-block:nth-child(1) .icon-box,
 .what-we-do .service-block:nth-child(9) .icon-box,
 .services .service-block:nth-child(9) .icon-box{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .what-we-do .service-block:nth-child(1) .icon-box:after,
 .services .service-block:nth-child(1) .icon-box:after,
 .what-we-do .service-block:nth-child(9) .icon-box:after,
 .services .service-block:nth-child(9) .icon-box:after{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .what-we-do .service-block:nth-child(2) .icon-box,
 .services .service-block:nth-child(2) .icon-box,
 .what-we-do .service-block:nth-child(10) .icon-box,
 .services .service-block:nth-child(10) .icon-box{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .what-we-do .service-block:nth-child(2) .icon-box:after,
 .services .service-block:nth-child(2) .icon-box:after,
 .what-we-do .service-block:nth-child(10) .icon-box:after,
 .services .service-block:nth-child(10) .icon-box:after{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .what-we-do .service-block:nth-child(3) .icon-box,
 .services .service-block:nth-child(3) .icon-box,
 .what-we-do .service-block:nth-child(11) .icon-box,
 .services .service-block:nth-child(11) .icon-box{
	 color:#21d7d9;
 }
 
 .what-we-do .service-block:nth-child(3) .icon-box:after,
 .services .service-block:nth-child(3) .icon-box:after,
 .what-we-do .service-block:nth-child(11) .icon-box:after,
 .services .service-block:nth-child(11) .icon-box:after{
	 background:#21d7d9;	
 }
 
 .what-we-do .service-block:nth-child(4) .icon-box,
 .services .service-block:nth-child(4) .icon-box,
 .what-we-do .service-block:nth-child(12) .icon-box,
 .services .service-block:nth-child(12) .icon-box{
	 color:#f7a900;
 }
 
 .what-we-do .service-block:nth-child(4) .icon-box:after,
 .services .service-block:nth-child(4) .icon-box:after,
 .what-we-do .service-block:nth-child(12) .icon-box:after,
 .services .service-block:nth-child(12) .icon-box:after{
	 background:#f7a900;	
 }
 
 .what-we-do .service-block:nth-child(5) .icon-box,
 .services .service-block:nth-child(5) .icon-box,
 .what-we-do .service-block:nth-child(13) .icon-box,
 .services .service-block:nth-child(13) .icon-box{
	 color:#fe813a;
 }
 
 .what-we-do .service-block:nth-child(5) .icon-box:after,
 .services .service-block:nth-child(5) .icon-box:after,
 .what-we-do .service-block:nth-child(13) .icon-box:after,
 .services .service-block:nth-child(13) .icon-box:after{
	 background:#fe813a;	
 }
 
 .what-we-do .service-block:nth-child(6) .icon-box,
 .services .service-block:nth-child(6) .icon-box,
 .what-we-do .service-block:nth-child(14) .icon-box,
 .services .service-block:nth-child(14) .icon-box{
	 color:#7e61ff;
 }
 
 .what-we-do .service-block:nth-child(6) .icon-box:after,
 .services .service-block:nth-child(6) .icon-box:after,
 .what-we-do .service-block:nth-child(14) .icon-box:after,
 .services .service-block:nth-child(14) .icon-box:after{
	 background:#7e61ff;	
 }
 
 .what-we-do .service-block:nth-child(7) .icon-box,
 .services .service-block:nth-child(7) .icon-box,
 .what-we-do .service-block:nth-child(15) .icon-box,
 .services .service-block:nth-child(15) .icon-box{
	 color:#fc45b1;
 }
 
 .what-we-do .service-block:nth-child(7) .icon-box:after,
 .services .service-block:nth-child(7) .icon-box:after,
 .what-we-do .service-block:nth-child(15) .icon-box:after,
 .services .service-block:nth-child(15) .icon-box:after{
	 background:#fc45b1;	
 }
 
 .what-we-do .service-block:nth-child(8) .icon-box,
 .services .service-block:nth-child(8) .icon-box,
 .what-we-do .service-block:nth-child(16) .icon-box,
 .services .service-block:nth-child(16) .icon-box{
	 color:#497aff;
 }
 
 .what-we-do .service-block:nth-child(8) .icon-box:after,
 .services .service-block:nth-child(8) .icon-box:after,
 .what-we-do .service-block:nth-child(16) .icon-box:after,
 .services .service-block:nth-child(16) .icon-box:after{
	 background:#497aff;	
 }
 
 .team-block .lower-box h3 a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .team-block .social-links li a:hover{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .event-block h3 a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .event-block .info li .icon{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .upcoming-events .owl-dots .owl-dot.active span{
	 border-color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .fact-counter .column .inner .count-outer{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .fact-counter .column:nth-child(2) .inner .count-outer{
	 color:#2ea4ff;
 }
 
 .fact-counter .column:nth-child(3) .inner .count-outer{
	 color:#ffbd12;
 }
 
 .fact-counter .column:nth-child(4) .inner .count-outer{
	 color:#ae64fd;
 }
 
 .news-block .inner-box .date{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .news-block .inner-box .date-two{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .news-block .inner-box h3 a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .gallery-item .overlay-box a span{
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .main-footer .links-widget ul li a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .main-footer .social-links li a:hover{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .main-footer .info-widget ul li a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .main-footer .nav-box .inner .footer-nav li a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .main-footer .nav-box .inner .donate-link .theme-btn:hover .btn-title{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .main-footer .footer-bottom .bottom-links li a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .about-feature-two .inner-box .image-layer:before{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .about-section .about-feature-two:nth-child(2) .image-layer:before{
	 background:#ae64fd;	
 }
 
 .about-section .about-feature-two:nth-child(3) .image-layer:before{
	 background:#2ea4ff;	
 }
 
 .team-carousel-section .owl-nav .owl-prev:hover, 
 .team-carousel-section .owl-nav .owl-next:hover{
	 background: <?php echo esc_html( $loveus_main_color ); ?>;
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .event-block-two .title-column h3 a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .event-block-two .info-column .info li .icon{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .news-block-two .inner-box h3 a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .news-block-two .post-meta ul li a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .news-block-three .news-post .date{
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .news-block-three .news-post h4 a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .page-banner .bread-crumb li a:hover,
 .page-banner .bread-crumb li.active{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .mixitup-gallery .filters .filter.active{
	 background-color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .gallery-item-two .overlay-box a span{
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .event-block-three .image-box .date{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .event-block-three .inner-box h3 a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .event-block-three .info li .icon{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .event-block-three .inner-box:hover .btn-style-two{
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .info-boxes .info-box .inner-box .image-layer:before{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .info-boxes .info-box:nth-child(2) .image-layer:before{
	 background:#ae64fd;	
 }
 
 .info-boxes .info-box:nth-child(3) .image-layer:before{
	 background:#2ea4ff;	
 }
 
 .contact-form .form-group input:focus,
 .contact-form .form-group select:focus,
 .contact-form .form-group textarea:focus{
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .faq-section .tab-buttons .tab-btn:before{
	 border-bottom:2px solid <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .faq-section .tab-buttons .tab-btn:hover,
 .faq-section .tab-buttons .tab-btn.active-btn:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .faq-section .tab-buttons .tab-btn.active-btn{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .accordion-box .block .acc-btn.active:before{
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .donate-form input:focus,
 .donate-form select:focus,
 .donate-form textarea:focus{
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .donate-form .select-box input[type="radio"]:checked+label{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .donate-form .radio-block input:checked + label:before{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .donate-form .donation-total strong{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .sidebar .search-box .form-group button:hover{
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .sidebar .popular-posts .news-post .date{
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .sidebar .popular-posts .news-post h4 a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .sidebar .categories ul li a:hover,
 .sidebar .categories ul li.current a,
 .sidebar .categories ul li.current{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .sidebar .popular-tags li a:hover{
	 background-color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .cause-details .inner-box .progress-box .bar-inner{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .cause-details .inner-box .progress-box .count-text{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .cause-details .inner-box .progress-box .count-text:after{
	 border-top:6px solid <?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .cause-details .inner-box h2 a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .cause-details .inner-box h3 a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .event-details .image-box .date{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .event-details .info li .icon{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .event-details .inner-box h2 a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .event-details .inner-box h3 a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .blog-post-detail .inner h2 a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .blog-post-detail .inner h3 a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .blog-post-detail .post-share-options .tags a:hover{
	 background-color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .blog-post-detail .post-share-options .social-icons li a:hover{
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .comments-area .comment-box .reply-btn:hover{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .default-form .form-group input:focus,
 .default-form .form-group select:focus,
 .default-form .form-group textarea:focus{
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .range-slider-one .ui-slider .ui-slider-range{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .range-slider-one .ui-state-default,
 .range-slider-one .ui-widget-content .ui-state-default{
	 border: 3px solid <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .sidebar .popular-products .product h4 a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .shop-upper-box .layout-mode a:hover,
 .shop-upper-box .layout-mode a.active{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .ui-state-active, 
 .ui-widget-content .ui-state-active, 
 .ui-widget-header .ui-state-active, 
 a.ui-button:active, .ui-button:active, 
 .ui-button.ui-state-active:hover{
	 background-color: <?php echo esc_html( $loveus_main_color ); ?>;
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .shop-item .option-box li a:hover{
	 background-color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .shop-item .inner-box .tag-banner{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .shop-item .inner-box .tag-banner:before{
	 border-top:9px solid <?php echo esc_html( $loveus_main_color ); ?>;
	 border-right:8px solid <?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .shop-item .inner-box .tag-banner:after{
	 border-bottom:9px solid <?php echo esc_html( $loveus_main_color ); ?>;
	 border-right:8px solid <?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .shop-item .inner-box .lower-content h3 a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .styled-pagination li a:hover,
 .styled-pagination li a.active{
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;
	 background-color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .product-details .image-column .image-box .icon:hover{
	 background-color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .product-details .basic-details .like-btn a:hover{
	 background-color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .product-details .basic-details .catergory a:hover{
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .product-details .prod-tabs .tab-btns .tab-btn:hover,
 .product-details .prod-tabs .tab-btns .tab-btn.active-btn{
	 background:<?php echo esc_html( $loveus_main_color ); ?>;
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .shop-comment-form .rating-box .rating a:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .shop-comment-form .form-group input[type="text"]:focus,
 .shop-comment-form .form-group input[type="password"]:focus,
 .shop-comment-form .form-group input[type="tel"]:focus,
 .shop-comment-form .form-group input[type="email"]:focus,
 .shop-comment-form .form-group select:focus,
 .shop-comment-form .form-group textarea:focus{
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .product-details .comments-area .comment-box .rating{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .product-details .comments-area .comment-box .reply-btn{
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .cart-table tbody tr .sub-total{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .cart-table tbody tr .remove-btn:hover{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .cart-section .apply-coupon .form-group input[type="text"]:focus{
	 border-color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .cart-section .totals-table li .total-price{
	 color:<?php echo esc_html( $loveus_main_color ); ?> !important;	
 }
 
 .checkout-page .default-links li{
	 background: #e4f5ee;
 }
 
 .checkout-page .payment-options li .radio-option label .small-text{
	 background: #e4f5ee;
 }
 
 .checkout-page .default-links li a{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .checkout-form input:focus,
 .checkout-form select:focus,
 .checkout-form textarea:focus{
	 border-color:<?php echo esc_html( $loveus_main_color ); ?>;	
 }
 
 .order-detail .cart-table .col.total{
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .checkout-page .payment-options li .radio-option label strong a{
	 color:<?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .gallery-item-two .overlay-box:before{
	 background-color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .call-to-action-two{
	 background:#ae64fd;
 }
  
 .banner-carousel .slide-item .curved-layer:before{
	 background:#ae64fd;
 }
  
 .cause-block .inner-box .donate-info .bg-image-layer:before{
	 background:#d4ffee;
 }	
 
 .causes-section .cause-block:nth-child(1) .inner-box .donate-info .bg-image-layer:before{
	 background:#d4ffee;	
 }
 
 .causes-section .cause-block:nth-child(2) .inner-box .donate-info .bg-image-layer:before{
	 background:#ebd9ff;	
 }
 
 .causes-section .cause-block:nth-child(3) .inner-box .donate-info .bg-image-layer:before{
	 background:#d9eeff;	
 }
 
 .causes-section .cause-block:nth-child(4) .inner-box .donate-info .bg-image-layer:before{
	 background:#ffd5d6;	
 }
 
 .causes-section .cause-block:nth-child(5) .inner-box .donate-info .bg-image-layer:before{
	 background:#cffeff;	
 }
 
 .causes-section .cause-block:nth-child(6) .inner-box .donate-info .bg-image-layer:before{
	 background:#ffe9b9;	
 }
 
 .fluid-section {
	 background-color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
  
 .gallery-item-two .overlay-box:before{
	 background-color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
  
 .sidebar-side .sidebar .widget_nav_menu ul li:hover,
 .sidebar-side .sidebar .widget_pages ul li:hover,
 .sidebar-side .sidebar .widget_archive ul li:hover,
 .sidebar-side .sidebar .widget_archive ul li:hover a {
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 .sidebar-side .sidebar .widget_nav_menu ul li:after,
 .sidebar-side .sidebar .widget_pages ul li:after,
 .sidebar-side .sidebar .widget_categories ul li:after,
 .sidebar-side .sidebar .widget_archive ul li:after {
	 background: #d2d5d8;
 }
 .sidebar-side .sidebar .widget_nav_menu ul li:hover:after,
 .sidebar-side .sidebar .widget_pages ul li:hover:after,
 .sidebar-side .sidebar .widget_categories ul li:hover:after,
 .sidebar-side .sidebar .widget_archive ul li:hover:after {
	 background: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 .sticky_post_icon{
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 
 
 .nav-links a:hover, .page-links a:hover,
 .nav-links .current:hover, .page-links .current:hover {
  background:  <?php echo esc_html( $loveus_main_color ); ?>;
  border: 1px solid  <?php echo esc_html( $loveus_main_color ); ?>;
}

.nav-links .current, .page-links .current {
  background:  <?php echo esc_html( $loveus_main_color ); ?>;
  border: 1px solid  <?php echo esc_html( $loveus_main_color ); ?>;
}


.sidebar-side .sidebar .widget_recent_entries ul li:hover a {
  color: <?php echo esc_html( $loveus_main_color ); ?>;
}



.sidebar-side .sidebar .widget_tag_cloud .tagcloud a:hover {
  background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}


form.post-password-form input[type="submit"] {
	background: <?php echo esc_html( $loveus_main_color ); ?>;
}

.comments-area .comment-box:hover{
	border-bottom: 1px solid <?php echo esc_html( $loveus_main_color ); ?>;
}

blockquote {
	border-left: 2px solid <?php echo esc_html( $loveus_main_color ); ?>;
}
.wpcf7-submit.theme-btn {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}
.faq-section ul.tab-buttons li:first-child:before {
	border-bottom: 2px solid <?php echo esc_html( $loveus_main_color ); ?>;
}
.charitable-login-form input#wp-submit {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}
.our-shop .pagination-box .current, .our-shop .pagination-box  a:hover {
	border-color: <?php echo esc_html( $loveus_main_color ); ?>;
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}
pre {
	border: 1px solid <?php echo esc_html( $loveus_main_color ); ?>;
}


.rif-single-product button.single_add_to_cart_button.button.alt {
	background: <?php echo esc_html( $loveus_main_color ); ?>;
}
.woocommerce div.product .woocommerce-tabs ul.tabs li.active {
	background: <?php echo esc_html( $loveus_main_color ); ?>;
	border-color: <?php echo esc_html( $loveus_main_color ); ?>;
}
a.checkout-button.button.alt.wc-forward {
	background: <?php echo esc_html( $loveus_main_color ); ?>;
}
.blog-post-detail .content ul .woocommerce-notice:before {

	color: <?php echo esc_html( $loveus_main_color ); ?>;
}
.review-box p.woocommerce-noreviews {
	border: 1px solid <?php echo esc_html( $loveus_main_color ); ?>;
}
.woocommerce-cart-form td {
	border-color: <?php echo esc_html( $loveus_main_color ); ?> !important;
}


.woocommerce-info {
	border-top-color: <?php echo esc_html( $loveus_main_color ); ?>;
}
.woocommerce-info::before {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}
.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button {
  background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}
.woocommerce button.button:hover {
  background-color: <?php echo esc_html( $loveus_main_color ); ?> !important;
}
.shop_table button.button:hover {
	background: <?php echo esc_html( $loveus_main_color ); ?> !important;
}


.shop_table button.button {
	background: <?php echo esc_html( $loveus_main_color ); ?>;
}

nav.woocommerce-breadcrumb a {
	color: <?php echo esc_html( $loveus_main_color ); ?> !important;
}
.shop_table thead tr {
	background: <?php echo esc_html( $loveus_main_color ); ?>;
}


 .widget_recent_comments ul li span a,
 .widget_recent_comments ul li a {
	 color: <?php echo esc_html( $loveus_font_color ); ?>;
 }
 
 .widget_recent_comments ul li:hover span a,
 .widget_recent_comments ul li:hover a {
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 .widget_recent_comments ul li {
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 a:hover {
	 color: <?php echo esc_html( $loveus_main_color ); ?>;
 }
 
 .comments-area ul li:before {
	 background: <?php echo esc_html( $loveus_main_color ); ?>;
 }













 .cause-block-two .inner-box .progress-box .bar-inner{
	background: <?php echo esc_html( $loveus_main_color ); ?>;
}

.causes-section-two .cause-block-two:nth-child(1) .inner-box .progress-box .bar-inner{
	background: <?php echo esc_html( $loveus_main_color ); ?>;	
}

.causes-section-two .cause-block-two:nth-child(2) .inner-box .progress-box .bar-inner{
	background:#ae64fd;	
}

.causes-section-two .cause-block-two:nth-child(3) .inner-box .progress-box .bar-inner{
	background:<?php echo esc_html( $loveus_main_color ); ?>;	
}

.causes-section-two .cause-block-two:nth-child(4) .inner-box .progress-box .bar-inner{
	background:#2ea4ff;	
}

.causes-section-two .cause-block-two:nth-child(5) .inner-box .progress-box .bar-inner{
	background:#21d7d9;	
}

.causes-section-two .cause-block-two:nth-child(6) .inner-box .progress-box .bar-inner{
	background:#f7a900;	
}

.cause-block-two .inner-box .progress-box .count-text{
	background: <?php echo esc_html( $loveus_main_color ); ?>;
}

.causes-section-two .cause-block-two:nth-child(1) .inner-box .progress-box .count-text{
	background: <?php echo esc_html( $loveus_main_color ); ?>;	
}

.causes-section-two .cause-block-two:nth-child(2) .inner-box .progress-box .count-text{
	background:#ae64fd;	
}

.causes-section-two .cause-block-two:nth-child(3) .inner-box .progress-box .count-text{
	background:<?php echo esc_html( $loveus_main_color ); ?>;	
}

.causes-section-two .cause-block-two:nth-child(4) .inner-box .progress-box .count-text{
	background:#2ea4ff;	
}

.causes-section-two .cause-block-two:nth-child(5) .inner-box .progress-box .count-text{
	background:#21d7d9;	
}

.causes-section-two .cause-block-two:nth-child(6) .inner-box .progress-box .count-text{
	background:#f7a900;	
}

.cause-block-two .inner-box .progress-box .count-text:after{
	border-top:6px solid  <?php echo esc_html( $loveus_main_color ); ?>;	
}

.causes-section-two .cause-block-two:nth-child(1) .inner-box .progress-box .count-text:after{
	border-top-color: <?php echo esc_html( $loveus_main_color ); ?>;	
}

.causes-section-two .cause-block-two:nth-child(2) .inner-box .progress-box .count-text:after{
	border-top-color:#ae64fd;	
}

.causes-section-two .cause-block-two:nth-child(3) .inner-box .progress-box .count-text:after{
	border-top-color:<?php echo esc_html( $loveus_main_color ); ?>;	
}

.causes-section-two .cause-block-two:nth-child(4) .inner-box .progress-box .count-text:after{
	border-top-color:#2ea4ff;	
}

.causes-section-two .cause-block-two:nth-child(5) .inner-box .progress-box .count-text:after{
	border-top-color:#21d7d9;	
}

.causes-section-two .cause-block-two:nth-child(6) .inner-box .progress-box .count-text:after{
	border-top-color:#f7a900;	
}

.cause-block-two .inner-box h3 a:hover{
	color: <?php echo esc_html( $loveus_main_color ); ?>;	
}

.cause-block-two .inner-box:hover .btn-style-two{
	border-color: <?php echo esc_html( $loveus_main_color ); ?>;
	background: <?php echo esc_html( $loveus_main_color ); ?>;
}

.cause-block-three .inner-box .progress-box .bar-inner{
	background: <?php echo esc_html( $loveus_main_color ); ?>;
}

.cause-block-three .inner-box .progress-box .count-text{
	color:  <?php echo esc_html( $loveus_main_color ); ?>;
	box-shadow: 0 0 4px 5px  <?php echo esc_html( $loveus_main_color ); ?>;
}

.cause-block-three .inner-box .progress-box .count-text:after{
	border-top:6px solid  <?php echo esc_html( $loveus_main_color ); ?>;	
}

.cause-block-three .text-column .donation-count span {
	color:  <?php echo esc_html( $loveus_main_color ); ?>;
}

.newsletter-section .title-column .icon-box .icon{
	color:  <?php echo esc_html( $loveus_main_color ); ?>;
}


.subscribe-form .form-group input[type="submit"],
.subscribe-form .submit-btn{
	background-color:  <?php echo esc_html( $loveus_main_color ); ?>;
}

.subscribe-form .form-group input[type="submit"]:hover,
.subscribe-form .submit-btn:hover{
	color:  <?php echo esc_html( $loveus_main_color ); ?>;
}

.newsletter-section.style-two:before{
	background-color:  <?php echo esc_html( $loveus_main_color ); ?>;
}

.team-block-two .inner-box .name a:hover{
	color:  <?php echo esc_html( $loveus_main_color ); ?>;
}

.team-block-two .info-box .social-links li a:hover{
	color:  <?php echo esc_html( $loveus_main_color ); ?>;
}

.cause-block.style-two .inner-box .donate-info .goal {
	color:  <?php echo esc_html( $loveus_main_color ); ?>;
}

.cause-block.style-two .inner-box .donate-info .raised {
	color:  <?php echo esc_html( $loveus_main_color ); ?>;
}

.testimonial-block-one .inner-box h3 span {
	color:  <?php echo esc_html( $loveus_main_color ); ?>;
}

.testimonial-section .owl-dots .owl-dot.active span {
	border-color:  <?php echo esc_html( $loveus_main_color ); ?>;
}

.causes-section-three .owl-dots .owl-dot.active span {
	border-color:  <?php echo esc_html( $loveus_main_color ); ?>;
}








/* Theme color Two */

  .main-header .header-upper .logo-box .logo {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .main-header .header-upper .logo-box .logo:before {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .main-header .header-top .info li a .icon {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .main-header .header-top .info li a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .main-menu .navigation > li > a:before {
	border-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .btn-style-one .btn-title {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .main-menu .navigation > li > ul {
	border-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .main-menu .navigation > li > ul > li:hover > a {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .main-header .nav-outer .link-box .cart-link a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .sticky-header .main-menu .navigation > li:hover > a, 
  .sticky-header .main-menu .navigation > li.current > a, 
  .sticky-header .main-menu .navigation > li.current-menu-item > a {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .banner-section .owl-nav .owl-prev:hover, 
  .banner-section .owl-nav .owl-next:hover {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .banner-section .owl-dots .owl-dot.active span {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .sec-title .sub-title {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .news-block .inner-box .date {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .news-block .inner-box h3 a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .newsletter-section .title-column .icon-box .icon {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .subscribe-form .form-group input[type="submit"]:hover, 
  .subscribe-form .submit-btn:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .subscribe-form .form-group input[type="submit"], 
  .subscribe-form .submit-btn {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .main-footer .links-widget ul li a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .main-footer .social-links li a:hover {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .main-footer .nav-box .inner .footer-nav li a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .main-footer .footer-bottom .bottom-links li a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .scroll-to-top {
	box-shadow: 2px 2px 0px <?php echo esc_html( $loveus_main_color ); ?>;
}

  .scroll-to-top:hover {
	-webkit-box-shadow: 2px 2px 0px #25283a;
	-ms-box-shadow: 2px 2px 0px #25283a;
	box-shadow: 2px 2px 0px #25283a;
}

  .scroll-to-top:hover {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .main-footer .nav-box .inner .donate-link .theme-btn:hover .btn-title {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .what-we-do .service-block.style-two .icon-box {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
	text-align: center;
}

  .fluid-section {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .cause-block-two .inner-box h3 a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .causes-section-two .cause-block-two .inner-box .progress-box .count-text {
	background-color: <?php echo esc_html( $loveus_main_color ); ?> !important;
}

  .causes-section-two .cause-block-two .inner-box .progress-box .count-text:after {
	border-top-color: <?php echo esc_html( $loveus_main_color ); ?> !important;
}

  .causes-section-two .cause-block-two .inner-box .progress-box .bar-inner {
	background-color: <?php echo esc_html( $loveus_main_color ); ?> !important;
}

  .preloader.style-two:after {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .fact-counter .column .inner .count-outer {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .event-block-three .lower-content .date {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .event-block-three .inner-box h3 a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .event-block-three .info li .icon {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .nav-outer .mobile-nav-toggler {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .mobile-menu .menu-backdrop {
	background: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .mobile-menu .navigation li.current > a, .mobile-menu .navigation li > a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .mobile-menu .navigation li.dropdown .dropdown-btn.open {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .mobile-menu .navigation li > a:before {
	border-left: 5px solid <?php echo esc_html( $loveus_main_color ); ?>;
}

  .mobile-menu .social-links li a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

  .mobile-menu .close-btn:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}



/* Theme Color Three */
 .main-header .header-upper .logo-box .logo {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .main-header .header-upper .logo-box .logo:before {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .main-header .header-top .info li a .icon {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .main-header .header-top .info li a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .main-menu .navigation > li > a:before {
	border-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .btn-style-one .btn-title {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .main-menu .navigation > li > ul {
	border-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .main-menu .navigation > li > ul > li:hover > a {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .main-header .nav-outer .link-box .cart-link a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .sticky-header .main-menu .navigation > li:hover > a, 
 .sticky-header .main-menu .navigation > li.current > a, 
 .sticky-header .main-menu .navigation > li.current-menu-item > a {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .banner-section .owl-nav .owl-prev:hover, 
 .banner-section .owl-nav .owl-next:hover {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .banner-section .owl-dots .owl-dot.active span {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .sec-title .sub-title {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .news-block .inner-box .date {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .news-block .inner-box h3 a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .main-footer .links-widget ul li a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .main-footer .social-links li a:hover {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .main-footer .nav-box .inner .footer-nav li a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .main-footer .footer-bottom .bottom-links li a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .scroll-to-top {
	box-shadow: 2px 2px 0px <?php echo esc_html( $loveus_main_color ); ?>;
}

 .scroll-to-top:hover {
	-webkit-box-shadow: 2px 2px 0px #25283a;
	-ms-box-shadow: 2px 2px 0px #25283a;
	box-shadow: 2px 2px 0px #25283a;
}

 .scroll-to-top:hover {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .main-footer .nav-box .inner .donate-link .theme-btn:hover .btn-title {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .preloader.style-three:after {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .news-block-two .post-meta ul li a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .news-block-two .inner-box h3 a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .news-block-three .news-post .date {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .news-block-three .news-post h4 a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .btn-style-two:hover {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
	border-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .donor-block .donation-info .title {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .cause-block-three .inner-box .progress-box .bar-inner {
	background: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .cause-block-three .inner-box .progress-box .count-text {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
	box-shadow: 0 0 4px 5px <?php echo esc_html( $loveus_main_color ); ?>;
}

 .cause-block-three .text-column .donation-count span {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .fact-counter .column .count-outer {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .ui-state-active, 
 .ui-widget-content .ui-state-active, 
 .ui-widget-header .ui-state-active, 
 a.ui-button:active, 
 .ui-button:active, 
 .ui-button.ui-state-active:hover {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
	border-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .recent-donors-section .owl-dots .owl-dot.active span {
	border-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .nav-outer .mobile-nav-toggler {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .mobile-menu .menu-backdrop {
	background: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .mobile-menu .navigation li.current > a, .mobile-menu .navigation li > a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .mobile-menu .navigation li.dropdown .dropdown-btn.open {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .mobile-menu .navigation li > a:before {
	border-left: 5px solid <?php echo esc_html( $loveus_main_color ); ?>;
}

 .mobile-menu .social-links li a:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

 .mobile-menu .close-btn:hover {
	color: <?php echo esc_html( $loveus_main_color ); ?>;
}

.feature-block-one .inner-box:before {
	background-color: <?php echo esc_html( $loveus_main_color ); ?>;
}





		<?php

		$loveus_custom_css = ob_get_clean();

		return $loveus_custom_css;
}
