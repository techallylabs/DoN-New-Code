<?php
/** 
 * Elementor Call to action Call to action Call_to_action call_to_action
 * @since 1.0.0
*/
class Call_to_action extends \Elementor\Widget_Base {
    public function get_name() {
        return 'call_to_action';
    }
    public function get_title(){
        return esc_html__( 'Call to action', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'call_to_action_content',
            [
                'label' => esc_html__( 'Call to action Content', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'content_section_two',
            [
                'label' => esc_html__( 'content section two', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $this->add_control(
            'button_two_text',
            [
                'label' => esc_html__( 'Button Title', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Book Tickets', 'plugin-domain' ),
                'placeholder' => esc_html__( 'Type your button title here', 'plugin-domain' ),
            ]
        );
        $this->add_control(
            'button_two_link', [
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
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();

        $content_section_two = $settings['content_section_two'];

        $button_text = $settings['button_two_text'];
        $button_link = $settings['button_two_link'];
        $button_link_url = $settings['button_two_link']['url'];
        $button_link_target = $settings['button_two_link']['is_external'] ? ' target=_blank' : '';
        $button_link_nofollow = $settings['button_two_link']['nofollow'] ? ' rel=nofollow' : '';
        ?>
            <!-- Call To Action Section -->
            <section class="call-to-action-two">
                <div class="auto-container">
                    <div class="inner clearfix">
                        <div class="title-box wow fadeInLeft" data-wow-delay="0ms"><h2><?php echo wp_kses_post($content_section_two); ?></h2></div>
                        <div class="link-box wow fadeInRight" data-wow-delay="0ms">
                            <a href="<?php echo esc_url($button_link_url); ?>" class="theme-btn btn-style-five" <?php echo esc_attr($button_link_target . $button_link_nofollow); ?>>
                                <span class="btn-title">
                                    <?php echo wp_kses_post($button_text); ?>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Gallery Section -->
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Call_to_action() );