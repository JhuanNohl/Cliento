@extends('crm.layout')

@section('title', 'Contatos')
@section('active', 'contacts')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Contatos</p>
            <h1>Pessoas certas, contexto visível e próximo toque sempre claro.</h1>
            <p class="lead">O MVP trata contato como relacionamento, não como agenda telefônica: empresa, cargo, email e último contato ajudam o time a agir com mais precisão.</p>
        </div>
        <div class="head-actions">
            <a class="btn-crm primary" href="{{ route('contacts.create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo contato</a>
        </div>
    </section>

    @if (session('status'))
        <div class="status-alert">{{ session('status') }}</div>
    @endif

    <section class="panel table-scroll">
        <table class="table-lite">
            <thead>
                <tr>
                    <th>Contato</th>
                    <th>Empresa</th>
                    <th>Email</th>
                    <th>Último contato</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr>
                        <td>
                            <strong>{{ $contact->name }}</strong>
                            <div class="muted">{{ $contact->role ?: 'Cargo não informado' }}</div>
                        </td>
                        <td>{{ $contact->company?->name ?? 'Sem empresa vinculada' }}</td>
                        <td>{{ $contact->email ?: 'Sem email' }}</td>
                        <td>{{ $contact->last_contacted_at?->format('d/m/Y') ?? 'Sem último contato' }}</td>
                        <td class="table-actions">
                            <a class="ghost-link" href="{{ route('contacts.edit', $contact) }}">Editar</a>
                            <form method="POST" action="{{ route('contacts.destroy', $contact) }}">
                                @csrf
                                @method('DELETE')
                                <button class="ghost-link" type="submit" onclick="return confirm('Remover este contato?')">Remover</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-state">Nenhum contato cadastrado ainda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>

    <div class="pagination-wrap">{{ $contacts->links() }}</div>
@endsection
