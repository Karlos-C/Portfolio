<?php 

function portfolio_supports() {
    add_theme_support('title-tag');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
}

add_action('after_setup_theme', 'portfolio_supports');
?>