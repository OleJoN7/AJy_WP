<?php
/**
 * The header for our theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="main-nav">
    <div class="container">
        <nav id="site-navigation" class="navbar navbar-toggleable-md navbar-inverse main-nav" role="navigation">
            <div class="navbar-brand right">
                <?php the_custom_logo(); ?>
            </div>
            <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'menu_class' => 'navbar-nav',
                'container_class' => 'navbar-collapse collapse justify-content-end',
                'container_id' => 'navbarsExampleDefault'
            )); ?>
        </nav>
    </div>
</header>
