<?php
get_header();
?>


<!-- Nav Bar End -->

<!-- Top News Start-->
<div class="top-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6 tn-left">
                <div class="row tn-slider">

                    <?php $args = array(
                        'post_type' => 'slider',

                    );

                    $the_query = new WP_Query($args);
                    //dd($the_query);
                    $output1 = '';
                    // The Loop
                    if ($the_query->have_posts()) {

                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                            $output1 .= '<div class="col-md-6">
                                <div class="tn-img">';
                            $output1 .= '' . get_the_post_thumbnail($the_query->ID, array(500, 320)) . '" />
                                <div class="tn-title">
                                <a href="' . get_permalink() . '">' . get_the_title() . '</a>
                                </div>
                                </div></div>';
                        }
                        echo $output1;
                    } else {
                        // no posts found
                        //get_the_post_thumbnail($the_query->ID, 'thumbnail')
                        //
                    }
                    ?>

                </div>
            </div>
            <div class="col-md-6 tn-right">
                <div class="row">
                    <?php $args2 = array(
                        'post_type' => 'post',

                    );
                    $output2 = '';
                    $the_query2 = new WP_Query($args2);
                    if ($the_query2->have_posts()) {
                        $i = 0;
                        while ($the_query2->have_posts() && $i < 4) {
                            $the_query2->the_post();
                            $output2 .= '<div class="col-md-6">
                                    <div class="tn-img">';

                            $output2 .= '' . get_the_post_thumbnail($the_query2->ID, array(300, 169)) . '
                                    <div class="tn-title">
                                    <a href="' . get_permalink() . '">' . get_the_title() . '</a>
                                    </div>
                                    </div></div>';
                            $i++;
                        }
                        echo $output2;
                    } else {
                        // no posts found
                        //get_the_post_thumbnail($the_query->ID, 'thumbnail')
                        //
                    }

                    $b = get_terms();
                    //  dd($b);

                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top News End-->

