<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since 1.0.0
 * @package Sleekr
 */
do_action( 'before_sidebar' );
if ( ! is_active_sidebar( 'main' ) ) : ?>
	<div id="search" class="list-group card-body">
           <?php get_search_form(); ?>
        </div>
        <div id="archives" class="list-group card-body">
            <h1 class="card-header"><?php echo esc_html_x( 'Archives', 'Default Archives Widget Title', 'sleekr' ); ?></h1>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </div>
        <div id="meta" class="list-group card-body">
            <h1 class="card-header"><?php echo esc_html_x( 'Meta', 'Default Meta Widget Title', 'sleekr' ); ?></h1>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </div>
<?php else: 
    dynamic_sidebar( 'main' ); 
endif; ?>

        