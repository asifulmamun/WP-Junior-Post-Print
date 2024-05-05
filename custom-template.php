<?php
/*
    Template Name: Custom Single Page
*/

    $custom_logo_id = get_theme_mod('custom_logo');
    $logo_url = '';
    if ($custom_logo_id) {
        $custom_logo = wp_get_attachment_image_src($custom_logo_id, 'full');
        if ($custom_logo) {
            $logo_url = $custom_logo[0]; // URL of the custom logo
        }
    }
    $site_title = get_bloginfo('name'); // Site Title
    $logo_url = ($logo_url ? $logo_url : $site_title); // Logo
    $favicon_url = get_site_icon_url(); // favicon url
    $post_id = isset($_GET['post']) ? $_GET['post'] : '';

    if ($post_id):
        // Set up the post query
        $post_query = new WP_Query(array(
            'p' => $post_id, // Post ID to query
            'post_type' => 'post', // Post type
            'posts_per_page' => 1 // Number of posts to retrieve
        ));

        // Check if there are any posts
        if ($post_query->have_posts()):
            while ($post_query->have_posts()):

                $post_query->the_post();
                // Get post data
                $post_title = get_the_title();
                $post_content = get_the_content();
                $post_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Use 'full' to get the full size image URL ?>
            
            
<img src="" alt="">
            <?php 
                echo $post_thumbnail_url;
            ?>

                hi


            <?php endwhile;
        else:
            // No posts found
            echo 'No posts found.';
        endif;
        // Restore original post data
        wp_reset_postdata();
    else:
        // No post ID provided
        echo 'No post ID provided.';
    endif;
?>

