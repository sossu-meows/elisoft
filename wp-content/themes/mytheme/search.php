<?php
get_header()

?>

<?php global $query_string;
wp_parse_str($query_string, $abc);

$truy_van = new WP_Query($abc);
dd($truy_van);
$ket_qua = $truy_van->found_posts ? $truy_van->found_posts : 0; // kiem tra thu co bai viet giong khong 
?>
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <h2><?php _e('Kết quả tìm kiếm', 'My Theme'); ?></h2>
            <br>
            <h4>Số kết quả tìm được là <?= $ket_qua; ?></h4>
            <div class="row">


                <!-- dd($ket_qua);

        dd($truy_van);
        dd($abc);
        dd($query_string); ?> -->
                <br>

                <?php
                $output_dl = '';
                if ($truy_van->have_posts()) {
                    //$i = 0;
                    while ($truy_van->have_posts()) {
                        $truy_van->the_post();
                        $output_dl .= '<div class="col-md-4">
                            <div class="mn-img">';
                        $output_dl .= '' . get_the_post_thumbnail($truy_van->ID, array(300, 140)) . '
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
    </div>
    <?php wpbeginner_numeric_posts_nav(); ?>
    <?php

    get_footer();
    ?>