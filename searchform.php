<!-- <a class="uk-button uk-button-primary search-button"><i class="c-icon c-icon-search c-icon-white"></i></a>-->

    <form role="search" method="get" id="searchform" class="form-search uk-search" action="<?php echo home_url('/'); ?>">
     <!-- <label class="hide" for="s"><?php _e('Search for:', 'site'); ?></label>-->

        <input type="search" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" id="s" class="search-query uk-search-field" placeholder="<?php _e('Search for:', 'site'); ?>">
        <button class="uk-search-close" type="reset"></button>
    <!--  <input type="submit" id="searchsubmit" value="" class="btn btn-search">-->

    </form>