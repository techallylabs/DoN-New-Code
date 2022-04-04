<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/** 
 * Elementor Mission area one Service
 * @since 1.0.0
*/

class Mission_slider__o extends \Elementor\Widget_Base {
    public function get_name() {
        return 'mission_area__o';
    }
    public function get_title(){
        return esc_html__( 'mission area one', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'service_design_area',
            [
                'label' => esc_html__( 'Service design area', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'service_design_list',
			[
				'label' => esc_html__( 'Service design list', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style-none',
				'options' => [
					'style-none'  => esc_html__( 'One', 'plugin-domain' ),
					'style-two'  => esc_html__( 'Two', 'plugin-domain' ),
					'style-three'  => esc_html__( 'Three', 'plugin-domain' ),
					'style-four'  => esc_html__( 'four', 'plugin-domain' ),
					'style-five'  => esc_html__( 'Five', 'plugin-domain' ),
					'style-six'  => esc_html__( 'Six', 'plugin-domain' ),
				],
			]
        );
        $this->end_controls_section();
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
			'mission_list_col',
			[
				'label' => esc_html__( 'Mission list col', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'col-xl-3',
				'options' => [
					'col-xl-3'  => esc_html__( 'Four', 'plugin-domain' ),
					'col-xl-4'  => esc_html__( 'Three', 'plugin-domain' ),
				],
			]
        );
        $repeater->add_control(
			'mission_list_alingment',
			[
				'label' => esc_html__( 'text Position', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  => esc_html__( 'Left', 'plugin-domain' ),
					'centered' => esc_html__( 'Center', 'plugin-domain' ),
					'right' => esc_html__( 'Right', 'plugin-domain' ),
				],
			]
		);
        $repeater->add_control(
            'mission_list_icon',
            [
                'label' => __('Service single item icon', 'plugin-domain'),
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
                'label' => esc_html__( 'Service single item title', 'plugin-domain' ),
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
        $this->start_controls_section(
            'mission_bottom_bg',
            [
                'label' => esc_html__( 'Service images', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'mission_bottom_img', [
                'label' => esc_html__( 'Service bottom image', 'plugin-domain' ),
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
        
        $service_design_list = $settings['service_design_list'];



        $mission_list_repeter = $settings['mission_list_repeter'];

        
        $mission_bottom_img = ( $settings['mission_bottom_img']['id'] != '' ) ? wp_get_attachment_url( $settings['mission_bottom_img']['id'], 'full' ) : $settings['mission_bottom_img']['url'];
        ?>
            <?php if( $service_design_list == 'style-none' ) : ?>
            <!-- one -->
            <section class="what-we-do">
                <div class="auto-container">
                    <?php headerSettings::getHeaderInfo($settings); ?>
                    <div class="row clearfix">
                        <?php if( $mission_list_repeter ) : ?>
                            <?php foreach ( $mission_list_repeter as $item ) { ?>
                                <!--Service Block-->
                                <div class="service-block <?php echo esc_attr( $item['mission_list_col'] ); ?> col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner-box <?php echo esc_attr( $item['mission_list_alingment'] ); ?>">
                                        <div class="icon-box">
                                            <?php \Elementor\Icons_Manager::render_icon( $item['mission_list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                        </div>
                                        <h3><?php echo wp_kses_post($item['mission_list_title']); ?></h3>
                                        <div class="text"><?php echo wp_kses_post($item['mission_list_content']); ?></div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php endif; ?>
                    </div>
                    <?php if($mission_bottom_img) :?>
                        <div class="bottom-image"><img src="<?php echo esc_url($mission_bottom_img); ?>" alt="about"></div>
                    <?php endif; ?>
                </div>
            </section>
            <!-- one -->
            <?php endif; ?>
            <?php if( $service_design_list == 'style-two' ) : ?>
                <!--What We Do Section / Style Two-->
                <section class="what-we-do style-two">
                    <div class="image-layer" style="background-image: url('<?php echo esc_url($mission_bottom_img); ?>')"></div>
                    <div class="top-rotten-curve"></div>
                    <div class="bottom-rotten-curve"></div>
                    
                    <div class="auto-container">
                        <div class="row clearfix">
                            <div class="title-column col-xl-6 col-lg-12 col-sm-12">
                                <div class="inner">
                                    <?php headerSettings::getHeaderInfo($settings); ?>
                                </div>
                            </div>
                            
                            <div class="content-column col-xl-6 col-lg-12 col-sm-12">        
                                <div class="row clearfix">
                                    <?php if( $mission_list_repeter ) : ?>
                                        <?php foreach ( $mission_list_repeter as $item ) { ?>
                                            <!--Service Block-->
                                            <div class="service-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="icon-box"><?php \Elementor\Icons_Manager::render_icon( $item['mission_list_icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
                                                    <h3><?php echo wp_kses_post($item['mission_list_title']); ?></h3>
                                                    <div class="text"><?php echo wp_kses_post($item['mission_list_content']); ?></div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </section>
            <?php endif; ?>
            <?php if( $service_design_list == 'style-three' ) : ?>
                <section class="what-we-do style-two centered-style">
                    <div class="top-rotten-curve"></div>
                    <div class="bottom-rotten-curve"></div>
                    
                    <div class="auto-container">
                        <?php headerSettings::getHeaderInfo($settings); ?>
                        <div class="row clearfix">
                            <?php if( $mission_list_repeter ) : ?>
                                <?php foreach ( $mission_list_repeter as $item ) { ?>
                                    <!--Service Block-->
                                    <div class="service-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                                        <div class="inner-box">
                                            <div class="icon-box"><?php \Elementor\Icons_Manager::render_icon( $item['mission_list_icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
                                            <h3><?php echo wp_kses_post($item['mission_list_title']); ?></h3>
                                            <div class="text"><?php echo wp_kses_post($item['mission_list_content']); ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <?php if( $service_design_list == 'style-five' ) : ?>
                <section class="what-we-do style-four no-bg" >
                    <div class="auto-container">
                        <div class="row clearfix">
                            <?php if( $mission_list_repeter ) : ?>
                                <?php foreach ( $mission_list_repeter as $item ) { ?>
                                    <!--Service Block-->
                                    <div class="service-block style-three col-lg-3 col-md-6 col-sm-12">
                                        <div class="inner-box">
                                            <div class="icon-box"><?php \Elementor\Icons_Manager::render_icon( $item['mission_list_icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
                                            <h3><?php echo wp_kses_post($item['mission_list_title']); ?></h3>
                                            <div class="text"><?php echo wp_kses_post($item['mission_list_content']); ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <?php if( $service_design_list == 'style-four' ) : ?>
                <!--What We Do Section -->
                <section class="what-we-do-two">
                    <div class="top-rotten-curve"></div>
                    <div class="bottom-rotten-curve"></div>

                    <div class="auto-container">
                        <?php headerSettings::getHeaderInfo($settings); ?>
                        <?php if( $mission_list_repeter ) : ?>
                            <div class="row clearfix">
                                <?php foreach ( $mission_list_repeter as $item ) { ?>
                                    <div class="service-block col-lg-4 col-md-6 col-sm-12">
                                        <div class="inner-box">
                                            <div class="icon-box"><?php \Elementor\Icons_Manager::render_icon( $item['mission_list_icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
                                            <h3><?php echo wp_kses_post($item['mission_list_title']); ?></h3>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>     
                        <?php endif; ?>
                    </div>
                    </section>
            <?php endif; ?>
            <?php if( $service_design_list == 'style-six' ) : ?>
                <section class="what-we-do style-six">
                    <div class="auto-container">
                        <?php if( $mission_list_repeter ) : ?>
                            <div class="row clearfix">
                                <?php foreach ( $mission_list_repeter as $item ) { ?>
                                    <div class="service-block style-six col-lg-3 col-md-6 col-sm-12">
                                        <div class="inner-box">
                                            <div class="icon-box"><?php \Elementor\Icons_Manager::render_icon( $item['mission_list_icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
                                            <h3><?php echo wp_kses_post($item['mission_list_title']); ?></h3>
                                            <div class="text"><?php echo wp_kses_post($item['mission_list_content']); ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>
        <?php
    }
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mission_slider__o() );