@extends('crm.layout')

@section('title', 'Nova empresa')
@section('active', 'companies')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Empresas</p>
            <h1>Nova empresa</h1>
            <p class="lead">Cadastre a conta com o mínimo necessário para acompanhar prospecção, carteira e próximos contatos.</p>
        </div>
    </section>

    @include('companies.partials.form', ['action' => route('companies.store'), 'method' => null])
@endsection
