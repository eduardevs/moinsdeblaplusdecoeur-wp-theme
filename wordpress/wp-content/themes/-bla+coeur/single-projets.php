<?php get_header() ?>
<div class="container mx-auto">
    <?php
    // if (have_posts()):
    //     while (have_posts()):
    //         the_post();
    ?>
    <div>
        <h1><?php the_title() ?></h1>
        <p><img src="<?php the_post_thumbnail_url(); ?>" alt="" style="width:100%; height:auto;"></p>
        <?php the_content() ?>
    </div>
    <?php
    //endwhile;
    //  endif;
    ?>
</div>
<?php get_footer() ?>