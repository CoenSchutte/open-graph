<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;

class GenerateImageController extends Controller
{
    public function __invoke($platform, $url)
    {
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

        // If file exists in S3
        if (! Storage::disk('s3')->exists($platform . '/' . $url . '.png')) {
            $decoded_url = base64_decode($url);

            $image = Browsershot::url($decoded_url)
                ->windowSize($preferred_size[$platform]['width'], $preferred_size[$platform]['height'])
                ->screenshot();

            Storage::disk('s3')->put($platform . '/' . $url . '.png', $image);
        }

        // Get the contents of the screenshot
        $contents = Storage::disk('s3')->get($platform . '/' . $url . '.png');

        // Return the image
        return response($contents, 200)->header('Content-Type', 'image/png');
    }
}
