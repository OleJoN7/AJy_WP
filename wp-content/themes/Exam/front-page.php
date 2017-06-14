<?php
/**
 * The main template file
 **/

get_header(); ?>
<section class="welcome-section">
    <div class="container ">
        <div class="welcome-wrap d-flex justify-content-between">
            <div class="img-welcome-wrap col-md-6">
                <a href="<?php the_permalink() ?>">
                    <img src="<?php echo get_theme_mod('welcome-img_settings') ?>" alt="">
                </a>
            </div>
            <div class="col-md-6">
                <h2><?php echo get_theme_mod('welcome_title_settings'); ?></h2>
                <p class="about-us-heading"><?php echo get_theme_mod('welcome_title_paragraph_settings'); ?></p>
                <p class="abous-us-sub-text"><?php echo get_theme_mod('welcome_title_sub_paragraph_settings'); ?></p>
                <p><?php echo get_theme_mod('welcome_text_settings'); ?></p>
            </div>
        </div>
        <button type="button" class="scroll-icon"></button>
    </div>
</section>
<section class="man-section">
    <div class="container">
        <div class="man-wrap d-flex justify-content-between">
            <div class="img-man-wrap col-md-6">
                <span>
                    <img src="<?php echo get_theme_mod('man-img_settings'); ?>" alt="">
                </span>
            </div>
            <div class="man-description col-md-6">
                <?php
                $args = array(
                    'post_type' => 'welcome_post',
                    'posts_per_page' => 1
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) :?>
                    <?php while ($the_query->have_posts()) : ?>
                        <?php $the_query->the_post(); ?>
                        <h2><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <article>
                            <?php the_content(); ?>
                        </article>
                    <?php endwhile; ?>
                <?php else : //no posts ?>
                <?php endif;
                wp_reset_postdata(); ?>

            </div>
        </div>
    </div>
</section>
<section class="offer-section">
    <div class="container">
        <header class="offer-header">
            <h2><?php echo get_theme_mod('offer_title_settings'); ?></h2>
            <?php echo wpautop(get_theme_mod('offer_title_paragraph_settings')); ?>
        </header>
        <ul class="offers-list d-flex justify-content-between">
            <?php
            $args = array(
                'post_type' => 'offers',
                'posts_per_page' => 3
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>
                    <li class="offer-post col-md-4">
                        <div class="offer-icon"><a
                                href="<?php echo get_permalink(get_theme_mod('offer_link_settings')); ?>"><?php the_post_thumbnail(); ?></a>
                        </div>
                        <div class="offer-description">
                            <h3><?php the_title(); ?></h3>
                            <article><?php the_content(); ?></article>
                        </div>
                    </li>
                <?php endwhile; ?>
            <?php else : //no posts ?>
            <?php endif;
            wp_reset_postdata(); ?>
        </ul>
    </div>
</section>
<section class="works-section">
    <div class="container">
        <header class="works-header">
            <h2><?php echo get_theme_mod('works_title_settings'); ?></h2>
            <?php echo wpautop(get_theme_mod('works_title_paragraph_settings')); ?>
        </header>
        <ul class="works-list d-flex justify-content-center button-group filter-button-group">
            <li>
                <button type="button" class="is-checked" data-filter="*">All</button>
            </li>
            <li>
                <button type="button" data-filter=".first">Design</button>
            </li>
            <li>
                <button type="button" data-filter=".third">Development</button>
            </li>
            <li>
                <button type="button" data-filter=".second">SEO</button>
            </li>
            <li>
                <button type="button" data-filter="*">Others</button>
            </li>
        </ul>
        <ul class="portfolio-list d-flex flex-wrap">
            <?php $classes = array(
                0 => 'first',
                1 => 'second',
                2 => 'third',
            );
            $i = 0; ?>

            <?php
            $args = array(
                'post_type' => 'portfolio',
                'posts_per_page' => 6
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :?>
                <?php while ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>
                    <li <?php post_class('portfolio-post col-md-4' . ' ' . $classes[$i++ % 3]); ?>>
                        <div class="portfolio-img"><a
                                href="<?php the_permalink(); ?><?php echo get_theme_mod('work_link_settings') ?>"><?php the_post_thumbnail(); ?></a>
                        </div>
                    </li>
                <?php endwhile; ?>
            <?php else : //no posts ?>
            <?php endif;
            wp_reset_postdata(); ?>
        </ul>
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
get_footer();
?>
