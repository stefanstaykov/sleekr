<!-- Search from -->
<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="<?php _e( 'Search...','sleekr' ) ?>" value="" name="s" title="<?php _e( 'Search for:','sleekr') ?>">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
            </span>
    </div>
</form>
