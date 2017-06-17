<?php get_header(); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php _e('Oooops... Error 404','sleekr-lite'); ?>
                </h1>
                <?php custom_breadcrumbs(); ?>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">

            <div class="col-lg-12">
                <div class="jumbotron">
                    <h1><span class="error-404">404</span>
                    </h1>
                    <p><?php _e('The page you\'re looking for could not be found. Here are some helpful links to get you back on track:','sleekr-lite');?></p>
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
                    </div>
                </div>
            </div>

        </div>

<?php get_footer(); ?>