<?php

namespace App\Factories\Youtube\Categories;

use App\Dto\Youtube\Categories\Category;

class CategoryFactory
{
    public static function create(Category $data)
    {
        return \App\Models\Category::create((array) $data);
    }
}
