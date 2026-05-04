@extends('crm.layout')

@section('title', 'Dashboard')
@section('active', 'dashboard')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Painel comercial</p>
            <h1>O resumo que o time precisa antes de abrir a agenda.</h1>
            <p class="lead">Dados reais de carteira, pipeline e atividades aparecem no mesmo lugar para responder à pergunta central do MVP: onde agir agora para não perder receita?</p>
        </div>
        <div class="head-actions">
            <a class="btn-crm primary" href="{{ route('contacts.create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo contato</a>
            <a class="btn-crm" href="{{ route('companies.create') }}"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Nova empresa</a>
        </div>
    </section>

    @if (session('status'))
        <div class="status-alert">{{ session('status') }}</div>
    @endif

    <section class="metrics-grid" aria-label="Resumo comercial">
        <x-crm.metric label="Empresas" value="{{ $stats['companies'] }}" note="Contas que já podem ser trabalhadas" icon="briefcase" />
        <x-crm.metric label="Contatos" value="{{ $stats['contacts'] }}" note="Pessoas com contexto comercial" icon="user" />
        <x-crm.metric label="Oportunidades" value="{{ $stats['open_deals'] }}" note="Negócios ainda em disputa" icon="usd" />
        <x-crm.metric label="Forecast" value="R$ {{ number_format((float) $stats['forecast'], 2, ',', '.') }}" note="Receita provavel, sem planilha paralela" icon="stats" />
    </section>

    <section class="page-grid">
        <article class="panel">
            <div class="panel-header">
                <div>
                    <h2>Pipeline</h2>
                    <p>{{ array_sum($pipeline->pluck('deals_count')->all()) }} oportunidades organizadas para leitura rápida.</p>
                </div>
            </div>

            <div class="kanban">
                @foreach ($stages as $key => $label)
                    @php($stage = $pipeline->get($key))
                    <x-crm.stage
                        :title="$label"
                        :count="$stage->deals_count ?? 0"
                        value="R$ {{ number_format((float) ($stage->total_value ?? 0), 2, ',', '.') }}"
                    />
                @endforeach
            </div>
        </article>

        <aside class="panel">
            <div class="panel-header">
                <div>
                    <h2>Próximas atividades</h2>
                    <p>Compromissos que mantêm a carteira viva e reduzem esquecimento.</p>
                </div>
            </div>

            <div class="activity-list">
                @forelse ($upcomingActivities as $activity)
                    <x-crm.activity
                        :title="$activity->subject"
                        :meta="($activity->due_at?->format('d/m/Y H:i') ?? 'Sem data definida') . ' - ' . ($activity->company?->name ?? $activity->contact?->name ?? 'Sem vínculo')"
                    />
                @empty
                    <p class="empty-state">Nenhuma atividade pendente por enquanto.</p>
                @endforelse
            </div>
        </aside>
    </section>

    <section class="panel table-scroll">
        <div class="panel-header">
            <div>
                <h2>Contatos recentes</h2>
                <p>Novos relacionamentos que já podem virar ação comercial.</p>
            </div>
            <a class="ghost-link" href="{{ route('contacts.index') }}">Ver todos</a>
        </div>

        <table class="table-lite">
            <thead>
                <tr>
                    <th>Contato</th>
                    <th>Empresa</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentContacts as $contact)
                    <tr>
                        <td>
                            <strong>{{ $contact->name }}</strong>
                            <div class="muted">{{ $contact->role ?: 'Cargo não informado' }}</div>
                        </td>
                        <td>{{ $contact->company?->name ?? 'Sem empresa' }}</td>
                        <td>{{ $contact->email ?: 'Sem email' }}</td>
                        <td class="table-actions">
                            <a class="ghost-link" href="{{ route('contacts.edit', $contact) }}">Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty-state">Cadastre seus primeiros contatos para alimentar o painel.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection
