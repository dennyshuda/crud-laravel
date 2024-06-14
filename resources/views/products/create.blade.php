<x-app-layout>
    @slot('title', 'Create Product')

    <div class="py-12 px-4">
        <div class="flex justify-between">
            <p class="bg-slate-200 px-5 py-2">Add Product</p>
        </div>

        <div class="flex" x-data={ imageUrl: 'storage/noimage.png' }>
            <div class="flex-1">
                <img :src={{ url('storage/noimage.png') }} alt="image">
            </div>


            <form action={{ route('products.store') }} method="POST" class="flex-1 space-y-2" novalidate
                enctype="multipart/form-data">
                @csrf
                <div>
                    <x-input-label for="image" :value="__('Image')" />
                    <x-text-input accept="image/*" id="image" class="block mt-1 w-full" type="file"
                        name="image" :value="old('image')" required
                        @change='imageUrl = URL.createObjectURL($event.target.files[0])' />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="text" name="price"
                        :value="old('price')" required />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-area id="description" class="block mt-1 w-full" type="text"
                        name="description">{{ old('description') }}</x-text-area>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <x-primary-button>
                    {{ __('Create') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
