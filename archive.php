<?php 
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
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
            <h1 class="page-header">
                <?php if ( is_category() ) {
                    esc_html_e( 'Category Archive ', 'sleekr-lite' );
                    single_cat_title();
                } else if ( is_author() ) { 
                    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
                    esc_html_e( 'Author Archive ', 'sleekr-lite' );
                    echo $curauth->display_name;
                } else if ( is_day() ) {
                    esc_html_e( 'Daily Archive ', 'sleekr-lite' );
                    echo (' '. get_the_time('F') .' '. get_the_time('jS') .' ');
                } else if ( is_month() ) {
                    esc_html_e( 'Monthly Archive ', 'sleekr-lite' );
                    echo get_the_time('F');
                } else if ( is_year() ) {
                    esc_html_e( 'Yearly Archive ', 'sleekr-lite' );
                    echo get_the_time('Y');
                } else if ( is_tag() ) {
                    esc_html_e( 'Tag Archive ', 'sleekr-lite' );
                    single_tag_title();
                }?> 
            </h1><!-- /.page-header -->
            <?php custom_breadcrumbs(); ?>
	        <!-- Category/Author/Tag Description -->
            <div class="lead"><?php if ( is_category() ) {
                                        echo category_description();
                                    } else if ( is_author() ) {
                                        echo $curauth->description;
                                    } else if ( is_tag() ) {
                                        echo tag_description();
                                    }?>
            </div><!-- /.lead -->
        </div><!-- /.col-md-12 -->
    </div><!-- /.row /Page Heading/Breadcrumbs -->

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
        		<?php if ( !is_author() ) { echo '<p class="display-author">'; esc_html_e('by ','sleekr-lite'); the_author_posts_link(); echo'</p>'; } ?>
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
