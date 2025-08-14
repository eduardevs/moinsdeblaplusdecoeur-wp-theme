<?php get_header(); ?>

<section class="py-20 bg-gray-900 text-white">
    <div class="max-w-4xl mx-auto px-6 py-32">
        <!-- Title -->
        <h2 class="text-4xl font-extrabold text-center text-[#65cfc7] uppercase tracking-wide" data-aos="fade-up">
            <?php the_title(); ?></h2>

        <!-- Page Content -->
        <div class="text-center mb-10" data-aos="fade-up">
            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post();
                    the_content(); // Outputs only the page content
                endwhile;
            endif;
            ?>
        </div>



    </div>
</section>

<!-- Include AOS Library -->
<script>
    AOS.init({ duration: 1000, easing: 'ease-in-out', once: true });
</script>

<?php get_footer(); ?>