<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package loveus
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function loveus_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'loveus_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function loveus_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'loveus_pingback_header' );




    if( ! function_exists('loveus_logo') ) :
        function loveus_logo() {
            ?>
            <?php
    $header_topbar_onoff = loveus_get_options('header_topbar_onoff');
    $logo_box_down = '';
    if($header_topbar_onoff == '0') :
        $logo_box_down = 'logo-box-down';
    endif;
    $header_style = loveus_get_options('header_style');

    $header_type = get_query_var('header_type');

?>
<div class="logo-box <?php echo esc_attr($logo_box_down); ?>">
    <div class="logo">
    <?php
        if (has_custom_logo()) {
            //the_custom_logo();
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            if (!empty($logo[0])) {
                ?>
                 <a href="<?php echo esc_url(home_url('/')); ?>">
                      <img src="<?php echo esc_url($logo[0]) ?>" alt="<?php esc_attr_e('Logo', 'loveus') ?>">
                 </a>
                <?php
            }else{
             ?>
            <a href="<?php echo esc_url(home_url('/')); ?>">
              <img src="<?php echo esc_url(LOVEUS_IMG_URL . 'logo.svg') ?>" alt="<?php esc_attr_e('Logo', 'loveus') ?>">
            </a> 
             <?php
            }

        } elseif (!has_custom_logo()) {
            ?>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php if($header_style == '3' || $header_type == 3) : ?>
                    <img src="<?php echo esc_url(LOVEUS_IMG_URL . 'logo-2.svg') ?>" alt="<?php esc_attr_e('Logo', 'loveus') ?>">
                <?php else : ?>
                    

                    <svg width="122" height="126" viewBox="0 0 122 126" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M99.478 11.042C99.478 11.042 92.5271 14.8 89.1851 17.627C85.8431 20.454 82.438 27.265 79.611 38.51C76.784 49.755 69.201 64.791 65.025 68.646C60.849 72.501 55.836 76.357 50.246 71.538C44.656 66.719 48.961 60.807 50.953 59.458C52.945 58.109 61.6841 52.84 61.9411 48.149C62.1981 43.458 52.11 38.511 48.897 37.482C45.684 36.453 30.841 33.948 28.142 26.682C25.443 19.416 32.3761 15.219 38.9301 16.054C45.4841 16.889 51.0171 22.505 52.2381 23.276C53.4591 24.047 58.1161 28.22 63.7381 27.581C69.3601 26.942 77.467 15.363 85.2 11.838C89.6764 9.7326 94.7954 9.44719 99.478 11.042V11.042Z" fill="white"/>
<path d="M62.132 22.305C67.1219 22.305 71.167 18.2599 71.167 13.27C71.167 8.28011 67.1219 4.235 62.132 4.235C57.1421 4.235 53.097 8.28011 53.097 13.27C53.097 18.2599 57.1421 22.305 62.132 22.305Z" fill="white"/>
<path d="M76.672 7.058C78.621 7.058 80.201 5.47801 80.201 3.529C80.201 1.57999 78.621 0 76.672 0C74.723 0 73.143 1.57999 73.143 3.529C73.143 5.47801 74.723 7.058 76.672 7.058Z" fill="white"/>
<path d="M91.919 39.81C94.3358 39.81 96.295 37.8508 96.295 35.434C96.295 33.0172 94.3358 31.058 91.919 31.058C89.5022 31.058 87.543 33.0172 87.543 35.434C87.543 37.8508 89.5022 39.81 91.919 39.81Z" fill="white"/>
<path d="M47.026 51.668C49.5207 51.668 51.543 49.6457 51.543 47.151C51.543 44.6563 49.5207 42.634 47.026 42.634C44.5314 42.634 42.509 44.6563 42.509 47.151C42.509 49.6457 44.5314 51.668 47.026 51.668Z" fill="white"/>
<path d="M1.7 100.865L3.74 100.355V78.595L1.7 78.085V77.575H11.39V78.085L9.35 78.595V100.525H16.66C16.66 99.097 17.0227 97.771 17.748 96.547C18.0653 96.0257 18.4393 95.595 18.87 95.255H19.89V101.375H1.7V100.865ZM31.122 101.885C28.3113 101.885 26.1013 101.092 24.492 99.505C22.9053 97.8957 22.112 95.6857 22.112 92.875C22.112 90.0643 22.9053 87.8657 24.492 86.279C26.1013 84.6697 28.3113 83.865 31.122 83.865C33.9326 83.865 36.1313 84.6697 37.718 86.279C39.3273 87.8657 40.132 90.0643 40.132 92.875C40.132 95.6857 39.3273 97.8957 37.718 99.505C36.1313 101.092 33.9326 101.885 31.122 101.885ZM31.122 101.205C32.0286 101.205 32.788 100.57 33.4 99.301C34.0346 98.0317 34.352 95.8897 34.352 92.875C34.352 89.8603 34.0346 87.7183 33.4 86.449C32.788 85.1797 32.0286 84.545 31.122 84.545C30.2153 84.545 29.4446 85.1797 28.81 86.449C28.198 87.7183 27.892 89.8603 27.892 92.875C27.892 95.8897 28.198 98.0317 28.81 99.301C29.4446 100.57 30.2153 101.205 31.122 101.205ZM42.5239 85.395L40.8239 84.885V84.375H45.0739C46.2526 84.375 47.1819 84.6243 47.8619 85.123C48.5646 85.599 49.1652 86.313 49.6639 87.265L53.7099 95.119L57.4839 85.905L54.9339 84.885V84.375H61.2239V84.885L58.5039 85.905L52.0439 101.715H51.0239L42.5239 85.395ZM70.4052 101.885C67.5039 101.885 65.2486 101.092 63.6392 99.505C62.0299 97.8957 61.2252 95.6857 61.2252 92.875C61.2252 91.039 61.5766 89.441 62.2792 88.081C62.9819 86.721 63.9566 85.6783 65.2032 84.953C66.4726 84.2277 67.9232 83.865 69.5552 83.865C71.1872 83.865 72.6152 84.171 73.8392 84.783C75.0859 85.395 76.0379 86.2223 76.6952 87.265C77.3752 88.285 77.7152 89.4183 77.7152 90.665C77.7152 91.2317 77.6586 91.719 77.5452 92.127L77.3752 92.705C76.4006 92.909 75.3466 93.079 74.2132 93.215C71.8332 93.555 69.4306 93.725 67.0052 93.725C67.0052 96.3543 67.3679 98.2357 68.0932 99.369C68.8186 100.48 69.8159 101.035 71.0852 101.035C71.9692 101.035 72.7852 100.831 73.5332 100.423C74.3039 99.9923 74.9046 99.437 75.3352 98.757C75.7886 98.0543 76.0152 97.3403 76.0152 96.615H76.8652C76.8652 97.5217 76.5932 98.383 76.0492 99.199C75.5052 100.015 74.7459 100.672 73.7712 101.171C72.7966 101.647 71.6746 101.885 70.4052 101.885ZM67.0052 92.875C68.4559 92.875 69.6346 92.8183 70.5412 92.705C70.9266 92.6823 71.3346 92.6257 71.7652 92.535C71.7879 92.4217 71.8446 92.1723 71.9352 91.787C72.0486 91.2203 72.1052 90.6197 72.1052 89.985C72.1052 88.1037 71.8559 86.7323 71.3572 85.871C70.8586 84.987 70.2579 84.545 69.5552 84.545C67.8552 84.545 67.0052 87.3217 67.0052 92.875ZM92.3206 101.885C88.966 101.885 86.4273 101.103 84.7046 99.539C82.982 97.9523 82.1206 95.731 82.1206 92.875V78.595L80.0806 78.085V77.575H89.7706V78.085L87.7306 78.595V92.875C87.7306 95.799 88.184 97.8957 89.0906 99.165C89.9973 100.412 91.3006 101.035 93.0006 101.035C94.0433 101.035 95.0293 100.706 95.9586 100.049C96.9106 99.369 97.67 98.417 98.2366 97.193C98.826 95.9463 99.1206 94.507 99.1206 92.875V79.105L96.4006 78.085V77.575H102.861V78.085L100.141 79.105V92.875C100.141 94.711 99.8006 96.309 99.1206 97.669C98.4406 99.029 97.5113 100.072 96.3326 100.797C95.154 101.522 93.8166 101.885 92.3206 101.885ZM112.379 101.885C110.974 101.885 109.716 101.579 108.605 100.967C108.061 100.672 107.619 100.355 107.279 100.015C106.917 100.514 106.52 100.899 106.089 101.171C105.885 101.307 105.659 101.432 105.409 101.545H104.559V95.765H105.919C106.214 96.717 106.645 97.601 107.211 98.417C108.413 100.162 109.909 101.035 111.699 101.035C112.651 101.035 113.365 100.808 113.841 100.355C114.34 99.879 114.589 99.199 114.589 98.315C114.589 97.567 114.249 96.9437 113.569 96.445C112.912 95.9237 111.869 95.289 110.441 94.541C109.217 93.929 108.22 93.385 107.449 92.909C106.701 92.4103 106.055 91.7983 105.511 91.073C104.99 90.325 104.729 89.4523 104.729 88.455C104.729 87.095 105.307 85.9957 106.463 85.157C107.642 84.2957 109.444 83.865 111.869 83.865C113.071 83.865 114.181 84.1823 115.201 84.817C115.7 85.1117 116.131 85.4177 116.493 85.735C116.788 85.327 117.185 84.9417 117.683 84.579C118.069 84.3523 118.295 84.2277 118.363 84.205H119.213V89.985H117.853C117.513 89.0103 117.094 88.1377 116.595 87.367C115.462 85.599 114.113 84.715 112.549 84.715C111.937 84.715 111.416 84.9417 110.985 85.395C110.555 85.8483 110.339 86.415 110.339 87.095C110.339 87.9563 110.702 88.6817 111.427 89.271C112.153 89.8377 113.252 90.495 114.725 91.243C115.927 91.855 116.879 92.399 117.581 92.875C118.307 93.3283 118.919 93.895 119.417 94.575C119.939 95.255 120.199 96.0483 120.199 96.955C120.199 100.242 117.593 101.885 112.379 101.885Z" fill="white"/>
<path d="M24.202 115.681V121.986L25.242 122.376V122.571H22.772V122.376L23.812 121.986V113.926L22.902 113.666V113.471H24.267C24.7263 113.471 25.086 113.553 25.346 113.718C25.606 113.883 25.853 114.104 26.087 114.381L30.247 119.256V114.056L29.207 113.666V113.471H31.677V113.666L30.637 114.056V122.766H30.247L24.202 115.681ZM35.97 122.766C34.8953 122.766 34.0503 122.463 33.435 121.856C32.8283 121.241 32.525 120.396 32.525 119.321C32.525 118.246 32.8283 117.406 33.435 116.799C34.0503 116.184 34.8953 115.876 35.97 115.876C37.0447 115.876 37.8853 116.184 38.492 116.799C39.1073 117.406 39.415 118.246 39.415 119.321C39.415 120.396 39.1073 121.241 38.492 121.856C37.8853 122.463 37.0447 122.766 35.97 122.766ZM35.97 122.506C36.3167 122.506 36.607 122.263 36.841 121.778C37.0837 121.293 37.205 120.474 37.205 119.321C37.205 118.168 37.0837 117.349 36.841 116.864C36.607 116.379 36.3167 116.136 35.97 116.136C35.6233 116.136 35.3287 116.379 35.086 116.864C34.852 117.349 34.735 118.168 34.735 119.321C34.735 120.474 34.852 121.293 35.086 121.778C35.3287 122.263 35.6233 122.506 35.97 122.506ZM40.4596 122.376L41.2396 122.181V116.461L40.4596 116.266V116.071H41.6296C42.1409 116.071 42.5439 116.236 42.8386 116.565C42.9512 116.695 43.0466 116.855 43.1246 117.046C43.2459 116.821 43.3889 116.626 43.5536 116.461C43.9436 116.071 44.4289 115.876 45.0096 115.876C45.4949 115.876 45.9282 115.98 46.3096 116.188C46.6996 116.387 47.0029 116.652 47.2196 116.981C47.4362 117.31 47.5446 117.657 47.5446 118.021V122.181L48.3246 122.376V122.571H46.6346C45.8546 122.571 45.4646 122.181 45.4646 121.401V118.021C45.4646 117.475 45.3649 117.059 45.1656 116.773C44.9749 116.478 44.7496 116.331 44.4896 116.331C44.1602 116.331 43.8656 116.504 43.6056 116.851C43.4929 116.998 43.3976 117.172 43.3196 117.371V122.181L44.0996 122.376V122.571H40.4596V122.376ZM49.0401 118.671V118.086H54.2401V118.671H49.0401ZM55.3415 122.376L56.1215 122.181V113.861L55.3415 113.666V113.471H58.9815C60.4202 113.471 61.4515 113.709 62.0755 114.186C62.6995 114.654 63.0115 115.347 63.0115 116.266C63.0115 117.185 62.6995 117.882 62.0755 118.359C61.4515 118.827 60.4202 119.061 58.9815 119.061H58.2665V122.181L59.0465 122.376V122.571H55.3415V122.376ZM58.9815 118.736C59.5275 118.736 59.9652 118.528 60.2945 118.112C60.6325 117.696 60.8015 117.081 60.8015 116.266C60.8015 115.46 60.6325 114.849 60.2945 114.433C59.9652 114.008 59.5275 113.796 58.9815 113.796H58.2665V118.736H58.9815ZM63.984 122.376L64.764 122.181V116.461L63.984 116.266V116.071H65.154C65.6653 116.071 66.0683 116.236 66.363 116.565C66.4757 116.695 66.571 116.855 66.649 117.046C66.779 116.855 66.9393 116.682 67.13 116.526C67.5633 116.179 68.0487 116.006 68.586 116.006C69.0453 116.006 69.3877 116.114 69.613 116.331C69.847 116.539 69.964 116.842 69.964 117.241C69.964 117.536 69.873 117.774 69.691 117.956C69.5177 118.129 69.2837 118.216 68.989 118.216C68.8677 118.216 68.7463 118.207 68.625 118.19L68.469 118.151V116.331C68.027 116.331 67.624 116.504 67.26 116.851C67.0867 117.024 66.948 117.198 66.844 117.371V122.181L67.624 122.376V122.571H63.984V122.376ZM73.9925 122.766C72.9178 122.766 72.0728 122.463 71.4575 121.856C70.8508 121.241 70.5475 120.396 70.5475 119.321C70.5475 118.246 70.8508 117.406 71.4575 116.799C72.0728 116.184 72.9178 115.876 73.9925 115.876C75.0671 115.876 75.9078 116.184 76.5145 116.799C77.1298 117.406 77.4375 118.246 77.4375 119.321C77.4375 120.396 77.1298 121.241 76.5145 121.856C75.9078 122.463 75.0671 122.766 73.9925 122.766ZM73.9925 122.506C74.3391 122.506 74.6295 122.263 74.8635 121.778C75.1061 121.293 75.2275 120.474 75.2275 119.321C75.2275 118.168 75.1061 117.349 74.8635 116.864C74.6295 116.379 74.3391 116.136 73.9925 116.136C73.6458 116.136 73.3511 116.379 73.1085 116.864C72.8745 117.349 72.7575 118.168 72.7575 119.321C72.7575 120.474 72.8745 121.293 73.1085 121.778C73.3511 122.263 73.6458 122.506 73.9925 122.506ZM78.417 122.376L79.197 122.181V116.656H78.287V116.331H79.197V115.681C79.197 115.222 79.3054 114.81 79.522 114.446C79.7474 114.082 80.0637 113.796 80.471 113.588C80.887 113.38 81.3724 113.276 81.927 113.276C82.3777 113.276 82.7634 113.345 83.084 113.484C83.4134 113.614 83.6604 113.792 83.825 114.017C83.9897 114.234 84.072 114.463 84.072 114.706C84.072 115.001 83.981 115.239 83.799 115.421C83.6257 115.594 83.3917 115.681 83.097 115.681C82.9757 115.681 82.8544 115.672 82.733 115.655L82.577 115.616V113.601L82.46 113.575C82.4254 113.566 82.3864 113.558 82.343 113.549C82.2997 113.54 82.2477 113.536 82.187 113.536C81.8924 113.536 81.667 113.692 81.511 114.004C81.355 114.307 81.277 114.866 81.277 115.681V116.331H83.357V116.656H81.277V122.181L82.057 122.376V122.571H78.417V122.376ZM84.1315 122.376L84.9115 122.181V116.461L84.1315 116.266V116.071H85.8215C86.6015 116.071 86.9915 116.461 86.9915 117.241V122.181L87.7715 122.376V122.571H84.1315V122.376ZM85.8215 115.291C85.5615 115.291 85.3448 115.204 85.1715 115.031C84.9981 114.858 84.9115 114.641 84.9115 114.381C84.9115 114.121 84.9981 113.904 85.1715 113.731C85.3448 113.558 85.5615 113.471 85.8215 113.471C86.0815 113.471 86.2981 113.558 86.4715 113.731C86.6448 113.904 86.7315 114.121 86.7315 114.381C86.7315 114.641 86.6448 114.858 86.4715 115.031C86.2981 115.204 86.0815 115.291 85.8215 115.291ZM91.9294 122.766C91.3574 122.766 90.8591 122.662 90.4344 122.454C90.0184 122.246 89.6978 121.96 89.4724 121.596C89.2471 121.232 89.1344 120.82 89.1344 120.361V116.396H88.2244V116.071H89.1344V115.421C89.1344 114.641 89.5244 114.251 90.3044 114.251H91.2144V116.071H93.0344V116.396H91.2144V120.361C91.2144 121.158 91.2968 121.704 91.4614 121.999C91.6261 122.294 91.8688 122.441 92.1894 122.441C92.5014 122.441 92.7744 122.289 93.0084 121.986C93.2424 121.683 93.3594 121.271 93.3594 120.751H93.6844C93.6844 121.392 93.5241 121.891 93.2034 122.246C92.8828 122.593 92.4581 122.766 91.9294 122.766ZM97.912 122.766C96.8026 122.766 95.9403 122.463 95.325 121.856C94.7096 121.241 94.402 120.396 94.402 119.321C94.402 118.619 94.5363 118.008 94.805 117.488C95.0736 116.968 95.4463 116.569 95.923 116.292C96.4083 116.015 96.963 115.876 97.587 115.876C98.211 115.876 98.757 115.993 99.225 116.227C99.7016 116.461 100.066 116.777 100.317 117.176C100.577 117.566 100.707 117.999 100.707 118.476C100.707 118.693 100.685 118.879 100.642 119.035L100.577 119.256C100.204 119.334 99.8013 119.399 99.368 119.451C98.458 119.581 97.5393 119.646 96.612 119.646C96.612 120.651 96.7506 121.371 97.028 121.804C97.3053 122.229 97.6866 122.441 98.172 122.441C98.51 122.441 98.822 122.363 99.108 122.207C99.4026 122.042 99.6323 121.83 99.797 121.57C99.9703 121.301 100.057 121.028 100.057 120.751H100.382C100.382 121.098 100.278 121.427 100.07 121.739C99.862 122.051 99.5716 122.302 99.199 122.493C98.8263 122.675 98.3973 122.766 97.912 122.766ZM96.612 119.321C97.1666 119.321 97.6173 119.299 97.964 119.256C98.1113 119.247 98.2673 119.226 98.432 119.191C98.4406 119.148 98.4623 119.052 98.497 118.905C98.5403 118.688 98.562 118.459 98.562 118.216C98.562 117.497 98.4666 116.972 98.276 116.643C98.0853 116.305 97.8556 116.136 97.587 116.136C96.937 116.136 96.612 117.198 96.612 119.321Z" fill="white"/>
</svg>


                <?php endif; ?> 
            </a> 
            <?php
        } else {

            if (is_front_page() && is_home()) :
                ?>
                <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                <?php
            else :
                ?>
                <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
            <?php
            endif;
            $loveus_description = get_bloginfo('description', 'display');
            if ($loveus_description || is_customize_preview()) :
                ?>
                <p class="site-description"><?php echo esc_html($loveus_description); /* WPCS: xss ok. */ ?></p>
                <?php
            endif;
        }
        ?>
        
    </div>
</div>
            <?php 
        }
    endif;
    add_action('loveus_logo_fun', 'loveus_logo');
?>