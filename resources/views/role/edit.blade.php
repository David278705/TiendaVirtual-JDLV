<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Asignar o Quitar Role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div id="app" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <role-edit :user="{{ $user }}" :roles="{{ $roles }}"/>         
        </div>
    </div>
</x-app-layout>
