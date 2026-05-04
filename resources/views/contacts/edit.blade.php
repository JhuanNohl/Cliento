@extends('crm.layout')

@section('title', 'Editar contato')
@section('active', 'contacts')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Contatos</p>
            <h1>Editar contato</h1>
            <p class="lead">Mantenha cargo, empresa, canais e último contato atualizados para preservar o contexto da carteira.</p>
        </div>
    </section>

    @include('contacts.partials.form', ['action' => route('contacts.update', $contact), 'method' => 'PATCH'])
@endsection
