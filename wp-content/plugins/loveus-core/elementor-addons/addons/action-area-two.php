<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/**
 * Elementor Action area two action_area__t
 *
 * @since 1.0.0
 */
class Action_area__t extends \Elementor\Widget_Base {
	public function get_name() {
		return 'action_area__t';
	}
	public function get_title() {
		return esc_html__( 'Action area two', 'plugin-name' );
	}
	public function get_icon() {
		return 'fa fa-object-ungroup';
	}
	public function get_categories() {
		return array( 'loveuscore' );
	}
	protected function _register_controls() {
		$this->start_controls_section(
			'action_area_t_content',
			array(
				'label' => esc_html__( 'Action area two content', 'plugin-name' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'cta_background_color',
			array(
				'label'     => __( 'Background Color', 'plugin-domain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .call-to-action' => 'background-color: {{VALUE}}',
				),
			)
		);
		headerSettings::getHeaderSettings( $this );
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display(); ?>
			 <!--Call To Action Section-->
			<section class="call-to-action">
				<!--Image Layer-->
				<div class="auto-container">
					<div class="inner">
						<?php headerSettings::getHeaderInfo( $settings ); ?>
					</div>
				</div>
			</section>
		<?php
	}
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Action_area__t() );
