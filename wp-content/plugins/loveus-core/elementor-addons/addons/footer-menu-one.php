<?php
/** 
 * Elementor Footer_menu_one Footer_menu_one
 * @since 1.0.0
*/
class Footer_menu_one extends \Elementor\Widget_Base {
    public function get_name() {
        return 'footer_menu_one';
    }
    public function get_title(){
        return esc_html__( 'Footer link', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'footer_link',
            [
                'label' => esc_html__( 'Footer link list', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'footer_content_title',
            [
                'label' => esc_html__( 'Footer widget Title', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'social_icon_three_text',
            [
                'label' => esc_html__( 'Item text', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $repeater->add_control(
            'social_icon_three_link', [
                'label' => esc_html__( 'Item link', 'plugin-domain' ),
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
        $footer_content_title = $settings['footer_content_title'];
        $social_link = $settings['social_link'];
        ?>
            <div class="main-footer">
                <div class="column">
                    <div class="footer-widget links-widget">
                        <div class="widget-content">
                            <h3><?php echo wp_kses_post($footer_content_title); ?></h3>
                            <ul>
                                <?php if( $social_link ) : ?>
                                    <?php foreach ( $social_link as $item ) { 
                                        $social_icon_three_text = $item['social_icon_three_text'];
                                        $social_icon_three = $item['social_icon_three_link'];
                                        $social_icon_three_link = $item['social_icon_three_link']['url'];
                                        $social_icon_three_link_target = $item['social_icon_three_link']['is_external'] ? ' target=_blank' : '';
                                        $social_icon_three_link_nofollow = $item['social_icon_three_link']['nofollow'] ? ' rel=nofollow' : '';
                                    ?>
                                        <li>
                                            <a href="<?php echo esc_url($social_icon_three_link); ?>"  <?php echo esc_attr($social_icon_three_link_target . $social_icon_three_link_nofollow); ?>>
                                                <?php echo wp_kses_post($social_icon_three_text); ?>
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

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Footer_menu_one() );