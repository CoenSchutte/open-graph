<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\ShikiPhp\Shiki;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $request_url = $request['url'];
        !str_contains($request_url, 'https') ? $request_url = 'https://' . $request_url : $request_url = $request_url;
        $url = base64_encode($request_url);
        $image = (new GenerateImageController())->__invoke('twitter', $url);

        $other =
            '<!-- Other Meta Tags -->
<meta property="og:url" content="' . $request_url . '">
<meta property="og:type" content="website">
<meta property="og:title" content="<Title>">
<meta property="og:description" content="<Description>">
<meta property="og:image" content="' . config('opengraph.app_url') . 'facebook/' . $url . '">';

        $twitter =
            '<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary">
<meta property="twitter:domain" content="' . $request_url . '">
<meta property="twitter:url" content="' . $request_url . '">
<meta name="twitter:title" content="<Title>">
<meta name="twitter:description" content="<Description>">
<meta name="twitter:image" content="' . config('opengraph.app_url') . 'twitter/' . $url . '">

';
        $html = Shiki::highlight(
            code: $twitter . $other,
            language: 'html',
            theme: 'one-dark-pro'
        );
        return view('submitted', compact('image', 'html'));
    }

}
