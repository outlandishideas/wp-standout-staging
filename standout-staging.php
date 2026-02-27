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

function enqueueStandoutCss()
{
    $isLocal = str_contains($_SERVER['WP_HOME'], 'local');
    $isStaging = str_contains($_SERVER['WP_HOME'], 'staging');
    if ($isLocal || $isStaging) {
        $publicRoot = plugin_dir_url(__FILE__) . '/css/';
        wp_enqueue_style('standout-css-vars', $publicRoot . ($isLocal ? 'development' : 'staging') . '.css');
    }
}

add_action('wp_enqueue_scripts', 'enqueueStandoutCss');
add_action('admin_enqueue_scripts', 'enqueueStandoutCss');
