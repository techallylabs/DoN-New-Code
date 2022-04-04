<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/** 
 * Elementor donors list Donors_list__o
 * @since 1.0.0
*/

class Donors_list__o extends \Elementor\Widget_Base {
    public function get_name() {
        return 'dnors_list__o';
    }
    public function get_title(){
        return esc_html__( 'Donors list one', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    public function get_script_depends() {
        return ['owl-lib-loveus', 'owl-slider-loveus'];
    }
    public function get_style_depends() {
        return ['owl-carousel-loveus-me'];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'section_header',
            [
                'label' => esc_html__( 'Section Header Area', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        headerSettings::getHeaderSettings( $this );

        $this->end_controls_section();
        $this->start_controls_section(
            'mission_list',
            [
                'label' => esc_html__( 'Service List', 'plugin-name' ),
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
        $repeater->add_control(
            'mission_list_content',
            [
                'label' => esc_html__( 'Service single item content', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
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
            <!-- Recent Donors -->
            <section class="recent-donors-section">
                <div class="auto-container">
                    <?php headerSettings::getHeaderInfo($settings); ?>
                    <div class="love-carousel owl-theme owl-carousel" data-options='{"loop": false, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "2" }, "768" :{ "items" : "3" } , "800":{ "items" : "3" }, "1024":{ "items" : "4" }}}'>
                        <?php if( $mission_list_repeter ) : ?>
                            <?php foreach ( $mission_list_repeter as $item ) {
                                    $mission_bottom_img = ( $item['mission_bottom_img']['id'] != '' ) ? wp_get_attachment_url( $item['mission_bottom_img']['id'], 'full' ) : $item['mission_bottom_img']['url'];
                            ?>
                                <div class="slide-item">
                                    <div class="donor-block">
                                        <div class="inner-box">
                                            <figure class="image"><img src="<?php echo esc_url($mission_bottom_img); ?>" alt=""></figure>
                                            <h4><?php echo wp_kses_post($item['mission_list_title']); ?></h4>
                                            <div class="donation-info">
                                                <div class="title"><?php echo wp_kses_post($item['mission_list_subtitle']); ?></div>
                                                <div class="price"><?php echo wp_kses_post($item['mission_list_content']); ?></div>
                                            </div>
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
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Donors_list__o() );