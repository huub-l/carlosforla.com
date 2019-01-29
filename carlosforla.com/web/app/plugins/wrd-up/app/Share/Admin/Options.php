<?php

namespace Pixel\Plugins\Share\Admin;

use \Roots\Clover\Plugin;
use \Carbon_Fields\Container;
use \Carbon_Fields\Field;

class Options extends Plugin
{
    public function __construct()
    {
        $this->createParentPage();
        $this->createChildPages();
        $this->doJavascript();
    }

    public function createParentPage()
    {
        add_action(
            'admin_menu',
            function () {
                add_menu_page(
                    'WordUp',
                    'WordUp',
                    'manage_options',
                    'wrdup',
                    array(&$this, 'render'),
                );
            }
        );
    }

    public function createChildPages()
    {
        add_action('carbon_fields_register_fields', function () {
            Container::make('theme_options', __('Social Links', 'tpc'))
                ->set_page_parent('wrdup')
                ->add_fields(array(
                    Field::make('text', 'pixel_framework_link_facebook', __('Facebook Link', 'tpc')),
                    Field::make('text', 'pixel_framework_link_twitter', __('Twitter Link', 'tpc')),
                ));
        });

        add_action('after_setup_theme', function () {
            \Carbon_Fields\Carbon_Fields::boot();
        });
    }

    public function doJavascript()
    {
        add_action(
            'admin_enqueue_scripts', function () {
                wp_enqueue_script(
                    'wordup-admin-options-js',
                    plugins_url('wrd-up') .'/dist/scripts/admin.js',
                    array(
                        'wp-element'
                    ),
                    null,
                    true
                );

                wp_enqueue_script( 'wp-api' );

                wp_enqueue_style(
                    'wordup-admin-options-css',
                    plugins_url('wrd-up') .'/dist/styles/admin.css',
                    ['wordup-admin-options-js']
                );
            }
        );
    }

    public function render()
    {
        echo '<h1>'. __('WordUp Options', 'tpc') .'</h1>';
        echo '<p>'. __('Functionality and support for Tiny Pixel Collective partners.', 'tpc') .'</p>';
        echo '<div id="wordUpAdminJS"></div>';
    }
}
