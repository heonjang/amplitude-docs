<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Base URL
    |--------------------------------------------------------------------------
    |
    | This informs the generator where the static site will eventually be hosted.
    | For instance, if you are relying on absolute URLs in your app, this one
    | will be used. It should be an absolute URL, eg. "http://my-app.com"
    |
    */

    'base_url' => config('app.url'),

    /*
    |--------------------------------------------------------------------------
    | Destination Directory
    |--------------------------------------------------------------------------
    |
    | This option defines where the static files will be saved.
    |
    */

    'destination' => storage_path('app/static'),

    /*
    |--------------------------------------------------------------------------
    | Files and Symlinks
    |--------------------------------------------------------------------------
    |
    | You are free to define a set of directories to be copied along with the
    | generated HTML files. For example, you may want to link your CSS,
    | JavaScript, static images, and perhaps any uploaded assets.
    | You may choose to symlink rather than copy.
    |
    */

    'copy' => [
        // public_path('build') => 'docs/build',
        public_path('docs/output') => 'docs/output',
        public_path('docs/assets') => 'docs/assets',
        public_path('docs/css') => 'docs/css',
        public_path('docs/js') => 'docs/js',
        public_path('docs/fonts') => 'docs/fonts',
    ],

    'symlinks' => [
        // public_path('build') => 'build',
    ],

    /*
    |--------------------------------------------------------------------------
    | Additional URLs
    |--------------------------------------------------------------------------
    |
    | Here you may define a list of additional URLs to be generated,
    | such as manually created routes.
    |
    */

    'urls' => [
        'sitemap-docs.xml',
        '/sitemap-docs.xml',
        '/404'
    ],

    /*
    |--------------------------------------------------------------------------
    | Exclude URLs
    |--------------------------------------------------------------------------
    |
    | Here you may define a list of URLs that should not be generated.
    |
    */

    'exclude' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Pagination Route
    |--------------------------------------------------------------------------
    |
    | Here you may define how paginated entries are routed. This will take
    | effect wherever pagination is detected in your antlers templates,
    | like if you use the `paginate` param on the `collection` tag.
    |
    */

    'pagination_route' => '{url}/{page_name}/{page_number}',

    /*
    |--------------------------------------------------------------------------
    | Glide
    |--------------------------------------------------------------------------
    |
    | Glide images are dynamically resized server-side when requesting a URL.
    | On a static site, you would just be serving HTML files without PHP.
    | Glide images will be pre-generated into the given directory.
    |
    */

    'glide' => [
        'directory' => 'img',
        'override' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Failures
    |--------------------------------------------------------------------------
    |
    | You may configure whether the console command will exit early with a
    | failure status code when it encounters errors or warnings. You may
    | want to do this to prevent deployments in CI environments, etc.
    |
    */

    'failures' => false, // 'errors' or 'warnings'

];
