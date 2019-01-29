<?php

/**
 * Plugin Name:   wordUp
 * Plugin URI:    https://tinypixel.io/
 * Description:   WordPress Service and Support
 * Version:       1.0.0
 * Author:        Tiny Pixel Collective
 * Author URI:    https://tinypixel.io/
 * License:       MIT License
 * License URI:   http://opensource.org/licenses/MIT
 *
 * PHP Version 7.2
 *
 * @category Wordpress-Plugins
 * @package  wordUp
 * @author   Kelly Mears <developers@tinypixel.io>
 * @license  MIT License
 * @link     https://roots.io/plugins/roots-share-buttons/
 *
 * Note: this file is intentionally written for compatibility with PHP versions
 * which the plugin itself does not support.
 **/

 namespace Pixel;

 use \Pixel\Plugins\Base;

$plugin = (object) [
    // Plugin meta
    'name' => 'WRDUP',
    'version' => '2.0.0',
    'label' => 'share',
    'requiredPHP' => '7.1',
    'requiredWP' => '4.7.0',
    'composer' => __DIR__.'/vendor/autoload.php',
];

// Initialize error collector
$errors = [];

/**
 * Helper function for displaying errors.
 *
 * @param $errors []
 * @param $is_admin_notice bool
 */
$display_errors = function ($errors, $is_admin_notice) use ($plugin) {
    $content = '';
    $header = $is_admin_notice ? "<h4>{$plugin->name} disabled, because an error has occurred:</h4>" : '';
    $styles = $is_admin_notice ? '' : '<style>.error{color:#444;font:13px sans-serif}</style>';
    foreach ($errors as $error) {
        $content .= "<p><strong>{$error->title}:</strong> {$error->message}</p>";
    }
    echo "{$styles}<div class=\"error\">{$header}{$content}</div>";
};

/**
 * Ensure the correct PHP version is being used.
 */
version_compare($plugin->requiredPHP, phpversion(), '<')
    ?: $errors[] = (object) [
        'title' => __('Invalid PHP version', 'roots'),
        'message' => __(
            sprintf('You must be using PHP %s or greater.', $plugin->requiredPHP),
            'roots'
        ),
    ];

/**
* Ensure the correct WordPress version is being used.
*/
version_compare($plugin->requiredWP, get_bloginfo('version'), '<') ?: $errors[] = (object) [
    'title' => __('Invalid WordPress version', 'roots'),
    'message' => __(
        sprintf(
            'You must be using WordPress %s or greater.',
            $plugin->requiredWP
        ),
        'roots'
    ),
];

/**
 * Ensure dependencies can be loaded.
 */
file_exists($plugin->composer) ?: $errors[] = (object) [
    'title' => __('Autoloader not found', 'roots'),
    'message' => __(sprintf('You must run <code>composer install</code> from the %s plugin directory.', $plugin->name), 'roots'),
];

/**
 * If there are no errors, boot the plugin, or else display errors:
 * - and prevent activation if it was being activated.
 * - and disable the plugin (i.e. do nothing) if previously activated.
 */
if (empty($errors)) {
    include_once $plugin->composer;

    (new Base(__FILE__, $plugin->name, $plugin->version, $plugin->label))->run();

} else {
    // This only runs if the plugin was just activated
    register_activation_hook(
        __FILE__, function () use ($errors, $display_errors) {
            $display_errors($errors, false);
            die(1);
        }
    );

    // If previously activated, we create an admin notice.
    add_action(
        'admin_notices', function () use ($errors, $display_errors) {
            $display_errors($errors, true);
        }
    );
}
