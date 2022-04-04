<?php
/** 
 * Elementor Footer_contact_info Footer_contact_info
 * @since 1.0.0
*/
class Footer_contact_info extends \Elementor\Widget_Base {
    public function get_name() {
        return 'footer_contact_info';
    }
    public function get_title(){
        return esc_html__( 'Footer contact info', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'footer_contact',
            [
                'label' => esc_html__( 'Footer contact info', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'footer_contact_title',
            [
                'label' => esc_html__( 'Footer widget Title', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $this->add_control(
            'footer_contact_list',
            [
                'label' => esc_html__( 'Banner content', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $footer_contact_title = $settings['footer_contact_title'];
        $footer_contact_list = $settings['footer_contact_list'];
        ?>
            <div class="main-footer">
                <div class="column">
                    <div class="footer-widget info-widget">
                        <div class="widget-content">
                        <h3><?php echo wp_kses_post($footer_contact_title); ?></h3>
                        <?php echo wp_kses_post($footer_contact_list); ?>
                        </div>	
                    </div>
                </div>
            </div>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Footer_contact_info() );