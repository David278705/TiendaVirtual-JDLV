@auth
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }} de la Categoria: {{ $category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div id="app" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <catchosen-index :category="{{$category}}" :products="{{$products}}"/>  
        </div>
    </div>
</x-app-layout>
@endauth

@guest
<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }} de la Categoria: {{ $category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div id="app" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <catchosen-index :category="{{$category}}" :products="{{$products}}"/>  
        </div>
    </div>
</x-guest-layout>
@endguest
