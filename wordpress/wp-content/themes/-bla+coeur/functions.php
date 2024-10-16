<?php

function my_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    // add_image_size('post-thumbnail', 200, 200, true);

    $defaults = array(
        'height' => 50,
        'width' => 200,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );
    add_theme_support('custom-logo', $defaults);
}

function enqueue_tailwind()
{
    wp_enqueue_style('tailwind-css', get_template_directory_uri() . '/src/output.css');
}

# CPT
function montheme_init()
{
    // register_taxonomy('projets', 'post', [
    //     'labels' => [
    //         'name' => 'Projet',
    //         'singular_name' => 'Projet',
    //         'plural_name' => 'Projet',
    //         'search_items ' => 'Rechercher des projet',
    //         'all_items' => 'Tous les projets',
    //         'edit_item' => 'Editer le projet',
    //         'update_item' => 'Mettre à jour le projet',
    //         'add_new_item' => 'Ajouter un nouveau projet',
    //         'new_item_name' => 'Ajouter un nouveau projet',
    //         "menu_name" => 'Projet',
    //     ],
    //     'show_in_rest' => true,
    //     'hierarchical' => true,
    // ]);
    $labels = array(
        'name' => 'Projet',
        'singular_name' => 'Projet',
        'add_new' => 'Add New Projet',
        'add_new_item' => 'Add New Projet',
        'edit_item' => 'Edit Projet Content',
        'new_item' => 'New Projet Content',
        'all_items' => 'All Projets',
        'view_item' => 'View Projet Content',
        'search_items' => 'Search Projets',
        'not_found' => 'No Projet Contents Found',
        'not_found_in_trash' => 'No Projet Contents found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Projets',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-heart',
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        // 'rewrite' => array('slug' => 'homepage_content'),
        // 'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            // 'trackbacks',
            // 'custom-fields',
            // 'comments',
            // 'revisions',
            'thumbnail',
            'author',
            // 'page-attributes'
        ),
        'show_in_rest' => true,
        'show_in_menu' => true,
    );

    register_post_type('projets', $args);

}

add_action('wp_enqueue_scripts', 'enqueue_tailwind');
add_action('after_setup_theme', 'my_theme_setup');
add_action('init', 'montheme_init');

