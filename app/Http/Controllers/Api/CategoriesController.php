<?php

namespace App\Http\Controllers\Api;

use App\Factories\Youtube\Categories\CategoryFactory;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Video;
use DB;
use Illuminate\Database\Eloquent\Builder;
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
            /** @phpstan-ignore-next-line */
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
                    /** @phpstan-ignore-next-line */
                    user_id: auth()->user()->id
                )
            )
        );
    }

    public function search(Request $request)
    {
        $categoriesIds = $request->post('categories');
        if (!$categoriesIds) {
            return Video::all();
        }
        $count = count($categoriesIds);
        $query = DB::table('videos')->selectRaw("videos.*, count(distinct category_id) as cnt")
            ->join('category_video', 'videos.id', '=', 'category_video.video_id')
            ->whereIn('category_video.category_id', $categoriesIds)
            ->groupBy('videos.id')
            ->havingRaw('cnt = ' . $count);
        $videos = $query->get();
        $result = Video::hydrate($videos->all());
        return $result;
    }
}
