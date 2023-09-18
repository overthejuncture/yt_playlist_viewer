<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function get(Request $request)
    {
        $cats = $request->get('categories', []);
        $withoutCategories = $request->boolean('withoutCategories');
        if ($withoutCategories) {
            $videos = Video::whereDoesntHave('categories')->get();
        } else if ($cats) {
            $videos = Video::whereHas(
                'categories', function ($builder) use ($cats) {
                $builder->whereIn('categories.id', $cats);
            })
                ->get();
        } else {
            $videos = Video::all();
        }
        return response()->json($videos);
    }

    public function getRandomVideoWithoutCategories()
    {
        $video = Video::whereDoesntHave('categories')->inRandomOrder()->first();
        return response()->json($video);
    }

    public function setCategory(Request $request, Video $video): JsonResponse
    {
        $categories = $request->post('categories');
        $video->categories()->sync($categories);
        $video = $video->fresh(['categories']);
        return response()->json($video);
    }

    public function getById(Request $request, Video $video)
    {
        return response()->json($video);
    }
}
