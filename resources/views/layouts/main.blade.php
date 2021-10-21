<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('title')
        </h2>
    </x-slot>
    <div class="container">
    @yield('content')
    </div>
</x-app-layout>
