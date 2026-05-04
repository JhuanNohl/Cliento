@extends('crm.layout')

@section('title', 'Editar empresa')
@section('active', 'companies')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Empresas</p>
            <h1>Editar empresa</h1>
            <p class="lead">Atualize os dados da conta para manter a carteira coerente com a operação comercial.</p>
        </div>
    </section>

    @include('companies.partials.form', ['action' => route('companies.update', $company), 'method' => 'PATCH'])
@endsection
