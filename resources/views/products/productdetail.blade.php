@auth
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <h2 class="text-center">{{$product->Description}}</h2>
        <br>
        <div id="app" style="padding-left: 43.5vw">
                <product-detail  :product="{{$product}}"/>   
                
        </div>
        <br>
                
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
        <br>
       
    </div>
</x-guest-layout>
@endguest

