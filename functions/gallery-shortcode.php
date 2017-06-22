<?php
/**
 * Sleekr Lite Bootstrap Gallery Shortcode Function
 *
 * @since 1.0.0
 * @package Sleekr_Lite
 */

function sleekr_bootstrap_gallery( $output = '', $atts, $instance )
{
    $atts = array_merge(array('columns' => 3), $atts);

    $columns = $atts['columns'];
    $images = explode(',', $atts['ids']);

    $col_class = 'col-md-4'; // default 3 columns
    if ($columns == 1) { $col_class = 'col-md-12';}
    else if ($columns == 2) { $col_class = 'col-md-6'; }
    else if ($columns == 4) { $col_class = 'col-md-3'; }
    else if ($columns == 6) { $col_class = 'col-md-2'; }

    $return = '<div class="row gallery">';

    $i = 0;
    
    foreach ($images as $key => $value) {

        if ($i%$columns == 0 && $i > 0) {
            $return .= '</div><div class="row gallery">';
        }
        
        $caption = get_post_field('post_excerpt', $value);
        $image_attributes = wp_get_attachment_image_src($value, 'full');

        $return .= '
            <div class="'.$col_class.'">
                <a data-fancybox="gallery" data-caption="'.$caption.'" href="'.$image_attributes[0].'">
                    <img src="'.$image_attributes[0].'" alt="" class="img-responsive">
                </a><p class="gallery-caption">'.$caption.'</p>
            </div>';

        $i++;
    }

    $return .= '</div>';

    return $return;
}
add_filter( 'post_gallery', 'sleekr_bootstrap_gallery', 10, 3 );

?>
