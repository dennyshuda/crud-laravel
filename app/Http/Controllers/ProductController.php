<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller {
    public function index(): View {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    public function create(): View {
        return view('products.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png'
        ]);

        $image = $request->file('image');
        $image->storeAs('public', $image->hashName());

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $image->hashName()
        ]);

        return redirect()->route('products.index')->with('success', 'product is succes added');
    }
}
