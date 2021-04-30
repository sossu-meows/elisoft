<?php
/*
Template Name: Archives
*/
get_header(); ?>
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$b = get_the_category();
//dd(get_post_types());
//dd($paged);
$array = [
    'post_type' => 'any',
    'category_name' => $b[0]->slug,
    'posts_per_page'    => 2,

    'paged' => $paged,
];


$wp_query = new WP_Query($array);

//dd($wp_query);
$custom_query = new WP_Query($array);
//dd($post);


?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active"><a href="<?= get_home_url() ?>"> Home </a> </li>

            <li class="breadcrumb-item"><?= get_the_category_list($separator  = " /&ensp;", $parent = ""); ?> &ensp;</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->

<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                <?php
                $output_dl = '';
                if ($wp_query->have_posts()) {
                    //$i = 0;
                    while ($wp_query->have_posts()) {
                        $wp_query->the_post();
                        $output_dl .= '<div class="col-md-4">
                            <div class="mn-img">';
                        $output_dl .= '' . get_the_post_thumbnail($wp_query->ID, array(300, 140)) . '
                            <div class="mn-title">
                                    <a href="' . get_permalink() . '">' . get_the_title() . '</a>
                                    </div>
                                </div>
                            </div>';
                        //$i++;
                    }
                    echo $output_dl;
                } else {
                    // no posts found
                    //get_the_post_thumbnail($the_query->ID, 'thumbnail')
                    //
                }
                ?>







            </div>
        </div>





        <div class="col-lg-3">
            <div class="mn-list">
                <h2>Read More</h2>
                <ul>
                    <li><a href="">Lorem ipsum dolor sit amet</a></li>
                    <li><a href="">Pellentesque tincidunt enim libero</a></li>
                    <li><a href="">Morbi id finibus diam vel pretium enim</a></li>
                    <li><a href="">Duis semper sapien in eros euismod sodales</a></li>
                    <li><a href="">Vestibulum cursus lorem nibh</a></li>
                    <li><a href="">Morbi ullamcorper vulputate metus non eleifend</a></li>
                    <li><a href="">Etiam vitae elit felis sit amet</a></li>
                    <li><a href="">Nullam congue massa vitae quam</a></li>
                    <li><a href="">Proin sed ante rutrum</a></li>
                    <li><a href="">Curabitur vel lectus</a></li>
                </ul>
            </div>
        </div>
        <?php

        //custom_pagination($wp_query->max_num_pages, "", $paged);
        //dd(the_posts_pagination());
        //print_r(the_posts_pagination());
        // custom_posts_per_page($wp_query);
        // custom_pagination($wp_query);
        //global $wp_query;
        //dd($wp_query);
        wpbeginner_numeric_posts_nav();
        ?>

    </div>
</div>

<!-- Contact End -->




<?php get_footer(); ?>