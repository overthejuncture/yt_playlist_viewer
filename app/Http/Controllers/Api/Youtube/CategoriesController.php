<?php

namespace App\Http\Controllers\Api\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CategoriesController extends Controller
{
    public function get(Request $request): JsonResponse
    {
        return response()->json(Category::all());
    }

    public function store(Request $request)
    {
        $title = $request->post('title');
        Category::create([
            'title' => $title,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function delete(Category $category)
    {
        $category->deleteOrFail();
    }
}
