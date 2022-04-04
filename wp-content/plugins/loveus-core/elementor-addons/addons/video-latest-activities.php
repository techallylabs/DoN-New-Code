<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/** 
 * Elementor Video latest activities Video_latest_activities video_latest_activities
 * @since 1.0.0
*/
class Video_latest_activities extends \Elementor\Widget_Base {
    public function get_name() {
        return 'video_latest_activities';
    }
    public function get_title(){
        return esc_html__( 'Video latest activities', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'video_header_area',
            [
                'label' => esc_html__( 'Video header area', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        headerSettings::getHeaderSettings( $this );

        $this->end_controls_section();

        $this->start_controls_section(
            'video_area_content',
            [
                'label' => esc_html__( 'Video area content', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'video_area_style',
			[
				'label' => esc_html__( 'Video area Designs', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style-none',
				'options' => [
					'style-none'  => esc_html__( 'One', 'plugin-domain' ),
					'style-two'  => esc_html__( 'Two', 'plugin-domain' ),
				],
			]
        );
        $this->add_control(
            'video_area_to_btn',
            [
                'label' => esc_html__('Video area top and bottom pattern', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Disable', 'plugin-domain'),
                'label_off' => __('Enable', 'plugin-domain'),
                'return_value' => 'no',
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'video_area_background', [
                'label' => esc_html__( 'Video area background', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'video_background', [
                'label' => esc_html__( 'Video background', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'video_link', [
                'label' => esc_html__( 'Video youtube url', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'video_icon',
            [
                'label' => __('Video play icon', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        
        $video_area_style =  $settings['video_area_style'];
        $video_area_to_btn =  $settings['video_area_to_btn'];
        $video_area_background = ( $settings['video_area_background']['id'] != '' ) ? wp_get_attachment_url( $settings['video_area_background']['id'], 'full' ) : $settings['video_area_background']['url'];
        $video_background = ( $settings['video_background']['id'] != '' ) ? wp_get_attachment_url( $settings['video_background']['id'], 'full' ) : $settings['video_background']['url'];
        $video_link = $settings['video_link']['url'];
        ?>
            <!--Video Section-->
            <section class="video-section <?php echo esc_attr($video_area_style); ?>">
                <?php if ($video_area_to_btn == 'yes') : ?>
                    <div class="circle-one"></div>
                    <div class="circle-two"></div>
                    <div class="top-rotten-curve"></div>
                    <div class="bottom-rotten-curve"></div>
                <?php endif; ?>
                <?php if($video_area_background) : ?>
                    <div class="image-layer wow slideInLeft" data-wow-delay="500ms"><div class="bg-image" style="background-image:url(<?php echo esc_url($video_area_background); ?>);"></div></div>
                <?php endif; ?>
                
                <div class="auto-container">
                    <div class="row clearfix">
                        <!--Text Column-->
                        <div class="text-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner">
                                <?php headerSettings::getHeaderInfo($settings); ?>
                            </div>
                        </div>
                        <!--Image Column-->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner wow fadeInLeft" data-wow-delay="0ms">
                                <figure class="image-box">
                                    <img src="<?php echo esc_url($video_background); ?>"  alt="">
                                    <a href="<?php echo esc_url($video_link); ?>" class="lightbox-image over-link new-style-icon">
                                        <?php \Elementor\Icons_Manager::render_icon( $settings['video_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </a>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Video_latest_activities() );