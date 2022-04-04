<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/**
 * Elementor Faq area one
 *
 * @since 1.0.0
 */
class Faq_area__o extends \Elementor\Widget_Base {
	public function get_name() {
		return 'faq_area__o';
	}
	public function get_title() {
		return esc_html__( 'Faq area one', 'plugin-name' );
	}
	public function get_icon() {
		return 'fa fa-object-ungroup';
	}
	public function get_categories() {
		return array( 'loveuscore' );
	}
	protected function _register_controls() {
		$this->start_controls_section(
			'faq_area_header',
			array(
				'label' => esc_html__( 'Faq area header', 'plugin-name' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		headerSettings::getHeaderSettings( $this );
		$this->end_controls_section();
		$this->start_controls_section(
			'faq_area_content',
			array(
				'label' => esc_html__( 'Faq area Content', 'plugin-name' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'faq_filter',
			array(
				'label' => __( 'faq tab title', 'plugin-domain' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'faq_filter_active',
			array(
				'label'   => esc_html__( 'faq tab active', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'no',
				'options' => array(
					'no'         => esc_html__( 'no', 'plugin-domain' ),
					'active-btn' => esc_html__( 'yes', 'plugin-domain' ),
				),
			)
		);
		$repeater->add_control(
			'faq_tab_active',
			array(
				'label'   => esc_html__( 'faq tab active', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'no',
				'options' => array(
					'no'         => esc_html__( 'no', 'plugin-domain' ),
					'active-tab' => esc_html__( 'yes', 'plugin-domain' ),
				),
			)
		);
		$repeater->add_control(
			'faq_title_one',
			array(
				'label'       => esc_html__( 'faq one title ', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
			)
		);
		$repeater->add_control(
			'faq_title_content_one',
			array(
				'label'       => esc_html__( 'faq one content', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
			)
		);
		$repeater->add_control(
			'faq_title_two',
			array(
				'label'       => esc_html__( 'faq two title ', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
			)
		);
		$repeater->add_control(
			'faq_title_content_two',
			array(
				'label'       => esc_html__( 'faq two content', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
			)
		);
		$repeater->add_control(
			'faq_title_three',
			array(
				'label'       => esc_html__( 'faq three title ', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
			)
		);
		$repeater->add_control(
			'faq_title_content_three',
			array(
				'label'       => esc_html__( 'faq three content', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
			)
		);
		$this->add_control(
			'faq_list',
			array(
				'label'   => __( 'faq list', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(),
				),
			)
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$faq_list = $settings['faq_list'];
		?>
			<section class="faq-section">
				<div class="auto-container">
					<div class="tabs-box">
						<div class="row clearfix">
							
							<!--Title Column-->
							<div class="title-column col-lg-6 col-md-12 col-sm-12">
								<div class="inner">
									<?php headerSettings::getHeaderInfo( $settings ); ?>
									<ul class="tab-buttons">
										
										<?php
											$category_arr       = array();
											$category_arr_class = array();
										foreach ( $faq_list as $key => $item ) {
											$cat                        = $item['faq_filter'];
											$faq_filter_active          = $item['faq_filter_active'];
											$child_categories_ex        = explode( ',', $cat );
											$child_categories           = str_replace( ',', ' ', $cat );
											$category_arr_class[ $key ] = strtolower( $child_categories );
											foreach ( $child_categories_ex as $child_category ) {
												$category_arr[] = strtolower( $child_category );
											}
										}
											$category_arr = array_unique( $category_arr );
										foreach ( $category_arr as $key => $category ) {
											if($key == 0){
											echo '<li class="tab-btn ' . $item['faq_filter_active'] . ' active-btn' . '" data-tab="#tab-' . $key . '">' . $category . '</li>';
											}else{
												echo '<li class="tab-btn ' . $item['faq_filter_active'] . '" data-tab="#tab-' . $key . '">' . $category . '</li>';
											}
										}

										?>
									</ul>
								</div>
							</div>
							
							<!--Content Column-->
							<div class="content-column col-lg-6 col-md-12 col-sm-12">
								<div class="inner">
									<div class="tabs-content">
									<?php if ( $faq_list ) { ?>
										<?php
										foreach ( $faq_list as $key => $faq ) {
											  $faq_title_one           = $faq['faq_title_one'];
											  $faq_title_content_one   = $faq['faq_title_content_one'];
											  $faq_title_two           = $faq['faq_title_two'];
											  $faq_title_content_two   = $faq['faq_title_content_two'];
											  $faq_title_three         = $faq['faq_title_three'];
											  $faq_title_content_three = $faq['faq_title_content_three'];
											?>
											<div class="tab <?php echo $faq['faq_tab_active']; ?>" id="tab-<?php echo esc_attr( $key ); ?>">
												<ul class="accordion-box clearfix">
												<?php if ( ! empty( $faq_title_one ) && ! empty( $faq_title_content_one ) ) { ?>
													<li class="accordion block">
														<div class="acc-btn "><?php echo wp_kses_post( $faq_title_one ); ?></div>
														<div class="acc-content ">
															<div class="content">
																<div class="text"><?php echo wp_kses_post( $faq_title_content_one ); ?></div>
															</div>
														</div>
													</li>
													<?php } ?>
													<?php if ( ! empty( $faq_title_two ) && ! empty( $faq_title_content_two ) ) { ?>
													<li class="accordion block">
														<div class="acc-btn "><?php echo wp_kses_post( $faq_title_two ); ?></div>
														<div class="acc-content ">
															<div class="content">
																<div class="text"><?php echo wp_kses_post( $faq_title_content_two ); ?></div>
															</div>
														</div>
													</li>
													<?php } ?>
													<?php if ( ! empty( $faq_title_three ) && ! empty( $faq_title_content_three ) ) { ?>
													<li class="accordion block">
														<div class="acc-btn "><?php echo wp_kses_post( $faq_title_three ); ?></div>
														<div class="acc-content ">
															<div class="content">
																<div class="text"><?php echo wp_kses_post( $faq_title_content_three ); ?></div>
															</div>
														</div>
													</li>
													<?php } ?>
												</ul>
											</div>
										<?php } ?>
									<?php } ?>
									</div>
									
								</div>
							</div>
							
						</div>    
					</div>
				</div>
			</section>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Faq_area__o() );
