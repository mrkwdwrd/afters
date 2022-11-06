<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        'uploads' => [
            'driver' => 'local',
            'root' => storage_path('app/uploads'),
            'url' => env('APP_URL') . '/uploads',
            'visibility' => 'public',
        ],

        'page' => [
            'driver' => 'local',
            'root'   => storage_path('app/uploads/page'),
            'url' => env('APP_URL') . '/uploads/page',
            'visibility' => 'public',
        ],

        'blog' => [
            'driver' => 'local',
            'root'   => storage_path('app/uploads/blog'),
            'url' => env('APP_URL') . '/uploads/blog',
            'visibility' => 'public',
        ],

        'slider' => [
            'driver' => 'local',
            'root'   => storage_path('app/uploads/slider'),
            'url' => env('APP_URL') . '/uploads/slider',
            'visibility' => 'public',
        ],

        'gallery' => [
            'driver' => 'local',
            'root'   => storage_path('app/uploads/gallery'),
            'url' => env('APP_URL') . '/uploads/gallery',
            'visibility' => 'public',
        ],

        'person' => [
            'driver' => 'local',
            'root'   => storage_path('app/uploads/person'),
            'url' => env('APP_URL') . '/uploads/person',
            'visibility' => 'public',
        ],

        'product' => [
            'driver' => 'local',
            'root'   => storage_path('app/uploads/product'),
            'url' => env('APP_URL') . '/uploads/product',
            'visibility' => 'public',
        ],

        'cms_content' => [
            'driver' => 'local',
            'root' => storage_path('app/uploads/content'),
            'url' => env('APP_URL') . '/uploads/content',
            'visibility' => 'public',
        ],

        'product_lists' => [
            'driver' => 'local',
            'root' => storage_path('app/uploads/product_lists'),
            'url' => env('APP_URL') . '/uploads/product_lists',
            'visibility' => 'public',
        ],

        'tiles' => [
            'driver' => 'local',
            'root' => storage_path('app/uploads/tiles'),
            'url' => env('APP_URL') . '/uploads/tiles',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
        public_path('uploads') => storage_path('app/uploads'),
    ],

];
