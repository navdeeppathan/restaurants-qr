<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('admin.items.index', [
            'categories' => Category::all(),
            'items' => Item::with('category')->latest()->get()
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required',
        'name'        => 'required',
        'price'       => 'required|numeric',
        'description' => 'nullable',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data = $request->only([
        'category_id', 'name', 'price', 'description'
    ]);

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/items'), $imageName);
        $data['image'] = 'uploads/items/' . $imageName;
    }

    Item::create($data);

    return back()->with('success', 'Item added successfully');
}

}
