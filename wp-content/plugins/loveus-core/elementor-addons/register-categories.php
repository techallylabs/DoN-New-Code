<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
function add_elementor_widget_categories($elements_manager) {
    $elements_manager->add_category(
            'loveuscore', [
        'title' => __('Love US Core', 'loveuscore'),
        'icon' => 'fa fa-plug',
            ]
    );
}
add_action('elementor/elements/categories_registered', 'add_elementor_widget_categories');

function getAnimationControl($obj, $animationClass = 'fadeInLeft', $animationDelay = '0', $animationDuration = '1500') {

    $obj->add_control(
            'heading', [
        'label' => __('Animation Options', 'loveuscore'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'default',
            ]
    );

    $obj->add_control(
            'animation_class', [
        'label' => __('Animation Class', 'loveuscore'),
        'type' => \Elementor\Controls_Manager::ANIMATION,
        'default' => $animationClass
            ]
    );

    $obj->add_control(
            'animation_delay_time', [
        'label' => __('Delay Time(ms)', 'loveuscore'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => $animationDelay
            ]
    );

    $obj->add_control(
            'animation_duration', [
        'label' => __('Duration Time(ms)', 'loveuscore'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => $animationDuration
            ]
    );
}
