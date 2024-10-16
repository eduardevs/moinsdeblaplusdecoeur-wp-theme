<?php
get_header(); ?>


<!-- LOGO -->
<!-- VIDEO PLAYER -->

<!-- PROJECTS (TRIPTIQUE) -->

<?php
$args = array('post_type' => 'projets'); //'posts_per_page' => '3'
$queryProjects = new WP_Query($args);
if ($queryProjects->have_posts()): ?>
    <div class="grid grid-cols-3 gap-4">
        <?php while ($queryProjects->have_posts()):
            $queryProjects->the_post() ?>
            <?php the_title('<h2>', '</h2>'); ?>
            <p><?php //the_excerpt() ?></p>
        <?php endwhile; ?>
    </div>
<?php else: ?>
    <h2>Il n'y a pas de projets</h2>
    <?php
endif; ?>

<!-- PHOTOS (gallery modal) -->

<!-- footer (social networks )-->

<?php get_footer(); ?>