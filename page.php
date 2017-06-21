<?php
/**
 * The template for displaying all pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since 1.0.0
 * @package Sleekr_Lite
 */
get_header(); ?>

<!-- If Front Page Display the Custom Theme Header Image -->
<?php if ( is_front_page() ) : ?>
<!-- Page Header Image -->
    <div id="header-image">
        <?php $mods = get_theme_mods();
        if ( get_theme_mod( 'sleekr_header_image' ) || !isset( $mods[ 'sleekr_header_image' ] ) ) { echo '<img class="img-page-featured" src="'.get_theme_mod( 'sleekr_header_image', THEME_URI . '/sleekr-header.png' ).'">'; }  ?>
    </div>
<hr>
<!-- Page Content -->
<div class="container">
<?php else : ?>
    <!-- If there is a Featured Image - Display it -->
    <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail( 'full-width', array( 'class' => 'img-page-featured' ) );
        echo '<hr>';
    //If no Featured Image - Display the WordPress Header Image
    } else if ( has_header_image() ) {
            echo '<img src="'; header_image(); echo'" height="'; echo get_custom_header()->height; echo '" width="'; echo get_custom_header()->width; echo'" alt="" class="img-page-featured" /><hr>';
        }  
    ?>
<!-- Page Content -->
<div class="container">
<!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header"><?php the_title(); ?></h1>
            <?php sleekr_custom_breadcrumbs(); ?>
        </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
<?php endif; ?>

<div class="row" style="margin-left:0">
  <div class="col-md-8 well">
	<!-- Start the Loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
	<!-- Custom Pagination -->
        <?php custom_pagination(); ?>
	<!-- Page Comments -->
        <?php comments_template(); ?>

	<?php endwhile; else: ?>
		<p><?php esc_html_e('Sorry, this page does not exist.','sleekr-lite'); ?></p>
	<?php endif; ?>

  </div><!-- /.col-md-8 -->
  <div class="col-md-4">
    <?php get_sidebar(); ?>
  </div><!-- /.col-md-4 -->
</div><!-- /.row -->

<?php get_footer(); ?>
