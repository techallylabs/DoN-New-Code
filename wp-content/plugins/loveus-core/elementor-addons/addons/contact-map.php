<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/** 
 * Elementor Contact Us two Contact_us_two  contact_us_two
 * @since 1.0.0
*/
class Contact_us_two extends \Elementor\Widget_Base {
    public function get_name() {
        return 'contact_us_two';
    }
    public function get_title(){
        return esc_html__( 'Contact Us map box', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'contact_us_form_header',
            [
                'label' => esc_html__( 'Contact Us form header', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        headerSettings::getHeaderSettings( $this );
        $this->end_controls_section();
        $this->start_controls_section(
            'contact_us_form',
            [
                'label' => esc_html__( 'Contact Us form', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'contact_us_form_code',
            [
                'label' => esc_html__( 'Contact us form short code', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'placeholder' => esc_html__( 'Type your here', 'plugin-domain' ),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'map_contyent_canv',[
                'label' => __( 'Map canvace info', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'data_zoom',[
				'label' => __( 'Map Iframe code', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'conten here', 'plugin-domain' ),
			]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $contact_us_form_code = $settings['contact_us_form_code'];
        $data_zoom = $settings['data_zoom'];
        ?>
            <!--Contact Section-->
            <section class="contact-section">
                <div class="outer-container clearfix">
                    
                    <div class="form-column clearfix">
                        <div class="inner clearfix">
                            <?php headerSettings::getHeaderInfo($settings); ?>  
                            <!-- Contact Form-->
                            <div class="contact-form">
                                <?php echo do_shortcode($contact_us_form_code); ?>
                            </div>
                        </div>
                    </div>
                    <div class="map-column clearfix">
                        <div class="map-canvas">
                            <?php echo $data_zoom; ?>
                        </div>
                    </div>
                    
                </div>
            </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Contact_us_two() );


