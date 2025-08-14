<?php
/*
Template Name: Page archive projets
Template Post Type: page, post
*/

$args = array('post_type' => 'projets');
$queryProjects = new WP_Query($args);
?>

<?php get_header(); ?>

<div class="bg-stone-950  text-white py-20">
    <div class="max-w-7xl mx-auto px-6 py-32">
        <h1 class="text-4xl font-extrabold text-center text-[#65cfc7] mb-16 uppercase tracking-wide">
            Nos Projets
        </h1>

        <?php if ($queryProjects->have_posts()): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"> <!-- Grille Responsive -->

                <?php while ($queryProjects->have_posts()):
                    $queryProjects->the_post(); ?>

                    <article class="bg-white text-black rounded-xl overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl">

                        <!-- Image -->
                        <a href="<?php the_permalink(); ?>" class="block h-60 overflow-hidden">
                            <img src="<?php the_post_thumbnail_url(); ?>"
                                 alt="<?php the_title(); ?>"
                                 class="w-full h-full object-cover">
                        </a>

                        <!-- Card Content -->
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-[#0A043C] mb-2">
                                <a href="<?php the_permalink(); ?>" class="hover:text-[#65cfc7] transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <p class="text-gray-600 leading-relaxed">
                                <?php echo mb_strimwidth(get_the_excerpt(), 0, 100, '...'); ?>
                            </p>
                        </div>

                    </article> <!-- Fin d'article (Carte) -->

                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
