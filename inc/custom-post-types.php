<?php
/**
 * Custom Post Types for Spotlight Theme
 *
 * @package Spotlight
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Projects Custom Post Type
 */
function spotlight_register_projects_cpt() {
    $labels = array(
        'name'                  => _x( 'Projects', 'Post Type General Name', 'spotlight' ),
        'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'spotlight' ),
        'menu_name'             => __( 'Projects', 'spotlight' ),
        'name_admin_bar'        => __( 'Project', 'spotlight' ),
        'archives'              => __( 'Project Archives', 'spotlight' ),
        'attributes'            => __( 'Project Attributes', 'spotlight' ),
        'parent_item_colon'     => __( 'Parent Project:', 'spotlight' ),
        'all_items'             => __( 'All Projects', 'spotlight' ),
        'add_new_item'          => __( 'Add New Project', 'spotlight' ),
        'add_new'               => __( 'Add New', 'spotlight' ),
        'new_item'              => __( 'New Project', 'spotlight' ),
        'edit_item'             => __( 'Edit Project', 'spotlight' ),
        'update_item'           => __( 'Update Project', 'spotlight' ),
        'view_item'             => __( 'View Project', 'spotlight' ),
        'view_items'            => __( 'View Projects', 'spotlight' ),
        'search_items'          => __( 'Search Project', 'spotlight' ),
    );

    $args = array(
        'label'                 => __( 'Project', 'spotlight' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );

    register_post_type( 'project', $args );
}
add_action( 'init', 'spotlight_register_projects_cpt', 0 );

/**
 * Register Speaking Custom Post Type
 */
function spotlight_register_speaking_cpt() {
    $labels = array(
        'name'                  => _x( 'Speaking Engagements', 'Post Type General Name', 'spotlight' ),
        'singular_name'         => _x( 'Speaking', 'Post Type Singular Name', 'spotlight' ),
        'menu_name'             => __( 'Speaking', 'spotlight' ),
        'name_admin_bar'        => __( 'Speaking', 'spotlight' ),
        'all_items'             => __( 'All Speaking', 'spotlight' ),
        'add_new_item'          => __( 'Add New Speaking', 'spotlight' ),
        'add_new'               => __( 'Add New', 'spotlight' ),
        'new_item'              => __( 'New Speaking', 'spotlight' ),
        'edit_item'             => __( 'Edit Speaking', 'spotlight' ),
        'update_item'           => __( 'Update Speaking', 'spotlight' ),
        'view_item'             => __( 'View Speaking', 'spotlight' ),
    );

    $args = array(
        'label'                 => __( 'Speaking', 'spotlight' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-megaphone',
        'show_in_admin_bar'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );

    register_post_type( 'speaking', $args );
}
add_action( 'init', 'spotlight_register_speaking_cpt', 0 );

/**
 * Register Work History Custom Post Type
 */
function spotlight_register_work_cpt() {
    $labels = array(
        'name'                  => _x( 'Work History', 'Post Type General Name', 'spotlight' ),
        'singular_name'         => _x( 'Work', 'Post Type Singular Name', 'spotlight' ),
        'menu_name'             => __( 'Work History', 'spotlight' ),
        'all_items'             => __( 'All Work', 'spotlight' ),
        'add_new_item'          => __( 'Add New Work', 'spotlight' ),
        'edit_item'             => __( 'Edit Work', 'spotlight' ),
    );

    $args = array(
        'label'                 => __( 'Work', 'spotlight' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-briefcase',
        'show_in_admin_bar'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );

    register_post_type( 'work', $args );
}
add_action( 'init', 'spotlight_register_work_cpt', 0 );
