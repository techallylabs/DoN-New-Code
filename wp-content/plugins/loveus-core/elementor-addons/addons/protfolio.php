<?php
/** 
 * Elementor Protfolio area
 * @since 1.0.0
*/
class Protfolio_area extends \Elementor\Widget_Base {
    public function get_name() {
        return 'protfolio_area';
    }
    public function get_title(){
        return __( 'Protfolio area', 'plugin-name' );
    }
    public function get_icon(){
        return 'fa fa-quote-left';
    }
    public function get_categories(){
        return [ 'loveuscore' ];
    }
    public function get_script_depends() {
        return ['mixitup-loveus', 'mixitup-active-loveus'];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'content_section_list',
            [
                'label' => __( 'Protfolio list area', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'protfolio_filter',
            [
				'label' => __( 'Single Service name', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Visual identity graphic design' ),
				'placeholder' => __( 'Single Service name', 'plugin-domain' ),
			]
        );
        $repeater->add_control(
            'protfolio_img', [
                'label' => __( 'Background image', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'protfolio_list', [
                'label' => __( 'About count list', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [],
                ]
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display(); 
        $protfolio_list = $settings['protfolio_list'];
        ?>
    <!-- Gallery Page Section -->
    <section class="gallery-page-section">
        <div class="auto-container">
            <!--MixitUp Galery-->
            <div class="mixitup-gallery">
                <!--Filter-->
                <div class="filters clearfix">
                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="active filter" data-role="button" data-filter="all">All</li>
                        <?php
                            $category_arr = array();
                            $category_arr_class = array();
                            foreach($protfolio_list as $key=> $item){ 
                                $cat = $item["protfolio_filter"]; 
                                $child_categories_ex = explode(',', $cat );
                                $child_categories = str_replace(','," ", $cat );
                                $category_arr_class[$key]=strtolower($child_categories);
                                foreach($child_categories_ex as $child_category){
                                    $category_arr[] = strtolower($child_category);
                                }
                            }
                            $category_arr=array_unique($category_arr);
                            foreach($category_arr as $category){
                                $cate           = str_replace( ' ', '_', $category );
                                echo '<li class="filter" data-role="button" data-filter=".'.$cate.'">'.$category.'</li>';
                            }
                        ?>
                    </ul>
                </div>

                <div class="filter-list row">
                <?php if( $protfolio_list ) { ?>
                    <?php foreach ( $protfolio_list as $key=> $protfolio ) {
                        $protfolio_img = ( $protfolio['protfolio_img']['id'] != '' ) ? wp_get_attachment_url( $protfolio['protfolio_img']['id'], 'full' ) : $protfolio['protfolio_img']['url'];    
                        $cates           = str_replace( ' ', '_', $category_arr_class[ $key ] );
                    ?>
                    <div class="gallery-item-two mix all <?php echo esc_attr( $cates) ?> col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img  src="<?php echo $protfolio_img; ?>"  alt=""></figure>
                            <div class="overlay-box"><a href="<?php echo $protfolio_img; ?>" class="lightbox-image" data-fancybox="gallery"><span class="icon flaticon-cross-1"></span></a></div>
                        </div>
                    </div>
					<?php } ?>
                <?php } ?>
					
                </div>
            </div>
        </div>
    </section>
    <!-- End Gallery Page Section -->


        <?php
    }
}\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Protfolio_area() );
