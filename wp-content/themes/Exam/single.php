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
                <?php echo get_theme_mod('post_title_settings'); ?>
            </div>
        </div>
        <section class="single-blog-wrap">
            <div class="container d-flex flex-wrap">
                <div class="posts-single-block">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post(); ?>
                            <div class="post">
                                <div class="single-post-img-wrap">
                                    <?php if (has_post_thumbnail()) : echo the_post_thumbnail(); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="post-text">
                                    <h3><?php echo get_post_meta($post->ID, 'Allocated post text', true); ?></h3>
                                    <div class="single-content">
                                        <?php the_content(); ?>
                                        <h3 class="news-title"><?php echo get_post_meta($post->ID, 'News Heading', true); ?></h3>
                                        <p class="news-text"><?php echo get_post_meta($post->ID, 'News Text', true); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php
                    else :
                        echo '<p>Nothing to show</p>';

                    endif;
                    ?>
                    <div class="single-pagination d-flex justify-content-between">
                        <?php previous_post_link('%link', 'previous');
                        next_post_link('%link', 'next');
                        ?>
                    </div>
                </div>
                <div class="sidebar-block">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </section>
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
