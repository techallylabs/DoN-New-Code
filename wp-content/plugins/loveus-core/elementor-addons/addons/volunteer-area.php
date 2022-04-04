<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/** 
 * Elementor Volunteer area Volunteer_area volunteer_area
 * @since 1.0.0
*/
class Volunteer_area extends \Elementor\Widget_Base {
    public function get_name() {
        return 'volunteer_area__o';
    }
    public function get_title(){
        return esc_html__( 'Volunteer area', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    public function get_script_depends() {
        
        // $settings =  \Elementor\Base_Control::get_settings('volunteer_design_list');
        // echo '<pre>';
        // print_r($settings);
        // echo '</pre>';

        // $volunteer_design_list = $settings['volunteer_design_list'];
        // if($volunteer_design_list == 'style-two') : 
            return ['owl-lib-loveus', 'owl-slider-loveus'];
        // endif;
        // return ['owl-lib-loveus'];
    }
    public function get_style_depends() {
    //     $settings = $this->get_settings();
    //     $volunteer_design_list = $settings['volunteer_design_list'];
    //     if($volunteer_design_list == 'style-two') : 
            return ['owl-carousel-loveus-me'];
    //     endif;
    //     return [];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'volunteer_design_area',
            [
                'label' => esc_html__( 'volunteer design area', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'volunteer_design_list',
			[
				'label' => esc_html__( 'volunteer design list', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style-none',
				'options' => [
					'style-none'  => esc_html__( 'One', 'plugin-domain' ),
					'style-two'  => esc_html__( 'Two', 'plugin-domain' ),
					'style-three'  => esc_html__( 'Three', 'plugin-domain' ),
					'style-four'  => esc_html__( 'Four', 'plugin-domain' ),
				],
			]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Volunteer_header',
            [
                'label' => esc_html__( 'Volunteer header area', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        headerSettings::getHeaderSettings( $this );
        $this->add_control(
            'content_section_two',
            [
                'label' => esc_html__( 'content section two', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );    
        $this->end_controls_section();

        $this->start_controls_section(
            'Volunteer_content',
            [
                'label' => esc_html__( 'Volunteer content area', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
            getAnimationControl($repeater);
            $repeater->start_controls_tabs(
                'Volunteer_tabs'
            );
                $repeater->start_controls_tab(
                    'Volunteer_header',
                    [
                        'label' => __( 'Header', 'plugin-name' ),
                    ]
                );
                    $repeater->add_control(
                        'volunteer_images', [
                            'label' => esc_html__( 'Volunteer image', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'default' => [
                                'url' => \Elementor\Utils::get_placeholder_image_src(),
                            ],
                        ]
                    );
                    $repeater->add_control(
                        'Volunteer_name',
                        [
                            'label' => esc_html__( 'Volunteer name', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
                        ]
                    );
                    $repeater->add_control(
                        'Volunteer_position',
                        [
                            'label' => esc_html__( 'Volunteer position', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
                        ]
                    );
                $repeater->end_controls_tab();

                $repeater->start_controls_tab(
                    'Volunteer_social',
                    [
                        'label' => __( 'social', 'plugin-name' ),
                    ]
                );
                    $repeater->add_control(
                        'social_icon_one', [
                        'label' => __('Volunteer icon one', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'placeholder' => __('Type your content here', 'plugin-domain'),
                        ]
                    );
                    $repeater->add_control(
                        'social_icon_one_link', [
                            'label' => esc_html__( 'Volunteer icon one link', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'show_external' => true,
                            'default' => [
                                'url' => '',
                                'is_external' => true,
                                'nofollow' => true,
                            ],
                        ]
                    );
                    $repeater->add_control(
                        'social_icon_two', [
                        'label' => __('Volunteer icon two', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'placeholder' => __('Type your content here', 'plugin-domain'),
                        ]
                    );
                    $repeater->add_control(
                        'social_icon_two_link', [
                            'label' => esc_html__( 'Volunteer icon two link', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'show_external' => true,
                            'default' => [
                                'url' => '',
                                'is_external' => true,
                                'nofollow' => true,
                            ],
                        ]
                    );
                    $repeater->add_control(
                        'social_icon_three', [
                        'label' => __('Volunteer icon three', 'plugin-domain'),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'placeholder' => __('Type your content here', 'plugin-domain'),
                        ]
                    );
                    $repeater->add_control(
                        'social_icon_three_link', [
                            'label' => esc_html__( 'Volunteer icon three link', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'show_external' => true,
                            'default' => [
                                'url' => '',
                                'is_external' => true,
                                'nofollow' => true,
                            ],
                        ]
                    );
                $repeater->end_controls_tab();

            $repeater->end_controls_tabs();
        $this->add_control(
            'Volunteer_list', [
                'label' => esc_html__( 'Volunteer list', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display(); 
        $volunteer_design_list = $settings['volunteer_design_list'];
        $content_section_two = $settings['content_section_two'];
        $Volunteer_list = $settings['Volunteer_list'];
        ?>
            
            
            <?php if( $volunteer_design_list == 'style-none' ) : ?>
                <section class="team-section">
                    <div class="bottom-rotten-curve"></div>
                    
                    <div class="auto-container">
                    
                        <?php headerSettings::getHeaderInfo($settings); ?>           
                        <div class="row clearfix">
                        <?php if( $Volunteer_list ) : ?>
                            <?php foreach ( $Volunteer_list as $item ) {
                                $volunteer_images = ( $item['volunteer_images']['id'] != '' ) ? wp_get_attachment_url( $item['volunteer_images']['id'], 'full' ) : $item['volunteer_images']['url'];
                            ?>
                                <!--Team Block-->
                                <div class="team-block col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box wow <?php echo esc_attr($item['animation_class']); ?>" data-wow-delay="<?php echo esc_attr($item['animation_delay_time']); ?>ms" data-wow-duration="<?php echo esc_attr($item['animation_duration']); ?>ms">
                                        <figure class="image-box"><a href="#"><img src="<?php echo esc_url($volunteer_images); ?>"  alt=""></a></figure>
                                        <div class="lower-box">
                                            <div class="content">
                                                <h3><a href="#"><?php echo wp_kses_post($item['Volunteer_name']); ?></a></h3>
                                                <div class="designation"><?php echo wp_kses_post($item['Volunteer_position']); ?></div>
                                                <?php $social_icon_one_link = $item['social_icon_one_link']['url']; if($social_icon_one_link) : ?>
                                                    <div class="social-links">
                                                        <ul class="clearfix">
                                                            <?php
                                                            
                                                                $social_icon_one = $item['social_icon_one'];
                                                                $social_icon_one_link_target = $item['social_icon_one_link']['is_external'] ? ' target=_blank' : '';
                                                                $social_icon_one_link_nofollow = $item['social_icon_one_link']['nofollow'] ? ' rel=nofollow' : '';
                                                            
                                                                $social_icon_two = $item['social_icon_two'];
                                                                $social_icon_two_link = $item['social_icon_two_link']['url'];
                                                                $social_icon_two_link_target = $item['social_icon_two_link']['is_external'] ? ' target=_blank' : '';
                                                                $social_icon_two_link_nofollow = $item['social_icon_two_link']['nofollow'] ? ' rel=nofollow' : '';
                                                            
                                                                $social_icon_three = $item['social_icon_three'];
                                                                $social_icon_three_link = $item['social_icon_three_link']['url'];
                                                                $social_icon_three_link_target = $item['social_icon_three_link']['is_external'] ? ' target=_blank' : '';
                                                                $social_icon_three_link_nofollow = $item['social_icon_three_link']['nofollow'] ? ' rel=nofollow' : '';

                                                            ?>
                                                            <?php if($social_icon_one_link) : ?>
                                                                <li>
                                                                    <a href="<?php echo esc_url($social_icon_one_link); ?>"  <?php echo esc_attr($social_icon_one_link_target . $social_icon_one_link_nofollow); ?>>
                                                                        <?php \Elementor\Icons_Manager::render_icon( $social_icon_one, [ 'aria-hidden' => 'true' ] ); ?>
                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($social_icon_two_link) : ?>
                                                                <li>
                                                                    <a href="<?php echo esc_url($social_icon_two_link); ?>"  <?php echo esc_attr($social_icon_two_link_target . $social_icon_two_link_nofollow); ?>>
                                                                        <?php \Elementor\Icons_Manager::render_icon( $social_icon_two, [ 'aria-hidden' => 'true' ] ); ?>
                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($social_icon_three_link) : ?>
                                                                <li>
                                                                    <a href="<?php echo esc_url($social_icon_three_link); ?>"  <?php echo esc_attr($social_icon_three_link_target . $social_icon_three_link_nofollow); ?>>
                                                                        <?php \Elementor\Icons_Manager::render_icon( $social_icon_three, [ 'aria-hidden' => 'true' ] ); ?>
                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php endif; ?>
                        </div>
                        
                    </div>
                </section>
            <?php endif; ?>
            <?php if( $volunteer_design_list == 'style-two' ) : ?>
                <section class="team-carousel-section">
            
                    <div class="auto-container"> 
                        <div class="title-box clearfix">
                            <?php headerSettings::getHeaderInfo($settings); ?>           
                            <?php if($content_section_two) : ?>
                                <div class="text"><?php echo wp_kses_post($content_section_two); ?></div>
                            <?php endif;?>
                        </div>
                        <!--Team Carousel-->     
                        <div class="team-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 500, "responsive":{ "0" :{ "items": "1" },"600" :{ "items": "1" }, "800" :{ "items" : "2" }, "1024":{ "items" : "3" }, "1366":{ "items" : "3" }}}'>
                            <?php if( $Volunteer_list ) : ?>
                                <?php foreach ( $Volunteer_list as $item ) {
                                    $volunteer_images = ( $item['volunteer_images']['id'] != '' ) ? wp_get_attachment_url( $item['volunteer_images']['id'], 'full' ) : $item['volunteer_images']['url'];
                                    ?>
                                    <!--Team Block-->
                                    <div class="slide-item">
                                    <div class="team-block ">
                                        <div class="inner-box">
                                            <figure class="image-box"><a href="#"><img  src="<?php echo esc_url($volunteer_images); ?>"  alt=""></a></figure>
                                            <div class="lower-box">
                                                <div class="content">
                                                    <h3><a href="#"><?php echo wp_kses_post($item['Volunteer_name']); ?></a></h3>
                                                    <div class="designation"><?php echo wp_kses_post($item['Volunteer_position']); ?></div>
                                                    <?php $social_icon_one_link = $item['social_icon_one_link']['url']; if($social_icon_one_link) : ?>
                                                        <div class="social-links">
                                                            <ul class="clearfix">
                                                                <?php
                                                                
                                                                    $social_icon_one = $item['social_icon_one'];
                                                                    $social_icon_one_link_target = $item['social_icon_one_link']['is_external'] ? ' target=_blank' : '';
                                                                    $social_icon_one_link_nofollow = $item['social_icon_one_link']['nofollow'] ? ' rel=nofollow' : '';
                                                                
                                                                    $social_icon_two = $item['social_icon_two'];
                                                                    $social_icon_two_link = $item['social_icon_two_link']['url'];
                                                                    $social_icon_two_link_target = $item['social_icon_two_link']['is_external'] ? ' target=_blank' : '';
                                                                    $social_icon_two_link_nofollow = $item['social_icon_two_link']['nofollow'] ? ' rel=nofollow' : '';
                                                                
                                                                    $social_icon_three = $item['social_icon_three'];
                                                                    $social_icon_three_link = $item['social_icon_three_link']['url'];
                                                                    $social_icon_three_link_target = $item['social_icon_three_link']['is_external'] ? ' target=_blank' : '';
                                                                    $social_icon_three_link_nofollow = $item['social_icon_three_link']['nofollow'] ? ' rel=nofollow' : '';

                                                                ?>
                                                                <?php if($social_icon_one_link) : ?>
                                                                    <li>
                                                                        <a href="<?php echo esc_url($social_icon_one_link); ?>"  <?php echo esc_attr($social_icon_one_link_target . $social_icon_one_link_nofollow); ?>>
                                                                            <?php \Elementor\Icons_Manager::render_icon( $social_icon_one, [ 'aria-hidden' => 'true' ] ); ?>
                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>
                                                                <?php if($social_icon_two_link) : ?>
                                                                    <li>
                                                                        <a href="<?php echo esc_url($social_icon_two_link); ?>"  <?php echo esc_attr($social_icon_two_link_target . $social_icon_two_link_nofollow); ?>>
                                                                            <?php \Elementor\Icons_Manager::render_icon( $social_icon_two, [ 'aria-hidden' => 'true' ] ); ?>
                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>
                                                                <?php if($social_icon_three_link) : ?>
                                                                    <li>
                                                                        <a href="<?php echo esc_url($social_icon_three_link); ?>"  <?php echo esc_attr($social_icon_three_link_target . $social_icon_three_link_nofollow); ?>>
                                                                            <?php \Elementor\Icons_Manager::render_icon( $social_icon_three, [ 'aria-hidden' => 'true' ] ); ?>
                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                <?php } ?>
                            <?php endif; ?>
                            
                            
                            
                        </div><!--End Team Carousel-->
                        
                    </div>
                </section>
            <?php endif; ?>
            <?php if( $volunteer_design_list == 'style-three' ) : ?>
                <section class="team-section style-three">
                    <div class="bottom-rotten-curve"></div>
                    <div class="auto-container">
                        <div class="sec-title centered">
                            <?php headerSettings::getHeaderInfo($settings); ?>
                        </div>
                        <div class="row clearfix">
                            <?php if( $Volunteer_list ) : ?>
                                <?php foreach ( $Volunteer_list as $item ) { 
                                    $volunteer_images = ( $item['volunteer_images']['id'] != '' ) ? wp_get_attachment_url( $item['volunteer_images']['id'], 'full' ) : $item['volunteer_images']['url'];
                                    ?>
                                    <div class="team-block-two col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
                                            <figure class="image-box"><a href="#"><img  src="<?php echo esc_url($volunteer_images); ?>"  alt=""></a></figure>
                                            <div class="info-box">
                                                <h4 class="name"><a href="#"><?php echo wp_kses_post($item['Volunteer_name']); ?></a></h4>
                                                <span class="designation"><?php echo wp_kses_post($item['Volunteer_position']); ?></span>

                                                <?php $social_icon_one_link = $item['social_icon_one_link']['url']; if($social_icon_one_link) : ?>
                                                    <div class="social-links">
                                                        <ul>
                                                            <?php
                                                            
                                                                $social_icon_one = $item['social_icon_one'];
                                                                $social_icon_one_link_target = $item['social_icon_one_link']['is_external'] ? ' target=_blank' : '';
                                                                $social_icon_one_link_nofollow = $item['social_icon_one_link']['nofollow'] ? ' rel=nofollow' : '';
                                                            
                                                                $social_icon_two = $item['social_icon_two'];
                                                                $social_icon_two_link = $item['social_icon_two_link']['url'];
                                                                $social_icon_two_link_target = $item['social_icon_two_link']['is_external'] ? ' target=_blank' : '';
                                                                $social_icon_two_link_nofollow = $item['social_icon_two_link']['nofollow'] ? ' rel=nofollow' : '';
                                                            
                                                                $social_icon_three = $item['social_icon_three'];
                                                                $social_icon_three_link = $item['social_icon_three_link']['url'];
                                                                $social_icon_three_link_target = $item['social_icon_three_link']['is_external'] ? ' target=_blank' : '';
                                                                $social_icon_three_link_nofollow = $item['social_icon_three_link']['nofollow'] ? ' rel=nofollow' : '';

                                                            ?>
                                                            <?php if($social_icon_one_link) : ?>
                                                                <li>
                                                                    <a href="<?php echo esc_url($social_icon_one_link); ?>"  <?php echo esc_attr($social_icon_one_link_target . $social_icon_one_link_nofollow); ?>>
                                                                        <?php \Elementor\Icons_Manager::render_icon( $social_icon_one, [ 'aria-hidden' => 'true' ] ); ?>
                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($social_icon_two_link) : ?>
                                                                <li>
                                                                    <a href="<?php echo esc_url($social_icon_two_link); ?>"  <?php echo esc_attr($social_icon_two_link_target . $social_icon_two_link_nofollow); ?>>
                                                                        <?php \Elementor\Icons_Manager::render_icon( $social_icon_two, [ 'aria-hidden' => 'true' ] ); ?>
                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($social_icon_three_link) : ?>
                                                                <li>
                                                                    <a href="<?php echo esc_url($social_icon_three_link); ?>"  <?php echo esc_attr($social_icon_three_link_target . $social_icon_three_link_nofollow); ?>>
                                                                        <?php \Elementor\Icons_Manager::render_icon( $social_icon_three, [ 'aria-hidden' => 'true' ] ); ?>
                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <?php if( $volunteer_design_list == 'style-four' ) : ?>
                <section class="team-section-two">
                    <div class="auto-container">
                        <?php headerSettings::getHeaderInfo($settings); ?>
                        <div class="row">
                            <?php if( $Volunteer_list ) : ?>
                                <?php foreach ( $Volunteer_list as $item ) { 
                                $volunteer_images = ( $item['volunteer_images']['id'] != '' ) ? wp_get_attachment_url( $item['volunteer_images']['id'], 'full' ) : $item['volunteer_images']['url'];
                                ?>
                                    <div class="col-lg-4 team-block-three">
                                        <div class="inner-box">
                                            <div class="image">
                                                <img src="<?php echo esc_url($volunteer_images); ?>" alt="">
                                                <?php $social_icon_one_link = $item['social_icon_one_link']['url']; if($social_icon_one_link) : ?>
                                                    <div class="social-links">
                                                        <ul>
                                                            <?php
                                                            
                                                                $social_icon_one = $item['social_icon_one'];
                                                                $social_icon_one_link_target = $item['social_icon_one_link']['is_external'] ? ' target=_blank' : '';
                                                                $social_icon_one_link_nofollow = $item['social_icon_one_link']['nofollow'] ? ' rel=nofollow' : '';
                                                            
                                                                $social_icon_two = $item['social_icon_two'];
                                                                $social_icon_two_link = $item['social_icon_two_link']['url'];
                                                                $social_icon_two_link_target = $item['social_icon_two_link']['is_external'] ? ' target=_blank' : '';
                                                                $social_icon_two_link_nofollow = $item['social_icon_two_link']['nofollow'] ? ' rel=nofollow' : '';
                                                            
                                                                $social_icon_three = $item['social_icon_three'];
                                                                $social_icon_three_link = $item['social_icon_three_link']['url'];
                                                                $social_icon_three_link_target = $item['social_icon_three_link']['is_external'] ? ' target=_blank' : '';
                                                                $social_icon_three_link_nofollow = $item['social_icon_three_link']['nofollow'] ? ' rel=nofollow' : '';

                                                            ?>
                                                            <?php if($social_icon_one_link) : ?>
                                                                <li>
                                                                    <a href="<?php echo esc_url($social_icon_one_link); ?>"  <?php echo esc_attr($social_icon_one_link_target . $social_icon_one_link_nofollow); ?>>
                                                                        <?php \Elementor\Icons_Manager::render_icon( $social_icon_one, [ 'aria-hidden' => 'true' ] ); ?>
                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($social_icon_two_link) : ?>
                                                                <li>
                                                                    <a href="<?php echo esc_url($social_icon_two_link); ?>"  <?php echo esc_attr($social_icon_two_link_target . $social_icon_two_link_nofollow); ?>>
                                                                        <?php \Elementor\Icons_Manager::render_icon( $social_icon_two, [ 'aria-hidden' => 'true' ] ); ?>
                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($social_icon_three_link) : ?>
                                                                <li>
                                                                    <a href="<?php echo esc_url($social_icon_three_link); ?>"  <?php echo esc_attr($social_icon_three_link_target . $social_icon_three_link_nofollow); ?>>
                                                                        <?php \Elementor\Icons_Manager::render_icon( $social_icon_three, [ 'aria-hidden' => 'true' ] ); ?>
                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="lower-content">
                                                <h3><a href="#"><?php echo wp_kses_post($item['Volunteer_name']); ?></a></h3>
                                                <div class="designation"><?php echo wp_kses_post($item['Volunteer_position']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>




        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Volunteer_area() );