<?php /* Template Name: Change Color
Template Post Type: post, page, slider



*/
get_header();
?>

<div class="container" style="color:red;">
    <div class="row">
        <div class="col-md-12">
            <h3 style="color: red;"><?php the_title() ?></h3>


            <?php the_content(); ?>


        </div>
    </div>
</div>

<?php

get_footer();
?>