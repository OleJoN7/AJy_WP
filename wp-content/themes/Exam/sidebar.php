<div class="search-form">
    <?php get_search_form(); ?>
</div>
<div class="cat-sidebar"><?php dynamic_sidebar('cat-sidebar'); ?></div>
<div class="widgets-block">
    <div class="subscribe-sidebar">
        <h3><?php echo get_theme_mod('vidget_subscribe_title_settings'); ?></h3>
        <p class="subscribe-text"><?php echo get_theme_mod('vidget_subscribe_text_settings'); ?></p>
        <?php echo do_shortcode('[contact-form-7 id="66" title="Sidebar Form"]'); ?>
    </div>
</div>
