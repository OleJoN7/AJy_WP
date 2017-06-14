<?php
/***
 *Загружаем стили и скрипты
 ******/
function load_style_script()
{

//    Scripts-----------
    wp_enqueue_script('jquery-3.2.1.min', get_template_directory_uri() . '/js/lib/jquery-3.2.1.min.js');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/lib/bootstrap.min.js');
    wp_enqueue_script('isotope-js', get_template_directory_uri() . '/js/lib/isotope.min.js');
    wp_enqueue_script('imageLoaded', get_template_directory_uri() . '/js/lib/imageLoaded.js');
    wp_enqueue_script('lightslider-js', get_template_directory_uri() . '/js/lib/lightslider.min.js');
    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDCYkwhPkRV3FKeecFZgygGvapdS3J1zzQ&callback=initMap', array(), '', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js');

//    Styles------------

    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/styles/css/lib/bootstrap.css');
    wp_enqueue_style('lightSlider-css', get_template_directory_uri() . '/styles/css/lib/lightslider.min.css');
    wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/styles/fonts/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'load_style_script');

//------Add .active class to nav-menu child element----------



function special_nav_class($classes)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'special_nav_class');

//-------Add .active class to nav-menu child element END---------

/****
 *Поддержка миниатюр
 ****/

add_theme_support('post-thumbnails');
add_theme_support('custom-logo');
/****
 *Поддержка меню
 ****/
register_nav_menus(array('header-menu' => 'Header menu'));

//---------Control number of posts in different pages---

function custom_posts_per_page($query)
{
    if (is_home()) {
        $query->set('posts_per_page', 5);
    }
    if (is_search()) {
        $query->set('posts_per_page', 5);
    }
    if (is_archive()) {
        $query->set('posts_per_page', 5);
    }//endif
}

add_action('pre_get_posts', 'custom_posts_per_page');

//-----Control number of posts in different pages--END------

/****
 *Поддержка caйдбара (виджеты)в админке(ВП)
 ****/
function Widgets()
{
    register_sidebar(array(
        'name' => 'Categories',
        'id' => 'cat-sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
}

add_action('widgets_init', 'Widgets');
/****
 *Поддержка caйдбара (виджеты)в админке(ВП)
 ****/


/***
 *Customizer
 ****/

function business_blog_customize($wp_customize)
{

    $wp_customize->add_panel('Custom_Sections Changes', array(
        'title' => __('Custom_Sections Changes'),
        'description' => __('Custom_Sections Changes'),
        'priority' => 10,
    ));
//------------------------------------------------------------

//    -------------BLOG SECTION-------------------------------

    $wp_customize->add_section('Blog Section', array(
        'title' => __('Blog Section'),
        'priority' => 30,
        'panel' => 'Custom_Sections Changes'
    ));

//-----Blog title-----------------------

    $wp_customize->add_setting('blog_title_settings', array(
        'default' => 'Heading!',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blog_title_settings', array(
        'label' => __('Blog Title'),
        'section' => 'Blog Section',
        'settings' => 'blog_title_settings',
    )));

//  ---------SINGLE POST SECTION ------------------

    $wp_customize->add_section('SinglePost Section', array(
        'title' => __('Single Post Section'),
        'priority' => 30,
        'panel' => 'Custom_Sections Changes'
    ));

    //-----SINGLE POST title-----------------------

    $wp_customize->add_setting('post_title_settings', array(
        'default' => 'Heading!',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'post_title_settings', array(
        'label' => __('Post Title'),
        'section' => 'SinglePost Section',
        'settings' => 'post_title_settings',
    )));
//    ------------Blog BG--------------------------
    $wp_customize->add_setting('blog-bg_settings');

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'blog-bg_settings', array(
        'label' => __('Background Image'),
        'section' => 'Blog Section',
        'settings' => 'blog-bg_settings',
    )));

//--------------Blog Section end--------------------------------

    //-------Welcome section-------------------------------------

    $wp_customize->add_section('Welcome Section', array(
        'title' => __('Welcome Section'),
        'priority' => 30,
        'panel' => 'Custom_Sections Changes'
    ));

//-----Welcome title-----------------------

    $wp_customize->add_setting('welcome_title_settings', array(
        'default' => 'Heading!',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'welcome_title_settings', array(
        'label' => __('About Title'),
        'section' => 'Welcome Section',
        'settings' => 'welcome_title_settings',
    )));


//------------------Welcome title subtext------------

    $wp_customize->add_setting('welcome_title_paragraph_settings', array(
        'default' => 'Heading subtext',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'welcome_title_paragraph_settings', array(
        'label' => __('About US'),
        'section' => 'Welcome Section',
        'settings' => 'welcome_title_paragraph_settings',
    )));

