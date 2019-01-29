<?php

namespace Pixel\Plugins\Mods;

add_action(
    'admin_enqueue_scripts',
    function ($hook) {
        $blacklist = [
            'post-edit.php',
            'post-new.php',
            'page-new.php',
            'page-edit.php'
        ];

        if (in_array($hook, $blacklist)) {
            return;
        }

        wp_register_script('pixels-freshchat', 'https://wchat.freshchat.com/js/widget.js', array(), true);
        wp_enqueue_script('pixels-freshchat');
    }
);

add_action(
    'in_admin_footer',
    function () {
        print <<<EOF
            <script type="text/javascript">
                window.fcWidget.init({
                    token: "02384f99-cd87-4811-b117-0c43f531113c",
                    host: "https://wchat.freshchat.com",
                });
            </script>
EOF;
    }
);
