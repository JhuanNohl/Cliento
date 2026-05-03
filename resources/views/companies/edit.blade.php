<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-900">Editar empresa</h2>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            @include('companies.partials.form', ['action' => route('companies.update', $company), 'method' => 'PATCH'])
        </div>
    </div>
</x-app-layout>
