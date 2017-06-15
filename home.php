<?php get_header(); ?>

<?php if ( is_front_page() ) : ?>
<!-- Page Header Image -->
    <div id="header-image">
        <?php $mods = get_theme_mods();
        if ( get_theme_mod( 'sleekr_header_image' ) || !isset( $mods[ 'sleekr_header_image' ] ) ) { echo '<img class="img-responsive" src="'.get_theme_mod( 'sleekr_header_image', THEME_URI . '/sleekr-header.png' ).'">'; }  ?>
    </div>
<hr>
<div class="container">
<?php else : ?>
    <?php if (is_home() && get_option('page_for_posts') ) {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 
        $featured_image = $img[0];
        if ( !empty( $featured_image ) ) {
            echo '<img src="'.$featured_image.'" class="img-responsive img-page-featured wp-post-image"><hr>';
        } else if ( has_header_image() ) {
            echo '<img src="'; header_image(); echo'" height="'; echo get_custom_header()->height; echo '" width="'; echo get_custom_header()->width; echo'" alt="" class="img-responsive img-page-featured" /><hr>';
        } 
    }?>
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php wp_title(''); ?></h1>
        </div>
    </div>
    <!-- /.row -->
<?php endif; ?>

<div class="row" style="margin-left:0">
  <div class="col-md-8 well">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	    <p class="display-time"><i class="fa fa-clock-o"></i> <?php _e('Posted on ','sleekr'); echo '<a href="'; echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); echo '" class="entry-date">'; the_time('l, F jS, Y'); ?></a></p>
	    <p class="display-author"><?php _e('by ','sleekr'); the_author_posts_link(); ?></p>
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
		<p><?php _e('Sorry, there are no posts.','sleekr'); ?></p>
	<?php endif; ?>
	
    <?php custom_pagination(); ?> 
    
  </div>
  <div class="col-md-4">
    <?php get_sidebar(); ?>
  </div>
</div>


<?php get_footer(); ?>