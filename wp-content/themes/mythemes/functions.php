

<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */


if (!defined('ABSPATH')) exit;

function my_theme_styles(){
    wp_enqueue_style('my_styles', get_stylesheet_directory_uri(). '/styles/css/styles.css', array());
}

add_action('wp_enqueue_scripts' , 'my_theme_styles');

function my_theme_scripts() {
    // Enqueue SlickNav script and styles
    wp_enqueue_script('slickNavScript', 'https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.0/jquery.slicknav.js', array('jquery'), '1.0.0', true);
    wp_enqueue_style('slickNavStyles', 'https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.0/slicknav.min.css', array(), '1.0.0', true);

    // Enqueue your custom script
    wp_enqueue_script('my_scripts', get_stylesheet_directory_uri() . '/scripts/my_scripts.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');

register_nav_menus(array(
    'main-menu'=> esc_html__('Main menu', 'my_theme'),
    'footer-menu'=> esc_html__('Footer menu', 'my_theme'),
    'social-menu'=> esc_html__('Social menu', 'my_theme')
));

function my_theme_logo_setup(){
    $defaults = array(
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title','site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme','my_theme_logo_setup');

function my_theme_logo_class($html){
    $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
    return $html;
}
add_filter('get_custom_logo','my_theme_logo_class');

function load_jquery() {
    wp_enqueue_script('jquery');
}
add_action('my_scripts', 'load_jquery');

function my_scripts() {
    wp_enqueue_script('my_scripts', get_stylesheet_directory_uri() . '/scripts/my_scripts.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'my_scripts');

?>