<!-- Category News Start-->
<div class="cat-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Covid</h2>
                <div class="row cn-slider">


                    <?php

                    $args_the_thao = array(
                        'post_type' => 'any',
                        'category_name' => 'covid'

                    );

                    $the_query_tt = new WP_Query($args_the_thao);

                    $output_tt = '';
                    if ($the_query_tt->have_posts()) {

                        while ($the_query_tt->have_posts()) {
                            $the_query_tt->the_post();
                            $output_tt .= '<div class="col-md-6">
                                <div class="cn-img">';

                            $output_tt .= '' . get_the_post_thumbnail($the_query_tt->ID, array(300, 169)) . '
                                    <div class="cn-title">
                                    <a href="' . get_permalink() . '">' . get_the_title() . '</a>
                                    </div>
                                    </div></div>';
                            //$i++;
                        }
                    } else {
                        $output_tt = '<div class="col-md-6">
                        <div class="cn-img">
                            <img src="img/news-350x223-3.jpg" />
                            <div class="cn-title">
                                <a href="">Khong Tim Thay</a>
                            </div>
                        </div>
                    </div>';
                    }
                    echo $output_tt;
                    ?>
                    <!-- <div class="col-md-6">
                            <div class="cn-img">
                                <img src="img/news-350x223-3.jpg" />
                                <div class="cn-title">
                                    <a href="">Lorem ipsum dolor sit</a>
                                </div>
                            </div>
                        </div> -->
                </div>
            </div>
            <div class="col-md-6">
                <?php //dd($b); 
                ?>
                <h2><?= 'Thời sự'; ?></h2>
                <div class="row cn-slider">

                    <?php

                    $args_the_thao = array(
                        'post_type' => 'any',
                        'category_name' => 'thoi-su'

                    );
                    $the_query_tt = new WP_Query($args_the_thao);
                    $output_kh = '';
                    if ($the_query_tt->have_posts()) {

                        while ($the_query_tt->have_posts()) {
                            $the_query_tt->the_post();
                            $output_kh .= '<div class="col-md-6">
                                <div class="cn-img">';

                            $output_kh .= '' . get_the_post_thumbnail($the_query_tt->ID, array(300, 169)) . '
                                    <div class="cn-title">
                                    <a href="' . get_permalink() . '">' . get_the_title() . '</a>
                                    </div>
                                    </div></div>';
                        }
                        echo $output_kh;
                    } else {
                        // no posts found
                        //get_the_post_thumbnail($the_query->ID, 'thumbnail')
                        //
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Category News End-->

<!-- Category News Start-->
<div class="cat-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2><?= 'Thế giới' ?></h2>
                <div class="row cn-slider">

                    <?php
                    $args_the_thao = array(
                        'post_type' => 'any',
                        'category_name' => 'the-gioi'

                    );
                    $the_query_tt = new WP_Query($args_the_thao);
                    $output_dl = '';
                    if ($the_query_tt->have_posts()) {
                        while ($the_query_tt->have_posts()) {
                            $the_query_tt->the_post();
                            $output_dl .= '<div class="col-md-6">
                                <div class="cn-img">';

                            $output_dl .= '' . get_the_post_thumbnail($the_query_tt->ID, array(300, 169)) . '
                                    <div class="cn-title">
                                    <a href="' . get_permalink() . '">' . get_the_title() . '</a>
                                    </div>
                                    </div></div>';
                        }
                        echo $output_dl;
                    } else {
                    } ?>
                </div>
            </div>
            <div class="col-md-6">
                <h2>Du Lịch </h2>
                <div class="row cn-slider">
                    <?php
                    $args_the_thao = array(
                        'post_type' => 'any',
                        'category_name' => 'du-lich'

                    );
                    $the_query_tt = new WP_Query($args_the_thao);
                    $output_dl = '';
                    if ($the_query_tt->have_posts()) {
                        while ($the_query_tt->have_posts()) {
                            $the_query_tt->the_post();
                            $output_dl .= '<div class="col-md-6">
                                <div class="cn-img">';

                            $output_dl .= '' . get_the_post_thumbnail($the_query_tt->ID, array(300, 169)) . '
                                    <div class="cn-title">
                                    <a href="' . get_permalink() . '">' . get_the_title() . '</a>
                                    </div>
                                    </div></div>';
                        }
                        echo $output_dl;
                    } else {
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Category News End-->

<!-- Tab News Start-->
<div class="tab-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#featured">Featured News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#popular">Popular News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#latest">Latest News</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="featured" class="container tab-pane active">
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-1.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-2.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-3.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                    </div>
                    <div id="popular" class="container tab-pane fade">
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-4.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-5.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-1.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                    </div>
                    <div id="latest" class="container tab-pane fade">
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-2.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-3.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-4.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#m-viewed">Most Viewed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#m-read">Most Read</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#m-recent">Most Recent</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="m-viewed" class="container tab-pane active">
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-5.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-4.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-3.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                    </div>
                    <div id="m-read" class="container tab-pane fade">
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-2.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-1.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-3.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                    </div>
                    <div id="m-recent" class="container tab-pane fade">
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-4.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-5.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="img/news-350x223-1.jpg" />
                            </div>
                            <div class="tn-title">
                                <a href="">Lorem ipsum dolor sit amet</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tab News Start-->

<!-- Main News Start-->
<div class="main-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mn-img">
                            <img src="img/news-350x223-1.jpg" />
                            <div class="mn-title">
                                <a href="">Lorem ipsum dolor sit</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mn-img">
                            <img src="img/news-350x223-2.jpg" />
                            <div class="mn-title">
                                <a href="">Lorem ipsum dolor sit</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mn-img">
                            <img src="img/news-350x223-3.jpg" />
                            <div class="mn-title">
                                <a href="">Lorem ipsum dolor sit</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mn-img">
                            <img src="img/news-350x223-4.jpg" />
                            <div class="mn-title">
                                <a href="">Lorem ipsum dolor sit</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mn-img">
                            <img src="img/news-350x223-5.jpg" />
                            <div class="mn-title">
                                <a href="">Lorem ipsum dolor sit</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mn-img">
                            <img src="img/news-350x223-1.jpg" />
                            <div class="mn-title">
                                <a href="">Lorem ipsum dolor sit</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mn-img">
                            <img src="img/news-350x223-2.jpg" />
                            <div class="mn-title">
                                <a href="">Lorem ipsum dolor sit</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mn-img">
                            <img src="img/news-350x223-3.jpg" />
                            <div class="mn-title">
                                <a href="">Lorem ipsum dolor sit</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mn-img">
                            <img src="img/news-350x223-4.jpg" />
                            <div class="mn-title">
                                <a href="">Lorem ipsum dolor sit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php if (is_active_sidebar('sidebar-2')) {
                dynamic_sidebar('sidebar-2');
            } ?>
        </div>
    </div>
</div>
<!-- Main News End-->

<?php get_footer(); ?>