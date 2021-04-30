<?php
/*
Template Name: Archives
*/
get_header(); ?>
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

//dd(get_post_types());
//dd($paged);
//dd(the_tags());
$b = get_the_tags();
//dd($b);
//dd(get_the_tags());
$array = [
    'post_type' => 'any',
    'tag' => $b[0]->slug,
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





        <?php if (is_active_sidebar('sidebar-4')) {
            dynamic_sidebar('sidebar-4');
        } ?>
        <?php


        wpbeginner_numeric_posts_nav();
        ?>

    </div>
</div>

<!-- Contact End -->




<?php get_footer(); ?>