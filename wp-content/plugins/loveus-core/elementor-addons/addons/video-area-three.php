<?php
/**
 * Elementor Video_area_three Video_area_three
 *
 * @since 1.0.0
 */
class Video_area_three extends \Elementor\Widget_Base {
	public function get_name() {
		return 'video_area_three';
	}
	public function get_title() {
		return esc_html__( 'video are three', 'plugin-name' );
	}
	public function get_icon() {
		return 'fa fa-object-ungroup';
	}
	public function get_categories() {
		return array( 'loveuscore' );
	}
	private function get_causes() {
		$options = array();

		$args = array(
			'post_type' => array( 'campaign' ),
		);

		$causes = new WP_Query( $args );

		// The Loop
		if ( $causes->have_posts() ) {

			while ( $causes->have_posts() ) {
				$causes->the_post();
				$options[ get_the_ID() ] = get_the_title();
			}
			wp_reset_postdata();
		}

		return $options;
	}
	protected function _register_controls() {
		$this->start_controls_section(
			'video_content_video',
			array(
				'label' => esc_html__( 'video', 'plugin-name' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'cta_background_color',
			array(
				'label'     => __( 'Background Color', 'plugin-domain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .video-section' => 'background-color: {{VALUE}}',
				),
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
			'video_content_list_item',
			array(
				'label' => esc_html__( 'content list', 'plugin-name' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'causes_layout1',
			array(
				'label'   => __( 'Select The Cost', 'loveus-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => $this->get_causes(),

			)
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		$video_background = ( $settings['video_background']['id'] != '' ) ? wp_get_attachment_url( $settings['video_background']['id'], 'full' ) : $settings['video_background']['url'];
		$video_link       = $settings['video_link']['url'];
		$causes_layout1   = $settings['causes_layout1'];

		$campaign        = charitable_get_campaign( $causes_layout1 );
		$image_url       = get_the_post_thumbnail_url( $campaign->ID );
		$currency_helper = charitable_get_currency_helper();
		?>

			<section class="video-section style-three">
		
				<div class="auto-container">
					<div class="row clearfix">
						<div class="text-column col-lg-4 col-md-12 col-sm-12">
							<div class="inner pt-0">
								
								<div class="cause-block-two style-two">
									<div class="inner-box pt-0 wow fadeInUp" data-wow-delay="0ms">
										<div class="image-box">
											<figure class="image"><a href="<?php echo get_permalink( $campaign->ID ); ?>"><img src="<?php echo $image_url; ?>"  alt=""></a></figure>
										</div>
										<div class="lower-content text-center">
											<h3><a href="<?php echo get_permalink( $campaign->ID ); ?>"><?php echo $campaign->post_title; ?></a></h3>
										</div>
										<div class="donate-info">
											<div class="progress-box">
												<div class="bar">
													<div class="bar-inner count-bar" data-percent="<?php echo esc_html( floor( $campaign->get_percent_donated_raw() ) . '%' ); ?>"><div class="count-text"><?php echo esc_html( floor( $campaign->get_percent_donated_raw() ) . '%' ); ?></div></div>
												</div>
											</div>
											<div class="donation-count clearfix"><span class="raised"><strong><?php echo esc_html__( 'Raised:', 'loveus-core' ); ?></strong> <?php echo $currency_helper->get_monetary_amount( $campaign->get_donated_amount() ); ?></span> <span class="goal"><strong><?php echo esc_html__( 'Goal:', 'loveus-core' ); ?></strong> <?php echo $currency_helper->get_monetary_amount( $campaign->get_goal() ); ?></span></div>
										</div>                                
									</div>
								</div>

							</div>
						</div>
						<!--Image Column-->
						<div class="image-column col-lg-8 col-md-12 col-sm-12">
							<div class="inner pr-0 wow fadeInLeft" data-wow-delay="0ms">
								<figure class="image-box">
									<img  src="<?php echo esc_url( $video_background ); ?>"  alt="">
									<a href="<?php echo esc_url( $video_link ); ?>" class="lightbox-image over-link">
										<?php \Elementor\Icons_Manager::render_icon( $settings['video_icon'], array( 'aria-hidden' => 'true' ) ); ?>
									</a>
								</figure>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Video_area_three() );
