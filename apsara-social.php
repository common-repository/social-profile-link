<?php
/*
Plugin Name:  Social Profile Link
Plugin URI:   https://developer.wordpress.org/plugins/the-basics/
Description:  Display Social Profile, Easy to use and 100% FREE social media plugin which adds social media icons to your website with tons of customization features!.(facebook, twiiter, instagram, pinterest)
Version:      1.0.1
Author:       Apsara aruna
Author URI:   https://profiles.wordpress.org/apsaraaruna
 */

if (!defined('ABSPATH')) {
    die;
}

require_once plugin_dir_path(__FILE__) . '/includes/apsara-social-scripts.php';

require_once plugin_dir_path(__FILE__) . '/includes/apsara-social-class.php';

add_action('widgets_init', 'register_apsara_social');
function register_apsara_social() {
    register_widget('Ap_Social_Widget');
}

add_action('admin_menu', 'register_apsara_menu_page');
function register_apsara_menu_page() {
    // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page('Social Profile', 'Social Profile', 'manage_options', 'apsocialOptions', 'apsocialOptions', 'dashicons-share', 90);
    add_submenu_page('apsocialOptions', 'Settings', 'Settings', 'manage_options', 'socialOptions_settings', 'apsara_social_settings_page');
}

function apsocialOptions() {
    echo "<h2>" . __('Social Profiles Link v0.1', 'menu-test') . "</h2>";
    include_once plugin_dir_path(__FILE__) . '/includes/apsara-social-welcome.php';
}

function apsocialOptions_settings() {
    echo '
    <h2>Coming Soon!</h2>
    ';
}

function apsara_social_settings_page() {
    echo "<h2>" . __('Social Profiles Link v0.1', 'menu-test') . "</h2>";
    include_once plugin_dir_path(__FILE__) . '/includes/apsara-social-links.php';
}