<?php

// $custom_logo_id = get_theme_mod('custom_logo');
// ?
// $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

if (has_custom_logo()) {
    $custom_logo_id = get_theme_mod('custom_logo');
    $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head() ?>
</head>

<body class="bg-slate-950 text-white">
    <header class="bg-slate-900 p-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold">
                <a href="<?php echo get_home_url(); ?>" class="text-white no-underline hover:underline">
                    <?php if (has_custom_logo()): ?>
                        <img src="<?php echo $custom_logo_url; ?>" alt="Logo" class="h-12">
                    <?php else: ?>
                        -bla+coeur
                    </a>
                <?php endif; ?>

            </h1>
        </div>
    </header>