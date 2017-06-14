<?php
/**
 * The main template file
 **/

get_header(); ?>
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
<?php
get_footer();
?>
