<?php

namespace App\Http\Controllers\Api\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function get(Request $request)
    {
        $cats = $request->get('categories', []);
        $videos = Video::whereHas(
            'categories', function ($builder) use ($cats) {
            $builder->whereIn('categories.id', $cats);
        })
            ->get();
        return response()->json($videos);
    }

    public function setCategory(Request $request)
    {
        $video_id = $request->post('videoId');
        $category_id = $request->post('categoryId');
        $video = Video::where('id', $video_id)->first();
        /* @var $video Video */
        $video->categories()->syncWithoutDetaching($category_id);
        return response()->json();
    }
}
