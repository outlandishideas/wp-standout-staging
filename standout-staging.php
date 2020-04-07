<?php
/*
Plugin Name: Stand Out Staging
description:
Make staging and development sites clearly visible.
If the domain has 'local' in it, show a blue wordpress admin bar.
If the domain has 'staging' in it, show a red wordpress admin bar.
Version: 0.1
Author: Konstantinos Kokkorogiannis
Author URI: http://outlandish.com
License: GPL2
*/

add_action('wp_enqueue_scripts', function () {
    $publicRoot = plugin_dir_url(__FILE__) . '/css/';
    if (strpos($_SERVER['WP_HOME'], 'local')) {
        wp_enqueue_style('staging-css', $publicRoot . 'development.css');
    } elseif (strpos($_SERVER['WP_HOME'], 'staging')) {
        wp_enqueue_style('development-css', $publicRoot . 'staging.css');
    }
});


add_action('admin_enqueue_scripts', function () {
    $publicRoot = plugin_dir_url(__FILE__) . '/css/';
    if (strpos($_SERVER['WP_HOME'], 'local')) {
        wp_enqueue_style('staging-css', $publicRoot . 'development.css');
    } elseif (strpos($_SERVER['WP_HOME'], 'staging')) {
        wp_enqueue_style('development-css', $publicRoot . 'staging.css');
    }
});
