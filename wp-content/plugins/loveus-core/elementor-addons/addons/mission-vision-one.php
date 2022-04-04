<?php
use SmartDataSoft\HeaderSettings\headerSettings;

/**
 * Elementor Mission Vision Area Mission_vision_area mission_vision_area
 * @since 1.0.0
 */
class Mission_vision_area extends \Elementor\Widget_Base {
    public function get_name() {
        return 'mission_vision_area';
    }
    public function get_title() {
        return esc_html__('Mission Vision Area', 'plugin-name');
    }
    public function get_icon() {
        return 'fa fa-object-ungroup';
    }
    public function get_categories() {
        return ['loveuscore'];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'mission_vision_area',
            [
                'label' => esc_html__('Mission Vision Content', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'mission_vision_padding',
            [
                'label' => wp_kses_post('padding bottom', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'paddin-on' => esc_html__('on', 'plugin-domain'),
                    'padding-off' => esc_html__('off', 'plugin-domain'),
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->start_controls_tabs(
            'mission_vision_tabs'
        );
        $repeater->start_controls_tab(
            'mission_vision_header',
            [
                'label' => __('Header', 'plugin-name'),
            ]
        );
        headerSettings::getHeaderSettings($repeater);
        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            'mission_vision_content',
            [
                'label' => __('Content', 'plugin-name'),
            ]
        );
        $repeater->add_control(
            'mission_vision_left_right',
            [
                'label' => wp_kses_post('Mission Vision Img Section </br>  Left or right', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'mission' => esc_html__('Left', 'plugin-domain'),
                    'vision' => esc_html__('right', 'plugin-domain'),
                ],
            ]
        );
        $repeater->add_control(
            'mission_vision_two_img',
            [
                'label' => esc_html__('Mission Vision Two Img Enable', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Enable', 'plugin-domain'),
                'label_off' => __('Disable', 'plugin-domain'),
                'return_value' => 'no',
            ]
        );
        $repeater->add_control(
            'mission_vision_one', [
                'label' => esc_html__('Mission Vision one', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'mission_vision_two', [
                'label' => esc_html__('Mission Vision two', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'mission_vision_two_img' => 'no',
                ],
            ]
        );
        $repeater->end_controls_tab();

        $repeater->end_controls_tabs();
        $this->add_control(
            'mission_vision_list', [
                'label' => esc_html__('Slider list', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $mission_vision_padding = $settings['mission_vision_padding'];
        $mission_vision_list = $settings['mission_vision_list'];
        ?>
<!--Mission Vision Section-->
<section class="mission-vision <?php echo esc_attr($mission_vision_padding); ?>">
  <div class="circle-one"></div>
  <div class="circle-two"></div>
  <div class="auto-container">
    <?php if ($mission_vision_list): ?>
    <?php foreach ($mission_vision_list as $item) {?>
    <div class="<?php echo esc_attr($item['mission_vision_left_right']); ?>">
      <div class="row clearfix">
        <div class="text-column col-lg-6 col-md-12 col-sm-12">
          <div class="inner">
            <?php headerSettings::getHeaderInfo($item);?>
          </div>
        </div>
        <div class="image-column col-lg-6 col-md-12 col-sm-12">
          <div class="inner">
            <?php

            $mission_vision_one = '#';
            if (isset($item['mission_vision_one']['id'])) {
                $mission_vision_one = ($item['mission_vision_one']['id'] != '') ? wp_get_attachment_url($item['mission_vision_one']['id'], 'full') : $item['mission_vision_one']['url'];
            }

            $mission_vision_two = '#';
            if (isset($item['mission_vision_two']['id'])) {
                $mission_vision_two = ($item['mission_vision_two']['id'] != '') ? wp_get_attachment_url($item['mission_vision_two']['id'], 'full') : $item['mission_vision_two']['url'];
            }

            if ($item['mission_vision_two_img'] == 'no'):

            ?>
            <div class="row clearfix">
              <div class="image wow fadeInUp" data-wow-delay="0ms"><img
                  src="<?php echo esc_url($mission_vision_one); ?>"></div>
              <div class="image wow fadeInDown" data-wow-delay="0ms"><img
                  src="<?php echo esc_url($mission_vision_two); ?>"></div>
            </div>
            <?php else: ?>
            <div class="image wow fadeInUp" data-wow-delay="0ms">
              <img src="<?php echo esc_url($mission_vision_one); ?>"></div>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>
    <?php }?>
    <?php endif;?>
  </div>
</section>
<?php
}
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Mission_vision_area());