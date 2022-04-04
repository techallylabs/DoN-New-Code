<?php
use SmartDataSoft\HeaderSettings\headerSettings;
/**
 * Elementor Blog area one
 * @since 1.0.0
 */
use Elementor\Utils;

class Blog_area__o extends \Elementor\Widget_Base {

    public function get_name() {
        return 'blog_area__o';
    }

    public function get_title() {
        return __('Blog area one', 'plugin-name');
    }

    public function get_icon() {
        return 'fa fa-object-ungroup';
    }

    public function get_categories() {
        return ['loveuscore'];
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
            'section_header',
            [
                'label' => esc_html__( 'Section Header Area', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'blog_header_content',
            [
                'label' => esc_html__('Blog Header on or off', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Enable', 'plugin-domain'),
                'label_off' => __('Disable', 'plugin-domain'),
                'return_value' => 'no'
            ]
        );
        headerSettings::getHeaderSettings( $this );
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'All articles button text', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type your button title here', 'plugin-domain' ),
            ]
        );
        $this->add_control(
            'button_link', [
                'label' => esc_html__( 'All articles button link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
                'section_blogs', [
            'label' => __('Blog post list', 'plugin-name'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
        );
        $this->add_control(
                'catagory_name', [
            'type' => \Elementor\Controls_Manager::SELECT,
            'label' => esc_html__('Category', 'plugin-name'),
            'options' => $this->get_blog_categories()
                ]
        );
        $this->add_control(
                'posts_per_page', [
            'label' => esc_html__('Posts per Page', 'plugin-name'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'max' => 20,
            'step' => 1,
            'default' => 10,
                ]
        );
        $this->add_control(
                'order_by', [
            'label' => esc_html__('Order by', 'plugin-name'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'date' => esc_html__('Date', 'plugin-name'),
                'ID' => esc_html__('ID', 'plugin-name'),
                'author' => esc_html__('Author', 'plugin-name'),
                'title' => esc_html__('Title', 'plugin-name'),
                'modified' => esc_html__('Modified', 'plugin-name'),
                'rand' => esc_html__('Random', 'plugin-name'),
                'menu_order' => esc_html__('Menu order', 'plugin-name'),
            ],
            'default' => esc_html__('ID', 'plugin-name'),
                ]
        );
        $this->add_control(
                'sort_by', [
            'label' => esc_html__('Sort By', 'plugin-name'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'desc' => esc_html__('desc', 'plugin-name'),
                'asc' => esc_html__('asc', 'plugin-name'),
            ],
            'default' => esc_html__('desc', 'plugin-name'),
                ]
        );
        $this->add_control(
                'extra_class', [
            'label' => esc_html__('Add Extra Class', 'plugin-name'),
            'type' => \Elementor\Controls_Manager::TEXT
                ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $blog_header_content = $settings['blog_header_content'];
        $button_text = $settings['button_text'];
        $button_link = $settings['button_link'];
        $button_link_url = $settings['button_link']['url'];
        $button_link_target = $settings['button_link']['is_external'] ? ' target=_blank' : '';
        $button_link_nofollow = $settings['button_link']['nofollow'] ? ' rel=nofollow' : '';

        $posts_per_page = $settings['posts_per_page'];
        $catagory_name = ucwords($settings['catagory_name']);
        $order_by = $settings['order_by'];
        $sort_by = $settings['sort_by'];
        ?>
            <section class="news-section">
                <div class="top-rotten-curve"></div>
                <div class="auto-container">
                    <?php if($blog_header_content == 'no') : ?>
                        <div class="title-box clearfix">
                            <?php headerSettings::getHeaderInfo($settings); ?>
                            <?php if($button_link_url) : ?>
                                <div class="link">
                                    <a href="<?php echo esc_url($button_link_url); ?>" class="theme-btn btn-style-one" <?php echo esc_attr($button_link_target . $button_link_nofollow); ?>>
                                        <span class="btn-title">
                                            <?php echo wp_kses_post($button_text); ?>
                                        </span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="row clearfix">
                        <?php
                            $args = array(
                                'category_name' => $catagory_name,
                                'orderby' => $order_by,
                                'order' => $sort_by,
                                'posts_per_page' => $posts_per_page,
                            );
                            global $wpdb;
                            $loop = new WP_Query($args);
                            $i = 1;
                            if ($loop->have_posts()) {
                                while ($loop->have_posts()) : $loop->the_post();
                                    if ($i == 1) {
                                        $delay = 0;
                                    } elseif ($i == 2) {
                                        $delay = 300;
                                    } elseif ($i == 3) {
                                        $delay = 600;
                                    } else {
                                        $delay = 0;
                                    }
                                    $is_no_post_thumb = '';
                                    if (!has_post_thumbnail()) :
                                        $is_no_post_thumb = 'no-post-thumb';
                                    endif;
                        ?>
                            <div class="news-block col-lg-4 col-md-6 col-sm-12 <?php echo esc_attr($is_no_post_thumb); ?>">
                                <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
                                    <div class="image-box">
                                        <figure class="image">
                                            <a href="<?php echo esc_url(get_permalink()); ?>"><?php loveus_post_thumbnail(); ?></a>
                                        </figure>
                                    </div>
                                    <div class="lower-content">
                                        <div class="date-two"><?php echo get_the_date( 'j' ); ?> <span class="month"><?php echo get_the_date( 'M' ); ?></span></div>
                                        <h3><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h3>
                                        <div class="text"><?php the_excerpt(); ?></div>
                                        <div class="post-meta">
                                            <ul class="clearfix">
                                                <li><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="icon fa fa-user"></span><?php echo esc_html( get_the_author() ); ?></a></li>
						                        <li><a href="<?php echo esc_url(get_permalink()); ?>"><span class="icon fa fa-comments"></span></a><?php loveus_comments_count(); ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                                $i++;
                                endwhile;
                            } else {
                                echo esc_html__('No products found', 'plugin-name');
                            }
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </section>
        <?php
    }
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Blog_area__o() );
