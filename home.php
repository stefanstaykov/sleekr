<?php
/**
 * Posts page to display the latest blog posts. This is the default WordPress Home Page, 
 * acts as the Posts Page when a Static Front Page is selected.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
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
    <!-- If Separate Posts Page get the Featured Image -->
    <?php if ( is_home() && get_option('page_for_posts') ) {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 
        $featured_image = $img[0];
	//If there is a Featured Image - Display it
        if ( !empty( $featured_image ) ) {
            echo '<img src="'.$featured_image.'" class="img-page-featured"><hr>';
	//If no Featured Image - Display the WordPress Header Image
        } else if ( has_header_image() ) {
            echo '<img src="'; header_image(); echo'" height="'; echo get_custom_header()->height; echo '" width="'; echo get_custom_header()->width; echo'" alt="" class="img-page-featured" /><hr>';
        } 
    }?>
<!-- Page Content -->
<div class="container">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php wp_title(''); ?></h1>
        </div>
    </div>
    <!-- /.row -->
<?php endif; ?>

<div class="row" style="margin-left:0">
  	<div class="col-md-8 well">
		<!-- Start the Loop -->
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- Title -->
	    		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<!-- Date/Time -->
        		<p class="display-time"><i class="fa fa-clock-o"></i> <?php esc_html_e('Posted on ','sleekr-lite'); echo '<a href="'; echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); echo '" class="entry-date">'; the_time('l, F jS, Y'); ?></a></p>
				<!-- Author Link if isn't an Author Archive Page -->
        		<p class="display-author"><?php esc_html_e('by ','sleekr-lite'); the_author_posts_link(); ?></p>
				<!-- Post Thumbnail -->
        		<?php if ( has_post_thumbnail() ) : ?>
          			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'sleekr-thumbnail-avatar', array( 'class' => 'img-hover' ) );?></a>
          			<hr>
				<?php endif ?>
				<!-- Post Excerpt -->
	      		<?php the_excerpt() ?>
				<!-- Read More button -->
	      		<a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','sleekr-lite')?> <i class="fa fa-angle-right"></i></a>
	      		<hr>
        	</div><!-- /Post -->
		<?php endwhile; else: ?>
			<p><?php esc_html_e('Sorry, there are no posts.', 'sleekr-lite'); ?></p>
		<?php endif; ?>
		<!-- Custom Pagination -->
		<?php custom_pagination(); ?>
    </div><!-- /.col-md-8 .well -->
	<!-- Sidebar -->
  	<div class="col-md-4">
    		<?php get_sidebar(); ?>
  	</div><!-- /.col-md-4 -->
</div><!-- /.row -->

<?php get_footer(); ?>
