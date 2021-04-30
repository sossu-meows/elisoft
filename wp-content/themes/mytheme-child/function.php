<?php

function css_child()
{
    wp_enqueue_style('css-child', get_template_directory_uri() . '/css/style.css', array(), '1.2', 'all');
}
add_action('wp_enqueue_scripts', 'css_child');
