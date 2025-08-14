<?php
$header_variant = true;
set_query_var('header_variant', $header_variant);
get_header();

?>
<?php get_template_part('parts/hero') ?>
<?php get_template_part('parts/video') ?>
<?php get_template_part('parts/qui_sommes_nous') ?>
<?php get_template_part('parts/projets') ?>
<?php get_template_part('parts/contact') ?>


<!-- footer (social networks )-->

<?php get_footer(); ?>