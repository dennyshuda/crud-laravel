<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function edit(Product $product): View {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product) {
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->file('image')) {
            Storage::disk('local')->delete('public/', $product->image);
            $image = $request->file('image');
            $image->storeAs('public', $image->hashName());
            $product->image = $image->hashName();
        }
        $product->update();

        return redirect()->route('products.index')->with('success', 'update product is success');
    }
}
