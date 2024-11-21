<?php

namespace WPJuniorPostPrint\Admin;

class WPJuniorPostSettings {

    public function __construct() {
        add_action('admin_menu', [$this, 'addSettingsMenu']);
        add_action('admin_init', [$this, 'registerSettings']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueMediaLibrary']);
    }

    // Enqueue WordPress media library scripts
    public function enqueueMediaLibrary() {
        wp_enqueue_media();
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
        <script>
            jQuery(document).ready(function($){
                $('.wpjp-upload-button').click(function(e) {
                    e.preventDefault();
                    var button = $(this);
                    var target = button.data('target');
                    var custom_uploader = wp.media({
                        title: 'Select Image',
                        button: {
                            text: 'Use this image'
                        },
                        multiple: false
                    }).on('select', function() {
                        var attachment = custom_uploader.state().get('selection').first().toJSON();
                        $('#' + target).val(attachment.url);
                    }).open();
                });
            });
        </script>
        <?php
    }

    // Register settings
    public function registerSettings() {
        // Register a new settings group
        register_setting('wp_junior_post_settings_group', 'wp_junior_post_facebook_link');
        register_setting('wp_junior_post_settings_group', 'wp_junior_post_website_link');
        register_setting('wp_junior_post_settings_group', 'wp_junior_post_mail_link');
        register_setting('wp_junior_post_settings_group', 'wp_junior_post_print_layout_logo');
        register_setting('wp_junior_post_settings_group', 'wp_junior_post_qr_code');
        register_setting('wp_junior_post_settings_group', 'wp_junior_post_footer_text');
        register_setting('wp_junior_post_settings_group', 'wp_junior_post_template_choice');

        // Add a settings section
        add_settings_section(
            'wpjp_main_section',       // Section ID
            'Custom Links Settings',   // Section title
            [$this, 'sectionCallback'], // Callback function
            'wp-junior-post-settings'  // Page slug
        );

        // Add fields for Facebook, website, mail links, print layout logo, QR code, footer text, and template choice
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

        add_settings_field(
            'wpjp_print_layout_logo',
            'Print Layout Logo',
            [$this, 'printLayoutLogoCallback'],
            'wp-junior-post-settings',
            'wpjp_main_section'
        );

        add_settings_field(
            'wpjp_qr_code',
            'QR Code',
            [$this, 'qrCodeCallback'],
            'wp-junior-post-settings',
            'wpjp_main_section'
        );

        add_settings_field(
            'wpjp_footer_text',
            'Footer Text',
            [$this, 'footerTextCallback'],
            'wp-junior-post-settings',
            'wpjp_main_section'
        );

        add_settings_field(
            'wpjp_template_choice',
            'Template Choice',
            [$this, 'templateChoiceCallback'],
            'wp-junior-post-settings',
            'wpjp_main_section'
        );
    }

    // Section callback
    public function sectionCallback() {
        echo '<p>Enter your custom links and images below:</p>';
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

    // Print layout logo field callback
    public function printLayoutLogoCallback() {
        $value = get_option('wp_junior_post_print_layout_logo', '');
        echo '<input type="text" id="wp_junior_post_print_layout_logo" name="wp_junior_post_print_layout_logo" value="' . esc_attr($value) . '" class="regular-text" />';
        echo '<button type="button" class="button wpjp-upload-button" data-target="wp_junior_post_print_layout_logo">Select Logo</button>';
    }

    // QR code field callback
    public function qrCodeCallback() {
        $value = get_option('wp_junior_post_qr_code', '');
        echo '<input type="text" id="wp_junior_post_qr_code" name="wp_junior_post_qr_code" value="' . esc_attr($value) . '" class="regular-text" />';
        echo '<button type="button" class="button wpjp-upload-button" data-target="wp_junior_post_qr_code">Select QR Code</button>';
    }

    // Footer text field callback
    public function footerTextCallback() {
        $value = get_option('wp_junior_post_footer_text', '');
        wp_editor($value, 'wp_junior_post_footer_text', array(
            'textarea_name' => 'wp_junior_post_footer_text',
            'media_buttons' => true,
            'textarea_rows' => 10,
            'teeny' => false,
            'quicktags' => true
        ));
    }

    // Template choice field callback
    public function templateChoiceCallback() {
        $value = get_option('wp_junior_post_template_choice', 'template_one');
        ?>
        <select name="wp_junior_post_template_choice" class="regular-text">
            <option value="1" <?php selected($value, 'template_one'); ?>>Template One</option>
            <option value="2" <?php selected($value, 'template_two'); ?>>Template Two</option>
        </select>
        <?php
    }
}
