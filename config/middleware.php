<?php

return [
    '' => [
        app\middleware\Template::class,
        app\middleware\Access::class,
        app\middleware\Platform::class
    ],
    'admin' => [
        plugin\pluginExample\app\admin\middleware\Auth::class
    ]
];
