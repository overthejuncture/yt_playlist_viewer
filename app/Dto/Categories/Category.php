<?php

namespace App\Dto\Categories;

class Category
{
    public function __construct(
        public string $title,
        public int $user_id,
        public ?int $_lft = null,
        public ?int $_rgt = null,
        public ?int $parent_id = null,
    )
    {
    }
}
