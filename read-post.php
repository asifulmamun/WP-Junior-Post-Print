<?php
    /*
        Template Name: Data Post
    */

    // Get the saved values from the options table
    $facebook_link = get_option('wp_junior_post_facebook_link');
    $website_link = get_option('wp_junior_post_website_link');
    $mail_link = get_option('wp_junior_post_mail_link');
    $logo_url = (get_option('wp_junior_post_print_layout_logo')) ? get_option('wp_junior_post_print_layout_logo') : get_site_icon_url();
    $qr_code_url = get_option('wp_junior_post_qr_code');
    $site_title = get_bloginfo('name'); // Site Title
    $favicon_url = get_site_icon_url(); // favicon url
    $post_id = isset($_GET['post']) ? $_GET['post'] : '';
    $footer_text = get_option('wp_junior_post_footer_text');
    $template_choice = get_option('wp_junior_post_template_choice');
    
    // Get post data and render the template with the post data
    if ($post_id){
        // Set up the post query
        $post_query = new WP_Query(array(
            'p' => $post_id, // Post ID to query
            'post_type' => 'post', // Post type
            'posts_per_page' => 1 // Number of posts to retrieve
        ));

        // Check if there are any posts
        if ($post_query->have_posts()){
            while ($post_query->have_posts()){
                
                $post_query->the_post();
                // Get post data
                $post_title = get_the_title();
                $post_content = get_the_content();
                $post_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Use 'full' to get the full size image URL
                $post_date = get_the_date(); // Get post date
                $post_time = get_the_time(); // Get post time
                
                if($template_choice == 1){
                    // Main Content Rendering
                    include 'view/template_one/template.php';
                } elseif($template_choice == 2){
                    // Main Content Rendering
                    include 'view/template_two/template.php';
                } else{
                    // One is default template
                    include 'view/template_one/template.php';
                }

            }
        } else{
            
            echo 'No posts found.';
        }
        wp_reset_postdata();
    } else{
        // No post ID provided
        echo 'No post ID provided.';
    }
?>