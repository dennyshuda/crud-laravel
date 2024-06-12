<x-app-layout>
    <div class="py-12 px-4">
        <div class="flex justify-between">
            <h2>List Producst</h2>
            <a href={{ route('products.create') }}>
                <button class="bg-slate-200 px-5 py-2">Add</button>
            </a>
        </div>

        <div class="grid grid-cols-3 gap-3">
            @foreach ($products as $product)
                <div>
                    <img src="{{ url('storage/' . $product->image) }}" alt={{ $product->name }}>
                    <div>
                        <p class="font-bold">{{ $product->name }}</p>
                        <p class="text-slate-500">Rp. {{ number_format($product->price) }}</p>
                    </div>
                    <button class="bg-slate-200 w-full">Edit</button>
                </div>
            @endforeach
        </div>

        <div>
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
