<x-app-layout>
    @slot('title', 'Products')

    <div class="py-5 px-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if (session()->has('success'))
                <x-alert />
            @endif
            <h2 class="font-bold text-2xl uppercase">List Products</h2>

            <div class="grid grid-cols-3 gap-3">
                @foreach ($products as $product)
                    <x-card>
                        <x-card.header>
                            <img src="{{ url('storage/image/products/' . $product->image) }}" alt={{ $product->name }}
                                class="aspect-square object-cover" />
                            <x-card.title>{{ $product->name }}</x-card.title>
                            <x-card.description>{{ $product->description }}</x-card.description>
                            @if ($product->user_id == auth()->user()->id)
                                <a href={{ route('products.edit', $product) }}>
                                    <button class="bg-slate-800 w-full text-white py-2 rounded-md">Edit</button>
                                </a>
                            @endif
                        </x-card.header>
                    </x-card>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
