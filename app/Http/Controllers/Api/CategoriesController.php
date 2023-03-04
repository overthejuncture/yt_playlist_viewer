<?php

namespace App\Http\Controllers\Api;

use App\Factories\Youtube\Categories\CategoryFactory;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json(Category::main()->get());
    }

    public function store(Request $request)
    {
        $title = $request->post('title');
        $category = new Category([
            'title' => $title,
            'user_id' => auth()->user()->id,
        ]);
        $category->saveAsRoot();
    }

    public function delete(Category $category)
    {
        $category->deleteOrFail();
    }

    public function show($id): JsonResponse
    {
        return response()->json(Category::where('id', $id)->with('subcategories')->first());
    }

    public function addSubcategory(Category $category, Request $request)
    {
        $category->appendNode(
            CategoryFactory::create(
                new \App\Dto\Categories\Category(
                    title: $request->post('title'),
                    user_id: auth()->user()->id
                )
            )
        );
    }
}
