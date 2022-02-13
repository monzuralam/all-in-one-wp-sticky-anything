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
        wp_enqueue_script('aiowsa', plugins_url('assets/js/all-in-one-wp-sticky-anything.js', __FILE__), array('jquery'), time(),  true);
        wp_enqueue_script('aiowsa-main', plugins_url('assets/js/main.js', __FILE__), array(), '1.0.0',  true);

        $className = esc_attr(get_option('stickyclass'));
        wp_localize_script('aiowsa-main','stickyData',array(
            'classname' =>  $className
        ));
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

/**
 * Settings API
 */
if( !function_exists('all_in_one_wp_sticky_anything_option') ){
    function all_in_one_wp_sticky_anything_option(){
        add_options_page('All-in-One WP Sticky Anything', 'All-in-One WP Sticky Anything', 'administrator', 'all-in-one-wp-sticky-anything', 'all_in_one_wp_sticky_anything_fields');
    }
    add_action('admin_menu', 'all_in_one_wp_sticky_anything_option');
}

function all_in_one_wp_sticky_anything_fields(){
?>
    <div class='wrap'>
        <h2><?php esc_html_e('All-in-One WP Sticky Anything','all-in-one-wp-sticky-anything'); ?></h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>

            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="stickyclass">
                                <?php esc_html_e('Sticky Class','all-in-one-wp-sticky-anything'); ?>
                            </label>
                        </th>
                        <td>
                            <input name="stickyclass" type="text" id="stickyclass" value="<?php echo esc_attr(get_option('stickyclass')); ?>" class="regular-text"><br>
                            <small><?php esc_html_e('(choose ONE element, e.g. #main-navigation, OR .main-menu-1, OR header nav, etc.)','all-in-one-wp-sticky-anything'); ?></small>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="stickyclass"><?php esc_html_e('Default Class','all-in-one-wp-sticky-anything') ?></label>
                        </th>
                        <td>
                            <p><?php esc_html_e('Make anything sticky by use sticky class. example:') ?></p>
                            <code>
                                &lt;div class="sticky"&gt;<?php esc_html_e('I am sticky','all-in-one-wp-sticky-anything'); ?>&lt;/div&gt;
                            </code>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p><input type="submit" name="Submit" value="Save" class="button button-primary"/></p>

            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="stickyclass" />
        </form>
    </div>
<?php
}