@auth
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div id="app" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <product-detail  :product="{{$product}}"/>  
        </div>
    </div>
</x-app-layout>

@endauth

@guest
<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div id="app" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <product-detail :product="{{$product}}"/>  
        </div>
    </div>
</x-guest-layout>
@endguest

