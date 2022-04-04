<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/** 
 * Elementor How it works Loveus_review_are how_it_works
 * @since 1.0.0
*/
class Loveus_review_are extends \Elementor\Widget_Base {
    public function get_name() {
        return 'loveus_review_are';
    }
    public function get_title(){
        return esc_html__( 'Review area', 'plugin-name' );
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
            'loveus_review_are_header',
            [
                'label' => esc_html__( 'Review header', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        headerSettings::getHeaderSettings( $this );
        $this->end_controls_section();
        $this->start_controls_section(
            'loveus_review_are_list',
            [
                'label' => esc_html__( 'review list', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'loveus_review_bg', [
                'label' => __( 'review image', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'loveus_review_title',
            [
                'label' => esc_html__( 'review title', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $repeater->add_control(
            'loveus_review_position',
            [
                'label' => esc_html__( 'review postition', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $repeater->add_control(
            'loveus_review_content',
            [
                'label' => esc_html__( 'review content', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $this->add_control(
            'loveus_review_list', [
                'label' => esc_html__( 'review list', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $loveus_review_list = $settings['loveus_review_list'];
        ?>

    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <div class="auto-container">
            <?php headerSettings::getHeaderInfo($settings); ?>
            <?php if( $loveus_review_list ) : ?>
            <div class="testimonial-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 500, "responsive":{ "0" :{ "items": "1" },"600" :{ "items": "1" }, "800" :{ "items" : "1" }, "1024":{ "items" : "1" }, "1366":{ "items" : "1" }}}'>
                <?php foreach ( $loveus_review_list as $item ) {
                    $loveus_review_bg = ( $item['loveus_review_bg']['id'] != '' ) ? wp_get_attachment_url( $item['loveus_review_bg']['id'], 'full' ) : $item['loveus_review_bg']['url'];
                    $loveus_review_title = $item['loveus_review_title'];
                    $loveus_review_position = $item['loveus_review_position'];
                    $loveus_review_content = $item['loveus_review_content'];
                ?>
                    <div class="testimonial-block-one">
                        <div class="inner-box">
                            <div class="image">
                                <img src="<?php echo esc_url($loveus_review_bg)?>" alt="">
                            </div>
                            <div class="text"><?php echo wp_kses_post($loveus_review_content); ?></div>
                            <h3><?php echo wp_kses_post($loveus_review_title); ?>  <span> <?php echo wp_kses_post($loveus_review_position); ?></span></h3>
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

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Loveus_review_are() );