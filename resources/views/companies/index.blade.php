<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-900">Empresas</h2>
                <p class="mt-1 text-sm text-gray-600">Organizações, contas e prospects acompanhados no CRM.</p>
            </div>
            <a href="{{ route('companies.create') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">Nova empresa</a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-6 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">{{ session('status') }}</div>
            @endif

            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                <div class="divide-y divide-gray-100">
                    @forelse ($companies as $company)
                        <div class="grid gap-4 px-6 py-5 lg:grid-cols-12 lg:items-center">
                            <div class="lg:col-span-4">
                                <p class="font-semibold text-gray-950">{{ $company->name }}</p>
                                <p class="text-sm text-gray-500">{{ $company->segment ?: 'Segmento não informado' }}</p>
                            </div>
                            <div class="lg:col-span-2">
                                <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700">{{ \App\Models\Company::STATUSES[$company->status] ?? $company->status }}</span>
                            </div>
                            <p class="text-sm text-gray-600 lg:col-span-2">{{ $company->city ? "{$company->city}/{$company->state}" : 'Localização aberta' }}</p>
                            <p class="text-sm text-gray-600 lg:col-span-2">{{ $company->contacts_count }} contatos · {{ $company->deals_count }} deals</p>
                            <div class="flex items-center gap-3 lg:col-span-2 lg:justify-end">
                                <a href="{{ route('companies.edit', $company) }}" class="text-sm font-medium text-indigo-700 hover:text-indigo-900">Editar</a>
                                <form method="POST" action="{{ route('companies.destroy', $company) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800" onclick="return confirm('Remover esta empresa?')">Remover</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="px-6 py-10 text-sm text-gray-500">Nenhuma empresa cadastrada ainda.</div>
                    @endforelse
                </div>
            </div>

            <div class="mt-6">{{ $companies->links() }}</div>
        </div>
    </div>
</x-app-layout>
