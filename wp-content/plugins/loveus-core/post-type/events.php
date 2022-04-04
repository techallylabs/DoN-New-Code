<?php
// Register Custom Post Type
function loveus_event_post_type() {

    $labels = array(
        'name' => _x('Events', 'Post Type General Name', 'plugin-name'),
        'singular_name' => _x('Event', 'Post Type Singular Name', 'plugin-name'),
        'menu_name' => __('Event', 'plugin-name'),
        'name_admin_bar' => __('Event', 'plugin-name'),
        'archives' => __('Item Event', 'plugin-name'),
        'parent_item_colon' => __('Parent Item:', 'plugin-name'),
        'all_items' => __('All Event', 'plugin-name'),
        'add_new_item' => __('Add New Event', 'plugin-name'),
        'add_new' => __('Add New Event', 'plugin-name'),
        'new_item' => __('New Event Item', 'plugin-name'),
        'edit_item' => __('Edit Event Item', 'plugin-name'),
        'update_item' => __('Update Event Item', 'plugin-name'),
        'view_item' => __('View Event Item', 'plugin-name'),
        'search_items' => __('Search Item', 'plugin-name'),
        'not_found' => __('Not found', 'plugin-name'),
        'not_found_in_trash' => __('Not found in Trash', 'plugin-name'),
        'featured_image' => __('Featured Image', 'plugin-name'),
        'set_featured_image' => __('Set featured image', 'plugin-name'),
        'remove_featured_image' => __('Remove featured image', 'plugin-name'),
        'use_featured_image' => __('Use as featured image', 'plugin-name'),
        'insert_into_item' => __('Insert into item', 'plugin-name'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'plugin-name'),
        'items_list' => __('Items list', 'plugin-name'),
        'items_list_navigation' => __('Items list navigation', 'plugin-name'),
        'filter_items_list' => __('Filter items list', 'plugin-name'),
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'plugin-name'),
        'public' => true,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'event'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail'),
    );
    register_post_type('loveus_events', $args);
}

add_action('init', 'loveus_event_post_type', 0);

