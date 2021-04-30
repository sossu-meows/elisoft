               <!DOCTYPE html>
               <html lang="en">
               <?php session_start(); ?>
               <?php
                $_SESSION['visited'][] = 1;
                $flag_2 = 0;

                foreach ($_SESSION['visited'] as $k => $v) {
                    if ($v == 1) {
                        $flag_2++;
                    }
                }


                if ($flag_2 == 1) {
                    setvisited();
                }
                ?>

               <head>
                   <meta charset="utf-8">
                   <title>Bootstrap News Template - Free HTML Templates</title>
                   <meta content="width=device-width, initial-scale=1.0" name="viewport">
                   <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
                   <meta content="Bootstrap News Template - Free HTML Templates" name="description">
                   <base href="/wordpress/wp-content/themes/mytheme/">


                   <link href="<?= get_theme_file_uri("/img/favicon.ico"); ?>" rel="icon">


                   <?php wp_head(); ?>
               </head>

               <body>
                   <!-- Top Bar Start -->
                   <div class="top-bar">
                       <div class="container">
                           <div class="row">
                               <div class="col-md-6">
                                   <div class="tb-contact">
                                       <p><i class="fas fa-envelope"></i>info@mail.com</p>
                                       <p><i class="fas fa-phone-alt"></i>+012 345 6789</p>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="tb-menu">
                                       <a href="">About</a>
                                       <a href="">Privacy</a>
                                       <a href="">Terms</a>
                                       <a href="">Contact</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- Top Bar Start -->

                   <!-- Brand Start -->
                   <div class="brand">
                       <div class="container">
                           <div class="row align-items-center">
                               <div class="col-lg-3 col-md-4">
                                   <div class="b-logo">
                                       <a href="/wordpress">
                                           <img src="<?php if (get_option('save_img')) echo get_option('save_img', '');
                                                        else {
                                                            echo 'img/logo.png';
                                                        } ?>" alt="Logo">
                                       </a>
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-4">
                                   <div class="b-ads">
                                       <a href="https://htmlcodex.com">
                                           <img src="
                                            <?php if (get_option('save_img_2')) echo get_option('save_img_2', '');
                                            else {
                                                echo 'img/ads-1.jpg';
                                            } ?>
                                            " alt="Ads" width="600px" height="100px">
                                       </a>
                                   </div>
                               </div>
                               <div class="col-lg-3 col-md-4">
                                   <?php get_search_form(); ?>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- Brand End -->

                   <!-- Nav Bar Start -->
                   <div class="nav-bar">
                       <div class="container">
                           <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                               <a href="#" class="navbar-brand">MENU</a>
                               <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                   <span class="navbar-toggler-icon"></span>
                               </button>

                               <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                   <div class="navbar-nav mr-auto">
                                       <?php
                                        echo display_menu('primary');

                                        ?>
                                       <div class="social ml-auto">
                                           <?php
                                            echo display_social_menu('social');
                                            ?>


                                       </div>
                                   </div>
                           </nav>
                       </div>
                   </div>