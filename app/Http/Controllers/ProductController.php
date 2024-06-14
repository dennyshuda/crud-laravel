<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller {
    public function index(): View {
        return view('products.index', ['products' => Product::latest()->get()]);
    }

    public function create(): View {
        return view('products.create');
    }

    public function store(ProductRequest $request) {
        $file = $request->file('image');
        $file->storeAs('image/products', $file->hashName());
        $request->user()->products()->create([
            ...$request->validated(),
            ...['image' => $file->hashName()]
        ]);

        return redirect()->route('products.index')->with('success', 'product is succes added');
    }

    public function edit(Product $product): View {
        Gate::authorize('edit', $product);
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product) {
        // $product->name = $request->name;
        // $product->price = $request->price;
        // $product->description = $request->description;

        // if ($request->file('image')) {
        //     Storage::disk('local')->delete('public/', $product->image);
        //     $image = $request->file('image');
        //     $image->storeAs('public', $image->hashName());
        //     $product->image = $image->hashName();
        // }
        // $product->update();

        // return redirect()->route('products.index')->with('success', 'update product is success');
    }


    public function destroy(Product $product) {
        if ($product->image !== 'noimage.png') {
            Storage::disk('local')->delete('public/', $product->image);
        }
        $product->delete();

        return redirect()->route('products.index')->with('success', "Delete product succes");
    }
}
