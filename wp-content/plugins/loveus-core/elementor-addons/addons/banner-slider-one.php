<?php
/** 
 * Elementor Banner slider one
 * @since 1.0.0
*/
class Banner_slider__o extends \Elementor\Widget_Base {
    public function get_name() {
        return 'banner_slider__o';
    }
    public function get_title(){
        return esc_html__( 'Banner Slider one', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
	public function get_script_depends() {
        return ['owl-lib-loveus', 'owl-slider-loveus'];
    }
    public function get_style_depends() {
        return ['owl-carousel-loveus-me'];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'banner_slider_content',
            [
                'label' => esc_html__( 'Banner Slider Content', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'banner_slider_style',
			[
				'label' => esc_html__( 'Banner Slider Designs', 'plugin-domain' ),
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
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'slider_background_images', [
                'label' => __( 'Background image', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'banner_opacity_overlay',
            [
				'label' => esc_html__( 'Banner opacity overlay', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '.5' ),
			]
        );
        $repeater->add_control(
            'banner_title',
            [
				'label' => esc_html__( 'Banner Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'You Can Help <br/> The Poor' ),
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
			]
        );
        $repeater->add_control(
            'banner_content',
            [
                'label' => esc_html__( 'Banner content', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', 'plugin-domain' ),
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $repeater->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Title', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Donate Now', 'plugin-domain' ),
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $repeater->add_control(
            'button_text_link', [
                'label' => esc_html__( 'Button link', 'plugin-domain' ),
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
            'curved_layer',
            [
                'label' => esc_html__('Hide or Show', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'plugin-domain'),
                'label_off' => __('Hide', 'plugin-domain'),
                'return_value' => 'no'
            ]
        );
        $this->add_control(
            'slider_list', [
                'label' => esc_html__( 'Slider list', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $banner_slider_style = $settings['banner_slider_style'];
        $slider_list = $settings['slider_list'];

        $slider_btn_class = 'btn-style-one';
        if($banner_slider_style == 'style-three') {
            $slider_btn_class = 'btn-style-five';
        }
        ?>
            <!-- Banner Section -->
            <section class="banner-section <?php echo esc_attr($banner_slider_style); ?>">
                <div class="banner-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>
                    <?php if( $slider_list ) : ?>
                        <?php foreach ( $slider_list as $item ) {
                            $item_img = ( $item['slider_background_images']['id'] != '' ) ? wp_get_attachment_url( $item['slider_background_images']['id'], 'full' ) : $item['slider_background_images']['url'];
                        ?>
                            <div class="slide-item ">
                                <div style="opacity: <?php echo esc_attr($item['banner_opacity_overlay'])?>; background-image: url('<?php echo esc_url($item_img); ?>')"  class="image-layer "></div>
                                <?php if($item['curved_layer'] == 'no') : ?>
                                    <div class="curved-layer"></div>
                                <?php endif; ?>
                                <div class="auto-container">
                                    <div class="content-box">
                                        <h2><?php echo wp_kses_post($item['banner_title']); ?></h2>
                                        <div class="text"><?php echo wp_kses_post($item['banner_content']); ?></div>

                                        <?php
                                        if (!empty($item['button_text'])) { ?>
                                        <div class="btn-box">
                                            <a 
                                                class="theme-btn <?php echo esc_attr($slider_btn_class); ?>"
                                                href="<?php echo esc_url($item['button_text_link']['url']); ?>"
                                                <?php
                                                    $target = $item['button_text_link']['is_external'] ? ' target=_blank' : '';
                                                    $nofollow = $item['button_text_link']['nofollow'] ? ' rel=nofollow' : '';
                                                    echo esc_attr($target . $nofollow);
                                                ?>>
                                                <span class="btn-title"><?php echo wp_kses_post($item['button_text']); ?></span>
                                            </a>    
                                        </div> 

                                        <?php }
                                        ?>
                                       
                                    </div>  
                                </div>
                            </div>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </section>
            <!--End Banner Section -->
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Banner_slider__o() );