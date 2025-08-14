<?php// Attributes of the shortcode.


$test = array(
	'src'        => '',
	'height'     => 360,
	'width'      => 640,
	'poster'     => '',
	'loop'       => '',
	'autoplay'   => '',
	'muted'      => 'false',
	'preload'    => 'metadata',
	'class'      => 'wp-video-shortcode',
);

$content = 'Video-Bla_Juin2024.mp4'; // content

echo wp_video_shortcode( $test, $content );
?>

<iframe class="w-full h-full" src="https://www.youtube.com/embed/1IZzFHVGWKg" title="Eduardo Pina plays Capricho Árabe"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
