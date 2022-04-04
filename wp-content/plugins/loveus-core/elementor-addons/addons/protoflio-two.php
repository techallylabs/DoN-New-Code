<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/** 
 * Elementor Protfolio_area_two Protfolio_area_two
 * @since 1.0.0
*/
class Protfolio_area_two extends \Elementor\Widget_Base {
    public function get_name() {
        return 'Protfolio_area_two';
    }
    public function get_title(){
        return esc_html__( 'Protfolio are two', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'protfolio_content_images',
            [
                'label' => esc_html__( 'protfolio', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'mission_bottom_img', [
                'label' => esc_html__( 'Service bottom image', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'mission_list_title',
            [
                'label' => esc_html__( 'Service single item title', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $repeater->add_control(
            'mission_list_subtitle',
            [
                'label' => esc_html__( 'Service single item subtitle', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $this->add_control(
            'mission_list_repeter', [
                'label' => esc_html__( 'Service feature list', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $mission_list_repeter = $settings['mission_list_repeter'];
        ?>
            <section class="portfolio-section">
                <div class="auto-container">
                    <div class="row">
                        <?php if( $mission_list_repeter ) : ?>
                            <?php foreach ( $mission_list_repeter as $item ) {
                                    $mission_bottom_img = ( $item['mission_bottom_img']['id'] != '' ) ? wp_get_attachment_url( $item['mission_bottom_img']['id'], 'full' ) : $item['mission_bottom_img']['url'];
                            ?>
                                <div class="col-lg-4 col-md-6 portfolio-block">
                                    <div class="inner-box">
                                        <div class="image"><img src="<?php echo esc_url($mission_bottom_img); ?>" alt=""></div>
                                        <div class="overlay">
                                            <h5><?php echo wp_kses_post($item['mission_list_title']); ?></h5>
                                            <h4><?php echo wp_kses_post($item['mission_list_subtitle']); ?></h4>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Protfolio_area_two() );