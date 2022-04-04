<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/** 
 * Elementor donors list Loveus_sponsors__o
 * @since 1.0.0
*/

class Loveus_sponsors__o extends \Elementor\Widget_Base {
    public function get_name() {
        return 'loveus_sponsors__o';
    }
    public function get_title(){
        return esc_html__( 'Loveus sponsors', 'plugin-name' );
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
            'mission_list',
            [
                'label' => esc_html__( 'sponsors List', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'mission_bottom_img', [
                'label' => esc_html__( 'sponsors image', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'mission_list_repeter', [
                'label' => esc_html__( 'sponsors list', 'plugin-domain' ),
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
            <section class="sponsors-section">
                <div class="auto-container">
                    <!--Sponsors Carousel-->
                    <div class="love-carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 40, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "2" }, "768" :{ "items" : "3" } , "800":{ "items" : "3" }, "1024":{ "items" : "4" }}}'>
                        <?php if( $mission_list_repeter ) : ?>
                            <?php foreach ( $mission_list_repeter as $item ) { 
                                
                                $mission_bottom_img = ( $item['mission_bottom_img']['id'] != '' ) ? wp_get_attachment_url( $item['mission_bottom_img']['id'], 'full' ) : $item['mission_bottom_img']['url'];
                                ?>
                                <div class="slide-item"><figure class="image-box"><a href="#"><img src="<?php echo esc_url($mission_bottom_img); ?>" alt=""></a></figure></div>
                            <?php } ?>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php
    }
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Loveus_sponsors__o() );