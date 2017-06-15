</div>
    <!-- /.container -->

        <footer>
            <div class="container">
                <?php if ( is_active_sidebar( 'footer' ) ) : ?>
                    <div class="col-md-4">
	                <?php dynamic_sidebar( 'footer' ); ?>
	                </div>
                <?php endif; ?>
                
                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                    <div class="col-md-4">
	                <?php dynamic_sidebar( 'footer-2' ); ?>
	                </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                    <div class="col-md-4">
	                <?php dynamic_sidebar( 'footer-3' ); ?>
	                </div>
                <?php endif; ?>
                <div class="col-md-6">
                    <p><?php echo ' Copyright &copy; '. date( 'Y' ); ?> &middot; All Rights Reserved &middot; <?php echo get_bloginfo( 'name' ); ?><br>
                    Sleekr Lite Theme by <a target="_blank" rel="nofollow" href="https://www.webhostface.com">WebHostFace</a> &middot; <a target="_blank" href="https://www.webhostface.com/managed-wordpress-hosting/">Managed WordPress Hosting</a></p>
                </div>
                <div class="col-md-6">
                    <?php if ( has_nav_menu( 'footer' ) ) {
                        wp_nav_menu( array(
                            'menu'              => 'footer',
                            'theme_location'    => 'footer',
                            'depth'             => 1,
                            'container'         => 'div',
                            'container_class'   => 'navbar-collapse',
                            'container_id'      => 'bs-example-navbar-collapse-1',
                            'menu_class'        => 'nav navbar-nav navbar-right',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'menu_id'           => 'footer-menu',
                            'walker'            => new WP_Bootstrap_Navwalker())
                        );}
                    ?>
                </div>
            </div>
            <?php wp_footer(); ?>

        </footer>
</body>

</html>