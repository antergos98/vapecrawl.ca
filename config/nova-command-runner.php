<?php

return [
    'commands' => [
//        'Route cache'      => ['run' => 'route:cache', 'type' => 'info', 'group' => 'Cache'],
//        'Config cache'     => ['run' => 'config:cache', 'type' => 'info', 'group' => 'Cache'],
//        'View cache'       => ['run' => 'view:cache', 'type' => 'info', 'group' => 'Cache'],

        'Import all' => ['run' => 'import:products', 'type' => 'success', 'group' => 'Products'],

//        'Route clear'     => ['run' => 'route:clear', 'type' => 'warning', 'group' => 'Clear Cache'],
//        'Config clear'    => ['run' => 'config:clear', 'type' => 'warning', 'group' => 'Clear Cache'],
//        'View clear'      => ['run' => 'view:clear', 'type' => 'warning', 'group' => 'Clear Cache'],

        'Up'   => ['run' => 'up', 'type' => 'success', 'group' => 'Maintenance'],
        'Down' => ['run' => 'down', 'options' => ['--allow' => ['127.0.0.1']], 'type' => 'dark', 'group' => 'Maintenance'],
    ],
    'history'  => 10,
];
