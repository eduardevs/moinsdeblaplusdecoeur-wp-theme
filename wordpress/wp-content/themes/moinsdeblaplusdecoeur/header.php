<?php
$header_variant = get_query_var('header_variant');
// var_dump($header_variant);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head() ?>
</head>

<body class="bg-stone-950 text-white">
    <!-- <header class="absolute z-10 <?php //echo ($header_variant == 1) ? 'bg-[#3232321a]' : 'bg-black'; ?> w-full"> -->
    <header
        class="<?php echo is_singular('projets') ? 'relative bg-stone-950' : 'fixed bg-transparent' ?> top-0 left-0 w-full z-50 transition-all duration-300 ">
        <div class="flex justify-between items-center mx-4">
            <!-- Logo (if any) -->
            <?php get_template_part('parts/container-logo') ?>

            <!-- Mobile Menu Toggle Button -->
            <button id="burgerButton" class="md:hidden text-white">
                <i class="fas fa-bars text-2xl"></i>
            </button>

            <!-- Navigation Menu (Desktop) -->
            <?php get_template_part('parts/navigation-menu', null, ['menu_type' => 'desktop']); ?>

            <!-- Mobile Menu (Hidden by default, shown when burger button is clicked) -->
            <?php get_template_part('parts/navigation-menu', null, ['menu_type' => 'mobile']); ?>

        </div>
    </header>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const header = document.querySelector("header");

            window.addEventListener("scroll", function () {
                if (window.scrollY > 50) {
                    header.classList.add("backdrop-blur-md", "bg-black/70");
                } else {
                    header.classList.remove("backdrop-blur-md", "bg-black/70");
                }
            });
        });
    </script>


    <!-- Script to Toggle Mobile Menu -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/menu-toggle.js"></script>