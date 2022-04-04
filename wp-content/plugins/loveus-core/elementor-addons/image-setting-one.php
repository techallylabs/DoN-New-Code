<?php
namespace LoveUs\HeaderSettings;

use Elementor\Utils;

class headerSettings {

	public static function getHeaderSettings( $obj ) {
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
	}

	public static function getHeaderInfo( $settings ) {
		$section_header_position  = $settings['section_header_position'];
		$sub_title_section        = $settings['sub_title_section'];
		$title_section            = $settings['title_section'];
		$content_section          = $settings['content_section'];
		$button_title             = $settings['button_title'];
		$button_link_section_link = $settings['button_link_section']['url'];
		$target_section           = $settings['button_link_section']['is_external'] ? ' target="_blank"' : '';
		$nofollow_section         = $settings['button_link_section']['nofollow'] ? ' rel="nofollow"' : '';
		?>
				<div class="sec-title <?php echo esc_attr( $section_header_position ); ?>">
					<?php if ( $sub_title_section ) : ?>
						<div class="sub-title">
							<?php echo wp_kses_post( $sub_title_section ); ?>
						</div>
					<?php endif; ?>
					<?php if ( $title_section ) : ?>
						<h2><?php echo wp_kses_post( $title_section ); ?></h2>
					<?php endif; ?>
					<?php if ( $content_section ) : ?>
						<div class="text"><?php echo wp_kses_post( $content_section ); ?></div>
					<?php endif; ?>
					<?php if ( $button_title ) : ?>
						<div class="link-box clearfix">
							<a 
								class="theme-btn btn-style-one"
								href="<?php echo esc_url( $button_link_section_link ); ?>"
								<?php
									echo esc_attr( $target_section . $nofollow_section );
								?>
								>
								<span class="btn-title"><?php echo wp_kses_post( $button_title ); ?></span>
							</a>
						</div>
					<?php endif; ?>
				</div>
		<?php

	}
}
