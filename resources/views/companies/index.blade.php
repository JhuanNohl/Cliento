@extends('crm.layout')

@section('title', 'Empresas')
@section('active', 'companies')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Empresas</p>
            <h1>Contas organizadas para revelar contexto comercial rapido.</h1>
            <p class="lead">No MVP, uma empresa precisa mostrar status, localização e volume de relacionamento sem exigir cadastro pesado. O vendedor entende a conta antes de abrir outra aba.</p>
        </div>
        <div class="head-actions">
            <a class="btn-crm primary" href="{{ route('companies.create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nova empresa</a>
        </div>
    </section>

    @if (session('status'))
        <div class="status-alert">{{ session('status') }}</div>
    @endif

    <section class="panel table-scroll">
        <table class="table-lite">
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Status</th>
                    <th>Localização</th>
                    <th>Relacionamento</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($companies as $company)
                    <tr>
                        <td>
                            <strong>{{ $company->name }}</strong>
                            <div class="muted">{{ $company->segment ?: 'Segmento não informado' }}</div>
                        </td>
                        <td><span class="pill">{{ \App\Models\Company::STATUSES[$company->status] ?? $company->status }}</span></td>
                        <td>{{ $company->city ? "{$company->city}/{$company->state}" : 'Localização aberta' }}</td>
                        <td>{{ $company->contacts_count }} contatos · {{ $company->deals_count }} deals</td>
                        <td class="table-actions">
                            <a class="ghost-link" href="{{ route('companies.edit', $company) }}">Editar</a>
                            <form method="POST" action="{{ route('companies.destroy', $company) }}">
                                @csrf
                                @method('DELETE')
                                <button class="ghost-link" type="submit" onclick="return confirm('Remover esta empresa?')">Remover</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-state">Nenhuma empresa cadastrada ainda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>

    <div class="pagination-wrap">{{ $companies->links() }}</div>
@endsection
