<?php
/** 
 * Elementor Insta gallery one Insta_gallery_one insta_gallery_one
 * @since 1.0.0
*/
class Insta_gallery_one extends \Elementor\Widget_Base {
    public function get_name() {
        return 'insta_gallery_one';
    }
    public function get_title(){
        return esc_html__( 'Insta gallery one', 'plugin-name' );
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
            'insta_gallery_content',
            [
                'label' => esc_html__( 'insta gallery content', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'insta_gallery_image', [
                'label' => esc_html__( 'insta gallery single image', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'insta_gallery_list', [
                'label' => esc_html__( 'Slider', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );        
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $insta_gallery_list = $settings['insta_gallery_list'];
        ?>
        <!-- Insta Gallery Section -->
        <section class="insta-gallery">
            <div class="insta-gallery-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 500, "responsive":{ "0" :{ "items": "1" },"600" :{ "items": "2" }, "768" :{ "items" : "3" }, "1024":{ "items" : "4" }, "1366":{ "items" : "4" }, "1500":{ "items" : "5" }, "1920":{ "items" : "6" }}}'>
                <?php if( $insta_gallery_list ) : ?>
                    <?php foreach ( $insta_gallery_list as $item ) {
                            $insta_gallery_image = ( $item['insta_gallery_image']['id'] != '' ) ? wp_get_attachment_url( $item['insta_gallery_image']['id'], 'full' ) : $item['insta_gallery_image']['url'];
                    ?>
                        <!-- Gallery Item -->
                        <div class="gallery-item">
                            <div class="image-box">
                                <figure class="image">
                                    <img src="<?php echo esc_url($insta_gallery_image); ?>" alt="">
                                </figure>
                                <div class="overlay-box"><a href="<?php echo esc_url($insta_gallery_image); ?>" class="lightbox-image" data-fancybox="gallery"><span class="icon flaticon-instagram"></span></a></div>
                            </div>
                        </div>
                    <?php } ?>
                <?php endif; ?>
            </div>
        </section>
        <!--End Gallery Section -->
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Insta_gallery_one() );