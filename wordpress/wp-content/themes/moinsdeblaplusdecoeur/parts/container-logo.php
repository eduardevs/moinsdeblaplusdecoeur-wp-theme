<?php

if (has_custom_logo()) {
    $custom_logo_id = get_theme_mod('custom_logo');
    $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
}

$my_var = get_query_var('logo_negative');


if ($my_var == 1) {
    $custom_logo_url = get_template_directory_uri() . '/assets/images/logo-noir-vertical.png';
}

?>

<div class="container mx-auto">
    <h1 class="text-3xl font-bold">
        <?php if (is_singular('projets')): ?>
            <?php if (has_custom_logo()): ?>
                <div class="">
                    <a href="<?php echo get_home_url(); ?>" class="text-white no-underline hover:underline">
                        <img src="<?php echo $custom_logo_url; ?>" alt="Logo" class="h-12">
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>

    </h1>
</div>