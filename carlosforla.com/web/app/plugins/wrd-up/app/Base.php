<?php
/**
 * Pixel\Plugins
 *
 * Tiny Pixel Framework
 *
 * PHP Version 7.2
 *
 * @category Wordpress-Plugin
 * @package  Pixel Plugins
 * @author   Kelly Mears <developers@tinypixel.io>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://roots.io/share
 * @since    2.0.0
 *
 * Leveraging the Acorn Framework (c) Roots.io
 *
 **/

namespace Pixel\Plugins;

use \Pixel\Plugins\Share\Blocks\Buttons;
use \Pixel\Plugins\Share\Admin\Options;

use \Roots\Clover\Plugin;

class Base extends Plugin
{

    /**
     * Run the plugin.
     *
     * @return void
     */
    public function run()
    {
        // Lifecycle, hooks, activation
        register_activation_hook($this->get('path'), [$this, 'activate']);
        register_deactivation_hook($this->get('path'), [$this, 'deactivate']);
        add_action($this->getTag('upgrade'), [$this, 'upgrade']);

        $this->handleConcerns();
    }

    /**
     * Business
     *
     * @return void
     */
    public function handleConcerns()
    {
        // Editor Add-ons
        (new Buttons('wrd-up', plugins_url('wrd-up'), plugin_dir_path('wrd-up')));

        // Admin Options
        (new Options());

    }

    /**
     * Run when the plugin is activated.
     *
     * @return void
     */
    public function activate()
    {
    }

    /**
     * Run when the plugin is deactivated.
     *
     * @return void
     */
    public function deactivate()
    {
    }

    /**
     * Run when the plugin is upgraded.
     *
     * @return void
     */
    public function upgrade()
    {
    }
}
