<?php

function post_types()
{
    register_post_type('event', array(
        'public' => true,
        'labels' => array(
            'name' => "Events",
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => "Event"
        ),
        'menu_icon' => 'dashicons-calendar',
        'rewrite' => array('slug' => 'events', 'category' => 'events_category'),
        'taxonomies' => array('category'),
        'has_archive' => true,
        'supports' => array('title', 'editor','thumbnail', 'excerpt', 'custom-fields'),
        'capability_type' => 'event',
        'map_meta_cap' => true,
    ));

    register_post_type('plant', array(
        'public' => true,
        'labels' => array(
            'name' => "Plants",
            'add_new_item' => 'Add New Plant',
            'edit_item' => 'Edit Plant',
            'all_items' => 'All Plants',
            'singular_name' => "Plant"
        ),
        'menu_icon' => 'dashicons-carrot',
        'rewrite' => array('slug' => 'plants', 'category' => 'plants_category'),
        'taxonomies' => array('category'),
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'capability_type' => 'plant',
        'map_meta_cap' => true,
    ));

    register_post_type('tip', array(
        'public' => true,
        'labels' => array(
            'name' => "Tips",
            'add_new_item' => 'Add New Tip',
            'edit_item' => 'Edit Tip',
            'all_items' => 'All Tips',
            'singular_name' => "tip"
        ),
        'menu_icon' => 'dashicons-superhero-alt',
        'rewrite' => array('slug' => 'tips', 'category' => 'tips_category'),
        'taxonomies' => array('category'),
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'capability_type' => 'tip',
        'map_meta_cap' => true,
    ));

    register_post_type('tool', array(
        'public' => true,
        'labels' => array(
            'name' => "Tools",
            'add_new_item' => 'Add New Tool',
            'edit_item' => 'Edit Tool',
            'all_items' => 'All Tools',
            'singular_name' => "Tool"
        ),
        'menu_icon' => 'dashicons-hammer',
        'rewrite' => array('slug' => 'tools', 'category' => 'tools_category'),
        'taxonomies' => array('category'),
        'has_archive' => true,
        'supports' => array('title', 'editor','thumbnail', 'excerpt', 'custom-fields'),
        'capability_type' => 'tool',
        'map_meta_cap' => true,
    ));
}

add_action('init', 'post_types');
