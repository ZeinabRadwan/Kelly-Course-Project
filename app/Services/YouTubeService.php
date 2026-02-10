<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class YouTubeService
{
    public function getVideoTitle($videoId)
    {
        $apiKey = env('YOUTUBE_API_KEY');  

        $url = "https://www.googleapis.com/youtube/v3/videos";
        $response = Http::get($url, [
            'part' => 'snippet',
            'id' => $videoId,
            'key' => $apiKey
        ]);

        $data = $response->json();

        if (isset($data['items'][0]['snippet']['title'])) {
            return $data['items'][0]['snippet']['title'];
        }

        return 'Video not found';
    }
}
