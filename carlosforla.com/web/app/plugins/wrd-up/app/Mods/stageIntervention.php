<?php

namespace Pixel\Plugins\Mods;

use function \Sober\Intervention\intervention;

if (function_exists('\Sober\Intervention\intervention')) :
    define('UPDRAFTPLUS_ADMINBAR_DISABLE', true);
    add_filter('acf/settings/show_admin', '__return_false');

    intervention('remove-dashboard-items');
    intervention('update-dashboard-columns', 2);
    intervention('remove-emoji');
    intervention('remove-help-tabs');
    intervention(
        'remove-howdy',
        '👏🏽 '
    );
    intervention(
        'remove-page-components',
        [
            'comments',
            'author',
            'page-attributes'
        ]
    );
    intervention(
        'remove-toolbar-items',
        [
            'logo',
            'updates',
            'comments',
            'new-user',
            'account-user',
            'edit-translation',
        ]
    );
    intervention(
        'remove-user-fields',
        [
            'about-bio',
            'contact-web',
            'option-editor',
            'option-shortcuts'
        ]
    );
    intervention(
        'remove-widgets',
        [
            'calendar',
            'archives',
            'links',
            'meta',
            'categories',
            'recent-posts',
            'recent-comments',
            'rss',
            'tag-cloud',
            'media-video',
            'akismet',
            'media-audio'
        ]
    );
    intervention(
        'update-label-footer',
        'Developed by <a href="https://tinypixel.io">Tiny Pixel Collective</a>.'
    );
    intervention('remove-menu-items', ['comments'], 'all');

    add_action('init', function () {
        if (!(current_user_can('developer_settings'))) :
            intervention('remove-menu-items', ['tools', 'settings', 'themes', 'widgets'], 'all');
        endif;

        if (!(current_user_can('admin_settings')) || !(current_user_can('developer_settings'))) :
            add_action(
                'admin_menu',
                function () {
                    remove_menu_page('admin.php?page=theseoframework-settings');
                    remove_menu_page('index.php', 'update-core.php');
                }
            );
        endif;
    });
endif;

remove_post_type_support('post', 'comments');
add_post_type_support('page', 'excerpt');
