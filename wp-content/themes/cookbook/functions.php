<?php

function WM_Scripts(){

    wp_register_script( 'jScript', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js' );
    wp_register_script('bootstrapjs',get_template_directory_uri() .'/js/bootstrap.min.js');
    wp_enqueue_script( 'jScript' );
    wp_enqueue_script( 'bootstrapjs' );

}
add_action( 'wp_enqueue_scripts', 'WM_Scripts' );

function WM_CSS(){
    wp_register_style( 'bootstrapGrid', get_template_directory_uri() . '/css/bootstrap.min.css' );

    wp_enqueue_style( 'bootstrapGrid' );

}
add_action( 'wp_enqueue_scripts', 'WM_CSS' );



 function load_stylesheets(){

    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all;');
     wp_enqueue_style( 'bootstrap' );



     wp_register_style('style', get_template_directory_uri() . '/style.css', array(), false, 'all');
      wp_enqueue_style( 'style' );
 }

 add_action( 'wp_enqueue_scripts', 'load_stylesheets');


function loadjquery(){

        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery3.1.1.min.js', '', 1, true);


}

        add_action( 'wp_enqueue_scripts', 'loadjquery');

 function loadjs(){

   wp_register_script('customjs', get_template_directory_uri() . '/js/scripts.js', '', 1, true);
    wp_enqueue_script( 'customjs' );


 }

 add_action( 'wp_enqueue_scripts', 'loadjs');

 add_theme_support( 'menus' );

 register_nav_menus(

        array(
          'top-menu' => __('Top Menu', 'theme'),
          'footer-menu' => __('Footer Menu', 'theme'),
        )
   );
add_theme_support( 'post-thumbnails' );

add_image_size ('smallest', 250,250, true);
add_image_size ('medium', 400,400, true);

function recipes_post() {
  $labels = array(
    'name'               => _x( 'Recipes', 'post type general name' ),
    'singular_name'      => _x( 'Recipe', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'recipe' ),
    'add_new_item'       => __( 'Add New Recipes' ),
    'edit_item'          => __( 'Edit Recipe' ),
    'new_item'           => __( 'New Recipe' ),
    'all_items'          => __( 'All recipes' ),
    'view_item'          => __( 'View Recipe' ),
    'search_items'       => __( 'Search Recipe' ),
    'not_found'          => __( 'No recipe found' ),
    'not_found_in_trash' => __( 'No recipe found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Recipes'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds recipes and recipes specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'recipes', $args );
}
add_action( 'init', 'recipes_post' );

function easytuts_taxonomies_recipes() {
  $labels = array(
    'name'              => _x( 'Recipes Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Recipe Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Recipe Categories' ),
    'all_items'         => __( 'All Recipes Categories' ),
    'parent_item'       => __( 'Parent Recipes Category' ),
    'parent_item_colon' => __( 'Parent Recipe Category:' ),
    'edit_item'         => __( 'Edit Recipe Category' ),
    'update_item'       => __( 'Update Recipe Category' ),
    'add_new_item'      => __( 'Add New Recipe Category' ),
    'new_item_name'     => __( 'New Recipe Category' ),
    'menu_name'         => __( 'Recipes Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'cookbook', 'recipes', $args );
}
add_action( 'init', 'easytuts_taxonomies_recipes', 0 );

add_filter('wp_insert_post_data', 'my_post_data_validator', '99');
function my_post_data_validator($data) {
  if ($data['post_type'] == 'post') {

// If post data is invalid then
$data['post_status'] = 'pending';
add_filter('redirect_post_location', 'my_post_redirect_filter', '99');
}
return $data;
}

function my_post_redirect_filter($location) {
remove_filter('redirect_post_location', __FILTER__, '99');
return add_query_arg('my_message', 1, $location);
}

add_action('admin_notices', 'my_post_admin_notices');
function my_post_admin_notices() {
if (!isset($_GET['my_message'])) return;
switch (absint($_GET['my_message'])) {
case 1:
  $message = 'Invalid post data';
  break;
default:
  $message = 'Unexpected error';
}
echo '<div id="notice" class="error"><p>' . $message . '</p></div>';
}
