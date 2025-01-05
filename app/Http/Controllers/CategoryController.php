<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategories($parentId = null)
    {
        $categories = Category::where('parent_id', $parentId)->get();

        // Format categories as nested structure
        $categoriesWithChildren = $categories->map(function ($category) {
            $category->children = $this->getCategories($category->id);
            return $category;
        });

        return response()->json($categoriesWithChildren);
    }
}
