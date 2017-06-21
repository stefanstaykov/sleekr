<?php
/**
 * The main template file, overridden by home.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sleekr_Lite
 */
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	 <?php the_content(); ?>

<?php endwhile; else: ?>
	<p><?php esc_html_e('Sorry, no posts matched your criteria.', 'sleekr-lite'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>


