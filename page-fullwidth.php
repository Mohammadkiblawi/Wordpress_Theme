<?php

/**
 * Template Name: Full width
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpAcademy
 */

get_header();
get_search_form();
?>
<style type="text/css">
    .post,
    .page {
        margin: 0;

    }

    body {
        background-color: #f2f2f2;
        font-size: 18px;

    }

    .search-form {
        margin: 1rem;
    }

    .recent-uploaded img {
        margin: 0.5rem;
    }

    .recent-uploaded {
        text-align: center;
    }

    .content-area {
        width: 100%;
    }
</style>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();

        get_template_part('template-parts/content', 'page');

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>

</main><!-- #main -->
<div class="recent-uploaded">
    <h2>
        <?php echo __('Recent Uploaded Images', 'academy'); ?>
    </h2>
    <?php
    $attachments = get_posts(array(
        'post_type' => 'attachment',
        'posts_per_page' => 5,
        'posts_status' => null,
        'post_mine_type' => 'image'
    ));
    foreach ($attachments as $attachment) {
        echo wp_get_attachment_image($attachment->ID, 'thumbnail');
    }
    ?>
</div>

<?php

get_footer();
