@extends('crm.layout')

@section('title', 'Novo contato')
@section('active', 'contacts')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Contatos</p>
            <h1>Novo contato</h1>
            <p class="lead">Adicione a pessoa, sua empresa e os canais principais para criar histórico comercial desde o primeiro toque.</p>
        </div>
    </section>

    @include('contacts.partials.form', ['action' => route('contacts.store'), 'method' => null])
@endsection
