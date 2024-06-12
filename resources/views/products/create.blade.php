<x-app-layout>
    <div class="py-12 px-4">
        <div class="flex justify-between">
            <p class="bg-slate-200 px-5 py-2">Add Product</p>
        </div>

        <form action={{ route('products.store') }} method="POST">
            @csrf
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="price" :value="__('Price')" />
                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')"
                    required />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="description" :value="__('Description')" />
                <x-text-area id="description" class="block mt-1 w-full" type="text"
                    name="description">{{ old('description') }}</x-text-area>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <x-primary-button class="ms-3">
                {{ __('Submit') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
