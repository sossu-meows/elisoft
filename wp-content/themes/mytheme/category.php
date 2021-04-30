<?php

get_header(); ?>
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$b = get_the_category();

$array = [
    'post_type' => 'any',
    'category_name' => $b[0]->slug,
    'posts_per_page'    => 2,

    'paged' => $paged,
];


$wp_query = new WP_Query($array);
$custom_query = new WP_Query($array);

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
                    }
                    echo $output_dl;
                } else {
                }
                ?>

            </div>
        </div>






        <?php if (is_active_sidebar('sidebar-3')) {
            dynamic_sidebar('sidebar-3');
        } ?>
        <?php

        wpbeginner_numeric_posts_nav();
        ?>

    </div>
</div>

<!-- Contact End -->




<?php get_footer(); ?>