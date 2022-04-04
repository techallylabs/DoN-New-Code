<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/** 
 * Elementor Feature_section_two feature_section_two feature
 * @since 1.0.0
*/
class Feature_section_two extends \Elementor\Widget_Base {
    public function get_name() {
        return 'feature_section_two';
    }
    public function get_title(){
        return esc_html__( 'Feature are two', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'feature_content_header',
            [
                'label' => esc_html__( 'Header', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        headerSettings::getHeaderSettings( $this );
        $this->end_controls_section();
        $this->start_controls_section(
            'feature_content_images',
            [
                'label' => esc_html__( 'Images', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'feature_content_images_upload', [
                'label' => __( 'feature image', 'plugin-domain' ),
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
        $feature_content_images_upload = ( $settings['feature_content_images_upload']['id'] != '' ) ? wp_get_attachment_url( $settings['feature_content_images_upload']['id'], 'full' ) : $settings['feature_content_images_upload']['url'];
        ?>
            <section class="features-section-two">
                <div class="auto-container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="image"><img src="<?php echo esc_url( $feature_content_images_upload ); ?>" alt=""></div>
                        </div>
                        <div class="col-lg-6 pl-lg-5">
                            <?php headerSettings::getHeaderInfo($settings); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Feature_section_two() );