//    ------------------Welcome subtext 2 ----------------
    $wp_customize->add_setting('welcome_title_sub_paragraph_settings', array(
        'default' => 'Type subtext',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'welcome_title_sub_paragraph_settings', array(
        'label' => __('About us (more)'),
        'section' => 'Welcome Section',
        'settings' => 'welcome_title_sub_paragraph_settings',
    )));

// ------------- Welcome Text-----------------------------

    $wp_customize->add_setting('welcome_text_settings', array(
        'default' => 'Type your text',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'welcome_text_settings', array(
        'label' => __('Text'),
        'section' => 'Welcome Section',
        'settings' => 'welcome_text_settings',
        'type' => 'textarea'
    )));

//    ---------Welcome Image -----------------------
    $wp_customize->add_setting('welcome-img_settings');

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'welcome-img_settings', array(
        'label' => __('Welcome Image'),
        'section' => 'Welcome Section',
        'settings' => 'welcome-img_settings',
    )));

//    -----------/Welcome Section END -------------------------------


    //-------Man section-------------------------------------

    $wp_customize->add_section('Man Section', array(
        'title' => __('Man Section'),
        'priority' => 30,
        'panel' => 'Custom_Sections Changes'
    ));

//-----Man title-----------------------

    $wp_customize->add_setting('man_title_settings', array(
        'default' => 'Heading!',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'man_title_settings', array(
        'label' => __('About Title'),
        'section' => 'Man Section',
        'settings' => 'man_title_settings',
    )));

// ------------- Man Text-----------------------------

    $wp_customize->add_setting('man_text_settings', array(
        'default' => 'Type your text',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'man_text_settings', array(
        'label' => __('Text'),
        'section' => 'Man Section',
        'settings' => 'man_text_settings',
        'type' => 'textarea'
    )));

//    ---------Man Image -----------------------
    $wp_customize->add_setting('man-img_settings');

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'man-img_settings', array(
        'label' => __('Man Image'),
        'section' => 'Man Section',
        'settings' => 'man-img_settings',
    )));

//    -----------Man Section END -------------------------------


    //-------Offer section-------------------------------------

    $wp_customize->add_section('Offer Section', array(
        'title' => __('Offer Section'),
        'priority' => 30,
        'panel' => 'Custom_Sections Changes'
    ));

//-----Offer title-----------------------

    $wp_customize->add_setting('offer_title_settings', array(
        'default' => 'Heading!',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'offer_title_settings', array(
        'label' => __('Offer Title'),
        'section' => 'Offer Section',
        'settings' => 'offer_title_settings',
    )));

// ------------- Offer SubTitle-----------------------------

    $wp_customize->add_setting('offer_title_paragraph_settings', array(
        'default' => 'Heading subtext',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'offer_title_paragraph_settings', array(
        'label' => __('Offer Paragraph'),
        'section' => 'Offer Section',
        'settings' => 'offer_title_paragraph_settings',
    )));

//    ---Offers Link-----------------------------

    $wp_customize->add_setting('offer_link_settings');

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'offer_link_settings', array(
        'label' => __('Link'),
        'section' => 'Offer Section',
        'settings' => 'offer_link_settings',
        'type' => 'dropdown-pages'
    )));

//-----OFFER Section END ---------------------------

    //-------Works section-------------------------------------

    $wp_customize->add_section('Works Section', array(
        'title' => __('Works Section'),
        'priority' => 30,
        'panel' => 'Custom_Sections Changes'
    ));

//-----Works title-----------------------

    $wp_customize->add_setting('works_title_settings', array(
        'default' => 'Heading!',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'works_title_settings', array(
        'label' => __('Works Title'),
        'section' => 'Works Section',
        'settings' => 'works_title_settings',
    )));

// ------------- Works SubTitle-----------------------------

    $wp_customize->add_setting('works_title_paragraph_settings', array(
        'default' => 'Heading subtext',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'works_title_paragraph_settings', array(
        'label' => __('Works SubTitle'),
        'section' => 'Works Section',
        'settings' => 'works_title_paragraph_settings',
    )));

//    ----Work - portfolio-----------------------

    $wp_customize->add_setting('work_link_settings');

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'work_link_settings', array(
        'label' => __('Link'),
        'section' => 'Works Section',
        'settings' => 'work_link_settings',
        'type' => 'dropdown-pages'
    )));


//-----WOrks Section END ---------------------------

//    FEATURED SECTION --------------------------------


    $wp_customize->add_section('Featured Section', array(
        'title' => __('Featured Section'),
        'priority' => 30,
        'panel' => 'Custom_Sections Changes'
    ));


