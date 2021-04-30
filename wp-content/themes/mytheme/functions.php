<?php

/**
 * MyFirstTheme's functions and definitions
 *
 * @package MyFirstTheme
 * @since MyFirstTheme 1.0
 */

/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if (!isset($content_width))
    $content_width = 800; /* pixels */

if (!function_exists('myfirsttheme_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late  for some features, such as indicating
     * support post thumbnails.
     */

    function dd($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        die();
    }
    function myfirsttheme_setup()
    {

        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         */
        load_theme_textdomain('myfirsttheme', get_template_directory() . '/languages');

        /**
         * Add default posts and comments RSS feed links to <head>.
         */
        add_theme_support('automatic-feed-links');

        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support('post-thumbnails');

        /**
         * Add support for two custom navigation menus.
         */
        register_nav_menus(array(
            'primary'   => __('Primary Menu', 'myfirsttheme'),
            'secondary' => __('Secondary Menu', 'myfirsttheme'),

            'social' => __('Social Menu', 'myfirsttheme'),
        ));

        /**
         * Enable support for the following post formats:
         * aside, gallery, quote, image, and video
         */
        add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));
    }
endif;
//theme_setup
add_action('after_setup_theme', 'myfirsttheme_setup');

require get_template_directory() . '/inc/menu-function.php';

function twenty_twenty_one_widgets_init()
{

    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar-1', 'My theme'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here to appear in your footer.', 'twentytwentyone'),
            'before_widget' => '<div class="col-lg-3 col-md-6">
                                    <div class="footer-widget">',
            'after_widget'  => '</div>
            </div>',
            'before_title'  => '<h3 class="title">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar-2', 'My theme'),
            'id'            => 'sidebar-2',
            'description'   => esc_html__('Add widgets here to appear in your sidebar-2.', 'twentytwentyone'),
            'before_widget' => ' <div class="col-lg-3">
            <div class="mn-list">',
            'after_widget'  => '</div>
            </div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar-3', 'My theme'),
            'id'            => 'sidebar-3',
            'description'   => esc_html__('Add widgets here to appear in your sidebar-3.', 'side-bar'),
            'before_widget' => ' <div class="col-lg-3">
            <div class="mn-list">',
            'after_widget'  => '</div>
            </div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar-4', 'My theme'),
            'id'            => 'sidebar-4',
            'description'   => esc_html__('Add widgets here to appear in your sidebar-4.', 'side-bar'),
            'before_widget' => ' <div class="col-lg-3">
            <div class="mn-list">',
            'after_widget'  => '</div>
            </div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'twenty_twenty_one_widgets_init');

function getCrunchifyPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count . ' Views';
}

