<?php
/**
 * The template for displaying the footer
 */

?>
<footer class="main-footer">
    <div class="black-bg">
    <div class="container">
        <div class="footer-img-wrap">
            <a href="<?php the_permalink() ?>">
                <img src="<?php echo get_theme_mod('footer-img_settings') ?>" alt="">
            </a>
        </div>
    </div>
    </div>
    <div class="red-bg">
        <p>&copy;2015  All Rights Reserved.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>