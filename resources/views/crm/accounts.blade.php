@extends('crm.layout')

@section('title', 'Contas')
@section('active', 'accounts')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Contas</p>
            <h1>Empresas com contexto comercial mínimo.</h1>
            <p class="lead">Cadastro, responsável, segmento e status já resolvem a operação inicial. Enriquecimento e hierarquia de contas podem vir depois.</p>
        </div>
        <div class="head-actions">
            <a class="btn-crm primary" href="{{ route('companies.create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nova empresa</a>
        </div>
    </section>

    <section class="page-grid">
        <article class="panel table-scroll">
            <table class="table-lite">
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Segmento</th>
                        <th>Dono</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Atlas Finance</td><td>Fintech</td><td>Ana</td><td><span class="pill">Ativa</span></td></tr>
                    <tr><td>Northwind</td><td>SaaS B2B</td><td>Lucas</td><td><span class="pill">Renovação</span></td></tr>
                    <tr><td>Orbit Sistemas</td><td>Tecnologia</td><td>Marina</td><td><span class="pill">Prospect</span></td></tr>
                </tbody>
            </table>
        </article>

        <aside class="panel">
            <div class="panel-header">
                <div>
                    <h2>Evolução possível</h2>
                    <p>Account scoring, enriquecimento automático, matriz filial/grupo e mapa de relacionamento.</p>
                </div>
            </div>
        </aside>
    </section>
@endsection
