<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/** 
 * Elementor Features_section_one Features_section_one
 * @since 1.0.0
*/
class Features_section_one extends \Elementor\Widget_Base {
    public function get_name() {
        return 'features_section_one';
    }
    public function get_title(){
        return esc_html__( 'Feature Section one', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'features_section_header',
            [
                'label' => esc_html__( 'Header', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        headerSettings::getHeaderSettings( $this );
        $this->end_controls_section();
        $this->start_controls_section(
            'features_section_content',
            [
                'label' => esc_html__( 'Content', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'features_img', [
                'label' => __( 'image', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'features_title',
            [
                'label' => esc_html__( 'All Donate Now', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'features_content',
            [
                'label' => esc_html__( 'All Donate Now', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );
        $this->add_control(
            'feature_item', [
                'label' => esc_html__( 'Features list', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $feature_item = $settings['feature_item'];
        ?>
            <section class="features-section">
                <div class="auto-container">
                    <?php headerSettings::getHeaderInfo($settings); ?>
                    <?php if( $feature_item ) : ?>
                        <div class="row">
                            <?php foreach ( $feature_item as $item ) { 
                                $features_title = $item['features_title'];
                                $features_content = $item['features_content'];
                                $features_img = ( $item['features_img']['id'] != '' ) ? wp_get_attachment_url( $item['features_img']['id'], 'full' ) : $item['features_img']['url'];
                            ?>
                            <div class="feature-block-one col-lg-4">
                                <div class="inner-box">
                                    <div class="icon"><img src="<?php echo esc_url( $features_img ); ?>" alt=""></div>
                                    <h4><?php echo wp_kses_post($features_title); ?></h4>
                                    <div class="text"><?php echo wp_kses_post($features_content); ?></div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Features_section_one() );