<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php get_bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>

    <body>

        <header class="header-main" style="background-image: url('<?php header_image(); ?>')">
            <div class="container">
                <?php the_custom_logo(); ?>
                <?php wp_nav_menu(['theme_location' => 'main-menu', 'container' => 'nav']); ?>
            </div>
        </header>

        <main>