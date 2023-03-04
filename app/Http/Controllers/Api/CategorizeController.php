<?php

namespace App\Http\Controllers\Api;

use App\Models\Video;
use Illuminate\Http\Request;

class CategorizeController
{
    public function get(Request $request)
    {
        return response()->json(Video::whereDoesntHave('categories')->first());
    }

    public function getById(Request $request, Video $video)
    {
        return response()->json($video);
    }
}
