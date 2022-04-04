<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/** 
 * Elementor About_area_two about_area_two
 * @since 1.0.0
*/
class About_area_two extends \Elementor\Widget_Base {
    public function get_name() {
        return 'about_area_two';
    }
    public function get_title(){
        return esc_html__( 'About are two', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'about_content_header',
            [
                'label' => esc_html__( 'Header', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        headerSettings::getHeaderSettings( $this );
        $this->end_controls_section();
        $this->start_controls_section(
            'about_content_images',
            [
                'label' => esc_html__( 'Images', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'about_content_images_upload', [
                'label' => __( 'About image', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $about_content_images_upload = ( $settings['about_content_images_upload']['id'] != '' ) ? wp_get_attachment_url( $settings['about_content_images_upload']['id'], 'full' ) : $settings['about_content_images_upload']['url'];
        ?>
            <section class="about-section-two">
                <div class="auto-container">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php headerSettings::getHeaderInfo($settings); ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="image"><img src="<?php echo esc_url( $about_content_images_upload ); ?>" alt=""></div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \About_area_two() );