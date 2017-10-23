<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the Page Content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since 1.0.0
 * @package Sleekr
 */

?>
</div>
    <!-- /.container Page Content -->

        <footer>
            <div class="container">
		    <!-- Custom Footer Widget Areas -->
		    <div class="row">
			<?php if ( is_active_sidebar( 'footer' ) ) : ?>
			    <div class="col-lg-4">
				<?php dynamic_sidebar( 'footer' ); ?>
			    </div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
			    <div class="col-lg-4">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			    </div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
			    <div class="col-lg-4">
				<?php dynamic_sidebar( 'footer-3' ); ?>
			    </div>
			<?php endif; ?>
		    </div><!-- /Custom Footer Widget Areas -->
                    <div class="row">
                        <!-- Copyright Text -->
                        <div class="col-lg-6">
                            <p><?php esc_html_e('Copyright &copy; ','sleekr'); echo date( 'Y' ).' &middot; '; esc_html_e('All Rights Reserved','sleekr'); echo ' &middot; '. get_bloginfo( 'name' ); ?><br>
                            Sleekr Theme <?php esc_html_e('by ','sleekr'); ?><a target="_blank" href="https://www.webhostface.com">WebHostFace</a></p>
                        </div><!-- /.col-lg-6 Copyright Text -->
                        <!-- Footer Menu -->
                        <div class="col-lg-6">
                                <?php if ( has_nav_menu( 'footer' ) ) {
                                    wp_nav_menu( array(
                                        'theme_location'    => 'footer',
                                        'depth'             => 1,
                                        'container'         => 'nav',
                                        'container_class'   => 'navbar navbar-expand-lg navbar-inverse',
                                        'container_id'      => 'footer',
                                        'menu_class'        => 'navbar-nav ml-auto',
                                        'fallback_cb'       => 'Bootstrap_NavWalker::fallback',
                                        'menu_id'           => 'footer-menu',
                                        'walker'            => new Bootstrap_NavWalker()
                                        )
                                    );}
                                ?>
                        </div><!-- /.col-lg-6 Footer Menu -->
                    </div><!-- /.row -->
            </div><!-- /.container -->
            <?php wp_footer(); ?>

        </footer>
</body>

</html>
