<?php
/**
 * The header of Sleekr Lite theme
 *
 * This is the template that displays all of the <head> section and everything up until Page Content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since 1.0.0
 * @package Sleekr_Lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Default Favicon if non selected -->
    <link rel="shortcut icon" href="<?php echo THEME_URI. '/favicon.png'?>" />
    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
    <!-- Enable Threaded Comments support -->
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <!-- Translatable strings for .sticky & .bypostauthor -->
    <style>
        .sticky:before {content: "<?php echo esc_html_x('Featured','Sticky Post','sleekr-lite') ?>"}
        .comment-list .bypostauthor .pull-left:after {content: "<?php echo esc_html_x('Author','Comment by Post Author','sleekr-lite') ?>"}
    </style>
</head>

<body <?php body_class(); ?>>
<!-- Primary Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <!-- Mobile View Menu Button -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only"><?php esc_html_e('Toggle navigation','sleekr-lite'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
            <?php sleekr_custom_logo(); ?>
    </div><!-- /.navbar-header -->

        <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav navbar-right',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'menu_id'           => 'primary-menu',
                'walker'            => new WP_Bootstrap_Navwalker())
            );
        ?>
    </div><!-- /.container -->
</nav><!-- /Primary Navigation -->
