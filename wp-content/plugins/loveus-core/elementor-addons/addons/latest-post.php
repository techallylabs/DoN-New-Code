<?php
  use Elementor\Utils;

class LoveUsLatestPosts extends \Elementor\Widget_Base {



	public function get_name() {
		return 'loveus_latest_posts';
	}

	public function get_title() {
		return esc_html__( ' LoveUs Latest Posts', 'loveus-core' );
	}

	public function get_icon() {
		return '';
	}

	public function get_categories() {
		return [ 'loveus-core' ];
	}

	private function get_blog_categories() {
        $options = array();
        $taxonomy = 'category';
        if (!empty($taxonomy)) {
            $terms = get_terms(
                    array(
                        'parent' => 0,
                        'taxonomy' => $taxonomy,
                        'hide_empty' => true,
                    )
            );
            if (!empty($terms)) {
                foreach ($terms as $term) {
                    if (isset($term)) {
                        if (isset($term->slug) && isset($term->name)) {
                            $options[$term->slug] = $term->name;
                        }
                    }
                }
            }
        }
        return $options;
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'general',
			[
				'label' => __( 'General', 'loveus-core' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'   => __( 'Title', 'loveus-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'News', 'loveus-core' ),
			]
		);
		$this->add_control(
			'sub_title',
			[
				'label'   => __( 'Sub Title', 'loveus-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Latest Articles', 'loveus-core' ),

			]
		);

		$this->add_control(
			'showposts',
			[
				'label'   => __( 'Number of Posts', 'loveus-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( '4', 'loveus-core' ),

			]
		);
		$this->add_control(
			'orderby',
			[
				'label'   => __( 'Order By', 'loveus-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'date'     => __( 'Date', 'loveus-core' ),
					'id'       => __( 'ID', 'loveus-core' ),
					'title'    => __( 'Title', 'loveus-core' ),
					'name'     => __( 'Name', 'loveus-core' ),
					'modified' => __( 'Modified', 'loveus-core' ),
					'rand'     => __( 'Rand', 'loveus-core' ),
				],
				'default' => 'id',

			]
		);
		$this->add_control(
			'order',
			[
				'label'   => __( 'Sort Order', 'loveus-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'desc' => __( 'Descending', 'loveus-core' ),
					'asc'  => __( 'Ascending', 'loveus-core' ),
				],
				'default' => 'asc',

			]
		);

		$this->add_control(
			'button_text',
			[
				'label'   => __( 'Button Text', 'loveus-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Latest Articles', 'loveus-core' ),

			]
		);

		$this->add_control(
			'button_name',
			[
				'label'   => __( 'Blog Button Name', 'loveus-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Read More', 'loveus-core' ),

			]
		);

		$this->add_control(
			'catagory_name', [
			'type' => \Elementor\Controls_Manager::SELECT,
			'label' => esc_html__('Category', 'plugin-name'),
			'default' => __( 'uncategorized', 'loveus-core' ),
			'options' => $this->get_blog_categories()
				]

				
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings    = $this->get_settings_for_display();
		$title       = $settings['title'];
		$sub_title   = $settings['sub_title'];
		$showposts   = $settings['showposts'];
		$orderby     = $settings['orderby'];
		$order       = $settings['order'];
		$button_text = $settings['button_text'];
		$catagory_name = ucwords($settings['catagory_name']);
		$args = array(
			'post_type'      => array( 'post' ),
			'tax_query' => array(
				array (
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $catagory_name,
				)
			),
			'posts_per_page' => $showposts,
			'order'          => $order,
			'orderby'        => $orderby,
		);

		?>

<section class="news-section">
	<div class="top-rotten-curve"></div>
	<div class="circle-one"></div>

	<div class="auto-container">

		<div class="title-box clearfix">
			<div class="sec-title">
				<div class="sub-title"><?php echo $title; ?></div>
				<h2><?php echo $sub_title; ?></h2>
			</div>

			<div class="link"><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"
					class="theme-btn btn-style-one"><span class="btn-title"><?php echo $button_text; ?></span></a></div>
		</div>

		<div class="row clearfix">
			<?php
			$blogs = new WP_Query( $args );
			if ( $blogs->have_posts() ) {
				$countpost = 1;
				while ( $blogs->have_posts() ) {
					$blogs->the_post();
					$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
					if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
						$time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
					}

					$time_string   = sprintf(
						$time_string,
						esc_attr( get_the_date( DATE_W3C ) ),
						esc_html( get_the_date() ),
						esc_attr( get_the_modified_date( DATE_W3C ) ),
						esc_html( get_the_modified_date() )
					);
					$thumbnail_url = get_the_post_thumbnail_url();
					if ( $countpost == 1 ) {
						?>
			<div class="news-block-two col-lg-6 col-md-12 col-sm-12">
				<div class="inner-box wow fadeInLeft" data-wow-delay="0ms">
					<div class="image-box">
						<figure class="image"><a href="<?php the_permalink(); ?>"><img 
									src="<?php echo $thumbnail_url; ?>" 
									alt="<?php echo esc_html__( 'Alt', 'loveus-core' ); ?>"></a></figure>
					</div>
					<div class="lower-content">
						<div class="post-meta">
							<ul class="clearfix">
								<li><a
										href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span
											class="icon fa fa-user"></span>
										<?php echo esc_html( ucfirst( get_the_author() ) ); ?></a></li>
								<li><a href="<?php the_permalink(); ?>"><span class="icon fa fa-comments"></span>
										<?php echo get_comments_number( get_the_ID() ); ?></a></li>
							</ul>
						</div>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="text"><?php the_excerpt(); ?></div>
						<div class="link-box"><a href="<?php the_permalink(); ?>" class="theme-btn btn-style-one"><span
									class="btn-title"><?php echo $settings['button_name']; ?></span></a>
						</div>
					</div>
				</div>
			</div>
						<?php
							$countpost++;
					} elseif ( $countpost > 1 && $countpost <= 4 ) {
						if ( $countpost == 2 ) {
							?>
			<div class="news-block-three col-lg-6 col-md-12 col-sm-12">
				<div class="inner-box wow fadeInRight" data-wow-delay="0ms">
							<?php
						}
						?>


					<div class="news-post">
						<div class="post-thumb"><a href="<?php the_permalink(); ?>"><img 
									src="<?php echo $thumbnail_url; ?>" 
									alt="<?php echo esc_html__( 'Alt', 'loveus-core' ); ?>"></a></div>
						<div class="date"><span class="fa fa-calendar-alt"></span> <?php echo $time_string; ?></div>
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div>

						<?php
						if ( $countpost == 4 ) {
							?>
				</div>
			</div>
							<?php
						}
						$countpost++;
						if ( $countpost > 4 ) {
							$countpost = 1;
						}
					}
				}
				wp_reset_postdata();
			}
			?>
		</div>

	</div>
</section>
		<?php
	}

	protected function _content_template() {

	}
}

  \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \LoveUsLatestPosts() );
