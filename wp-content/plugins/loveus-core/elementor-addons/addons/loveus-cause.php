<?php
use Elementor\Utils;
use SmartDataSoft\HeaderSettings\headerSettings;

class LoveusPopulerCauses extends \Elementor\Widget_Base {

    public function get_name() {
        return 'loveus_populer_causes';
    }

    public function get_title() {
        return esc_html__('Loveus Populer Causes', 'loveus-core');
    }

    public function get_icon() {
        return '';
    }

    public function get_categories() {
        return ['loveus-core'];
    }


    public function get_script_depends() {
      // $settings = $this->get_settings();
      // $select_layout = $settings['select_layout'];
      // if($select_layout == 'layout_4' || $select_layout == 'layout_5') : 
           return ['owl-lib-loveus', 'owl-slider-loveus'];
      // endif;
      // return [];
    }
    
    private function get_causes() {
        $options = array();

        $args = array(
            'post_type' => array('campaign'),
        );

        $causes = new WP_Query($args);

        // The Loop
        if ($causes->have_posts()) {

            while ($causes->have_posts()) {
                $causes->the_post();
                $options[get_the_ID()] = get_the_title();
            }
            wp_reset_postdata();
        }

        return $options;
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'header_settings',
            [
                'label' => __('Header Settings', 'loveus-core'),
            ]
        );

        headerSettings::getHeaderSettings($this);

        $this->end_controls_section();

        $this->start_controls_section(
            'general',
            [
                'label' => __('General', 'loveus-core'),
            ]
        );

        $this->add_control(
            'select_layout_bg',
            [
                'label' => esc_html__('Select Bg', 'loveus-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'layout_dark' => esc_html__('Layout Dark', 'loveus-core'),
                    'layout_1ight' => esc_html__('Layout light', 'loveus-core'),

                ],
            ]
        );
        $this->add_control(
            'select_layout',
            [
                'label' => esc_html__('Select Layout', 'loveus-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'layout_1' => esc_html__('Layout 1', 'loveus-core'),
                    'layout_2' => esc_html__('Layout 2', 'loveus-core'),
                    'layout_3' => esc_html__('Layout 3', 'loveus-core'),
                    'layout_4' => esc_html__('Layout 4', 'loveus-core'),
                    'layout_5' => esc_html__('Layout 5', 'loveus-core'),

                ],
                'default' => esc_html__('layout_1', 'loveus-core'),
            ]
        );

