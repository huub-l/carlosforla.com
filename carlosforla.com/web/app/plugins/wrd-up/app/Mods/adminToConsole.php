<?php

namespace Pixel\Plugins\Mods;

function adminToConsole()
{
    $action = is_user_admin() ? 'user_admin_notices' : 'admin_notices';

    add_action($action, function () {
        ob_start();
    });

    add_action(
        'all_admin_notices',
        function () {
            $log = strip_tags(trim(ob_get_clean()));

            if (!$log) :
                return;
            endif;

            wp_register_script('admin-to-console', '');
            wp_enqueue_script('admin-to-console');
            wp_add_inline_script(
                'admin-to-console',
                'console.log(`'. $log .'`);'
            );
        }
    );
}

add_action(
    'plugins_loaded',
    __NAMESPACE__ .'\\adminToConsole'
);
