<?php
/**
 * The template for the Search Form of the theme.
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 * @since 1.0.0
 * @package Sleekr_Lite
 */
?>

<!-- Search from -->
<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="<?php esc_html_e( 'Search...','sleekr-lite' ) ?>" value="" name="s" title="<?php esc_html_e( 'Search for:','sleekr-lite') ?>">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
            </span>
    </div>
</form>
