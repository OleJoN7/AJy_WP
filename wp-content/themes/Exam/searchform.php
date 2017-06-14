<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
    <div><label class="screen-reader-text" for="s">Search</label></div>
    <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Type and Hit Enter..." />
</form>
