<?php

function apsara_social_add_scripts() {

    wp_enqueue_style('ap-main-style', plugin_dir_url(__FILE__) . '../css/styles.css');

    wp_enqueue_script('ap-main-script', plugin_dir_url(__FILE__) . '../js/main.js');

    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('font-awesome');

}

add_action('wp_enqueue_scripts', 'apsara_social_add_scripts');

function load_custom_wp_admin_style() {
    wp_register_style('custom_wp_admin_css', plugin_dir_url(__FILE__) . '../css/admin-styles.css', false, '1.0.0');
    wp_enqueue_style('custom_wp_admin_css');
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');