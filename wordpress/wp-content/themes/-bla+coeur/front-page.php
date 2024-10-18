<?php
get_header(); ?>


<!-- LOGO -->
<!-- VIDEO PLAYER -->


<div>
    <?php get_template_part('parts/video')?>
</div>
<!-- PROJECTS (TRIPTIQUE) -->

<div class="container my-12 mx-auto px-4 md:px-12">

    <?php
    $args = array('post_type' => 'projets', 'posts_per_page' => '3');
    $queryProjects = new WP_Query($args);
    if ($queryProjects->have_posts()): ?>

        <div class="flex flex-wrap -mx-1 lg:-mx-4"> <!-- Flex container for the cards -->

            <?php while ($queryProjects->have_posts()):
                $queryProjects->the_post(); ?>

                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3"> <!-- Card wrapper -->
                    <!-- Article (Card) -->
                    <article class="rounded-lg shadow-lg h-48 md:h-64 lg:h-72">
                        <!-- Image -->
                        <a href="<?php the_permalink(); ?>">
                            <img alt="<?php the_title(); ?>" class="w-full h-full object-cover"
                                src="<?php the_post_thumbnail_url(); ?>">
                        </a>

                        <!-- Card Content -->
                        <div class="items-center justify-between leading-tight p-2 md:p-4">
                            <h1 class="text-lg">
                                <a class="no-underline hover:underline text-white" href="<?php the_permalink(); ?>">
                                    <?php the_title('<h2>', '</h2>'); ?>
                                </a>
                            </h1>
                            <div>
                                <p> <?php the_excerpt(); ?></p>
                            </div>
                        </div>


                    </article> <!-- End of Article (Card) -->
                </div> <!-- End of Card wrapper -->

            <?php endwhile; ?>

        </div> <!-- End of Flex container -->


    <?php else: ?>
        <h2>Il n'y a pas de projets</h2>
    <?php endif; ?>


    <div class="my-12">

        <a href="<?php echo get_post_type_archive_link('projets'); ?>" class="text-blue-500 underline mt-4 block">Voir
            d'autres
            projets</a>
    </div>
</div>






<!-- PHOTOS (gallery modal) -->

<!-- footer (social networks )-->

<?php get_footer(); ?>