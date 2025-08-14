<div id="projets" class="bg-stone-950 text-white py-10 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 py-32">
        <!-- Titre -->
        <h1 class="text-4xl font-extrabold text-center text-[#65cfc7] mb-16 uppercase tracking-wide" data-aos="fade-up"
            data-aos-duration="1000">
            Nos Projets
        </h1>

        <?php
        $args = array('post_type' => 'projets', 'posts_per_page' => '-1',  'meta_key' => '_project_priority', 'orderby' => 'meta_value_num', 'order' => 'ASC');
        // $args = [
        //     'post_type' => 'project',
        //     'posts_per_page' => -1,
        //     'meta_key' => '_project_priority',
        //     'orderby' => 'meta_value_num',
        //     'order' => 'ASC', // or 'DESC' if lower number = higher priority
        // ];

        $queryProjects = new WP_Query($args);

        if ($queryProjects->have_posts()): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 overflow-hidden">

                <?php $index = 0; ?>
                <?php while ($queryProjects->have_posts()):
                    $queryProjects->the_post(); ?>

                    <article
                        class="bg-white text-black rounded-xl shadow-lg transition-transform transform hover:scale-[1.02] hover:shadow-2xl overflow-hidden"
                        data-aos="fade-up" data-aos-offset="50" data-aos-delay="<?php echo $index * 200; ?>"
                        data-aos-duration="1000">

                        <!-- Entire card as a clickable link -->
                        <a href="<?php the_permalink(); ?>" class="block w-full h-full">

                            <!-- Image -->
                            <div class="h-60 overflow-hidden rounded-t-xl">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"
                                    class="w-full h-full object-cover rounded-t-xl">
                            </div>

                            <!-- Card Content -->
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-[#0A043C] mb-2">
                                    <?php the_title(); ?>
                                </h2>

                                <p class="text-gray-600 leading-relaxed">
                                    <?php echo mb_strimwidth(get_the_excerpt(), 0, 100, '...'); ?>
                                </p>
                            </div>
                        </a> <!-- End of the clickable link -->
                    </article> <!-- Fin d'article -->
                    <?php $index++; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
