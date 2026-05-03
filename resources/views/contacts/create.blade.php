<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-900">Novo contato</h2>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            @include('contacts.partials.form', ['action' => route('contacts.store'), 'method' => null])
        </div>
    </div>
</x-app-layout>
