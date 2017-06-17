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
    <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail( 'full-width', array( 'class' => 'img-responsive img-page-featured' ) );
        echo '<hr>';
    } else if ( has_header_image() ) {
            echo '<img src="'; header_image(); echo'" height="'; echo get_custom_header()->height; echo '" width="'; echo get_custom_header()->width; echo'" alt="" class="img-responsive img-page-featured" /><hr>';
        }  
    ?>
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
<?php endif; ?>

<div class="row" style="margin-left:0">
  <div class="col-md-8 well">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
        
        <?php comments_template(); ?>

	<?php endwhile; else: ?>
		<p><?php _e('Sorry, this page does not exist.','sleekr-lite'); ?></p>
	<?php endif; ?>

  </div>
  <div class="col-md-4">
    <?php get_sidebar(); ?>
  </div>
</div>


<?php get_footer(); ?>