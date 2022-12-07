<?php

namespace App\Http\Controllers\Api\Youtube;

use App\Models\Video;
use Illuminate\Http\Request;

class CategorizeController
{
    public function get(Request $request)
    {
        return response()->json(Video::whereDoesntHave('categories')->first());
    }
}
