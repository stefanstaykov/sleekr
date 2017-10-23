<?php
/**
 * The template for displaying the custom post type portfolio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @since 1.0.0
 * @package Sleekr
 */
get_header(); ?>

<!-- Display the WordPress Header Image -->
<?php if ( has_header_image() ) {
    echo '<img src="'; header_image(); echo'" height="'; echo get_custom_header()->height; echo '" width="'; echo get_custom_header()->width; echo'" alt="" class="img-page-featured" /><hr>';
} ?>

<!-- Page Content -->
<div class="container">

<!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header"><?php the_title(); ?></h1>
            <?php sleekr_custom_breadcrumbs(); ?>
        </div><!-- /.col-md-12 -->
    </div><!-- /.row -->

<div class="row">
	<!-- Start the Loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
                <div class="col-lg-12">
                    <!-- Portfolio Image -->
                    <?php if ( has_post_thumbnail() ) {
                        echo '<a href="'; the_post_thumbnail_url(); echo '" data-fancybox="featured-image" data-caption="'; the_post_thumbnail_caption(); echo '">'; the_post_thumbnail( 'sleekr-portfolio-image', array( 'class' => 'img-responsive alignleft' ) ); echo '</a>';
                    }
                    //Post Content
                    the_content(); ?>
                </div><!-- /.col-lg-12 -->
	    </div><!-- /Post -->
	<?php endwhile; else: ?>
		<p><?php esc_html_e('Sorry, this portfolio item doesn\'t exist.', 'sleekr'); ?></p>
	<?php endif; ?>
</div><!-- /.row -->
<h3><?php esc_html_e( 'Related Projects', 'sleekr'); ?></h3>
<div class="row">
    <?php $portfolio_loop = new WP_Query(['post_type' => 'portfolio', 'post__not_in' => [$post->ID]] );
    if ( $portfolio_loop->have_posts() ) : $i=1; while ( $portfolio_loop->have_posts() && $i <= 4 ) : $the_post = $portfolio_loop->the_post(); ?>
        <div class="col-md-3 col-sm-6">
            <?php echo '<a href="'; the_permalink(); echo '">'; the_post_thumbnail( 'sleekr-portfolio-thumb', array( 'class' => 'img-responsive' ) ); echo '</a>'; ?>
        </div>
    <?php $i++; endwhile; ?>
    <?php endif; 
    wp_reset_postdata();
    ?>
</div>
<!-- Post Comments -->
<?php comments_template(); ?>


<?php get_footer(); ?>