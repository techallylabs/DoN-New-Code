<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/** 
 * Elementor How it works How_it_works how_it_works
 * @since 1.0.0
*/
class How_it_works extends \Elementor\Widget_Base {
    public function get_name() {
        return 'how_it_works';
    }
    public function get_title(){
        return esc_html__( 'How it works', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'how_it_works_header',
            [
                'label' => esc_html__( 'How it works header', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'about_feature_style_list',
			[
				'label' => esc_html__( 'About feature style', 'plugin-domain' ),
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
            'about_upper_bg', [
                'label' => __( 'About icon image', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'about_feature_style_list' => 'style-four',
                ],
            ]
        );
        headerSettings::getHeaderSettings( $this );
        $this->add_control(
			'no_padding_top',
			[
				'label' => esc_html__('padding top', 'plugin-domain'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'padding-top-yes',
				'options' => [
					'no-padding-top'  => esc_html__( 'no', 'plugin-domain' ),
					'padding-top-yes' => esc_html__( 'yes', 'plugin-domain' ),
				],
			]
		);
        $this->end_controls_section();
        $this->start_controls_section(
            'about_feature_two',
            [
                'label' => esc_html__( 'Help list', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'mission_list_bg', [
                'label' => __( 'Help image', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'mission_list_title',
            [
                'label' => esc_html__( 'Help title', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $repeater->add_control(
            'mission_list_content',
            [
                'label' => esc_html__( 'Help content', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $repeater->add_control(
            'mission_list_text',
            [
                'label' => esc_html__( 'Help Title', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Donate Now', 'plugin-domain' ),
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $repeater->add_control(
            'mission_list_link', [
                'label' => esc_html__( 'Help link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'mission_list_repeter', [
                'label' => esc_html__( 'Help list', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $mission_list_repeter = $settings['mission_list_repeter'];
        $about_feature_style_list = $settings['about_feature_style_list'];
        $no_padding_top = $settings['no_padding_top'];
        $about_upper_bg = $settings['about_upper_bg'];
        ?>
            <!--How It Work Section-->
            <section class="how-it-works <?php echo esc_attr($no_padding_top . ' ' . $about_feature_style_list); ?> ">
            <?php if( $about_feature_style_list == 'style-none' ) : ?>
                <div class="circle-one"></div>
            <?php endif; ?>
            <?php if( $about_feature_style_list == 'style-four' ) : ?>
                <?php
                        $about_upper_bg = ( $settings['about_upper_bg']['id'] != '' ) ? wp_get_attachment_url( $settings['about_upper_bg']['id'], 'full' ) : $settings['about_upper_bg']['url'];
                    ?>
                <div class="sec-bg" style="background-image: url('<?php echo esc_url( $about_upper_bg ); ?>);"></div>
            <?php endif; ?>
                <div class="auto-container">
                    <?php headerSettings::getHeaderInfo($settings); ?>
                    <div class="row clearfix">
                    <?php if( $mission_list_repeter ) : ?>
                                <?php foreach ( $mission_list_repeter as $item ) {
                                    $mission_list_bg = ( $item['mission_list_bg']['id'] != '' ) ? wp_get_attachment_url( $item['mission_list_bg']['id'], 'full' ) : $item['mission_list_bg']['url'];
                                    $mission_list_title = $item['mission_list_title'];
                                    $mission_list_content = $item['mission_list_content'];
                                    
                                    $button_text = $item['mission_list_text'];
                                    $button_link = $item['mission_list_link'];
                                    $button_link_url = $item['mission_list_link']['url'];
                                    $button_link_target = $item['mission_list_link']['is_external'] ? ' target=_blank' : '';
                                    $button_link_nofollow = $item['mission_list_link']['nofollow'] ? ' rel=nofollow' : '';
                                ?>
                                <div class="process-block col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="<?php echo esc_url($mission_list_bg); ?>" alt="image"></figure>
                                        </div>
                                        <div class="lower-content">
                                            <h3>
                                                <a <?php echo esc_attr($button_link_target . $button_link_nofollow); ?> href="<?php echo esc_url($button_link_url); ?>">
                                                    <?php echo wp_kses_post( $mission_list_title); ?>
                                                </a>
                                            </h3>
                                            <div class="text"><?php echo wp_kses_post( $mission_list_content); ?></div>
                                            <div class="link-box"><a <?php echo esc_attr($button_link_target . $button_link_nofollow); ?> href="<?php echo esc_url($button_link_url); ?>" class="theme-btn btn-style-two"><span class="btn-title"><?php echo wp_kses_post($button_text); ?></span></a></div>
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

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \How_it_works() );