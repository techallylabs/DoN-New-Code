<?php
/** 
 * Elementor Footer_button_menu Footer with button menu
 * @since 1.0.0
*/
class Footer_button_menu extends \Elementor\Widget_Base {
    public function get_name() {
        return 'footer_button_menu';
    }
    public function get_title(){
        return esc_html__( 'Footer Full width info', 'plugin-name' );
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
                'label' => esc_html__( 'Widget content', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'All Donate Now', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type your button title here', 'plugin-domain' ),
            ]
        );
        $this->add_control(
            'button_link', [
                'label' => esc_html__( 'All Donate Now link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
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
        $button_text = $settings['button_text'];
        $button_link = $settings['button_link'];
        $button_link_url = $settings['button_link']['url'];
        $button_link_target = $settings['button_link']['is_external'] ? ' target=_blank' : '';
        $button_link_nofollow = $settings['button_link']['nofollow'] ? ' rel=nofollow' : '';


        $social_link = $settings['social_link'];
        ?>
        <div class="main-footer">
        <div class="nav-box clearfix">
            <div class="inner clearfix">
                <ul class="footer-nav clearfix">
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
                
                <div class="donate-link">
                    <a href="<?php echo esc_url($button_link_url); ?>" class="theme-btn btn-style-one" <?php echo esc_attr($button_link_target . $button_link_nofollow); ?>><span class="btn-title"><?php echo wp_kses_post($button_text); ?></span>
                    </a>
                </div>
            </div>
        </div>
        </div>
        
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Footer_button_menu() );