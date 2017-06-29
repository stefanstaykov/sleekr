<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the Page Content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since 1.0.0
 * @package Sleekr_Lite
 */

?>
</div>
    <!-- /.container Page Content -->

        <footer>
            <div class="container">
		    <!-- Custom Footer Widget Areas -->
		    <div class="row">
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
		    </div><!-- /Custom Footer Widget Areas -->
		    <!-- Copyright Text -->
                    <div class="col-md-6">
                    	<p><?php esc_html_e('Copyright &copy; ','sleekr-lite'); echo date( 'Y' ).' &middot; '; esc_html_e('All Rights Reserved','sleekr-lite'); echo ' &middot; '. get_bloginfo( 'name' ); ?><br>
                    	<?php printf ( wp_kses ( __('<a target="_blank" href="%s">Sleekr Lite Theme</a> by','sleekr-lite'), array('a' => array('href' => array(),'target' => array())) ), 'https://www.webhostface.com/wordpress-themes/sleekr-lite/' ); ?> WebHostFace &middot; <?php esc_html_e('Powered by','sleekr-lite'); ?> <a target="_blank" href="https://wordpress.org/">WordPress</a></p>
                    </div><!-- /.col-md-6 Copyright Text -->
		    <!-- Footer Menu -->
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
                    </div><!-- /.col-md-6 Footer Menu -->
            </div><!-- /.container -->
            <?php wp_footer(); ?>

        </footer>
</body>

</html>
