<style>
    video {
        max-width: unset !important;
        height: auto;
    }

    /* Default: Mobile-first styles */
    .video-container {
        display: flex;
        /* Flexbox layout to center the video */
        justify-content: center;
        /* Horizontally center the video */
        /* align-items: center; */
        /* Vertically center the video */
        /* height: 100vh; */
        /* Make the container take the full viewport height */
        /* padding: 20px; */
        /* Optional padding to prevent video from touching the edges */
        box-sizing: border-box;
        /* Ensure padding is included in the width and height */
    }

    .video-banner {
        width: 100%;
        /* Full width on mobile */
        height: auto;
        /* Maintain aspect ratio on mobile */
        max-width: 100%;
        /* Prevent video from overflowing the container */
        object-fit: cover;
        /* Ensures the video covers the area */
    }

    /* Larger screens like desktops */
    @media screen and (min-width: 768px) {
        .video-banner {
            height: auto;
            /* 40% of the viewport height on desktop */
            max-height: 600px;
            /* Ensure video does not exceed 400px */
        }
    }

    /* Overlay for template part */
    .template-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 10;
        color: white;
        text-align: center;
        font-size: 2rem;
        font-family: Arial, sans-serif;
        background-color: rgba(0, 0, 0, 0.5);
        /* Optional: Add a semi-transparent background */
        /* padding: 20px; */
        border-radius: 10px;
    }

    /* Larger screens like desktops */
    @media screen and (min-width: 768px) {
        .video-banner {
            height: auto;
            max-height: 600px;
        }

        .template-overlay {
            font-size: 3rem;
            /* Increase font size for larger screens */
            /* padding: 30px; */
            /* Increase padding for larger screens */
        }
    }
</style>




<!-- LOGO -->
<!-- VIDEO PLAYER -->


<!-- PROJECTS (TRIPTIQUE) -->

<div class="video-container bg-stone-950 mt-[200px]">
    <?php
    // $attachment_id = 371; // for prod
    $attachment_id = 32; // for dev COMMENT THIS LINE FOR PROD
    $video_url = wp_get_attachment_url($attachment_id);

    if ($video_url) {
        // muted

        echo '<video id="customvideo" class="video-banner" autoplay muted loop preload="none" poster="front-5.jpg">';
        echo '<source src="' . esc_url($video_url) . '" type="video/mp4">';
        echo 'Your browser does not support the video tag.';
        echo '</video>';
        // echo '<button onclick="document.getElementById("customvideo").muted = false;">Unmute</button>';
    } else {
        echo 'Video not found';
    }
    ?>

    <div class="template-overlay">
        <?php //get_template_part('parts/custom-audio-player') ?>
    </div>

</div>