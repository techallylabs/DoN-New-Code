<?php
/** 
 * Elementor Top News 
 * @since 1.0.0
*/
class Footer_news__o extends \Elementor\Widget_Base {
    public function get_name() {
        return 'footer_news__o';
    }
    public function get_title(){
        return esc_html__( 'Footer New area', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-object-ungroup';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'footer_news_content',
            [
                'label' => esc_html__( 'Footer News', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'footer_content_title',
            [
                'label' => esc_html__( 'Footer widget Title', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'pop_images', [
                'label' => esc_html__( 'Post image', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'pop_title',
            [
                'label' => esc_html__( 'Post title', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
            ]
        );
        $repeater->add_control(
            'pop_link', [
                'label' => esc_html__( 'post link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
			'pop_date',
			[
				'label' => __( 'Post Date', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
			]
		);
        $this->add_control(
            'pop_post_list', [
                'label' => esc_html__( 'Post List', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );        
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $footer_content_title = $settings['footer_content_title'];
        $pop_post_list = $settings['pop_post_list'];
        ?>
            <div class="main-footer">
                <div class="column">
                    <div class="footer-widget news-widget">
                        <div class="widget-content">
                            <h3><?php echo wp_kses_post($footer_content_title); ?></h3>
                            <?php if( $pop_post_list ) : ?>
                                <?php foreach ( $pop_post_list as $item ) {
                                    $pop_date = $item['pop_date'];
                                    $pop_title = $item['pop_title'];
                                    $pop_images = $item['pop_images'];
                                    $pop_images_url = ( $item['pop_images']['id'] != '' ) ? wp_get_attachment_url( $item['pop_images']['id'], 'full' ) : $item['pop_images']['url'];
                                    $pop_link = $item['pop_link'];
                                    $pop_link_url = $item['pop_link']['url'];
                                    $pop_link_target = $item['pop_link']['is_external'] ? ' target=_blank' : '';
                                    $pop_link_nofollow = $item['pop_link']['nofollow'] ? ' rel=nofollow' : '';    
                                ?>
                                    <div class="news-post">
                                        <div class="post-thumb">
                                            <a href="#">
                                                <img src="<?php echo esc_url($pop_images_url); ?>" alt="title of img" >
                                            </a>
                                        </div>
                                        <h5>
                                            <a href="<?php echo esc_url($pop_link_url); ?>" <?php echo esc_attr($pop_link_target . $pop_link_nofollow); ?>>
                                                <?php echo wp_kses_post($pop_title); ?>
                                            </a>
                                        </h5>
                                        <div class="date"><?php echo $pop_date; ?></div>
                                    </div>
                                <?php } ?>
                            <?php endif; ?>
                        </div>	
                    </div>
                </div>
            </div>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Footer_news__o() );