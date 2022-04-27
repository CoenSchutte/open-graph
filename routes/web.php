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

Route::get('/{url}', function ($url) {
    if (! file_exists(public_path('screenshots/' . $url . '.png'))) {
        $decoded_url = base64_decode($url);

        Browsershot::url($decoded_url)
            ->windowSize(1200, 630)
            ->save('screenshots/' . $url . '.png');
    }

    // Get the contents of the screenshot
    $contents = file_get_contents(asset('screenshots/' . $url . '.png'));

    // Return the image
    return response($contents, 200)->header('Content-Type', 'image/png');
});
