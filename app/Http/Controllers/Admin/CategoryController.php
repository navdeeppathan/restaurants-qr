<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use BaconQrCode\Renderer\ImageRenderer;

use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return back();
    }

    public function generateQr(Category $category)
    {
        // $url = url('/menu/' . $category->slug);
        $url = url('/menu/items/1' );
        

        $renderer = new ImageRenderer(
            new RendererStyle(300),
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);
        $qrImage = $writer->writeString($url);

        $path = 'qr/category_' . $category->id . '.svg';
        Storage::disk('public')->put($path, $qrImage);

        $category->update([
            'qr_code' => $path
        ]);

        return back()->with('success', 'QR generated successfully');
    }



}
