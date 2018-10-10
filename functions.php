<?php

// Composer
require_once(__DIR__ . '/vendor/autoload.php');

// Timber
$timber = new \Timber\Timber();

add_action('wp_footer', 'ajout_commentaire_footer');
function ajout_commentaire_footer(){
    echo '<!-- Je suis un commentaire -->';
}
add_action('wp_enqueue_scripts', 'ajout_css_js');
function ajout_css_js(){
  //get_template_directory_uri() => racine du theme
  wp_register_script('main_script_header', get_template_directory_uri() . '/assets/scripts/main.js', array('jquery'),'1.1', false);
  wp_enqueue_script('main_script_header');
  wp_register_script('main_script_footer', get_template_directory_uri() . '/assets/scripts/main_footer.js', array('jquery'),'1.1', true);
  wp_enqueue_script('main_script_footer');
}

// Global context, available to all templates
function add_to_context( $context ) {

  // Menus
  $data['main_menu'] = new TimberMenu('main'); 
  $data['footer_menu'] = new TimberMenu('footer');

  // Sidebar
  if(is_single() or is_archive() or is_home() or is_front_page()):
    $data['sidebar'] = Timber::get_widgets('Blog');
  endif;

  return $context;
}
add_filter('timber_context', 'add_to_context');