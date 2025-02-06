<?php 
function portfolio_supports() {
    add_theme_support('title-tag'); 
    add_theme_support('menus'); 
    register_nav_menu('header', 'En tête du menu'); 
}
add_action('after_setup_theme', 'portfolio_supports');

function ajouter_scripts() {
    wp_enqueue_script(
        'a-propos-section', 
        get_template_directory_uri() . '/scripts/a-propos-section.js',
        null,
        true 
    );
}
add_action('wp_enqueue_scripts', 'ajouter_scripts');
?>