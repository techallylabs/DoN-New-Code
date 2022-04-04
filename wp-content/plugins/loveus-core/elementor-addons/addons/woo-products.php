<?php
use Elementor\Utils;

class LoveUsWooProducts extends \Elementor\Widget_Base {
	/**
	 * Get_name
	 */
	public function get_name() {
		return 'loveus_woo_products';
	}

	/**
	 * Get_title
	 */
	public function get_title() {
		return esc_html__( ' LoveUs WooCommerce Products', 'loveus-core' );
	}

	/**
	 * Get_icon
	 */
	public function get_icon() {
		return '';
	}

	/**
	 * Get_categories
	 */
	public function get_categories() {
		return array( 'loveus-core' );
	}

	/**
	 * Get_woo_categories
	 */
	private function get_woo_categories() {
		$options  = array();
		$taxonomy = 'product_cat';
		if ( ! empty( $taxonomy ) ) {
			$terms = get_terms(
				array(
					'parent'     => 0,
					'taxonomy'   => $taxonomy,
					'hide_empty' => true,
				)
			);
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					if ( isset( $term ) ) {
						if ( isset( $term->slug ) && isset( $term->name ) ) {
							$options[ $term->slug ] = $term->name;
						}
					}
				}
			}
		}
		return $options;
	}

	/**
	 * _register_controls
	 *
	 * @return void
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'general',
			array(
				'label' => __( 'General', 'loveus-core' ),
			)
		);

		$this->add_control(
			'primary_color',
			array(
				'label'     => __( 'Tagline & Hover Color', 'karde-core' ),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sec-title .sub-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .shop-item .inner-box .lower-content h3 a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .shop-item .option-box li a:hover' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .shop-item .inner-box .tag-banner' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .shop-item .inner-box .tag-banner:before' => 'border-top: 9px solid {{VALUE}}; border-right: 8px solid {{VALUE}};',
					'{{WRAPPER}} .shop-item .inner-box .tag-banner:after' => 'border-bottom: 9px solid {{VALUE}}; border-right: 8px solid {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'text_color',
			array(
				'label'     => __( 'Product Title Color', 'karde-core' ),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .shop-item .inner-box .lower-content h3 a' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'icon_color',
			array(
				'label'     => __( 'Icon Color', 'karde-core' ),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .shop-item .inner-box:hover .option-box li a' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->add_control(
			'icon_hover_color',
			array(
				'label'     => __( 'Icon hover & Tag Text Color', 'karde-core' ),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .shop-item .inner-box .tag-banner' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .shop-item .inner-box:hover .option-box li a:hover' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->add_control(
			'tagline',
			array(
				'label'   => __( 'Tagline', 'loveus-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Help For Covid-19', 'loveus-core' ),
			)
		);
		$this->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'loveus-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Our Products', 'loveus-core' ),
			)
		);
		$this->add_control(
			'sub_title',
			array(
				'label'   => __( 'Sub Title', 'loveus-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Cupidatat non proident sunt', 'loveus-core' ),

			)
		);

		$this->add_control(
			'number_of_coloumns',
			array(
				'label'     => __( 'Number Of Coloumns', 'loveus-core' ),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => array(
					'2' => __( '2', 'loveus-core' ),
					'3' => __( '3', 'loveus-core' ),
					'4' => __( '4', 'loveus-core' ),
				),
				'default'   => '4',

			)
		);

		$this->add_control(
			'showposts',
			array(
				'label'   => __( 'Number of Posts', 'loveus-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( '4', 'loveus-core' ),

			)
		);
		$this->add_control(
			'orderby',
			array(
				'label'   => __( 'Order By', 'loveus-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'date'     => __( 'Date', 'loveus-core' ),
					'id'       => __( 'ID', 'loveus-core' ),
					'title'    => __( 'Title', 'loveus-core' ),
					'name'     => __( 'Name', 'loveus-core' ),
					'modified' => __( 'Modified', 'loveus-core' ),
					'rand'     => __( 'Rand', 'loveus-core' ),
				),
				'default' => 'id',

			)
		);
		$this->add_control(
			'order',
			array(
				'label'   => __( 'Sort Order', 'loveus-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'desc' => __( 'Descending', 'loveus-core' ),
					'asc'  => __( 'Ascending', 'loveus-core' ),
				),
				'default' => 'asc',

			)
		);

		$this->add_control(
			'woo_cats',
			array(
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => esc_html__( 'Product Category', 'plugin-name' ),
				'options' => $this->get_woo_categories(),
			)
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings           = $this->get_settings_for_display();
		$tagline            = $settings['tagline'];
		$title              = $settings['title'];
		$sub_title          = $settings['sub_title'];
		$number_of_coloumns = $settings['number_of_coloumns'];
		$showposts          = $settings['showposts'];
		$orderby            = $settings['orderby'];
		$order              = $settings['order'];
		$woo_cats           = $settings['woo_cats'];

		?>

<section class="products-section">
	<div class="auto-container">
		<div class="sec-title centered">
			<div class="sub-title"><?php echo $tagline; ?></div>
			<h2><?php echo $title; ?></h2>
			<div class="text"><?php echo $sub_title; ?></div>
		</div>

		<?php
		$shorcode = '[products limit="' . $showposts . '" category="' . $woo_cats . '" orderby="' . $orderby . '" order = "' . $order . '" columns="' . $number_of_coloumns . '" ]';

		echo do_shortcode( $shorcode );
		?>
	</div>
</section>
		<?php
	}

	/**
	 * _content_template
	 *
	 * @return void
	 */
	protected function _content_template() {

	}
}

  \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \LoveUsWooProducts() );
