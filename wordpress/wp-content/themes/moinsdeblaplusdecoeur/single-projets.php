<?php
$header_variant = true;
set_query_var('header_variant', $header_variant);
get_header(); ?>

<div class="text-black mb-40 bg-white pt-10">
    <div class="w-full">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"
            class="w-full max-w-screen-xl h-[500px] object-cover mx-auto rounded-lg" />
    </div>
    <div class="mx-auto my-32">

        <div class="text-center mb-6">
            <h1 class="text-4xl font-bold text-gray-900"><?php the_title(); ?></h1>
        </div>

        <!-- Content of the article -->
        <div class="article_content mx-auto max-w-screen-lg px-4 mt-10">
            <div class="prose lg:prose-xl leading-relaxed break-words">
                <?php the_content(); ?>
            </div>
        </div>

        <?php
        /**
         * Custom Gallery
         */

        get_template_part('parts/gallery');
        ?>


        <?php
        /**
         * Display sub-projects ACF if they exist
         */

        $sousprojet = get_field('sousprojet_1');
        if (!empty($sousprojet)) {
            get_template_part('parts/subprojects');
        }
        ?>

    </div>




    <?php get_footer(); ?>