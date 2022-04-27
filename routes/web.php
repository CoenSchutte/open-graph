<?php

use Illuminate\Support\Facades\Route;
use Spatie\Browsershot\Browsershot;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{platform}/{url}', function ($platform, $url) {
    if (! in_array($platform, ['twitter', 'facebook'])) $platform = 'unknown';

    $preferred_size = [
        'twitter' => [
            'width' => '600',
            'height' => '600',
        ],
        'facebook' => [
            'width' => '1200',
            'height' => '630',
        ],
        'unknown' => [
            'width' => '1200',
            'height' => '630',
        ],
    ];

    if (! file_exists(public_path('screenshots/' . $platform . '/' . $url . '.png'))) {
        $decoded_url = base64_decode($url);

        Browsershot::url($decoded_url)
            ->windowSize($preferred_size[$platform]['width'], $preferred_size[$platform]['height'])
            ->save('screenshots/' . $platform . '/' . $url . '.png');
    }

    // Get the contents of the screenshot
    $contents = file_get_contents(asset('screenshots/' . $platform . '/' . $url . '.png'));

    // Return the image
    return response($contents, 200)->header('Content-Type', 'image/png');
});
