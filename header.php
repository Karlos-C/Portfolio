<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php  echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>

    <!-- Google Analytic -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6KR55R7H25"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-6KR55R7H25');
    </script>
</head>
<body>
<nav>
    <div class="nav__header">
        <div class="nav__logo">
            <a href="<?php echo home_url(); ?>">
                <?php echo get_bloginfo('name'); ?>
            </a>
        </div>

        <div class="nav__menu__btn" id="menu-btn">
            <i class="ri-menu-line"></i>
        </div>
    </div>

    <?php
    wp_nav_menu([
        'theme_location' => 'header',   
        'container' => 'ul',           
        'menu_class' => 'nav__links',  
        'fallback_cb' => false,        
    ]);
    ?>

    <div class="nav__btn">
        <a href="<?php echo wp_get_attachment_url(67); ?>" target="_blank">
            Voir mon CV
        </a>
    </div>
</nav>