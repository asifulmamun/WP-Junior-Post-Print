<?php

namespace WPJuniorPostPrint\Admin;

class WPJuniorPostSettings {

    public function __construct() {
        add_action('admin_menu', [$this, 'addSettingsMenu']);
        add_action('admin_init', [$this, 'registerSettings']);
    }

    // Add menu to WP settings
    public function addSettingsMenu() {
        add_options_page(
            'WP Junior Post Settings',            // Page title
            'WP Junior Post Settings',            // Menu title
            'manage_options',                     // Capability
            'wp-junior-post-settings',            // Menu slug
            [$this, 'settingsPageCallback']       // Callback function
        );
    }

    // Render the settings page
    public function settingsPageCallback() {
        ?>
        <div class="wrap">
            <h1>WP Junior Post Settings</h1>
            <form method="post" action="options.php">
                <?php
                // Output security fields for the registered settings
                settings_fields('wp_junior_post_settings_group');
                
                // Output the settings sections and fields
                do_settings_sections('wp-junior-post-settings');
                
                // Submit button
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    // Register settings
    public function registerSettings() {
        // Register a new settings group
        register_setting('wp_junior_post_settings_group', 'wp_junior_post_facebook_link');
        register_setting('wp_junior_post_settings_group', 'wp_junior_post_website_link');
        register_setting('wp_junior_post_settings_group', 'wp_junior_post_mail_link');

        // Add a settings section
        add_settings_section(
            'wpjp_main_section',       // Section ID
            'Custom Links Settings',   // Section title
            [$this, 'sectionCallback'], // Callback function
            'wp-junior-post-settings'  // Page slug
        );

        // Add fields for Facebook, website, and mail links
        add_settings_field(
            'wpjp_facebook_link',      // Field ID
            'Facebook Link',           // Field title
            [$this, 'facebookLinkCallback'], // Callback function
            'wp-junior-post-settings', // Page slug
            'wpjp_main_section'        // Section ID
        );

        add_settings_field(
            'wpjp_website_link',
            'Website Link',
            [$this, 'websiteLinkCallback'],
            'wp-junior-post-settings',
            'wpjp_main_section'
        );

        add_settings_field(
            'wpjp_mail_link',
            'Mail Link',
            [$this, 'mailLinkCallback'],
            'wp-junior-post-settings',
            'wpjp_main_section'
        );
    }

    // Section callback
    public function sectionCallback() {
        echo '<p>Enter your custom links below:</p>';
    }

    // Facebook link field callback
    public function facebookLinkCallback() {
        $value = get_option('wp_junior_post_facebook_link', '');
        echo '<input type="url" name="wp_junior_post_facebook_link" value="' . esc_attr($value) . '" class="regular-text" />';
    }

    // Website link field callback
    public function websiteLinkCallback() {
        $value = get_option('wp_junior_post_website_link', '');
        echo '<input type="url" name="wp_junior_post_website_link" value="' . esc_attr($value) . '" class="regular-text" />';
    }

    // Mail link field callback
    public function mailLinkCallback() {
        $value = get_option('wp_junior_post_mail_link', '');
        echo '<input type="email" name="wp_junior_post_mail_link" value="' . esc_attr($value) . '" class="regular-text" />';
    }
}


