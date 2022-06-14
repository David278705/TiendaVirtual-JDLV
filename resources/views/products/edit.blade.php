
@auth

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div id="app" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <product-form :categories="{{$categories}}" :product="{{$product}}"></product-form>          
        </div>
    </div>
</x-app-layout>

@endauth







