<?php
/*
Template Name: Page Test
Template Post Type: page, post
*/

get_header();?>


<?php
if (have_posts()):
    while (have_posts()):
        the_post(); ?>

        <h1><?php the_title(); ?></h1> <!-- Displays the page or post title -->
        <div><?php the_content(); ?></div> <!-- Displays the main content -->

    <?php endwhile;
endif;
?>


<?php get_footer(); ?>