<?php get_header(); ?>

<?php if ( has_header_image() ) {
    echo '<img src="'; header_image(); echo'" height="'; echo get_custom_header()->height; echo '" width="'; echo get_custom_header()->width; echo'" alt="" class="img-responsive img-page-featured" /><hr>';
} ?>

<div class="container">

<!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php _e( 'Search Results for ', 'sleekr' ); echo get_search_query();  ?>
            </h1>
            <?php custom_breadcrumbs(); ?>
        </div>
    </div>
    <!-- /.row -->

<div class="row" style="margin-left:0">
  <div class="col-md-8 well">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	    <p class="display-time"><i class="fa fa-clock-o"></i> <?php _e('Posted on ','sleekr'); echo '<a href="'; echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); echo '" class="entry-date">'; the_time('l, F jS, Y'); ?></a></p>
	    <p class="display-author"><?php echo 'by '; the_author_posts_link(); ?></p>
        <?php if ( has_post_thumbnail() ) : ?>
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'sleekr-thumbnail-avatar', array( 'class' => 'img-responsive img-hover' ) );?></a>
          <hr>
	      <?php the_excerpt() ?>
	      <a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php _e('Read More','sleekr')?> <i class="fa fa-angle-right"></i></a>
	      <hr>
	    <?php else : ?>
	    <?php the_excerpt() ?>
	    <a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php _e('Read More','sleekr')?> <i class="fa fa-angle-right"></i></a>
	    <hr>
        <?php endif ?>
        
    </div>
	<?php endwhile; else: ?>
		<p><?php _e('Sorry, there are no posts.', 'sleekr'); ?></p>
	<?php endif; ?>
	
	<?php custom_pagination(); ?>
    
  </div>
  <div class="col-md-4">
    <?php get_sidebar(); ?>
  </div>
</div>


<?php get_footer(); ?>