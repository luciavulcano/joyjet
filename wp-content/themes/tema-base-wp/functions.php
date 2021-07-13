<?php

if (function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
    'page_title'     => 'General options',
    'menu_title'    => 'General options',
    'menu_slug'     => 'theme-general-settings',
    'capability'    => 'edit_posts',
    'redirect'        => false
  ));
}
// admin config acf

add_theme_support('post-thumbnails', array('post', 'page'));
// featured image pages
add_filter('use_block_editor_for_post', '__return_false');

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
  require_once get_template_directory() . '/inc/navbar/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

function prefix_modify_nav_menu_args($args)
{
  return array_merge($args, array(
    'walker' => new WP_Bootstrap_Navwalker(),
  ));
}
add_filter('wp_nav_menu_args', 'prefix_modify_nav_menu_args');

/**
 * Register nav menu primary
 */
register_nav_menus(array(
  'primary' => __('Primary Menu', 'h2'),
));

/**
 * enqueue global styles
 */
function wpdocs_theme_name_scripts()
{
  wp_enqueue_style('slick-h2', 'https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick-theme.css', array(), rand(111, 9999), 'all');
  wp_enqueue_style('slickt-h2', 'https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.css', array(), rand(111, 9999), 'all');
  wp_enqueue_style('global-h2', get_template_directory_uri() . '/css/style.min.css', array(), rand(111, 9999), 'all');
  wp_enqueue_style('font-principal', 'https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', array(), rand(111, 9999), 'all');


  wp_deregister_script('jquery');
  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', false, false, true);
  wp_enqueue_script('bs4-h2', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'),  '', 'all');
  wp_enqueue_script('slick-h2-js', 'https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.min.js', array('jquery'), rand(111, 9999), 'all');



  wp_enqueue_script('global-h2-js', get_template_directory_uri() . '/js/global.js', array('jquery'),  rand(111, 9999), 'all');
  wp_enqueue_script('modal', get_template_directory_uri() . '/js/modal.js', array('jquery'),  rand(111, 9999), 'all');
  wp_enqueue_script('home-carrosel', get_template_directory_uri() . '/js/homeCarrosel.js', array('jquery'),  rand(111, 9999), 'all');
}
add_action('wp_enqueue_scripts', 'wpdocs_theme_name_scripts');

add_theme_support('post-thumbnails');


/**
 * Remove wp tags
 */
require_once('inc/remove-wp.php');

/**
 * Custom login page
 */
require_once('inc/login-page.php');

/**
 * Custom admin page
 */
require_once('inc/wp-admin.php');


/**
 * Upload SVG files
 */
require_once('inc/svg-upload.php');

/**
 * Remove emojis
 */
require_once('inc/remove-emojis.php');

/**
 * Remove posts 
 */
require_once('inc/remove-posts.php');

/**
 * Remove comments 
 */
require_once('inc/remove-comments.php');

add_action('add_meta_boxes', 'NAME_remove_meta_boxes', 100);
function NAME_remove_meta_boxes()
{
  remove_meta_box('trackbacksdiv', 'post', 'normal'); // Trackbacks meta box
  remove_meta_box('postcustom', 'post', 'normal'); // Custom fields meta box
  remove_meta_box('commentsdiv', 'post', 'normal'); // Comments meta box
  remove_meta_box('slugdiv', 'post', 'normal');  // Slug meta box
  remove_meta_box('authordiv', 'post', 'normal'); // Author meta box
  remove_meta_box('revisionsdiv', 'post', 'normal'); // Revisions meta box
  remove_meta_box('formatdiv', 'post', 'normal'); // Post format meta box
  remove_meta_box('commentstatusdiv', 'post', 'normal'); // Comment status meta box
  remove_meta_box('categorydiv', 'post', 'side'); // Category meta box
  remove_meta_box('tagsdiv-post_tag', 'post', 'side'); // Post tags meta box
  remove_meta_box('pageparentdiv', 'post', 'side'); // Page attributes meta box

  //remove_meta_box( 'file_gallery', 'post', 'normal'); // File Gallery Plugin
  //remove_meta_box( 'wpseo_meta', 'post', 'normal'); // YOAST Seo
  //remove_meta_box( 'gdsr-meta-box-mur', 'post', 'advanced');  // GD Star Rating
  //remove_meta_box( 'gdsr-meta-box', 'post', 'side' ); // GD Star Rating
  //remove_meta_box( 'yourlsdiv', 'post', 'side'); // YOURLS
}

// Replace 'post' with whatever post type you are trying to hide meta boxes for.


function cards_custom_post_type()
{

  // Set UI labels for Custom Post Type
  $labels = array(
    'name'                => _x('Cards Infos', 'Post Type General Name', 'h2'),
    'singular_name'       => _x('Card', 'Post Type Singular Name', 'h2'),
    'menu_name'           => __('Cards Infos', 'h2'),
    'parent_item_colon'   => __('Parent Card', 'h2'),
    'all_items'           => __('All Card', 'h2'),
    'view_item'           => __('See Card', 'h2'),
    'add_new_item'        => __('Add new Card', 'h2'),
    'add_new'             => __('Add new', 'h2'),
    'edit_item'           => __('Edit Card', 'h2'),
    'update_item'         => __('Update Card', 'h2'),
    'search_items'        => __('Search Card', 'h2'),
    'not_found'           => __('Not found', 'h2'),
    'not_found_in_trash'  => __('Not found - trash', 'h2'),
  );

  // Set other options for Custom Post Type

  $args = array(
    'label'               => __('Cards', 'h2'),
    'description'         => __('Cards and details', 'h2'),
    'labels'              => $labels,
    // Features this CPT supports in Post Editor
    'supports'            => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields'),
    /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'menu_icon'           => 'dashicons-admin-site',
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
    'show_in_rest' => true,

  );

  // Registering your Custom Post Type
  register_post_type('cards', $args);
}

/* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */

add_action('init', 'cards_custom_post_type', 0);





// Set UI labels for Custom Post Type
$labels = array(
  'name'                => _x('Lugares', 'Post Type General Name', 'h2'),
  'singular_name'       => _x('Lugar', 'Post Type Singular Name', 'h2'),
  'menu_name'           => __('Lugares', 'h2'),
  'parent_item_colon'   => __('Parent Lugar', 'h2'),
  'all_items'           => __('Todos os Lugares', 'h2'),
  'view_item'           => __('Ver Lugar', 'h2'),
  'add_new_item'        => __('Adicionar novo Lugar', 'h2'),
  'add_new'             => __('Adicionar novo', 'h2'),
  'edit_item'           => __('Editar Lugar', 'h2'),
  'update_item'         => __('Atualizar Lugar', 'h2'),
  'search_items'        => __('Procurar Lugar', 'h2'),
  'not_found'           => __('Nada encontrado', 'h2'),
  'not_found_in_trash'  => __('Nada encontrada na lixeira', 'h2'),
);

// Set other options for Custom Post Type

$args = array(
  'label'               => __('Lugares', 'h2'),
  'description'         => __('Cadastro de Lugares e seus detalhes', 'h2'),
  'labels'              => $labels,
  // Features this CPT supports in Post Editor
  'supports'            => array('title', 'author', 'thumbnail', 'revisions', 'custom-fields'),
  /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
  'hierarchical'        => false,
  'public'              => true,
  'show_ui'             => true,
  'show_in_menu'        => true,
  'show_in_nav_menus'   => true,
  'show_in_admin_bar'   => true,
  'menu_position'       => 5,
  'can_export'          => true,
  'has_archive'         => false,
  'exclude_from_search' => true,
  'menu_icon'           => 'dashicons-admin-site',
  'publicly_queryable'  => true,
  'capability_type'     => 'post',
  'show_in_rest' => true,

);





// Set other options for Custom Post Type







remove_filter('the_content', 'wpautop');

remove_filter('the_excerpt', 'wpautop');

remove_filter('acf_the_content', 'wpautop');

add_filter('wpcf7_autop_or_not', '__return_false');
