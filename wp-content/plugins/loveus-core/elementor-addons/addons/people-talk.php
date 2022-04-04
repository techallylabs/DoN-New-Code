<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/**
 * Elementor people talk slider one
 *
 * @since 1.0.0
 */
class People_slider__o extends \Elementor\Widget_Base {
	public function get_name() {
		return 'people_slider__o';
	}
	public function get_title() {
		return esc_html__( 'people talk area', 'plugin-name' );
	}
	public function get_icon() {
		return 'fa fa-object-ungroup';
	}
	public function get_categories() {
		return array( 'loveuscore' );
	}
	public function get_script_depends() {
		return ['owl-lib-loveus', 'owl-slider-loveus'];
	}
	public function get_style_depends() {
		return ['owl-carousel-loveus-me'];
	}
	protected function _register_controls() {
		$this->start_controls_section(
			'people_talk_layout',
			array(
				'label' => esc_html__( 'people talk design', 'plugin-name' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'cta_background_color',
			array(
				'label'     => __( 'Background Color', 'plugin-domain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .fluid-section' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'volunteer_design_list',
			array(
				'label'   => esc_html__( 'volunteer design list', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'style-none',
				'options' => array(
					'style-none'  => esc_html__( 'One', 'plugin-domain' ),
					'style-two'   => esc_html__( 'Two', 'plugin-domain' ),
					'style-three' => esc_html__( 'Three', 'plugin-domain' ),
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'people_left_content',
			array(
				'label' => esc_html__( 'people talk video Content', 'plugin-name' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'video_background',
			array(
				'label'   => esc_html__( 'Video background', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
			)
		);
		$this->add_control(
			'video_link',
			array(
				'label'         => esc_html__( 'Video youtube url', 'plugin-domain' ),
				'type'          => \Elementor\Controls_Manager::URL,
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),
			)
		);
		$this->add_control(
			'video_icon',
			array(
				'label'   => __( 'Video play icon', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fas fa-star',
					'library' => 'solid',
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'people_right_content',
			array(
				'label' => esc_html__( 'people talk slider Content', 'plugin-name' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		headerSettings::getHeaderSettings( $this );
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'mission_list_title',
			array(
				'label'       => esc_html__( 'people talk item content', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
			)
		);
		$repeater->add_control(
			'mission_list_authore',
			array(
				'label'       => esc_html__( 'people talk item content', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
			)
		);
		$this->add_control(
			'mission_list',
			array(
				'label'  => esc_html__( 'Help list', 'plugin-domain' ),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			)
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings              = $this->get_settings_for_display();
		$video_background      = ( $settings['video_background']['id'] != '' ) ? wp_get_attachment_url( $settings['video_background']['id'], 'full' ) : $settings['video_background']['url'];
		$video_link            = $settings['video_link']['url'];
		$mission_list          = $settings['mission_list'];
		$volunteer_design_list = $settings['volunteer_design_list'];
		?>
		<?php if ( $volunteer_design_list == 'style-two' ) : ?>
			<section class="testimonial-section-two">
				<div class="auto-container">
					<div class="wrapper-box">
						<?php headerSettings::getHeaderInfo( $settings ); ?>
						<div class="quote-icon"><span class="flaticon-left-quote"></span></div>
						<div class="testimonials-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 700, "responsive":{ "0" :{ "items": "1" },"600" :{ "items": "1" }, "800" :{ "items" : "1" }, "1024":{ "items" : "1" }, "1366":{ "items" : "1" }}}'>
						   
						   
							<?php if ( $mission_list ) : ?>
								<?php
								foreach ( $mission_list as $item ) {
									$mission_list_title   = $item['mission_list_title'];
									$mission_list_authore = $item['mission_list_authore'];
									?>
										<div class="slide-item">
										<div class="text"><?php echo wp_kses_post( $mission_list_title ); ?></div>
										<div class="author"><?php echo wp_kses_post( $mission_list_authore ); ?></div>
									</div>
								<?php } ?>
							<?php endif; ?>
							
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>  
		<?php if ( $volunteer_design_list == 'style-three' ) : ?>
			<section class="testimonial-section-two style-two">
				<div class="auto-container">
					<div class="wrapper-box">
						<?php headerSettings::getHeaderInfo( $settings ); ?>
						<div class="quote-icon"><span class="flaticon-left-quote"></span></div>
						<div class="testimonials-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 700, "responsive":{ "0" :{ "items": "1" },"600" :{ "items": "1" }, "800" :{ "items" : "1" }, "1024":{ "items" : "1" }, "1366":{ "items" : "1" }}}'>
						   
						   
							<?php if ( $mission_list ) : ?>
								<?php
								foreach ( $mission_list as $item ) {
									$mission_list_title   = $item['mission_list_title'];
									$mission_list_authore = $item['mission_list_authore'];
									?>
										<div class="slide-item">
										<div class="text"><?php echo wp_kses_post( $mission_list_title ); ?></div>
										<div class="author"><?php echo wp_kses_post( $mission_list_authore ); ?></div>
									</div>
								<?php } ?>
							<?php endif; ?>
							
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>  
		<?php if ( $volunteer_design_list == 'style-none' ) : ?>
			<section class="fluid-section">
				<div class="outer-container clearfix">
					<div class="image-column">
						<div class="image-layer" style="background-image: url('<?php echo esc_url($video_background); ?>')" ></div>
						<div class="image-box">
							<figure class="image"><img  src="<?php echo esc_url( $video_background ); ?>"  alt=""></figure>
						</div>
						<a href="<?php echo esc_url( $video_link ); ?>" class="lightbox-image over-link new-style-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['video_icon'], array( 'aria-hidden' => 'true' ) ); ?></a>
					</div>
					<div class="text-column">
						<div class="inner">
							<?php headerSettings::getHeaderInfo( $settings ); ?>
							<div class="quote-icon"><span class="flaticon-left-quote"></span></div>
							<div class="testimonials-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 700, "responsive":{ "0" :{ "items": "1" },"600" :{ "items": "1" }, "800" :{ "items" : "1" }, "1024":{ "items" : "1" }, "1366":{ "items" : "1" }}}'>
								<?php if ( $mission_list ) : ?>
									<?php
									foreach ( $mission_list as $item ) {
										$mission_list_title   = $item['mission_list_title'];
										$mission_list_authore = $item['mission_list_authore'];
										?>
										 <div class="slide-item">
											<div class="text"><?php echo wp_kses_post( $mission_list_title ); ?></div>
											<div class="author"><?php echo wp_kses_post( $mission_list_authore ); ?></div>
										</div>
									<?php } ?>
								<?php endif; ?>
							   
								
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>  
		
		
		
		
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \People_slider__o() );
