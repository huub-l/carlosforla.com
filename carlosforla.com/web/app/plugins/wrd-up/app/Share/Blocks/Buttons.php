<?php
/**
 * Pixel\Plugins\Share\Blocks\Buttons
 *
 * Lightweight share buttons for the WordPress 5.0 editor.
 *
 * PHP Version 7.2
 *
 * @category Wordpress-Plugin
 * @package  Roots_Share
 * @author   Kelly Mears <developers@tinypixel.io>
 * @author   Ben Word <ben@benword.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://roots.io/share
 * @since    2.0.0
 **/

namespace Pixel\Plugins\Share\Blocks;

use \Roots\Clover\Plugin;

/**
 * Pixel\Plugins\Share\Blocks\Buttons
 *
 * Registers and enqueues block functionality for the
 * WordPress 5.0 editor.
 *
 * @author  Kelly Mears <developers@tinypixel.io>
 * @license MIT <https://opensource.org/licenses/MIT>
 * @link    https://bit.ly/2TgO1i2
 *
 * @return void
 */
class Buttons extends Plugin
{
    /**
     * $pluginUrl
     *
     * @var undefined
     */
    public $pluginUrl;

    /**
     * $pluginDir
     *
     * @var undefined
     */
    public $pluginDir;

    /**
     * $blockNamespace
     *
     * @var undefined
     */
    public $blockNamespace;

    /**
     * Set up block editor basics on instantiation
     *
     * @param string $blockNamespace Namespace for WordPress (namespace/blockname)
     * @param string $pluginUrl      URL of plugin
     * @param string $pluginDir      Directory of plugin
     *
     * @return void
     */
    public function __construct($blockNamespace, $pluginUrl, $pluginDir)
    {
        $this->pluginUrl = $pluginUrl;
        $this->blockNamespace = $blockNamespace;
        $this->pluginDir = $pluginDir;

        $this->registerEditorBlocks();
        $this->registerFrontendBlocks();
        $this->registerEditorScripts();
    }

    /**
     * Editor block scripts
     *
     * @return void
     */
    public function registerEditorBlocks()
    {
        $this->registerEditorBlock(
            'roots-share-buttons',
            $this->pluginDir .'/dist/scripts/main.js'
        );
    }

    /**
     * Public block scripts
     *
     * @return void
     */
    public function registerFrontendBlocks()
    {
        // $this->registerFrontendBlock(basename($blockname, '.js'));
    }

    /**
     * Register block
     *
     * @param string $name name of block to register
     *
     * @return void
     */
    public function registerEditorBlock($name)
    {
        add_action(
            'init',
            function () use ($name) {
                register_block_type(
                    $this->blockNamespace .'/'. $name,
                    array(
                        'editor_script' => $this->blockNamespace .'-editor-js',
                        'editor_style'  => $this->blockNamespace .'-editor-css'
                    )
                );
            }
        );
    }

    /**
     * Enqueue block editor scripts
     *
     * @return void
     */
    public function registerEditorScripts()
    {
        add_action(
            'init', function () {
                wp_register_style(
                    $this->blockNamespace .'-editor-css',
                    $this->pluginUrl .'/dist/styles/main.css'
                );

                wp_register_script(
                    $this->blockNamespace .'-editor-js',
                    $this->pluginUrl .'/dist/scripts/main.js',
                    array(
                        'wp-blocks',
                        'wp-components',
                        'wp-compose',
                        'wp-data',
                        'wp-date',
                        'wp-editor',
                        'wp-element',
                        'wp-hooks',
                        'wp-i18n',
                        'wp-plugins',
                    )
                );
            }
        );

        add_action(
            'wp_enqueue_scripts', function () {
                wp_enqueue_style(
                    $this->blockNamespace .'-public-css',
                    $this->pluginUrl .'/dist/styles/front.css',
                    array(),
                );
            }
        );
    }

    /**
     * Enqueue public assets
     *
     * @param string $name Register block name
     *
     * @return void
     */
    public function registerFrontendBlock($name)
    {
        add_action(
            'wp_enqueue_scripts', function () use ($name) {
                wp_enqueue_script(
                    'wp-block-'. $name .'-public-js',
                    $this->pluginUrl .'/dist/scripts/frontend/'. $name .'.js',
                    array(
                        'wp-blocks',
                        'wp-element'
                    ),
                    null,
                    true
                );

                wp_enqueue_style(
                    'wp-block-'. $name .'-public-css',
                    $this->pluginUrl .'/dist/styles/frontend/'. $name .'.css',
                    ['wp-block'. $name .'-public-js']
                );
            }
        );
    }
}
