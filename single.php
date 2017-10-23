<?php
/**
 * The template for displaying all single posts
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
    <h1 class="mt-4 mb-3"><?php the_title(); ?></h1>
    <?php sleekr_custom_breadcrumbs(); ?>

<div class="row mx-0">
  <div class="col-lg-8 card pt-3">
	<!-- Start the Loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
                <!-- Date/Time -->
		<p class="display-time"><i class="fa fa-clock-o"></i> <?php esc_html_e('Posted on ','sleekr'); echo '<a href="'; echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); echo '" class="entry-date">'; the_date(); ?></a></p>
		<!-- Author Link -->
		<p class="display-author"><?php esc_html_e('by ','sleekr'); the_author_posts_link(); ?></p>
		<!-- Post Thumbnail -->
		<?php if ( has_post_thumbnail() ) {
		    echo '<a href="'; the_post_thumbnail_url(); echo '" data-fancybox="featured-image" data-caption="'; the_post_thumbnail_caption(); echo '">'; the_post_thumbnail( 'sleekr-featured-image', array( 'class' => 'img-responsive' ) ); echo '</a><hr>';
		} ?>
		<!-- Post Content -->
	    	<?php the_content(); ?>
	    </div><!-- /Post -->
	 	<!-- Post Pagination -->
		<?php sleekr_custom_pagination(); ?>
                <!-- Post Tags -->
                <?php if ( has_tag() ) : ?>
                <div><hr>
		<?php the_tags( esc_html__('Tags: ', 'sleekr')); ?></div>
		<?php endif; ?>
		<!-- Post Comments -->
		<?php comments_template(); ?>
	<?php endwhile; else: ?>
		<p><?php esc_html_e('Sorry, this post doesn\'t exist.', 'sleekr'); ?></p>
	<?php endif; ?>
  </div><!-- /.col-md-8 .well -->
  <div id="Sidebar" class="col-lg-4 card">
    <?php get_sidebar(); ?>
  </div><!-- /.col-md-4 -->
</div><!-- /.row -->


<?php get_footer(); ?>
