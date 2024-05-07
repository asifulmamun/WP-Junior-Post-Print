<?php
/*
Plugin Name: WP Junior Post Print
Description: From wp single post another single page template for single post
Version: 1.0
Author: Al Mamun - asifulmamun
Author URI: https://asifulmamun.info.bd

*/

define('PLUGIN_DIR', plugin_dir_path(__FILE__) );
define('FILE_DIR', dirname( __FILE__ ) );

if( file_exists( FILE_DIR . '/vendor/autoload.php' ) ){
    require_once FILE_DIR . '/vendor/autoload.php';
}


if(!class_exists('WP_Junior_Post_Print')){
    class WP_Junior_Post_Print {
        
        public function __construct() {
            add_filter('query_vars', array($this, 'custom_post_url_query_vars'));
            add_action('init', array($this, 'custom_post_url_rewrite_rule'));
            add_action('template_redirect', array($this, 'custom_post_url_template_redirect'));
        }
        
        public function custom_post_url_query_vars($query_vars) {
            $query_vars[] = 'post';
            return $query_vars;
        }
        
        public function custom_post_url_rewrite_rule() {
            add_rewrite_rule('^print$', 'index.php?post=1', 'top');
        }
        
        public function custom_post_url_template_redirect() {
            $custom_post_id = get_query_var('post');
            if ($custom_post_id) {
                include(plugin_dir_path(__FILE__) . 'read-post.php');
                exit;
            }
        }
    }
}

new WP_Junior_Post_Print();




// Define a function to add text before the content
function add_text_before_content($content) {
    // Check if it's a single post
    if (is_single()) {
        // Get the post ID
        $post_id = get_the_ID();
        
        // Add your desired text before the content with the post ID
        $text_to_add = '<p>This is the text to be added before the content of post ID ' . $post_id . '.</p>';
        
        // Concatenate the text with the original content
        $content = $text_to_add . $content;
    }
    return $content;
}

// Hook the function to the_content filter
add_filter('the_content', 'add_text_before_content');
