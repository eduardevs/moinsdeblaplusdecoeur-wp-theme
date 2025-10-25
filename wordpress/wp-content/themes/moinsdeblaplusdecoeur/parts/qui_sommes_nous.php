<?php get_template_part("parts/plus_de_coeur") ?>

<h1
    class="text-4xl font-extrabold text-center text-[#65cfc7] mb-16 uppercase tracking-wide leading-[3rem] md:leading-none sm:mb-12">
    Qui sommes-nous ?</h1>

<div class="text-white bg-stone-950">
    <?php
    // Query pour afficher l'article avec l'ID 1
    // PROD => 'p' => 598,
    $query = new WP_Query(array(
        'post_type' => 'post',
        'p' => 1,
        'posts_per_page' => 1
    ));

    if ($query->have_posts()):
        while ($query->have_posts()): $query->the_post(); ?>

            <article class="max-w-6xl mx-auto px-6">
                <!-- <h2 class="text-2xl font-bold mb-4"><?php //the_title(); ?></h2> -->

                <div class="flex flex-col md:flex-row gap-12 items-center">

                    <!-- Left Column (Image) -->
                    <div class="w-full md:w-1/2 flex justify-center" data-aos="fade-right" data-aos-duration="1500"
                        data-aos-delay="500" data-aos-easing="ease-in-out">
                        <div class="relative w-72 h-72 md:w-96 md:h-96 shadow-lg">
                            <?php if (get_the_post_thumbnail_url()) : ?>
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                     alt="<?php the_title(); ?>"
                                     class="w-full h-full object-cover rounded-full border-teal-500 border-4 aspect-square">
                            <?php else : ?>
                                <!-- Image par défaut si pas d'image à la une -->
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/front-2.jpg'; ?>"
                                     alt="Qui sommes-nous ?"
                                     class="w-full h-full object-cover rounded-full border-teal-500 border-4 aspect-square">
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Right Column (List from ACF) -->
                    <div class="w-full md:w-1/2 flex flex-col gap-8" data-aos="fade-left" data-aos-duration="1500"
                        data-aos-delay="700" data-aos-easing="ease-in-out">

                        <?php
                        // Récupérer le champ ACF
                        $list_field = get_field('qui_sommes_nous');

                        if ($list_field) :
                            // Diviser le texte par les retours à la ligne
                            $lines = explode("\n", $list_field);
                            ?>

                            <ul class="space-y-4 text-lg leading-relaxed">
                                <?php
                                $in_sublist = false;
                                $aos_delay = 400; // Délai initial pour les animations

                                foreach ($lines as $line) :
                                    $original_line = $line;
                                    $line = trim($line);

                                    if (!empty($line)) :
                                        // Détecter si c'est une ligne indentée (commence par des espaces)
                                        $is_indented = strlen($original_line) - strlen(ltrim($original_line)) > 10;

                                        if ($is_indented) :
                                            // Si on n'est pas encore dans une sous-liste, on l'ouvre
                                            if (!$in_sublist) :
                                                echo '<ul class="list-disc list-inside text-gray-400 pl-6 space-y-1 mt-3">';
                                                $in_sublist = true;
                                            endif;

                                            // Nettoyer la ligne (supprimer les espaces en trop et les puces)
                                            $clean_line = trim(ltrim($line, '➤ -•'));
                                            ?>
                                            <li data-aos="fade-up" data-aos-delay="<?php echo $aos_delay; ?>">
                                                <?php echo esc_html($clean_line); ?>
                                            </li>
                                            <?php
                                            $aos_delay += 200; // Increment delay for next animation
                                        else :
                                            // Si on était dans une sous-liste, on la ferme
                                            if ($in_sublist) :
                                                echo '</ul>';
                                                $in_sublist = false;
                                            endif;

                                            // Élément principal
                                            $clean_line = trim(ltrim($line, '➤ -•'));

                                            // Vérifier si c'est un élément avec sous-liste (se termine par ":")
                                            $has_sublist = substr($clean_line, -1) === ':';
                                            ?>
                                            <li class="<?php echo $has_sublist ? 'flex flex-col gap-3' : 'flex items-start gap-3'; ?>"
                                                data-aos="fade-up" data-aos-delay="<?php echo $aos_delay; ?>">
                                                <div class="flex items-start gap-3">
                                                    <span class="text-[#65cfc7] text-2xl">➤</span>
                                                    <span><?php echo esc_html($clean_line); ?></span>
                                                </div>
                                            <?php
                                            $aos_delay += 200;
                                        endif;
                                    endif;
                                endforeach;

                                // Fermer la sous-liste si elle est encore ouverte
                                if ($in_sublist) :
                                    echo '</ul></li>'; // Fermer la sous-liste ET l'élément parent
                                endif;
                                ?>
                            </ul>

                        <?php else : ?>
                            <p class="text-gray-400">Aucun contenu trouvé.</p>
                        <?php endif; ?>

                    </div>
                </div>

            </article>

        <?php endwhile;
        wp_reset_postdata();
    else: ?>
        <p class="text-center text-gray-400">Aucun article trouvé avec l'ID 1.</p>
    <?php endif; ?>
</div>