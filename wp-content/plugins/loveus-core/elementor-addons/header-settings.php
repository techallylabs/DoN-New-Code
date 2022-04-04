<?php
namespace SmartDataSoft\HeaderSettings;

class headerSettings {

	public static function getHeaderSettings( $obj ) {
		$obj->add_control(
			'color_option',
			array(
				'label'        => esc_html__( 'Color option', 'plugin-domain' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'plugin-domain' ),
				'label_off'    => __( 'Hide', 'plugin-domain' ),
				'return_value' => 'yes',
				// 'default' => 'yes',
			)
		);
		$obj->add_control(
			'color_option_sub_title',
			array(
				'label'     => __( 'sub titile Color', 'plugin-domain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sec-title .sub-title' => 'color: {{VALUE}}',
				),
				'condition' => array(
					'color_option' => 'yes',
				),
			)
		);
		$obj->add_control(
			'color_option_title',
			array(
				'label'     => __( 'titile Color', 'plugin-domain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sec-title h2' => 'color: {{VALUE}}',
				),
				'condition' => array(
					'color_option' => 'yes',
				),
			)
		);
		$obj->add_control(
			'color_option_content',
			array(
				'label'     => __( 'content Color', 'plugin-domain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sec-title .text' => 'color: {{VALUE}}',
				),
				'condition' => array(
					'color_option' => 'yes',
				),
			)
		);
		$obj->add_control(
			'section_header_position',
			array(
				'label'   => esc_html__( 'Header text Position', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => array(
					'left'     => esc_html__( 'Left', 'plugin-domain' ),
					'centered' => esc_html__( 'Center', 'plugin-domain' ),
					'right'    => esc_html__( 'Right', 'plugin-domain' ),
				),
			)
		);
		$obj->add_control(
			'sub_title_section',
			array(
				'label'       => esc_html__( 'Section Sub-title', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
			)
		);
		$obj->add_control(
			'title_section',
			array(
				'label'       => esc_html__( 'Section title', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
			)
		);
		$obj->add_control(
			'title_section_size',
			array(
				'label'   => esc_html__( 'Section title Tag', 'lovecare-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				),
				'default' => 'h2',
			)
		);
		$obj->add_control(
			'content_section',
			array(
				'label'       => esc_html__( 'Section Content', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
			)
		);

		$obj->add_control(
			'section_button',
			array(
				'label'        => esc_html__( 'Button Hide or Show', 'plugin-domain' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'plugin-domain' ),
				'label_off'    => __( 'Hide', 'plugin-domain' ),
				'return_value' => 'no',
			)
		);
		$obj->add_control(
			'button_title',
			array(
				'label'       => esc_html__( 'Button text', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
				'condition'   => array(
					'section_button' => 'no',
				),
			)
		);
		$obj->add_control(
			'button_link_section',
			array(
				'label'         => esc_html__( 'Button link', 'plugin-domain' ),
				'type'          => \Elementor\Controls_Manager::URL,
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),
				'condition'     => array(
					'section_button' => 'no',
				),
			)
		);
		$obj->add_control(
			'section_button_two',
			array(
				'label'        => esc_html__( 'Button two Hide or Show', 'plugin-domain' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'plugin-domain' ),
				'label_off'    => __( 'Hide', 'plugin-domain' ),
				'return_value' => 'no',
			)
		);
		$obj->add_control(
			'button_title_two',
			array(
				'label'       => esc_html__( 'Button two text', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type your content here', 'plugin-domain' ),
				'condition'   => array(
					'section_button_two' => 'no',
				),
			)
		);
		$obj->add_control(
			'button_link_two',
			array(
				'label'         => esc_html__( 'Button two link', 'plugin-domain' ),
				'type'          => \Elementor\Controls_Manager::URL,
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),
				'condition'     => array(
					'section_button_two' => 'no',
				),
			)
		);
	}

	public static function getHeaderInfo( $settings ) {
		$section_header_position = $settings['section_header_position'];
		$sub_title_section       = $settings['sub_title_section'];
		$title_section           = $settings['title_section'];
		$title_section_size      = $settings['title_section_size'];

		$content_section          = $settings['content_section'];
		$button_title             = $settings['button_title'];
		$button_link_section_link = isset( $settings['button_link_section']['url'] ) ? $settings['button_link_section']['url'] : '#';

		$target_section   = '';
		$nofollow_section = '';

		if ( isset( $settings['button_link_section'] ) ) {
			$target_section = $settings['button_link_section']['is_external'] ? ' target=_blank' : '';
		}
		if ( isset( $settings['button_link_section'] ) ) {
			$nofollow_section = $settings['button_link_section']['is_external'] ? ' target=_blank' : '';
		}

		$button_title_two = $settings['button_title_two'];
		$button_link_two  = isset( $settings['button_link_two']['url'] ) ? $settings['button_link_two']['url'] : '#';

		$target_section_two   = '';
		$nofollow_section_two = '';
		if ( isset( $settings['button_link_two'] ) ) {
			$target_section_two = $settings['button_link_two']['is_external'] ? ' target=_blank' : '';
		}

		if ( isset( $settings['button_link_two']['nofollow'] ) ) {
			$nofollow_section_two = $settings['button_link_two']['nofollow'] ? ' rel=nofollow' : '';
		}

		?>
		<?php if ( $sub_title_section || $title_section || $content_section || $button_title ) : ?>
<div class="sec-title <?php echo esc_attr( $section_header_position ); ?>">
			<?php if ( $sub_title_section ) : ?>
  <div class="sub-title">
				<?php echo wp_kses_post( $sub_title_section ); ?>
  </div>
  <?php endif; ?>
			<?php if ( $title_section ) : ?>
				<<?php echo $title_section_size; ?>><?php echo wp_kses_post( $title_section ); ?></<?php echo $title_section_size; ?>>
  <?php endif; ?>
			<?php if ( $content_section ) : ?>
  <div class="text"><?php echo wp_kses_post( $content_section ); ?></div>
  <?php endif; ?>
			<?php if ( $button_title ) : ?>
  <div class="link-box clearfix">
				<?php if ( $button_title_two ) : ?>
	<a class="theme-btn btn-style-three" href="<?php echo esc_url( $button_link_two ); ?>" 
														  <?php
															echo esc_attr( $target_section_two . $nofollow_section_two );
															?>
		>
	  <span class="btn-title"><?php echo wp_kses_post( $button_title_two ); ?></span>
	</a>
	<?php endif; ?>
	<a class="theme-btn btn-style-one" href="<?php echo esc_url( $button_link_section_link ); ?>"
				<?php echo esc_attr( $target_section . $nofollow_section ); ?>>
	  <span class="btn-title"><?php echo wp_kses_post( $button_title ); ?></span>
	</a>
  </div>
  <?php endif; ?>
</div>
		<?php endif; ?>
		<?php
	}
}
