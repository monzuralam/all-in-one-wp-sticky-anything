<?php
/**
 * Plugin Name:       All-in-One WP Sticky Anything
 * Plugin URI:        https://wordpress.org/plugins/all-in-one-all-in-one-wp-sticky-anything
 * Description:       All-in-One WP Sticky Anything plugin will make stick to the side of page after when scrolled up & down.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.0
 * Author:            Monzur Alam
 * Author URI:        https://profiles.wordpress.org/monzuralam
 * Text Domain:       all-in-one-wp-sticky-anything
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and 
 * Rename this for your plugin and update it as you release new versions.
 */
define('all-in-one-wp-sticky-anything', '1.0.0');

/**
 * enqueue script
 */
if (!function_exists('all_in_one_wp_sticky_anything_scripts')) {
    function all_in_one_wp_sticky_anything_scripts(){
        wp_register_script('all-in-one-wp-sticky-anything', plugins_url('assets/js/all-in-one-wp-sticky-anything.js', __FILE__), array('jquery'), time(),  true);
        wp_register_script('all-in-one-wp-sticky-main', plugins_url('assets/js/main.js', __FILE__), array(), '1.0.0',  true);
        wp_enqueue_script('all-in-one-wp-sticky-anything');
        wp_enqueue_script('all-in-one-wp-sticky-main');
    }
}
add_action('wp_enqueue_scripts', 'all_in_one_wp_sticky_anything_scripts');

/**
 * enqueue admin style
 */
if (!function_exists('all_in_one_wp_sticky_anything_admin_style')) {
    function all_in_one_wp_sticky_anything_admin_style(){
        wp_register_style('all-in-one-wp-sticky-style', plugins_url('assets/css/style.css', __FILE__), false, '1.0.0', 'all');
        wp_enqueue_style('all-in-one-wp-sticky-style');
    }
}
add_action('admin_enqueue_scripts', 'all_in_one_wp_sticky_anything_admin_style');