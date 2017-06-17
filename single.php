<?php get_header(); ?>

<?php if ( has_header_image() ) {
    echo '<img src="'; header_image(); echo'" height="'; echo get_custom_header()->height; echo '" width="'; echo get_custom_header()->width; echo'" alt="" class="img-responsive img-page-featured" /><hr>';
} ?>

<div class="container">

<!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php the_title(); ?>
            </h1>
            <?php custom_breadcrumbs(); ?>
        </div>
    </div>
    <!-- /.row -->

<div class="row" style="margin-left:0">
  <div class="col-md-8 well">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    <p class="display-time"><i class="fa fa-clock-o"></i> <?php _e('Posted on ','sleekr-lite'); echo '<a href="'; echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); echo '" class="entry-date">'; the_time('l, F jS, Y'); ?></a></p>
	    <p class="display-author"><?php _e('by ','sleekr-lite'); the_author_posts_link(); ?></p>
	    <?php if ( has_post_thumbnail() ) {
	       echo '<a href="'; the_post_thumbnail_url(); echo '" data-fancybox="featured-image" data-caption="'; the_post_thumbnail_caption(); echo '">'; the_post_thumbnail( 'sleekr-featured-image', array( 'class' => 'img-responsive' ) ); echo '</a><hr>';
        } ?>
	    
        <?php the_content(); ?>
        <?php if ( has_tag() ) : ?>
        <hr>
        <?php the_tags( __('Tags: ', 'sleekr-lite'), ', ', '' ); ?> 
        <?php endif; ?>
        <?php custom_pagination(); ?>
        <hr>
        
        <?php comments_template(); ?>
        

	<?php endwhile; else: ?>
		<p><?php _e('Sorry, this post doesn\'t exist.', 'sleekr-lite'); ?></p>
	<?php endif; ?>
    </div>
  </div>
  <div class="col-md-4">
    <?php get_sidebar(); ?>
  </div>
</div>


<?php get_footer(); ?>