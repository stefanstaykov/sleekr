<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @since 1.0.0
 * @package Sleekr_Lite
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

<div class="row" style="margin-left:0">
  <div class="col-md-8 well">
	<!-- Start the Loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		    <!-- Date/Time -->
		    <p class="display-time"><i class="fa fa-clock-o"></i> <?php esc_html_e('Posted on ','sleekr-lite'); echo '<a href="'; echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); echo '" class="entry-date">'; the_time('l, F jS, Y'); ?></a></p>
		    <!-- Author Link -->
		    <p class="display-author"><?php esc_html_e('by ','sleekr-lite'); the_author_posts_link(); ?></p>
		    <!-- Post Thumbnail -->
		    <?php if ( has_post_thumbnail() ) {
		       echo '<a href="'; the_post_thumbnail_url(); echo '" data-fancybox="featured-image" data-caption="'; the_post_thumbnail_caption(); echo '">'; the_post_thumbnail( 'sleekr-featured-image', array( 'class' => 'img-responsive' ) ); echo '</a><hr>';
		     } ?>
		     <!-- Post Content -->
	    	     <?php the_content(); ?>
	 	     <!-- Post Tags -->
		     <?php if ( has_tag() ) : ?>
			<hr>
			<?php the_tags( esc_html__('Tags: ', 'sleekr-lite'), ', ', '' ); ?> 
		     <?php endif; ?>
		     <!-- Post Pagination -->
		     <?php sleekr_custom_pagination(); ?>
		     <hr>
		     <!-- Post Comments -->
		     <?php comments_template(); ?>
		</div><!-- /Post -->
	<?php endwhile; else: ?>
		<p><?php esc_html_e('Sorry, this post doesn\'t exist.', 'sleekr-lite'); ?></p>
	<?php endif; ?>
  </div><!-- /.col-md-8 .well -->
  <div class="col-md-4">
    <?php get_sidebar(); ?>
  </div><!-- /.col-md-4 -->
</div><!-- /.row -->


<?php get_footer(); ?>
