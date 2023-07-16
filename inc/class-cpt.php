<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**********************************************************************************
 * Marbles Custom Post Type
 ***********************************************************************************/
// add cpt and custom taxoonomies Services
function create_csg_marbles_cpt(){
    $labels = array(
        'name' => __('Marbles', 'Post Type General Name', 'csg'),
        'singular_name' => __('Marble', 'Post Type Singular Name', 'csg'),
        'menu_name' => __('Marbles' , 'csg'),
        'name_admin_bar' => __('Marbles' , 'csg'),
        'archives' => __('Marbles Archives' , 'csg'),
        'attributes' => __('Marbles Attributes ' , 'csg'),
        'parent_item_colon' => __('Parent Marbles ' , 'csg'),
        'all_items' => __('All Marbles ' , 'csg'),
        'add_new_item' => __('Add New Marble ' , 'csg'),
        'add_new' => __('Add New ' , 'csg'),
        'new_item' => __('New Marble ' , 'csg'),
        'edit_item' => __('Edit Marble ' , 'csg'),
        'update_item' => __('Update Marble ' , 'csg'),
        'view_item' => __('View Marble ' , 'csg'),
        'search_item' => __('Search Marble ' , 'csg'),
        'not_found_in_trash' => __('No Marbles Found in trash' , 'csg'),
        'featured_image' => __('Marble Featured Image' , 'csg'),
        'set_featured_image' => __('Set Marble Featured Image' , 'csg'),
        'remove_featured_image' => __('Remove Marble Featured Image' , 'csg'),
        'use_featured_image' => __('Use as Marble Featured Image' , 'csg'),
        'insert_into_item' => __('Insert into Marbles' , 'csg'),
        'uploaded_to_this_item' => __('Uploaded to this Marbles' , 'csg'),
        'items_list' => __('Marbles List' , 'csg'),
        'items_list_navigation' => __('Marbles List Navigation' , 'csg'),
        'filter_items_list' => __('Filter Marbles List' , 'csg'),
    );

    $args = array(
        'label' => __('Marbles' , 'csg'),
        'description' => __('Marbles Module' , 'csg'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-schedule',
        'supports' => array('title', 'thumbnail', 'revisions', 'author', 'editor'),
//        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'marbles')
    );

    register_post_type('marbles', $args);
}

add_action('init', 'create_csg_marbles_cpt', 0);


function rewrite_csg_marbles_flush(){
    create_csg_marbles_cpt();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'rewrite_csg_marbles_flush');



/**********************************************************************************
 * Granite Custom Post Type
 ***********************************************************************************/
// add cpt and custom taxoonomies Services
function create_csg_granite_cpt(){
    $labels = array(
        'name' => __('Granite', 'Post Type General Name', 'csg'),
        'singular_name' => __('Granite', 'Post Type Singular Name', 'csg'),
        'menu_name' => __('Granite' , 'csg'),
        'name_admin_bar' => __('Granite' , 'csg'),
        'archives' => __('Granite Archives' , 'csg'),
        'attributes' => __('Granite Attributes ' , 'csg'),
        'parent_item_colon' => __('Parent Granite ' , 'csg'),
        'all_items' => __('All Granite ' , 'csg'),
        'add_new_item' => __('Add New Granite ' , 'csg'),
        'add_new' => __('Add New ' , 'csg'),
        'new_item' => __('New Granite ' , 'csg'),
        'edit_item' => __('Edit Granite ' , 'csg'),
        'update_item' => __('Update Granite ' , 'csg'),
        'view_item' => __('View Granite ' , 'csg'),
        'search_item' => __('Search Granite ' , 'csg'),
        'not_found_in_trash' => __('No Granite Found in trash' , 'csg'),
        'featured_image' => __('Granite Featured Image' , 'csg'),
        'set_featured_image' => __('Set Granite Featured Image' , 'csg'),
        'remove_featured_image' => __('Remove Granite Featured Image' , 'csg'),
        'use_featured_image' => __('Use as Granite Featured Image' , 'csg'),
        'insert_into_item' => __('Insert into Granite' , 'csg'),
        'uploaded_to_this_item' => __('Uploaded to this Granite' , 'csg'),
        'items_list' => __('Granite List' , 'csg'),
        'items_list_navigation' => __('Granite List Navigation' , 'csg'),
        'filter_items_list' => __('Filter Granite List' , 'csg'),
    );

    $args = array(
        'label' => __('Granite' , 'csg'),
        'description' => __('Granite Module' , 'csg'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-tagcloud',
        'supports' => array('title', 'thumbnail', 'revisions', 'author', 'editor'),
//        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'granite')
    );

    register_post_type('granite', $args);
}

add_action('init', 'create_csg_granite_cpt', 0);


function rewrite_csg_granite_flush(){
    create_csg_granite_cpt();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'rewrite_csg_granite_flush');



/**********************************************************************************
 * Art Work Custom Post Type
 ***********************************************************************************/
// add cpt and custom taxoonomies Services
function create_csg_artwork_cpt(){
    $labels = array(
        'name' => __('Art Work', 'Post Type General Name', 'csg'),
        'singular_name' => __('Art Work', 'Post Type Singular Name', 'csg'),
        'menu_name' => __('Art Work' , 'csg'),
        'name_admin_bar' => __('Art Work' , 'csg'),
        'archives' => __('Art Work Archives' , 'csg'),
        'attributes' => __('Art Work Attributes ' , 'csg'),
        'parent_item_colon' => __('Parent Art Work ' , 'csg'),
        'all_items' => __('All Art Work ' , 'csg'),
        'add_new_item' => __('Add New Art Work ' , 'csg'),
        'add_new' => __('Add New ' , 'csg'),
        'new_item' => __('New Art Work ' , 'csg'),
        'edit_item' => __('Edit Art Work ' , 'csg'),
        'update_item' => __('Update Art Work ' , 'csg'),
        'view_item' => __('View Art Work ' , 'csg'),
        'search_item' => __('Search Art Work ' , 'csg'),
        'not_found_in_trash' => __('No Art Work Found in trash' , 'csg'),
        'featured_image' => __('Art Work Featured Image' , 'csg'),
        'set_featured_image' => __('Set Art Work Featured Image' , 'csg'),
        'remove_featured_image' => __('Remove Art Work Featured Image' , 'csg'),
        'use_featured_image' => __('Use as Art Work Featured Image' , 'csg'),
        'insert_into_item' => __('Insert into Art Work' , 'csg'),
        'uploaded_to_this_item' => __('Uploaded to this Art Work' , 'csg'),
        'items_list' => __('Art Work List' , 'csg'),
        'items_list_navigation' => __('Art Work List Navigation' , 'csg'),
        'filter_items_list' => __('Filter Art Work List' , 'csg'),
    );

    $args = array(
        'label' => __('Art Work' , 'csg'),
        'description' => __('Art Work Module' , 'csg'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-format-image',
        'supports' => array('title', 'thumbnail', 'revisions', 'author', 'editor'),
//        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'artwork')
    );

    register_post_type('artwork', $args);
}

add_action('init', 'create_csg_artwork_cpt', 0);


function rewrite_csg_artwork_flush(){
    create_csg_artwork_cpt();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'rewrite_csg_artwork_flush');




/**********************************************************************************
 * Finishes Custom Post Type
 ***********************************************************************************/
// add cpt and custom taxoonomies Services
function create_csg_finishes_cpt(){
    $labels = array(
        'name' => __('Finishes', 'Post Type General Name', 'csg'),
        'singular_name' => __('Finishes', 'Post Type Singular Name', 'csg'),
        'menu_name' => __('Finishes' , 'csg'),
        'name_admin_bar' => __('Finishes' , 'csg'),
        'archives' => __('Finishes Archives' , 'csg'),
        'attributes' => __('Finishes Attributes ' , 'csg'),
        'parent_item_colon' => __('Parent Finishes ' , 'csg'),
        'all_items' => __('All Finishes ' , 'csg'),
        'add_new_item' => __('Add New Finishes ' , 'csg'),
        'add_new' => __('Add New ' , 'csg'),
        'new_item' => __('New Finishes ' , 'csg'),
        'edit_item' => __('Edit Finishes ' , 'csg'),
        'update_item' => __('Update Finishes ' , 'csg'),
        'view_item' => __('View Finishes ' , 'csg'),
        'search_item' => __('Search Finishes ' , 'csg'),
        'not_found_in_trash' => __('No Finishes Found in trash' , 'csg'),
        'featured_image' => __('Finishes Featured Image' , 'csg'),
        'set_featured_image' => __('Set Finishes Featured Image' , 'csg'),
        'remove_featured_image' => __('Remove Finishes Featured Image' , 'csg'),
        'use_featured_image' => __('Use as Finishes Featured Image' , 'csg'),
        'insert_into_item' => __('Insert into Finishes' , 'csg'),
        'uploaded_to_this_item' => __('Uploaded to this Finishes' , 'csg'),
        'items_list' => __('Finishes List' , 'csg'),
        'items_list_navigation' => __('Finishes List Navigation' , 'csg'),
        'filter_items_list' => __('Filter Finishes List' , 'csg'),
    );

    $args = array(
        'label' => __('Finishes' , 'csg'),
        'description' => __('Finishes Module' , 'csg'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-admin-appearance',
        'supports' => array('title', 'thumbnail', 'revisions', 'author', 'editor'),
//        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'finishes')
    );

    register_post_type('finishes', $args);
}

add_action('init', 'create_csg_finishes_cpt', 0);


function rewrite_csg_finishes_flush(){
    create_csg_finishes_cpt();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'rewrite_csg_finishes_flush');


/**********************************************************************************
 * Packing Custom Post Type
 ***********************************************************************************/
// add cpt and custom taxoonomies Services
function create_csg_packing_cpt(){
    $labels = array(
        'name' => __('Packing', 'Post Type General Name', 'csg'),
        'singular_name' => __('Packing', 'Post Type Singular Name', 'csg'),
        'menu_name' => __('Packing' , 'csg'),
        'name_admin_bar' => __('Packing' , 'csg'),
        'archives' => __('Packing Archives' , 'csg'),
        'attributes' => __('Packing Attributes ' , 'csg'),
        'parent_item_colon' => __('Parent Packing ' , 'csg'),
        'all_items' => __('All Packing ' , 'csg'),
        'add_new_item' => __('Add New Packing ' , 'csg'),
        'add_new' => __('Add New ' , 'csg'),
        'new_item' => __('New Packing ' , 'csg'),
        'edit_item' => __('Edit Packing ' , 'csg'),
        'update_item' => __('Update Packing ' , 'csg'),
        'view_item' => __('View Packing ' , 'csg'),
        'search_item' => __('Search Packing ' , 'csg'),
        'not_found_in_trash' => __('No Packing Found in trash' , 'csg'),
        'featured_image' => __('Packing Featured Image' , 'csg'),
        'set_featured_image' => __('Set Packing Featured Image' , 'csg'),
        'remove_featured_image' => __('Remove Packing Featured Image' , 'csg'),
        'use_featured_image' => __('Use as Packing Featured Image' , 'csg'),
        'insert_into_item' => __('Insert into Packing' , 'csg'),
        'uploaded_to_this_item' => __('Uploaded to this Packing' , 'csg'),
        'items_list' => __('Packing List' , 'csg'),
        'items_list_navigation' => __('Packing List Navigation' , 'csg'),
        'filter_items_list' => __('Filter Packing List' , 'csg'),
    );

    $args = array(
        'label' => __('Packing' , 'csg'),
        'description' => __('Packing Module' , 'csg'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => array('title', 'thumbnail', 'revisions', 'author', 'editor'),
//        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'packing')
    );

    register_post_type('packing', $args);
}

add_action('init', 'create_csg_packing_cpt', 0);


function rewrite_csg_packing_flush(){
    create_csg_packing_cpt();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'rewrite_csg_packing_flush');




