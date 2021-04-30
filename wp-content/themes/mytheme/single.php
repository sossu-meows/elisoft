<?php

//myStartSession();
get_header();

while (have_posts()) :
    the_post();


    $id = $post->ID;
    //$_SESSION['view'] = [];
    $_SESSION['view'][] = $id;
    $flag = 0;
    foreach ($_SESSION['view'] as $k => $v) {
        if ($v == $id) {
            $flag++;
        }
    }
    //dd($_SESSION['view']);
    if ($flag == 1) {
        setCrunchifyPostViews(get_the_ID());
    }
    //dd($_SESSION['view']);

?>


    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container">
            <ul class="breadcrumb">
                <!-- <li class="breadcrumb-item"><a href="#"></a></li>
                <li class="breadcrumb-item"><a href="#">News</a></li> -->
                <li class="breadcrumb-item active"><a href="<?= get_home_url() ?>"> Home </a> </li>
                <li class="breadcrumb-item"><?= get_the_category_list($separator  = "/", $parent = ""); ?> &ensp;</li>
                <br>



            </ul>
            <ul class="breadcrumb">
                <?php if (get_the_tag_list()) echo "Tag:" . get_the_tag_list($sep = " &ensp; "); ?>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Single News Start-->
    <div class="single-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sn-container">
                        <div class="sn-img">
                            <?php $a = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
                            <img src="<?= $a; ?>" />

                        </div>
                        <div class="sn-content">
                            <h1 class="sn-title"><?php the_title() ?></h1>
                            <i class="far fa-comments"><?= getPostComments($post->ID) ?>&ensp;</i>
                            <i class="fas fa-eye"><?= getCrunchifyPostViews(get_the_ID()); ?></i>
                            <span>&ensp; Tác giả bài viết :<?= get_the_author_link() ?> </span>
                            <?php $b = get_the_category();
                            //echo get_the_category()->0->name;
                            //dd($post);
                            //echo $b[0]->name;
                            //dd($b);
                            ?>
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <?php


                    echo "<br>";
                    echo previous_post_link();
                    echo "<br>";
                    echo get_next_post_link();
                    //print_r($post);
                    ?>

                    <div class="sn-related">
                        <h2>Related News</h2>
                        <div class="row sn-slider">
                            <?php $the_query = new WP_Query(array('post_type' => 'any', 'category_name' => '' . $b[0]->slug . ''));
                            $output1 = '';
                            // The Loop
                            if ($the_query->have_posts()) {

                                while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                    $output1 .= '<div class="col-md-6">
                                        <div class="sn-img">';
                                    $output1 .= '' . get_the_post_thumbnail($the_query->ID, array(300, 120)) . '" />
                                        <div class="sn-title">
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
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h2 class="sw-title">
                                <?php echo apply_filters('my_filter', $b[0]->name);
                                ?>
                            </h2>
                            <div class="news-list">
                                <?php $the_query_side = new WP_Query(array('post_type' => 'any', 'category_name' => $b[0]->slug));
                                $output_tag = '';
                                if ($the_query_side->have_posts()) {

                                    while ($the_query_side->have_posts()) {
                                        $the_query_side->the_post();
                                        $output_tag .= '<div class="nl-item">
                                        <div class="nl-img">';
                                        $output_tag .= '' . get_the_post_thumbnail($the_query_side->ID, array(100, 100)) . '</div>
                                            <div class="nl-title">
                                            <a href="' . get_permalink() . '">' . get_the_title() . '</a>
                                            </div>
                                            </div>';
                                    }
                                    echo $output_tag;
                                } else {
                                    // no posts found
                                    //get_the_post_thumbnail($the_query->ID, 'thumbnail')
                                    //
                                }
                                ?>

                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="image">
                                <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="tab-news">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#featured">Featured</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#popular">Popular</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="featured" class="container tab-pane active">
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-1.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-2.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-3.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-4.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-5.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="popular" class="container tab-pane fade">
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-4.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-3.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-2.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-1.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-2.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="latest" class="container tab-pane fade">
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-3.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-4.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-5.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-4.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-3.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="image">
                                <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h2 class="sw-title"><?php echo apply_filters("my_filter", 'News Category') ?></h2>
                            <div class="category">
                                <ul>
                                    <?php $categories = get_categories();
                                    foreach ($categories as $category) {
                                        echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a><span>(' . $category->count . ')</span></li>';
                                    } ?>

                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="image">
                                <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h2 class="sw-title"><?php $tags = get_tags(array(
                                                        'hide_empty' => false
                                                    ));

                                                    ?>Tag :</h2>
                            <div class="tags">
                                <?php

                                foreach ($tags as $tag) {
                                    $tag_link = get_tag_link($tag->term_id);
                                    echo ' <a href="' . $tag_link . '">' . $tag->name . '</a>';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single News End-->
<?php
endwhile;
get_footer();