//-----Featured title-----------------------

    $wp_customize->add_setting('featured_title_settings', array(
        'default' => 'Heading!',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_title_settings', array(
        'label' => __('Blog Title'),
        'section' => 'Featured Section',
        'settings' => 'featured_title_settings',
    )));


//    Feature section end------------------------------

// -------Footer Section --------------------------------


    $wp_customize->add_section('footer', array(
            'title' => __('Footer'),
            'priority' => 40,
            'panel' => 'Custom_Sections Changes'
        )
    );

    $wp_customize->add_setting('footer-img_settings');

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer-img_settings', array(
        'label' => __('Logo Image'),
        'section' => 'footer',
        'settings' => 'footer-img_settings',
    )));


//-------------------------------------------------------
////---------Widget SUbscribe Title-----------------

    $wp_customize->add_section('Widget Subscribe Section', array(
        'title' => __('Widget Section'),
        'priority' => 20,
        'panel' => 'Custom_Sections Changes'
    ));


    $wp_customize->add_setting('vidget_subscribe_title_settings', array(
        'default' => 'Heading!',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'vidget_subscribe_title_settings', array(
        'label' => __('Widget Subscribe Title'),
        'section' => 'Widget Subscribe Section',
        'settings' => 'vidget_subscribe_title_settings',
    )));
//------Widget subscribe TEXT-----------------------
    $wp_customize->add_setting('vidget_subscribe_text_settings', array(
        'default' => 'Widget Subscribe Text here',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'vidget_subscribe_text_settings', array(
        'label' => __('Widget Subscribe Text'),
        'section' => 'Widget Subscribe Section',
        'settings' => 'vidget_subscribe_text_settings',
        'type' => 'textarea',
    )));
    //    ------------Contact Section BG--------------------------
    $wp_customize->add_section('Contact Section', array(
        'title' => __('Contact Section'),
        'priority' => 30,
        'panel' => 'Custom_Sections Changes'
    ));

    $wp_customize->add_setting('contact-bg_settings');

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'contact-bg_settings', array(
        'label' => __('Background Image'),
        'section' => 'Contact Section',
        'settings' => 'contact-bg_settings',
    )));

//    ------ Contact Section Text ------------------------

    $wp_customize->add_setting('contact_text_settings', array(
        'default' => 'Type it here!',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact_text_settings', array(
        'label' => __('Text Area'),
        'section' => 'Contact Section',
        'settings' => 'contact_text_settings',
        'type' => 'textarea'
    )));

// ------------- Contact Phone -----------------------------

    $wp_customize->add_setting('contact_phone_settings', array(
        'default' => 'Type your phone',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact_phone_settings', array(
        'label' => __('Phone'),
        'section' => 'Contact Section',
        'settings' => 'contact_phone_settings'
    )));

//    ------Contact Address--------------------------------
    $wp_customize->add_setting('contact_address_settings', array(
        'default' => 'Type address here!',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact_address_settings', array(
        'label' => __('Address'),
        'section' => 'Contact Section',
        'settings' => 'contact_address_settings',
        'type' => 'textarea'
    )));

}

add_action('customize_register', 'business_blog_customize');

/***
 *Customizer
 ****/

/**Generating Live CSS**/

function css()
{
    ?>
    <style type="text/css">
        .blog-title {
            background: url('<?php echo get_theme_mod ('blog-bg_settings')?>') 50% no-repeat;
            background-size: cover;
        }

        .contact-section {
            background: url('<?php echo get_theme_mod('contact-bg_settings'); ?>') 50% no-repeat;
            background-size: cover;
        }
    </style>
    <?php
}

add_action('wp_head', 'css');

/**Generating Live CSS**/

//----------------Customize Excerpt Word Count Length------------

function custom_excerpt_length()
{
    return 35;
}

add_filter('excerpt_length', 'custom_excerpt_length');

//----------------Customize Excerpt Word Count Length-END----------


/****
 *Custom Post Type
 ******/
function create_post_type()
{
    $man_section = array(
        'label' => 'Welcome-post',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'welcome-post'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type('welcome_post', $man_section);

    $portfolio = array(
        'label' => 'Portfolio',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'portfolio'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type('portfolio', $portfolio);

    $offers = array(
        'label' => 'Offers',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'offers'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type('offers', $offers);
}

add_action('init', 'create_post_type');
/****
 *Custom Post Type
 ******/

/****
 *Custom Post Type Slider
 ******/

function slider_post_type()
{
    $args = array(
        'label' => 'Light slider',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'slides'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type('slides', $args);
}

add_action('init', 'slider_post_type');

add_image_size('slides', 300, 200, true);

/****
 *Custom Post Type Slider END
 ******/


?>


