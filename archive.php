<?php get_header(); ?>

<?php if ( has_header_image() ) {
    echo '<img src="'; header_image(); echo'" height="'; echo get_custom_header()->height; echo '" width="'; echo get_custom_header()->width; echo'" alt="" class="img-responsive img-page-featured" /><hr>';
} ?>

<div class="container">

<!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php if ( is_category() ) {
                    _e( 'Category Archive ', 'sleekr-lite' );
                    single_cat_title(); 
                } else if ( is_author() ) { 
                    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
                    _e( 'Author Archive ', 'sleekr-lite' );
                    echo $curauth->display_name;
                } else if ( is_day() ) {
                    _e( 'Daily Archive ', 'sleekr-lite' );
                    echo (' '. get_the_time('F') .' '. get_the_time('jS') .' ');
                } else if ( is_month() ) {
                    _e( 'Monthly Archive ', 'sleekr-lite' );
                    echo get_the_time('F');
                } else if ( is_year() ) {
                    _e( 'Yearly Archive ', 'sleekr-lite' );
                    echo get_the_time('Y');
                } else if ( is_tag() ) {
                    _e( 'Tag Archive ', 'sleekr-lite' );
                    single_tag_title();
                }?> 
            </h1>
            <?php custom_breadcrumbs(); ?>
            <div class="lead"><?php if ( is_category() ) {
                                        echo category_description();
                                    } else if ( is_author() ) {
                                        echo $curauth->description;
                                    } else if ( is_tag() ) {
                                        echo tag_description();
                                    }?>
            </div>
        </div>
    </div>
    <!-- /.row -->

<div class="row" style="margin-left:0">
  <div class="col-md-8 well">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="display-time"><i class="fa fa-clock-o"></i> <?php _e('Posted on ','sleekr-lite'); echo '<a href="'; echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); echo '" class="entry-date">'; the_time('l, F jS, Y'); ?></a></p>
        <?php if ( !is_author() ) { echo '<p class="display-author">'; _e('by ','sleekr-lite'); the_author_posts_link(); echo'</p>'; } ?>
        <?php if ( has_post_thumbnail() ) : ?>
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'sleekr-thumbnail-avatar', array( 'class' => 'img-responsive img-hover' ) );?></a>
          <hr>
	      <?php the_excerpt() ?>
	      <a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php _e('Read More','sleekr-lite')?> <i class="fa fa-angle-right"></i></a>
	      <hr>
	    <?php else : ?>
	    <?php the_excerpt() ?>
	    <a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php _e('Read More','sleekr-lite')?> <i class="fa fa-angle-right"></i></a>
	    <hr>
        <?php endif ?>
        
    </div>
	<?php endwhile; else: ?>
		<p><?php _e('Sorry, there are no posts.', 'sleekr-lite'); ?></p>
	<?php endif; ?>
	
	<?php custom_pagination(); ?>
    
  </div>
  <div class="col-md-4">
    <?php get_sidebar(); ?>
  </div>
</div>


<?php get_footer(); ?>