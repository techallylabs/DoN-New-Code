<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/** 
 * Elementor Contact Us one Contact_us_one  contact_us_one
 * @since 1.0.0
*/
class Contact_us_one extends \Elementor\Widget_Base {
    public function get_name() {
        return 'contact_us_one';
    }
    public function get_title(){
        return esc_html__( 'Contact Us info', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'contact_us_info_header',
            [
                'label' => esc_html__( 'Contact Us info header', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        headerSettings::getHeaderSettings( $this );
        $this->end_controls_section();
        $this->start_controls_section(
            'contact_us_info',
            [
                'label' => esc_html__( 'Contact Us info box', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        getAnimationControl($repeater);
        $repeater->add_control(
            'mission_list_bg', [
                'label' => __( 'Contact Us single image', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'mission_list_icon',
            [
                'label' => __('Contact Us icon', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'mission_list_title',
            [
                'label' => esc_html__( 'Contact Us title', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $repeater->add_control(
            'mission_list_content',
            [
                'label' => esc_html__( 'Contact Us content', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $this->add_control(
            'mission_list_repeter', [
                'label' => esc_html__( 'Contact Us list', 'plugin-domain' ),
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
            <!--Contact Info Section-->
            <section class="contact-info-section">
                    <div class="auto-container">
                        <?php headerSettings::getHeaderInfo($settings); ?>
                        <div class="info-boxes">
                            <div class="row clearfix">
                                <?php if( $mission_list_repeter ) : ?>
                                    <?php foreach ( $mission_list_repeter as $item ) {
                                        $mission_list_bg = ( $item['mission_list_bg']['id'] != '' ) ? wp_get_attachment_url( $item['mission_list_bg']['id'], 'full' ) : $item['mission_list_bg']['url'];
                                        $mission_list_icon = $item['mission_list_icon'];
                                        $mission_list_title = $item['mission_list_title'];
                                        $mission_list_content = $item['mission_list_content'];
                                    ?>
                                        <div class="info-box col-lg-4 col-md-6 col-sm-12">
                                            <div class="inner-box wow <?php echo esc_attr($item['animation_class']); ?>" data-wow-delay="<?php echo esc_attr($item['animation_delay_time']); ?>ms" data-wow-duration="<?php echo esc_attr($item['animation_duration']); ?>ms">
                                                <div class="image-layer" style="background-image: url('<?php echo esc_url($mission_list_bg); ?>');"></div>
                                                <div class="icon-box"><?php \Elementor\Icons_Manager::render_icon( $mission_list_icon, [ 'aria-hidden' => 'true' ] ); ?></div>
                                                <h4><?php echo wp_kses_post( $mission_list_title); ?></h4>
                                                <?php echo wp_kses_post( $mission_list_content); ?>
                                            </div>
                                        </div>
                                        
                                    <?php } ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                    </div>
                </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Contact_us_one() );