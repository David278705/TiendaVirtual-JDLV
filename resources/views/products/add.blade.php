<x-app-layout>
    <section>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Añadir Producto') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div id="app" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <product-index :categories="{{$categories}}" :products="{{$products}}"/>         
            </div>
        </div>
    </section>

    @section('js')
    <script>
        $(document).ready(function () {
        $('#table').DataTable();
    });
    </script>
    @endsection
</x-app-layout>


@auth


@endauth

@guest

<x-guest-layout>
</x-guest-layout>
@endguest

