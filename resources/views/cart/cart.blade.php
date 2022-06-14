

@auth
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Carrito de Compras') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div id="app" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <shopping-cart :cart="{{$cart}}" :user="{{$user}}"/>  
        </div>
    </div>

    @section('js')
    <script>
        $(document).ready(function () {
        $('#table').DataTable();
    });
    </script>
    @endsection

</x-app-layout>

@endauth

@guest

<x-guest-layout>
    <div style="padding-top: 10vw" class="container">
        <h5>No puedes Añadir nada si no estas registrado</h5>
    <h5><a href="/register">Registrarse</a></h5>

    </div>
</x-guest-layout>
@endguest
