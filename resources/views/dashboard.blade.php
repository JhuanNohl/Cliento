<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-900">Painel comercial</h2>
                <p class="mt-1 text-sm text-gray-600">Visao geral da carteira, pipeline e proximas acoes.</p>
            </div>
            <a href="{{ route('contacts.create') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">
                Novo contato
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                    {{ session('status') }}
                </div>
            @endif

            <section class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-lg border border-gray-200 bg-white p-5 shadow-sm">
                    <p class="text-sm font-medium text-gray-500">Empresas</p>
                    <p class="mt-2 text-3xl font-semibold text-gray-950">{{ $stats['companies'] }}</p>
                </div>
                <div class="rounded-lg border border-gray-200 bg-white p-5 shadow-sm">
                    <p class="text-sm font-medium text-gray-500">Contatos</p>
                    <p class="mt-2 text-3xl font-semibold text-gray-950">{{ $stats['contacts'] }}</p>
                </div>
                <div class="rounded-lg border border-gray-200 bg-white p-5 shadow-sm">
                    <p class="text-sm font-medium text-gray-500">Oportunidades abertas</p>
                    <p class="mt-2 text-3xl font-semibold text-gray-950">{{ $stats['open_deals'] }}</p>
                </div>
                <div class="rounded-lg border border-gray-200 bg-white p-5 shadow-sm">
                    <p class="text-sm font-medium text-gray-500">Forecast ponderado</p>
                    <p class="mt-2 text-3xl font-semibold text-gray-950">R$ {{ number_format((float) $stats['forecast'], 2, ',', '.') }}</p>
                </div>
            </section>

            <section class="grid gap-6 lg:grid-cols-3">
                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm lg:col-span-2">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-gray-950">Pipeline</h3>
                        <span class="text-sm text-gray-500">{{ array_sum($pipeline->pluck('deals_count')->all()) }} oportunidades</span>
                    </div>

                    <div class="mt-6 grid gap-3 sm:grid-cols-5">
                        @foreach ($stages as $key => $label)
                            @php($stage = $pipeline->get($key))
                            <div class="rounded-md border border-gray-200 bg-gray-50 p-4">
                                <p class="text-sm font-medium text-gray-700">{{ $label }}</p>
                                <p class="mt-3 text-2xl font-semibold text-gray-950">{{ $stage->deals_count ?? 0 }}</p>
                                <p class="mt-1 text-xs text-gray-500">R$ {{ number_format((float) ($stage->total_value ?? 0), 2, ',', '.') }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
                    <h3 class="text-base font-semibold text-gray-950">Proximas atividades</h3>
                    <div class="mt-4 space-y-4">
                        @forelse ($upcomingActivities as $activity)
                            <div class="border-b border-gray-100 pb-4 last:border-0 last:pb-0">
                                <p class="text-sm font-medium text-gray-900">{{ $activity->subject }}</p>
                                <p class="mt-1 text-xs text-gray-500">
                                    {{ $activity->due_at?->format('d/m/Y H:i') ?? 'Sem data definida' }}
                                </p>
                                <p class="mt-1 text-xs text-gray-500">{{ $activity->company?->name ?? $activity->contact?->name }}</p>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">Nenhuma atividade pendente por enquanto.</p>
                        @endforelse
                    </div>
                </div>
            </section>

            <section class="rounded-lg border border-gray-200 bg-white shadow-sm">
                <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
                    <h3 class="text-base font-semibold text-gray-950">Contatos recentes</h3>
                    <a href="{{ route('contacts.index') }}" class="text-sm font-medium text-indigo-700 hover:text-indigo-900">Ver todos</a>
                </div>
                <div class="divide-y divide-gray-100">
                    @forelse ($recentContacts as $contact)
                        <div class="grid gap-3 px-6 py-4 sm:grid-cols-4 sm:items-center">
                            <div>
                                <p class="font-medium text-gray-950">{{ $contact->name }}</p>
                                <p class="text-sm text-gray-500">{{ $contact->role ?: 'Cargo nao informado' }}</p>
                            </div>
                            <p class="text-sm text-gray-600">{{ $contact->company?->name ?? 'Sem empresa' }}</p>
                            <p class="text-sm text-gray-600">{{ $contact->email ?: 'Sem email' }}</p>
                            <div class="sm:text-right">
                                <a href="{{ route('contacts.edit', $contact) }}" class="text-sm font-medium text-indigo-700 hover:text-indigo-900">Editar</a>
                            </div>
                        </div>
                    @empty
                        <div class="px-6 py-8 text-sm text-gray-500">
                            Cadastre seus primeiros contatos para alimentar o painel.
                        </div>
                    @endforelse
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
