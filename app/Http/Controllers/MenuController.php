<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;

class MenuController extends Controller
{
    public function categoryItems(Category $category)
    {
        return view('menu.items', [
            'category' => $category,
            'items' => $category->items
        ]);
    }

    public function itemDetail(Item $item)
    {
        return view('menu.detail', compact('item'));
    }
}
