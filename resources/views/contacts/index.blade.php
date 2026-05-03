<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-900">Contatos</h2>
                <p class="mt-1 text-sm text-gray-600">Pessoas-chave para relacionamento e prospeccao.</p>
            </div>
            <a href="{{ route('contacts.create') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">Novo contato</a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-6 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">{{ session('status') }}</div>
            @endif

            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                <div class="divide-y divide-gray-100">
                    @forelse ($contacts as $contact)
                        <div class="grid gap-4 px-6 py-5 lg:grid-cols-12 lg:items-center">
                            <div class="lg:col-span-3">
                                <p class="font-semibold text-gray-950">{{ $contact->name }}</p>
                                <p class="text-sm text-gray-500">{{ $contact->role ?: 'Cargo nao informado' }}</p>
                            </div>
                            <p class="text-sm text-gray-600 lg:col-span-3">{{ $contact->company?->name ?? 'Sem empresa vinculada' }}</p>
                            <p class="text-sm text-gray-600 lg:col-span-2">{{ $contact->email ?: 'Sem email' }}</p>
                            <p class="text-sm text-gray-600 lg:col-span-2">{{ $contact->last_contacted_at?->format('d/m/Y') ?? 'Sem ultimo contato' }}</p>
                            <div class="flex items-center gap-3 lg:col-span-2 lg:justify-end">
                                <a href="{{ route('contacts.edit', $contact) }}" class="text-sm font-medium text-indigo-700 hover:text-indigo-900">Editar</a>
                                <form method="POST" action="{{ route('contacts.destroy', $contact) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800" onclick="return confirm('Remover este contato?')">Remover</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="px-6 py-10 text-sm text-gray-500">Nenhum contato cadastrado ainda.</div>
                    @endforelse
                </div>
            </div>

            <div class="mt-6">{{ $contacts->links() }}</div>
        </div>
    </div>
</x-app-layout>
