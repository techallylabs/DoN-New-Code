<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/**
 * Elementor Action area one
 *
 * @since 1.0.0
 */
class Action_slider__o extends \Elementor\Widget_Base {
	public function get_name() {
		return 'action_area__o';
	}
	public function get_title() {
		return esc_html__( 'About feature one', 'plugin-name' );
	}
	public function get_icon() {
		return 'fa fa-object-ungroup';
	}
	public function get_categories() {
		return array( 'loveuscore' );
	}
	protected function _register_controls() {
		$this->start_controls_section(
			'about_feature_style',
			array(
				'label' => esc_html__( 'About feature style', 'plugin-name' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'about_background_color',
			array(
				'label'     => __( 'Background Color', 'plugin-domain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .about-section' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'no_padding_section',
			array(
				'label'        => esc_html__( 'no padding', 'plugin-domain' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'yes', 'plugin-domain' ),
				'label_off'    => __( 'no', 'plugin-domain' ),
				'return_value' => 'p-0',
				'default'      => 'p-no',
			)
		);
		$this->add_control(
			'no_icon_section',
			array(
				'label'        => esc_html__( 'no icon', 'plugin-domain' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'yes', 'plugin-domain' ),
				'label_off'    => __( 'no', 'plugin-domain' ),
				'return_value' => 'no',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'about_feature_style_list',
			array(
				'label'   => esc_html__( 'About feature style', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'style-none',
				'options' => array(
					'style-none'  => esc_html__( 'One', 'plugin-domain' ),
					'style-two'   => esc_html__( 'Two', 'plugin-domain' ),
					'style-three' => esc_html__( 'Three', 'plugin-domain' ),
					'style-seven' => esc_html__( 'Four', 'plugin-domain' ),
					'style-five'  => esc_html__( 'Five', 'plugin-domain' ),
				),
			)
		);
		$this->add_control(
			'mission_icon_img',
			array(
				'label'     => __( 'About icon image', 'plugin-domain' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'default'   => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
				'condition' => array(
					'about_feature_style_list' => 'style-seven',
				),
			)
		);
		$this->add_control(
			'about_feature_two_img_icon',
			array(
				'label'   => esc_html__( 'About feature images or content', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'content',
				'options' => array(
					'content' => esc_html__( 'content', 'plugin-domain' ),
					'images'  => esc_html__( 'images', 'plugin-domain' ),
				),
			)
		);
		$this->add_control(
			'about_feature_two_text_block',
			array(
				'label'   => esc_html__( 'About feature Text block', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'no',
				'options' => array(
					'no'  => esc_html__( 'no', 'plugin-domain' ),
					'yes' => esc_html__( 'yes', 'plugin-domain' ),
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'seaction_header',
			array(
				'label' => esc_html__( 'Section Header Area', 'plugin-name' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'about_header_section_on',
			array(
				'label'        => esc_html__( 'Hide or Show', 'plugin-domain' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'plugin-domain' ),
				'label_off'    => __( 'Hide', 'plugin-domain' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		headerSettings::getHeaderSettings( $this );

		$this->end_controls_section();
		$this->start_controls_section(
			'about_feature_two',
			array(
				'label'     => esc_html__( 'About feature two list', 'plugin-name' ),
				'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => array(
					'about_feature_style_list' => 'style-two',
				),
			)
		);

		$repeater = new \Elementor\Repeater();
		getAnimationControl( $repeater );
		$repeater->add_control(
			'mission_list_bg',
			array(
				'label'   => __( 'About feature single image', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
			)
		);
		$repeater->add_control(
			'mission_list_icon',
			array(
				'label'   => __( 'About feature icon', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fas fa-star',
					'library' => 'solid',
				),
			)
		);
		$repeater->add_control(
			'mission_list_title',
			array(
				'label'       => esc_html__( 'About feature title', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
			)
		);
		$repeater->add_control(
			'mission_list_content',
			array(
				'label'       => esc_html__( 'About feature content', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
			)
		);
		$repeater->add_control(
			'mission_list_text',
			array(
				'label'       => esc_html__( 'About feature Button Title', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( 'Donate Now', 'plugin-domain' ),
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
			)
		);
		$repeater->add_control(
			'mission_list_link',
			array(
				'label'         => esc_html__( 'About feature Button link', 'plugin-domain' ),
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
			'mission_list_repeter',
			array(
				'label'  => esc_html__( 'About feature feature list', 'plugin-domain' ),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'about_feature',
			array(
				'label'     => esc_html__( 'About feature Content', 'plugin-name' ),
				'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => array(
					'about_feature_two_img_icon' => 'content',
				),
			)
		);
		$repeater = new \Elementor\Repeater();
		getAnimationControl( $repeater );
		$repeater->add_control(
			'about_feature_icon',
			array(
				'label'   => __( 'About feature icon', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fas fa-star',
					'library' => 'solid',
				),
			)
		);
		$repeater->add_control(
			'about_feature_title',
			array(
				'label'       => esc_html__( 'About feature title', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
			)
		);
		$repeater->add_control(
			'about_feature_link',
			array(
				'label'         => esc_html__( 'About feature link', 'plugin-domain' ),
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
			'about_feature_list',
			array(
				'label'  => esc_html__( 'About feature list', 'plugin-domain' ),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'about_feature_images',
			array(
				'label'     => esc_html__( 'About feature images', 'plugin-name' ),
				'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => array(
					'about_feature_two_img_icon' => 'images',
				),
			)
		);
		$this->add_control(
			'about_feature_images_on',
			array(
				'label'        => esc_html__( 'Hide or Show', 'plugin-domain' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'plugin-domain' ),
				'label_off'    => __( 'Hide', 'plugin-domain' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$repeater = new \Elementor\Repeater();
		getAnimationControl( $repeater );
		$repeater->add_control(
			'about_feature_images_upload',
			array(
				'label'   => esc_html__( 'About feature image', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
			)
		);
		$this->add_control(
			'about_feature_images_list',
			array(
				'label'     => esc_html__( 'About feature list', 'plugin-domain' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'    => $repeater->get_controls(),
				'condition' => array(
					'about_feature_images_on' => 'yes',
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'about_feature_images_three',
			array(
				'label'     => esc_html__( 'About feature images three', 'plugin-name' ),
				'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => array(
					'about_feature_style_list' => 'style-three',
				),
			)
		);
		$repeater = new \Elementor\Repeater();
		getAnimationControl( $repeater );
		$repeater->add_control(
			'about_feature_images_upload_three_left',
			array(
				'label'   => esc_html__( 'About feature image left', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
			)
		);
		$this->add_control(
			'about_feature_images_list_three_left',
			array(
				'label'  => esc_html__( 'About feature list left', 'plugin-domain' ),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			)
		);
		$repeater = new \Elementor\Repeater();
		getAnimationControl( $repeater );
		$repeater->add_control(
			'about_feature_images_upload_three_right',
			array(
				'label'   => esc_html__( 'About feature image right', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
			)
		);
		$this->add_control(
			'about_feature_images_list_three_right',
			array(
				'label'  => esc_html__( 'About feature list right', 'plugin-domain' ),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'about_feature_two_text_block_area',
			array(
				'label'     => esc_html__( 'About feature text block', 'plugin-name' ),
				'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => array(
					'about_feature_two_text_block' => 'yes',
				),
			)
		);
		$repeater = new \Elementor\Repeater();
		getAnimationControl( $repeater );
		$repeater->add_control(
			'about_feature_two_text_block_title',
			array(
				'label' => esc_html__( 'About feature text block title', 'plugin-domain' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'about_feature_two_text_block_content',
			array(
				'label' => esc_html__( 'About feature text block content', 'plugin-domain' ),
				'type'  => \Elementor\Controls_Manager::WYSIWYG,
			)
		);
		$this->add_control(
			'about_feature_two_text_block_list',
			array(
				'label'  => esc_html__( 'About feature text block list', 'plugin-domain' ),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			)
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings                 = $this->get_settings_for_display();
		$no_icon_section          = $settings['no_icon_section'];
		$mission_icon_img         = $settings['mission_icon_img'];
		$no_padding_section       = $settings['no_padding_section'];
		$about_feature_style_list = $settings['about_feature_style_list'];
		$about_header_section_on  = $settings['about_header_section_on'];
		$about_feature_list       = $settings['about_feature_list'];

		$mission_list_repeter      = $settings['mission_list_repeter'];
		$about_feature_images_list = $settings['about_feature_images_list'];

		$about_feature_images_list_three_left  = $settings['about_feature_images_list_three_left'];
		$about_feature_images_list_three_right = $settings['about_feature_images_list_three_right'];

		$about_feature_two_text_block_list = $settings['about_feature_two_text_block_list'];
		$about_feature_two_text_block      = $settings['about_feature_two_text_block'];
		$about_section_alternate           = '';
		if ( $about_feature_two_text_block == 'yes' ) {
			$about_section_alternate = 'alternate';
		}
		?>
		<!--About Section-->
			<section class="about-section <?php echo esc_attr( $about_feature_style_list . ' ' . $about_section_alternate . ' ' . $no_padding_section ); ?>">
				<?php if ( $no_icon_section == 'yes' ) : ?>
					<div class="top-rotten-curve"></div>
					<div class="bottom-rotten-curve"></div>
					<div class="circle-one"></div>
					<div class="circle-two"></div>
				<?php endif; ?>
				<?php if ( $about_feature_style_list == 'style-seven' ) : ?>
					<div class="icon">
					<?php
						$mission_icon_img = ( $settings['mission_icon_img']['id'] != '' ) ? wp_get_attachment_url( $settings['mission_icon_img']['id'], 'full' ) : $settings['mission_icon_img']['url'];
					?>
					<img src="<?php echo esc_url( $mission_icon_img ); ?>" alt=""></div>
				<?php endif; ?>

				<?php if ( $mission_list_repeter ) : ?>
					<div class="upper-boxes">
						<div class="auto-container">
							<div class="row clearfix">
							<?php if ( $mission_list_repeter ) : ?>
								<?php
								foreach ( $mission_list_repeter as $item ) {
									$mission_list_bg      = ( $item['mission_list_bg']['id'] != '' ) ? wp_get_attachment_url( $item['mission_list_bg']['id'], 'full' ) : $item['mission_list_bg']['url'];
									$mission_list_icon    = $item['mission_list_icon'];
									$mission_list_title   = $item['mission_list_title'];
									$mission_list_content = $item['mission_list_content'];

									$button_text          = $item['mission_list_text'];
									$button_link          = $item['mission_list_link'];
									$button_link_url      = $item['mission_list_link']['url'];
									$button_link_target   = $item['mission_list_link']['is_external'] ? ' target=_blank' : '';
									$button_link_nofollow = $item['mission_list_link']['nofollow'] ? ' rel=nofollow' : '';
									?>
									<!--About Feature-->
									<div class="about-feature-two col-lg-4 col-md-6 col-sm-12">
										<div class="inner-box wow <?php echo esc_attr( $item['animation_class'] ); ?>" data-wow-delay="<?php echo esc_attr( $item['animation_delay_time'] ); ?>ms" data-wow-duration="<?php echo esc_attr( $item['animation_duration'] ); ?>ms">
											<div class="image-layer" style="background-image: url('<?php echo esc_url($mission_list_bg); ?>')" ></div>
											<div class="icon-box"><?php \Elementor\Icons_Manager::render_icon( $mission_list_icon, array( 'aria-hidden' => 'true' ) ); ?></div>
											<h4><?php echo wp_kses_post( $mission_list_title ); ?></h4>
											<div class="text"><?php echo wp_kses_post( $mission_list_content ); ?></div>
											<div class="link-box"><a <?php echo esc_attr( $button_link_target . $button_link_nofollow ); ?> href="<?php echo esc_url( $button_link_url ); ?>" class="theme-btn btn-style-four"><?php echo wp_kses_post( $button_text ); ?></a></div>
										</div>
									</div>
								<?php } ?>
							<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( $about_header_section_on || $about_feature_images_list_three_left || $about_feature_list || $about_feature_images_list || $about_feature_two_text_block_list ) : ?>
				<div class="auto-container">
					<div class="row clearfix">
						<!--Left Column-->
						<div class="left-column col-lg-6 col-md-12 col-sm-12">
							<div class="inner">
								<?php if ( $about_header_section_on == 'yes' ) : ?>
									<?php headerSettings::getHeaderInfo( $settings ); ?>
								<?php endif; ?>
							</div>
						</div>
						<!--Right Column-->
						<div class="right-column col-lg-6 col-md-12 col-sm-12">
							<div class="inner">
								<?php if ( $about_feature_images_list_three_left ) : ?>
									<div class="images clearfix">
										<div class="image-block">
											<?php
											foreach ( $about_feature_images_list_three_left as $img_left ) {
													$about_feature_images_upload_three_left = ( $img_left['about_feature_images_upload_three_left']['id'] != '' ) ? wp_get_attachment_url( $img_left['about_feature_images_upload_three_left']['id'], 'full' ) : $img_left['about_feature_images_upload_three_left']['url'];
												?>
												<figure class="image-box wow <?php echo esc_attr( $img_left['animation_class'] ); ?>" data-wow-delay="<?php echo esc_attr( $img_left['animation_delay_time'] ); ?>ms" data-wow-duration="<?php echo esc_attr( $img_left['animation_duration'] ); ?>ms"><img src="<?php echo esc_url( $about_feature_images_upload_three_left ); ?>" alt="home"></figure>
											<?php } ?>
										</div>
										<div class="image-block">
											<?php
											foreach ( $about_feature_images_list_three_right as $img_right ) {
												$about_feature_images_upload_three_right = ( $img_right['about_feature_images_upload_three_right']['id'] != '' ) ? wp_get_attachment_url( $img_right['about_feature_images_upload_three_right']['id'], 'full' ) : $img_right['about_feature_images_upload_three_right']['url'];
												?>
												<figure class="image-box wow <?php echo esc_attr( $img_left['animation_class'] ); ?>" data-wow-delay="<?php echo esc_attr( $img_left['animation_delay_time'] ); ?>ms" data-wow-duration="<?php echo esc_attr( $img_left['animation_duration'] ); ?>ms"><img src="<?php echo esc_url( $about_feature_images_upload_three_right ); ?>" alt="home"></figure>
											<?php } ?>
										</div>
									</div>
								<?php endif; ?>
								<?php if ( $about_feature_list ) : ?>
									<div class="row clearfix">
										<?php foreach ( $about_feature_list as $item ) { ?>
											<!--About Feature-->
											<div class="about-feature col-md-6 col-sm-12">
												<div class="inner-box wow <?php echo esc_attr( $item['animation_class'] ); ?>" data-wow-delay="<?php echo esc_attr( $item['animation_delay_time'] ); ?>ms" data-wow-duration="<?php echo esc_attr( $item['animation_duration'] ); ?>ms">
													<div class="icon-box">
														<?php \Elementor\Icons_Manager::render_icon( $item['about_feature_icon'], array( 'aria-hidden' => 'true' ) ); ?>
													</div>
													<h4><?php echo wp_kses_post( $item['about_feature_title'] ); ?></h4>
													<a 
														href="<?php echo esc_url( $item['about_feature_link']['url'] ); ?>"
														class="over-link"
														<?php
															$target   = $item['about_feature_link']['is_external'] ? ' target=_blank' : '';
															$nofollow = $item['about_feature_link']['nofollow'] ? ' rel=nofollow' : '';
															echo esc_attr( $target . $nofollow );
														?>
													>
													</a>
												</div>
											</div>
										<?php } ?>
									</div>
								<?php endif; ?>
								<?php if ( $about_feature_images_list ) : ?>
									<div class="images clearfix">
										<?php
										foreach ( $about_feature_images_list as $img_list ) {
											$about_feature_images_upload = ( $img_list['about_feature_images_upload']['id'] != '' ) ? wp_get_attachment_url( $img_list['about_feature_images_upload']['id'], 'full' ) : $img_list['about_feature_images_upload']['url'];
											?>
											<figure class="image wow <?php echo esc_attr( $img_list['animation_class'] ); ?>" data-wow-delay="<?php echo esc_attr( $img_list['animation_delay_time'] ); ?>ms" data-wow-duration="<?php echo esc_attr( $img_list['animation_duration'] ); ?>ms"><img src="<?php echo esc_url( $about_feature_images_upload ); ?>" alt="home"></figure>
										<?php } ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php if ( $about_feature_two_text_block_list ) : ?>
						<div class="text-blocks">
							<div class="row clearfix">
								<?php
								foreach ( $about_feature_two_text_block_list as $text_block ) {
									$about_feature_two_text_block_title   = $text_block['about_feature_two_text_block_title'];
									$about_feature_two_text_block_content = $text_block['about_feature_two_text_block_content'];
									?>
									<div class="default-text-block col-lg-4 col-md-6 col-sm-12">
										<div class="inner">
											<h3><?php echo wp_kses_post( $about_feature_two_text_block_title ); ?></h3>
											<div class="text"><?php echo wp_kses_post( $about_feature_two_text_block_content ); ?></div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>

			</section>
		<?php
	}
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Action_slider__o() );
