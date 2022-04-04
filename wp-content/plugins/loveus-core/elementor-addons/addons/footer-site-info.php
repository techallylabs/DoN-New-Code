<?php
/** 
 * Elementor Footer_site_info Footer_site_info
 * @since 1.0.0
*/
class Footer_site_info extends \Elementor\Widget_Base {
    public function get_name() {
        return 'footer_site_info';
    }
    public function get_title(){
        return esc_html__( 'Footer site info', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'footer_info',
            [
                'label' => esc_html__( 'Footer Content', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'background_images', [
                'label' => esc_html__( 'Logo image', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'background_images_link', [
                'label' => esc_html__( 'Logo link', 'plugin-domain' ),
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
            'site_info',
            [
                'label' => esc_html__( 'site info', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );        
        $this->end_controls_section();
        $this->start_controls_section(
            'social_icon_site',
            [
                'label' => esc_html__( 'Site Social Icon', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'social_icon_three', [
            'label' => __('Social icon', 'plugin-domain'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'placeholder' => __('Type your content here', 'plugin-domain'),
            ]
        );
        $repeater->add_control(
            'social_icon_three_link', [
                'label' => esc_html__( 'Social icon link', 'plugin-domain' ),
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
            'social_link', [
                'label' => esc_html__( 'Volunteer list', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        
        $background_images = ( $settings['background_images']['id'] != '' ) ? wp_get_attachment_url( $settings['background_images']['id'], 'full' ) : $settings['background_images']['url'];

        $button_link = $settings['background_images_link'];
        $button_link_url = $settings['background_images_link']['url'];
        $button_link_target = $settings['background_images_link']['is_external'] ? ' target=_blank' : '';
        $button_link_nofollow = $settings['background_images_link']['nofollow'] ? ' rel=nofollow' : '';
        $site_info = $settings['site_info'];
        $social_link = $settings['social_link'];
        ?>
            <div class="main-footer">
                <div class="column">
                    <div class="footer-widget logo-widget">
                        <div class="widget-content">
                            <div class="footer-logo">
                                <a href="<?php echo esc_url($button_link_url); ?>" class="theme-btn btn-style-one" <?php echo esc_attr($button_link_target . $button_link_nofollow); ?>>
                                    <img src="<?php echo esc_url($background_images); ?>" alt="img" />
                                </a>
                            </div>
                            <div class="text"><?php echo wp_kses_post($site_info); ?></div>
                            <ul class="social-links clearfix">
                                <?php if( $social_link ) : ?>
                                    <?php foreach ( $social_link as $item ) { 
                                        $social_icon_three = $item['social_icon_three'];
                                        $social_icon_three_link = $item['social_icon_three_link']['url'];
                                        $social_icon_three_link_target = $item['social_icon_three_link']['is_external'] ? ' target=_blank' : '';
                                        $social_icon_three_link_nofollow = $item['social_icon_three_link']['nofollow'] ? ' rel=nofollow' : '';
                                    ?>
                                        <li>
                                            <a href="<?php echo esc_url($social_icon_three_link); ?>"  <?php echo esc_attr($social_icon_three_link_target . $social_icon_three_link_nofollow); ?>>
                                                <?php \Elementor\Icons_Manager::render_icon( $social_icon_three, [ 'aria-hidden' => 'true' ] ); ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Footer_site_info() );