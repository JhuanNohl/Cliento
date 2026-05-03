@extends('crm.layout')

@section('title', 'Parceiros')
@section('active', 'partners')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Parceiros</p>
            <h1>Canais e contas estratégicas que ampliam relacionamento comercial.</h1>
            <p class="lead">No MVP, parceiro não precisa de uma área pesada: basta registrar origem, responsável e status para entender quem ajuda a gerar oportunidade.</p>
        </div>
        <div class="head-actions">
            <a class="btn-crm primary" href="{{ route('companies.create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo parceiro</a>
        </div>
    </section>

    <section class="panel table-scroll">
        <table class="table-lite">
            <thead>
                <tr>
                    <th>Parceiro</th>
                    <th>Tipo</th>
                    <th>Responsável</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Atlas Finance</td><td>Canal comercial</td><td>Ana</td><td><span class="pill">Ativo</span></td></tr>
                <tr><td>Northwind</td><td>Cliente estratégico</td><td>Lucas</td><td><span class="pill">Renovação</span></td></tr>
                <tr><td>Orbit Sistemas</td><td>Prospect parceiro</td><td>Marina</td><td><span class="pill">Em avaliação</span></td></tr>
            </tbody>
        </table>
    </section>
@endsection
