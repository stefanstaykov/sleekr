<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @since 1.0.0
 * @package Sleekr
 */

get_header(); ?>

    <!-- Page Content -->
    <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3"><?php esc_html_e('Oooops... Error 404','sleekr'); ?></h1>
    <?php sleekr_custom_breadcrumbs(); ?>

        <div class="row">

            <div class="col">
                <div class="jumbotron">
                    <h1><span class="error-404">404</span></h1>
                    <p><?php esc_html_e('The page you\'re looking for could not be found. Here are some helpful links to get you back on track:','sleekr');?></p>
                    <!-- Custom 404 Widget Areas set from Appearance -> Widgets -->
		    <div class="row">
                        <?php if ( is_active_sidebar( 's404' ) ) : ?>
                            <div class="col-lg-4">
    	                        <?php dynamic_sidebar( 's404' ); ?>
    	                    </div>
                        <?php endif; ?>
                        <?php if ( is_active_sidebar( 's404-2' ) ) : ?>
                            <div class="col-lg-4">
    	                        <?php dynamic_sidebar( 's404-2' ); ?>
    	                    </div>
                        <?php endif; ?>
                        <?php if ( is_active_sidebar( 's404-3' ) ) : ?>
                            <div class="col-lg-4">
    	                        <?php dynamic_sidebar( 's404-3' ); ?>
    	                    </div>
                        <?php endif; ?>
                    </div><!-- /.row -->
                </div><!-- /.jumbotron -->
            </div><!-- /.col -->

        </div><!-- /.row -->

<?php get_footer(); ?>
