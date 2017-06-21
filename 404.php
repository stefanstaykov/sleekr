<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @since 1.0.0
 * @package Sleekr_Lite
 */

get_header(); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header"><?php esc_html_e('Oooops... Error 404','sleekr-lite'); ?></h1>
                <?php custom_breadcrumbs(); ?>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row /Page Heading/Breadcrumbs -->

        <div class="row">

            <div class="col-md-12">
                <div class="jumbotron">
                    <h1><span class="error-404">404</span></h1>
                    <p><?php esc_html_e('The page you\'re looking for could not be found. Here are some helpful links to get you back on track:','sleekr-lite');?></p>
                    <!-- Custom 404 Widget Areas set from Appearance -> Widgets -->
		            <div class="row">
                        <?php if ( is_active_sidebar( 's404' ) ) : ?>
                            <div class="col-md-4">
    	                        <?php dynamic_sidebar( 's404' ); ?>
    	                    </div>
                        <?php endif; ?>
                        <?php if ( is_active_sidebar( 's404-2' ) ) : ?>
                            <div class="col-md-4">
    	                        <?php dynamic_sidebar( 's404-2' ); ?>
    	                    </div>
                        <?php endif; ?>
                        <?php if ( is_active_sidebar( 's404-3' ) ) : ?>
                            <div class="col-md-4">
    	                        <?php dynamic_sidebar( 's404-3' ); ?>
    	                    </div>
                        <?php endif; ?>
                    </div><!-- /.row -->
                </div><!-- /.jumbotron -->
            </div><!-- /.col-md-12 -->

        </div><!-- /.row -->

<?php get_footer(); ?>
