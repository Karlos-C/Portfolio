<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php  echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body>
    
    <?php wp_nav_menu(['theme_location' => 'header'])?>