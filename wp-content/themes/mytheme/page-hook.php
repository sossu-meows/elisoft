<?php
//tao action 
// echo 'Action <br>';
// do_action('test_action', $post->ID, $post->post_title);


// //tao filter 
// echo 'Filter <br>  ';
//$test = '<img src="img/logo.png" alt="Logo">';

//echo apply_filters('my_filter', $test);
//echo apply_filters('my_filter', $test);
//echo $tag;
//echo apply_filters('img', $test);
//echo get_option('save_img');
?>
<div class="col-lg-3 col-md-4">
    <?php get_search_form(); ?>
</div>
<?php

global $wpdb;
$user_id = 1; // Đặt biết user_id
$table = $wpdb->prefix . 'posts'; // Bảng cần lấy
$sql = "SELECT COUNT(*) FROM {$table} WHERE `post_author` = %d"; //câu sql query
$number = $wpdb->get_var($wpdb->prepare($sql, $user_id)); //trả về dữ liệu trong biến $number
dd($number);
$a = $data;
//echo $a->ID;
dd($data[0]);
