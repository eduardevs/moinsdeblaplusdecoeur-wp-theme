<?php get_header(); ?>

<div class="container mx-auto">


    <h2>Tous nos projets</h2>

    <?php if (have_posts()): ?>
        <div class="grid grid-cols-3 gap-4">
            <?php while (have_posts()):
                the_post() ?>
                <div class="bg-orange-600">
                    <?php the_title('<h2>', '</h2>'); ?>
                    <p><img src="<?php the_post_thumbnail_url(); ?>" alt="" style="width:100%; height:auto;"></p>
                    <div>
                        <p class=""><?php the_excerpt() ?></p>
                    </div>
                    <p><a href="<?php the_permalink() ?>">Voir plus</a></p>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>