<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Exam
 */

get_header(); ?>

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