function setCrunchifyPostViews($postID)
{
    //myStartSession();
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

//session
function start_session()
{
    if (!session_id()) {
        session_start();
    }
}

function myEndSession()
{
    session_destroy();
}

//add_action('init', 'myEndSession');

function add_theme_scripts()
{


    wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap');

    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');

    wp_enqueue_style('All', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css');

    wp_enqueue_style('slick-theme', get_template_directory_uri() . '/lib/slick/slick-theme.css', array(), '1.1', 'all');

    wp_enqueue_style('slick', get_template_directory_uri() . '/lib/slick/slick.css', array(), '1.1', 'all');

    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('css-child', get_template_directory_uri() . '/css/style.css', array(), '1.2', 'all');

    // thêm script


    wp_enqueue_script('jquery3.4.1', 'https://code.jquery.com/jquery-3.4.1.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('bootstrapjs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', array(), '1.0', true);
    wp_enqueue_script('easing', get_template_directory_uri() . '/lib/easing/easing.min.js', array(), '1.0', true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/lib/slick/slick.min.js', array(), '1.0', true);
    wp_enqueue_script('main1', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.1', true);
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');
function test_action($post_id)
{
    echo "day la test_action <br>" . $post_id  . '<br>';
}

function test_action2()
{
    echo "test action 2<br>";
}
function test_filter()
{
    echo 'filter ne`';
}
// add_action('my_filter', 'test_filter', 1);
add_action('test_action', 'test_action2', 1);
add_action('test_action', 'test_action', 4);


function filter($para)
{

    return "<i style='color:red;'> $para </i>";
}
function filter2($para)
{
    return "<h1 style='color:blue;'>" . $para . " </h1>";
}
add_filter('my_filter', 'filter2');
add_filter('my_filter', 'filter');


add_filter('admin_init', 'my_general_settings_register_fields');

function my_general_settings_register_fields()
{
    register_setting('general', 'admin_number', 'esc_attr');
    add_settings_field(
        'admin_number',
        '<label for="admin_number">' . __('Number', 'admin_number') . '</label>',
        'my_general_settings_fields_html',
        'general'
    );
}

function my_general_settings_fields_html()
{
    $value = get_option('admin_number', '');
    echo '<input type="text" id="admin_number" name="admin_number" value="' . $value . '" />';
}
function setting_img()
{
    register_setting('general', 'save_img', 'esc_attr');
    add_settings_field(
        'save_img',
        '<label for="save_img">' . __('News Directory', 'save_img') . '</label>',
        'setting_img_html',
        'general'
    );
}

function setting_img_html()
{
    $value = get_option('save_img', '');
    echo $value;
    echo '<input type="button" value="Upload Image" class="button-primary" id="upload_image" />
    <input type="hidden" style="display:none;" name="save_img" class="wp_attachment_id" value="' . $value . '"  id="save_img" /> </br>
    <img src="' . $value . '" class="image" style="display:none;margin-top:10px;"/>';
}
add_filter('admin_init', 'setting_img');


// script button to m
function enqueue_scripts_trigger()
{
    wp_enqueue_media();
    wp_enqueue_script('img-js', get_template_directory_uri() . '/js/my-custom-js.js', array('jquery'), '1.1', true);
}
function setting_img_2()
{
    register_setting('general', 'save_img_2', 'esc_attr');
    add_settings_field(
        'save_img_2',
        '<label for="save_img_2">' . __('News Directory For HTML img', 'save_img_2') . '</label>',
        'setting_img_html_2',
        'general'
    );
}

function setting_img_html_2()
{
    $value = get_option('save_img_2', '');
    echo $value;
    echo '<input type="button" value="Upload Image" class="button-primary" id="upload_image_2" />
    <input type="hidden" style="display:none;" name="save_img_2" class="wp_attachment_id_2" value="' . $value . '"  id="save_img_2" /> </br>
    <img src="' . $value . '" class="image_2" style="display:none;margin-top:10px;"/>';
}
add_filter('admin_init', 'setting_img_2');

add_action('admin_init', 'enqueue_scripts_trigger');


function getPostComments($postID)
{
    $query_post = get_post($postID);
    $num = $query_post->comment_count;
    if ($num == 0 || $num > 1) : $num = $num; // change the plural for your language
    else : $num = $num; // change the singular for your language
    endif;
    $permalink = get_permalink($postID);

    return  $num;
}





function wpbeginner_numeric_posts_nav()
{

    if (is_singular($post_types = 'any'))
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max   = intval($wp_query->max_num_pages);

    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    //dd($max);

    echo '<div class="navigation"><ul>' . "\n";

    /** Previous Post Link */
    if (get_previous_posts_link())
        printf('<li>%s</li>' . "\n", get_previous_posts_link());

    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links))
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array) $links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /** Next Post Link */
    if (get_next_posts_link())
        printf('<li>%s</li>' . "\n", get_next_posts_link());

    echo '</ul></div>' . "\n";
}
function custom_posts_per_page($query)
{

    if ($query->is_archive('project')) {
        set_query_var('posts_per_page', -1);
    }
}
add_action('pre_get_posts', 'custom_posts_per_page');

function getvisited()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'prefix_counter';
    $sql = "SELECT count_view FROM $table_name  where created_at = (SELECT CURDATE() today)";
    $count = $wpdb->get_var($sql);
    if ($count == '') {
        $sql = "UPDATE $table_name SET `count_view` = 1 WHERE created_at = (SELECT CURDATE() today)";
        $wpdb->get_var($sql);
        return 1;
    }
    return $count;
}

function setvisited()
{

    global $wpdb;
    $table_name = $wpdb->prefix . 'prefix_counter';
    $sql = "SELECT count_view FROM $table_name  where created_at = (SELECT CURDATE() today)";
    $count = $wpdb->get_var($sql);
    if ($count == '') {
        $count = 0;
        $sql = "INSERT INTO `wp_prefix_counter`( `count_view`, `created_at`) VALUES (1,(SELECT CURDATE() today))";
        $wpdb->get_var($sql);
    } else {
        $count++;
        $sql = "UPDATE $table_name SET `count_view` = $count WHERE created_at = (SELECT CURDATE() today)";
        $wpdb->get_var($sql);
    }
}
