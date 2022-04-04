<?php
/** 
 * Elementor About_area_three about_area_three
 * @since 1.0.0
*/
class About_area_three extends \Elementor\Widget_Base {
    public function get_name() {
        return 'about_area_three';
    }
    public function get_title(){
        return esc_html__( 'About are three', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'about_content_video',
            [
                'label' => esc_html__( 'video', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
        $this->start_controls_section(
            'about_content_list_item',
            [
                'label' => esc_html__( 'content list', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        getAnimationControl($repeater);
        $repeater->add_control(
            'about_feature_icon',
            [
                'label' => __('About feature icon', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'about_feature_title',
            [
                'label' => esc_html__( 'About feature title', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $repeater->add_control(
            'about_feature_link', [
                'label' => esc_html__( 'About feature link', 'plugin-domain' ),
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
            'about_feature_list', [
                'label' => esc_html__( 'About feature list', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $video_background = ( $settings['video_background']['id'] != '' ) ? wp_get_attachment_url( $settings['video_background']['id'], 'full' ) : $settings['video_background']['url'];
        $video_link = $settings['video_link']['url'];

        $about_feature_list = $settings['about_feature_list'];
        ?>
             <section class="about-section-three">
                <div class="auto-container">
                    <div class="row clearfix">
                        <!--Left Column-->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner wow fadeInLeft" data-wow-delay="0ms">
                                <figure class="image-box">
                                    <img src="<?php echo esc_url($video_background); ?>" alt="">
                                    <a href="<?php echo esc_url($video_link); ?>" class="lightbox-image over-link">
                                        <?php \Elementor\Icons_Manager::render_icon( $settings['video_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </a>
                                </figure>
                            </div>
                        </div>
                        <!--Right Column-->
                        <div class="right-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner">
                                <?php if( $about_feature_list ) : ?>
                                    <div class="row clearfix">
                                        <?php foreach ( $about_feature_list as $item ) { ?>
                                            <!--About Feature-->
                                            <div class="about-feature col-md-6 col-sm-12">
                                                <div class="inner-box wow <?php echo esc_attr($item['animation_class']); ?>" data-wow-delay="<?php echo esc_attr($item['animation_delay_time']); ?>ms" data-wow-duration="<?php echo esc_attr($item['animation_duration']); ?>ms">
                                                    <div class="icon-box">
                                                        <?php \Elementor\Icons_Manager::render_icon( $item['about_feature_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                    </div>
                                                    <h4><?php echo wp_kses_post($item['about_feature_title']); ?></h4>
                                                    <a 
                                                        href="<?php echo esc_url($item['about_feature_link']['url']); ?>"
                                                        class="over-link"
                                                        <?php
                                                            $target = $item['about_feature_link']['is_external'] ? ' target=_blank' : '';
                                                            $nofollow = $item['about_feature_link']['nofollow'] ? ' rel=nofollow' : '';
                                                            echo esc_attr($target . $nofollow);
                                                        ?>
                                                    >
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \About_area_three() );