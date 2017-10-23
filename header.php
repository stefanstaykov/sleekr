<?php
/**
 * The header of Sleekr Lite theme
 *
 * This is the template that displays all of the <head> section and everything up until Page Content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since 1.0.0
 * @package Sleekr
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Primary Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <?php sleekr_custom_logo(); ?>
        <!-- Mobile View Menu Button -->
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
            wp_nav_menu( array(
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'navbarResponsive',
                'menu_class'        => 'navbar-nav ml-auto',
                'fallback_cb'       => 'Bootstrap_NavWalker::fallback',
                'menu_id'           => 'primary-menu',
                'walker'            => new Bootstrap_NavWalker())
            );
        ?>
    </div><!-- /.container -->
</nav><!-- /Primary Navigation -->