        $this->add_control(
            'number_of_coloumns',
            [
                'label' => __('Number Of Coloumns', 'loveus-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => __('1', 'loveus-core'),
                    '2' => __('2', 'loveus-core'),
                    '3' => __('3', 'loveus-core'),
                    '4' => __('4', 'loveus-core'),
                ],
                'default' => '2',

            ]
        );
        $this->add_control(
            'mission_list_bg', [
                'label' => __('Help image', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => ['select_layout' => 'layout_5'],
            ]
        );
        $this->add_control(
            'mission_list_bg2', [
                'label' => __('Help image', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => ['select_layout' => 'layout_5'],
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'causes',
            [
                'label' => __('Select The Popuer Cost', 'loveus-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_causes(),

            ]
        );
        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'loveus-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );
        $this->add_control(
            'items1',
            [
                'label' => __('Repeater List', 'loveus-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __('Title #1', 'loveus-core'),
                        'list_content' => __('Item content. Click the edit button to change this text.', 'loveus-core'),
                    ],
                    [
                        'list_title' => __('Title #2', 'loveus-core'),
                        'list_content' => __('Item content. Click the edit button to change this text.', 'loveus-core'),
                    ],
                ],
                'condition' => ['select_layout' => 'layout_2'],
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'causes_layout1',
            [
                'label' => __('Select The Popuer Cost', 'loveus-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_causes(),

            ]
        );
        $this->add_control(
            'items2',
            [
                'label' => __('Repeater List', 'loveus-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __('Title #1', 'loveus-core'),
                        'list_content' => __('Item content. Click the edit button to change this text.', 'loveus-core'),
                    ],
                    [
                        'list_title' => __('Title #2', 'loveus-core'),
                        'list_content' => __('Item content. Click the edit button to change this text.', 'loveus-core'),
                    ],
                ],
                'condition' => ['select_layout' => 'layout_1'],
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'causes_layout3',
            [
                'label' => __('Select The Popuer Cost', 'loveus-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_causes(),

            ]
        );
        $repeater->add_control(
            'adonate_button',
            [
                'label' => esc_html__('Causes button Hide or Show', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'plugin-domain'),
                'label_off' => __('Hide', 'plugin-domain'),
                'return_value' => 'no',
            ]
        );
        $this->add_control(
            'items3',
            [
                'label' => __('Repeater List', 'loveus-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __('Title #1', 'loveus-core'),
                        'list_content' => __('Item content. Click the edit button to change this text.', 'loveus-core'),
                    ],
                    [
                        'list_title' => __('Title #2', 'loveus-core'),
                        'list_content' => __('Item content. Click the edit button to change this text.', 'loveus-core'),
                    ],
                ],
                'condition' => ['select_layout' => 'layout_3'],
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'causes_layout4',
            [
                'label' => __('Select The Popuer Cost', 'loveus-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_causes(),

            ]
        );
        $this->add_control(
            'items4',
            [
                'label' => __('Repeater List', 'loveus-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __('Title #1', 'loveus-core'),
                        'list_content' => __('Item content. Click the edit button to change this text.', 'loveus-core'),
                    ],
                    [
                        'list_title' => __('Title #2', 'loveus-core'),
                        'list_content' => __('Item content. Click the edit button to change this text.', 'loveus-core'),
                    ],
                ],
                'condition' => ['select_layout' => 'layout_4'],
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'causes_layout5',
            [
                'label' => __('Select The Popuer Cost', 'loveus-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_causes(),

            ]
        );
        $this->add_control(
            'items5',
            [
                'label' => __('Repeater List', 'loveus-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __('Title #1', 'loveus-core'),
                        'list_content' => __('Item content. Click the edit button to change this text.', 'loveus-core'),
                    ],
                    [
                        'list_title' => __('Title #2', 'loveus-core'),
                        'list_content' => __('Item content. Click the edit button to change this text.', 'loveus-core'),
                    ],
                ],
                'condition' => ['select_layout' => 'layout_5'],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $select_layout_bg = $settings['select_layout_bg'];
        $select_layout = $settings['select_layout'];
        $number_of_coloumns = $settings['number_of_coloumns'];

        $mission_list_bg = '#';
        if (isset($settings['mission_list_bg']['id'])) {
            $mission_list_bg = ($settings['mission_list_bg']['id'] != '') ? wp_get_attachment_url($settings['mission_list_bg']['id'], 'full') : $settings['mission_list_bg']['url'];
        }

        $mission_list_bg2 = '#';
        if (isset($settings['mission_list_bg2']['id'])) {
            $mission_list_bg2 = ($settings['mission_list_bg2']['id'] != '') ? wp_get_attachment_url($settings['mission_list_bg2']['id'], 'full') : $settings['mission_list_bg']['url'];
        }

        $coloumn_class = 'col-lg-6';

        if ($number_of_coloumns == '1') {
            $coloumn_class = 'col-lg-12';
        } elseif ($number_of_coloumns == '2') {
            $coloumn_class = 'col-lg-6';
        } elseif ($number_of_coloumns == '3') {
            $coloumn_class = 'col-lg-4';
        } elseif ($number_of_coloumns == '4') {
            $coloumn_class = 'col-lg-3';
        }
        ?>
<?php
if ($select_layout == 'layout_5') {
            ?>
<!--Causes Section Three-->
<section class="causes-section-three style-two">

  <div class="auto-container">
    <?php headerSettings::getHeaderInfo($settings);?>
    <div class="row">
      <div class="image-column col-lg-6">
        <div class="inner">
          <div class="row clearfix">
            <div class="image wow fadeInUp" data-wow-delay="0ms"><img 
                src="<?php echo esc_url($mission_list_bg) ?>" alt=""></div>
            <div class="image wow fadeInDown" data-wow-delay="0ms"><img 
                src="<?php echo esc_url($mission_list_bg2) ?>"
                data-src="<?php echo esc_url($settings['mission_list_bg2']['url']) ?>" alt=""></div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="carousel-box">

          <div class="single-item-carousel love-carousel owl-theme owl-carousel"
            data-options='{"loop": false, "margin": 10, "autoheight":false, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>
            <?php
foreach ($settings['items5'] as $item) {

                $campaign = charitable_get_campaign($item['causes_layout5']);

                $currency_helper = charitable_get_currency_helper();
                ?>
            <div class="slide-item">
              <div class="cause-block-three style-two">
                <div class="inner-box clearfix">
                  <div class="text-column">
                    <div class="inner">
                      <h3><a href="<?php echo get_permalink($campaign->ID); ?>"><?php echo $campaign->post_title; ?></a>
                      </h3>
                      <div class="progress-box">
                        <div class="bar">
                          <div class="bar-inner count-bar"
                            data-percent="<?php echo esc_html(floor($campaign->get_percent_donated_raw()) . '%'); ?>">
                            <div class="count-text">
                              <?php echo esc_html(floor($campaign->get_percent_donated_raw()) . '%'); ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="donation-count clearfix">
                        <span class="raised"><strong><?php echo esc_html__('Raised:', 'loveus-core'); ?></strong>
                          <?php echo $currency_helper->get_monetary_amount($campaign->get_donated_amount()); ?></span>
                        <span class="goal"><strong><?php echo esc_html__('Goal:', 'loveus-core'); ?></strong>
                          <?php echo $currency_helper->get_monetary_amount($campaign->get_goal()); ?></span>
                      </div>
                      <div class="text"><?php charitable_template_campaign_description($campaign);?></div>
                      <div class="link-box"><a href="<?php echo get_permalink($campaign->ID); ?>"
                          class="theme-btn btn-style-one">
                          <span class="btn-title"><?php echo esc_html__('Read More', 'loveus-core'); ?></span></a>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>

          </div>

        </div>
      </div>
    </div>

  </div>
</section>
<?php
} elseif ($select_layout == 'layout_4') {
            ?>
<!--Causes Section Three-->
<section class="causes-section-three">
  <div class="circle-one"></div>
  <div class="circle-two"></div>

  <div class="auto-container">
    <?php headerSettings::getHeaderInfo($settings);?>
    <div class="carousel-box">

      <div class="single-item-carousel love-carousel owl-theme owl-carousel"
        data-options='{"loop": false, "margin": 10, "autoheight":false, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>
        <?php
foreach ($settings['items4'] as $item) {

                $campaign = charitable_get_campaign($item['causes_layout4']);

                $image_url = get_the_post_thumbnail_url($campaign->ID);

                $currency_helper = charitable_get_currency_helper();
                ?>
        <div class="slide-item">
          <div class="cause-block-three">
            <div class="inner-box clearfix">
              <div class="image-column">
                <div class="bg-image-layer " style="background-image: url('<?php echo esc_url($image_url); ?>')" ></div>
                <a href="<?php echo get_permalink($campaign->ID); ?>" class="over-link"></a>
              </div>
              <div class="text-column">
                <div class="inner">
                  <h3><a href="<?php echo get_permalink($campaign->ID); ?>"><?php echo $campaign->post_title; ?></a>
                  </h3>
                  <div class="progress-box">
                    <div class="bar">
                      <div class="bar-inner count-bar"
                        data-percent="<?php echo esc_html(floor($campaign->get_percent_donated_raw()) . '%'); ?>">
                        <div class="count-text">
                          <?php echo esc_html(floor($campaign->get_percent_donated_raw()) . '%'); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="donation-count clearfix">
                    <span class="raised"><strong><?php echo esc_html__('Raised:', 'loveus-core'); ?></strong>
                      <?php echo $currency_helper->get_monetary_amount($campaign->get_donated_amount()); ?></span>
                    <span class="goal"><strong><?php echo esc_html__('Goal:', 'loveus-core'); ?></strong>
                      <?php echo $currency_helper->get_monetary_amount($campaign->get_goal()); ?></span>
                  </div>
                  <div class="text"><?php charitable_template_campaign_description($campaign);?></div>
                  <div class="link-box"><a href="<?php echo get_permalink($campaign->ID); ?>"
                      class="theme-btn btn-style-one">
                      <span class="btn-title"><?php echo esc_html__('Read More', 'loveus-core'); ?></span></a>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
        <?php }?>

      </div>

    </div>

  </div>
</section>

<?php
} elseif ($select_layout == 'layout_3') {
            ?>
<section class="causes-section-two <?php echo esc_attr($select_layout_bg); ?>">
  <div class="auto-container">
    <?php headerSettings::getHeaderInfo($settings);?>
    <div class="row clearfix">
      <?php
foreach ($settings['items3'] as $item) {

                $adonate_button = $item['adonate_button'];
                $campaign = charitable_get_campaign($item['causes_layout3']);

                $image_url = get_the_post_thumbnail_url($campaign->ID);

                $currency_helper = charitable_get_currency_helper();
                ?>
      <div class="cause-block-two col-lg-4 col-md-6 col-sm-12 adonate-button-<?php echo esc_attr($adonate_button); ?>">
        <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
          <div class="image-box">
            <figure class="image"><a href="<?php echo get_permalink($campaign->ID); ?>"><img 
                  src="<?php echo $image_url; ?>"  alt=""></a>
            </figure>
          </div>
          <div class="lower-content">
            <h3><a href="<?php echo get_permalink($campaign->ID); ?>"><?php echo $campaign->post_title; ?></a></h3>
            <div class="text"><?php charitable_template_campaign_description($campaign);?></div>
          </div>

          <div class="donate-info">
            <div class="progress-box">
              <div class="bar">
                <div class="bar-inner count-bar"
                  data-percent="<?php echo esc_html(floor($campaign->get_percent_donated_raw()) . '%'); ?>">
                  <div class="count-text"><?php echo esc_html(floor($campaign->get_percent_donated_raw()) . '%'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="donation-count clearfix">
              <span class="raised"><strong><?php echo esc_html__('Raised:', 'loveus-core'); ?></strong>
                <?php echo $currency_helper->get_monetary_amount($campaign->get_donated_amount()); ?></span>
              <span class="goal"><strong><?php echo esc_html__('Goal:', 'loveus-core'); ?></strong>
                <?php echo $currency_helper->get_monetary_amount($campaign->get_goal()); ?></span>
            </div>

            <div class="link-box"><a href="<?php echo get_permalink($campaign->ID); ?>" class="theme-btn btn-style-two">
                <span class="btn-title"><?php echo esc_html__('Read More', 'loveus-core'); ?></span></a>
            </div>


          </div>

        </div>
      </div>
      <?php }?>
    </div>

  </div>
</section>
<?php
} elseif ($select_layout == 'layout_1') {
            ?>

<section class="causes-section">
  <div class="auto-container">
    <?php headerSettings::getHeaderInfo($settings);?>
    <div class="row clearfix">

      <?php
foreach ($settings['items2'] as $item) {

                $campaign = charitable_get_campaign($item['causes_layout1']);

                $image_url = get_the_post_thumbnail_url($campaign->ID);

                $currency_helper = charitable_get_currency_helper();
                ?>
      <div class="cause-block <?php echo $coloumn_class; ?> col-md-6 col-sm-12">
        <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
          <div class="image-box">
            <figure class="image"><a href="<?php echo get_permalink($campaign->ID); ?>"><img 
                  src="<?php echo $image_url; ?>"  alt=""></a>
            </figure>
          </div>
          <div class="donate-info">
            <div class="progress-box">
              <div class="bar">
                <div class="bar-inner count-bar"
                  data-percent="<?php echo esc_html(floor($campaign->get_percent_donated_raw()) . '%'); ?>">
                  <div class="count-text"><?php echo esc_html(floor($campaign->get_percent_donated_raw()) . '%'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="donation-count clearfix">
              <span class="raised"><strong><?php echo esc_html__('Raised:', 'loveus-core'); ?></strong>
                <?php echo $currency_helper->get_monetary_amount($campaign->get_donated_amount()); ?></span>
              <span class="goal"><strong><?php echo esc_html__('Goal:', 'loveus-core'); ?></strong>
                <?php echo $currency_helper->get_monetary_amount($campaign->get_goal()); ?></span>
            </div>
          </div>
          <div class="lower-content">

            <h3><a href="<?php echo get_permalink($campaign->ID); ?>"><?php echo $campaign->post_title; ?></a></h3>
            <div class="text"><?php charitable_template_campaign_description($campaign);?></div>

            <div class="link-box"><a href="<?php echo get_permalink($campaign->ID); ?>"
                class="theme-btn btn-style-two"><span
                  class="btn-title"><?php echo esc_html__('Read More', 'loveus-core'); ?></span></a>
            </div>
          </div>
        </div>

      </div>

      <?php }?>
    </div>

  </div>
</section>
<?php
} else {
            ?>

<section class="causes-section no-padding-top">
  <div class="circle-one"></div>

  <div class="auto-container">
    <?php headerSettings::getHeaderInfo($settings);?>
    <div class="row clearfix">
      <?php
foreach ($settings['items1'] as $item) {

                $campaign = charitable_get_campaign($item['causes']);
                $image_url = get_the_post_thumbnail_url($campaign->ID);
                $currency_helper = charitable_get_currency_helper();
                ?>
      <!--Cause Block / ALternate-->
      <div class="cause-block alternate <?php echo $coloumn_class; ?> col-md-6 col-sm-12">
        <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
          <div class="donate-info">
            <div class="bg-image-layer " style="background-image: url('<?php echo esc_url($image_url); ?>')" ></div>
            <div class="progress-box">
              <div class="bar">
                <div class="bar-inner count-bar"
                  data-percent="<?php echo esc_html(floor($campaign->get_percent_donated_raw()) . '%'); ?>">
                  <div class="count-text"><?php echo esc_html(floor($campaign->get_percent_donated_raw()) . '%'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="donation-count clearfix">
              <span class="raised"><strong><?php echo esc_html__('Raised:', 'loveus-core'); ?></strong>
                <?php echo $currency_helper->get_monetary_amount($campaign->get_donated_amount()); ?></span>
              <span class="goal"><strong><?php echo esc_html__('Goal:', 'loveus-core'); ?></strong>
                <?php echo $currency_helper->get_monetary_amount($campaign->get_goal()); ?></span>
            </div>
          </div>

          <div class="lower-content">

            <h3><a href="<?php echo get_permalink($campaign->ID); ?>"><?php echo $campaign->post_title; ?></a></h3>
            <div class="text"><?php charitable_template_campaign_description($campaign);?></div>
            <div class="link-box"><a href="<?php echo get_permalink($campaign->ID); ?>"
                class="theme-btn btn-style-two"><span
                  class="btn-title"><?php echo esc_html__('Read More', 'loveus-core'); ?></span></a>
            </div>
          </div>
        </div>
      </div>
      <?php }?>

    </div>

  </div>
</section>


<?php
}
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \LoveusPopulerCauses());