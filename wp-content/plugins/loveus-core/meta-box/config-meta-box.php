<?php
add_filter( 'rwmb_meta_boxes', 'loveus_meta_box' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @return void
 */
function loveus_meta_box( $meta_boxes ) {

	$prefix = 'loveus_metabox';

	$posts_page = get_option( 'page_for_posts' );
	if ( ! isset( $_GET['post'] ) || intval( $_GET['post'] ) != $posts_page ) {
		$meta_boxes[] = array(
			'id'       => $prefix . '_page_meta_box',
			'title'    => esc_html__( 'Page Design Settings', 'plugin-name' ),
			'pages'    => array(
				'page',
			),
			'context'  => 'normal',
			'priority' => 'core',
			'fields'   => array(
				array(
					'id'      => "{$prefix}_get_involved_area",
					'name'    => esc_html__( 'Get Involved area', 'plugin-name' ),
					'type'    => 'radio',
					'std'     => 'on',
					'options' => array(
						'on'  => 'on',
						'off' => 'off',
					),
				),
				array(
					'id'      => "{$prefix}_show_breadcrumb",
					'name'    => esc_html__( 'Show Breadcrumb', 'plugin-name' ),
					'desc'    => '',
					'type'    => 'radio',
					'std'     => 'on',
					'options' => array(
						'on'  => 'Yes',
						'off' => 'No',
					),
				),
			),
		);
	}
	$meta_boxes[] = array(
		'id'        => $prefix . '_event_images',
		'title'     => esc_html__( 'Design Settings', 'plugin-name' ),
		'pages'     => array(
			'tribe_events',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name'             => esc_html__( 'Event Image', 'plugin-name' ),
				'id'               => "{$prefix}_event_meta_image",
				'desc'             => '',
				'type'             => 'image',
				'max_file_uploads' => 1,
			),
		),
	);
	return $meta_boxes;
}
