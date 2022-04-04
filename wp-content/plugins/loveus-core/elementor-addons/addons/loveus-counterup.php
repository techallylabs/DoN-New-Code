<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/** 
 * Elementor Counter area one
 * @since 1.0.0
*/
class Counter_area__o extends \Elementor\Widget_Base {
    public function get_name() {
        return 'counter_area__o';
    }
    public function get_title(){
        return esc_html__( 'Counter area one', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
	public function get_script_depends() {
        return ['count-up-loveus'];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'counter_area_content',
            [
                'label' => esc_html__( 'Counter area Content', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        headerSettings::getHeaderSettings( $this );
        $this->add_control(
			'counter_area_style',
			[
				'label' => esc_html__( 'style', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style-none',
				'options' => [
					'style-none'  => esc_html__( 'One', 'plugin-domain' ),
					'style-two'  => esc_html__( 'Two', 'plugin-domain' ),
					'style-three'  => esc_html__( 'Three', 'plugin-domain' ),
					'style-four'  => esc_html__( 'Four', 'plugin-domain' ),
				],
			]
        );
        $this->add_control(
            'col_content',
            [
                'label' => __('collum text', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('number', 'plugin-name'),
                'default' => '3',
            ]
        );
        $repeater = new \Elementor\Repeater();
        getAnimationControl($repeater);
        $repeater->add_control(
            'counter_count_number',
            [
                'label' => __('Counter number', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('number here', 'plugin-name'),
            ]
        );
        $repeater->add_control(
            'counter_count_text',
            [
                'label' => __('Counter text', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('number text', 'plugin-name'),
            ]
        );
        $this->add_control(
            'counter_count_list',
            [
                'label' => __('Counter list', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $counter_count_list = $settings['counter_count_list'];
        $counter_area_style = $settings['counter_area_style'];
        $col_content = $settings['col_content'];
        ?>
            
            <!-- Funfacts Section -->
            <section class="facts-section <?php echo esc_attr($counter_area_style); ?>">
                <div class="auto-container">
                    <?php headerSettings::getHeaderInfo($settings); ?>
                    <div class="inner-container">
                    
                        <!-- Fact Counter -->
                        <div class="fact-counter">
                            <div class="row clearfix">
                                <?php if( $counter_count_list ) : ?>
                                    <?php foreach ( $counter_count_list as $item ) {
                                        $counter_count_number = $item['counter_count_number'];
                                        $counter_count_text = $item['counter_count_text'];
                                    ?>
                                        <div class="column counter-column col-md-6 col-sm-12 col-lg-<?php echo esc_attr($col_content); ?> ">
                                            <div class="inner wow <?php echo esc_attr($item['animation_class']); ?>" data-wow-delay="<?php echo esc_attr($item['animation_delay_time']); ?>ms" data-wow-duration="<?php echo esc_attr($item['animation_duration']); ?>ms">
                                                <div class="content">
                                                    <div class="count-outer count-box">
                                                        <span class="count-text" data-speed="2000" data-stop="<?php echo wp_kses_post($counter_count_number); ?>">0</span>
                                                    </div>
                                                    <div class="counter-title"><?php echo wp_kses_post($counter_count_text); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                 <?php } ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- End Funfacts Section -->
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Counter_area__o() );