<?php
echo 'Action';
do_action('test_action');
display_menu('Footer');
display_footer_menu('footer');
//tao filter 
echo 'Filter';
$test = 1;

echo apply_filters('my_filter', $test);



// $args = array(
//     'post_type' => 'post',



// );

// $the_querytest  = new WP_Query($args);
// dd(the_category());
// 


// $tag = wp_get_post_tags(get_the_ID());
// dd($tag);
// dd(get_categories());
// dd($the_querytest);
// dd($the_querytest->query);
// $categories = wp_get_post_categories(get_the_ID());
// print_r($categories);
// $a =  get_the_ID();
// $b =  get_the_category($post->ID);
// echo get_the_category();
// //dd($b);
// //dd(get_the_category_list(get_the_ID()));


// if (isset($_SESSION['view'])) {
//     $view = $_SESSION['view'];
// } else {
//     $view = array();
// }
// $view[get_the_ID()] = 1;
// //dd($view);
// $_SESSION['view'] = $view;
// //dd($_SESSION['view']);
// if (isset($_SESSION['view'])) {
//     echo "tim thay ";
//     $view = $_SESSION['view'];
// }
// dd($view);
// //dd($view);

// //dd($_SESSION['view']);
// //$view[get_the_ID()] = 1;
// if (array_key_exists(get_the_ID(), $view)) {
//     dd("abv");
// } else {
//     echo "khong";
// }
// $_SESSION['view'] = $view;
// dd($_SESSION['view']);
// $view['view'][get_the_ID()] = 1;
// dd($view);
// //myStartSession();
// $foo = 'Foo Data';
// $_SESSION['foo'] = $foo;
// $cart = $_SESSION;
// dd($cart);
// //echo get_the_category();
// // $args = array(
// //     'post_type' => 'slider',

// // );
// // $args = array(
// //     'category' => 13,
// //     'ID' => 62,
// // );

// $the_query = new WP_Query($args);
// dd($query = new WP_Query(array('category_name' => 'du-lich')));
// //var_dump($the_query);
// //

// // The Loop
// // dd($the_query);
// // foreach ($the_query as $a) {
// //     echo $a->ID;
// // }
// //dd($the_query);
// if ($the_query->have_posts()) {
//     //echo '<ul>';
//     while ($the_query->have_posts()) {
//         $the_query->the_post();
//         echo get_the_tag_list();
//         //echo get_the_category_list($separator  = " /  ");
//         //echo get_permalink();
//         //echo ($post_id);
//         //echo get_the_title();
//         //echo get_the_ID();
//         //echo get_the_post_thumbnail(get_the_ID(), array(200, 200));
//         //the_post_thumbnail(array(300, 300));
//         //dd($the_query->the_post());
//         //dd($the_query->the_post()->ID);
//         //echo get_the_post_thumbnail();
//         //dd(get_the_post_thumbnail('thumbnail'));
//         //the_post_thumbnail(array(450, 300));
//         //dd(the_post_thumbnail());
//         // echo '<li>' . get_the_title() . '</li>';

//         // echo get_the_post_thumbnail($the_query->ID, 'thumbnail');
//     }
//     //echo '</ul>';
// } else {
//     // no posts found
// }
