<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package business
 */

get_header(); ?>

    <section class="blog-section">
        <div class="blog-title">
            <div class="title-block">
                <?php echo get_theme_mod('blog_title_settings'); ?>
            </div>
        </div>
        <section class="blog-wrap">
            <div class="container d-flex flex-wrap">
                <div class="posts-block">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post(); ?>
                            <div class="post">
                                <div class="post-img">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php the_post_thumbnail() ?>" alt="">
                                    </a>
                                </div>
                                <div class="post-text">
                                    <a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <?php the_excerpt(); ?>
                                    <p class="post-date"><?php the_time('m. d, Y'); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php
                    else :
                        echo '<p>Nothing to show</p>';

                    endif;
                    ?>
                </div>
                <div class="sidebar-block">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </section>
        <div class="pagination-block-wrap">
            <div class="container">
                <div class="pagination-block">
                    <?php
                    echo paginate_links(array(
                        'prev_next' => false,
                        'before_page_number' => '',
                        'after_page_number' => '',
                        'end_size' => 1,
                        'mid_size' => 1,
                    ));
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="slider-section">
        <div class="container">
            <header class="featured-header">
                <h2><?php echo get_theme_mod('featured_title_settings'); ?></h2>
            </header>
            <div class="slider">
                <div class="container">
                    <?php
                    $args = array(
                        'post_type' => 'slides'
                    );
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()):?>
                        <ul id="lightSlider">
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slides') ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-section">
        <div class="container d-flex">
            <div class="contact-info-block">
                <ul class="contact-list">
                    <li class="contact-heading"><span>Contact Us:</span></li>
                    <li class="contact-text"><span><?php echo get_theme_mod('contact_text_settings'); ?></span></li>
                    <li class="telephone">
                        <a href="tel:+11234567891"><?php echo get_theme_mod('contact_phone_settings'); ?></a>
                    </li>
                    <li class="address">
                        <address><?php echo get_theme_mod('contact_address_settings'); ?></address>
                    </li>
                </ul>
                <div class="map-block">
                    <div id="googleMap"></div>
                </div>
            </div>
            <div class="contact-form-block">
                <?php echo do_shortcode('[contact-form-7 id="4" title="Contact form 1"]'); ?>
            </div>
        </div>
    </section>
<?php
get_sidebar();
get_footer();
