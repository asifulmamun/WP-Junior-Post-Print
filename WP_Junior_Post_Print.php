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
        $text_to_add = '<p><a class="" href="'.get_home_url().'/print/?post='. $post_id .'"><svg style="width:1.6rem" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" /></svg></a></p>';
        
        // Concatenate the text with the original content
        $content = $text_to_add . $content;
    }
    return $content;
}

// Hook the function to the_content filter
add_filter('the_content', 'add_text_before_content');
