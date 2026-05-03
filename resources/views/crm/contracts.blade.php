@extends('crm.layout')

@section('title', 'Contracts')
@section('active', 'contracts')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Contracts</p>
            <h1>Contratos e renovações em um lugar só.</h1>
            <p class="lead">A primeira camada acompanha vigência, cliente e status. Depois entram assinatura, cláusulas, alertas e análise jurídica assistida.</p>
        </div>
    </section>

    <section class="page-grid">
        <article class="panel table-scroll">
            <table class="table-lite">
                <thead>
                    <tr>
                        <th>Contrato</th>
                        <th>Cliente</th>
                        <th>Vigencia</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>C-778</td><td>Northwind</td><td>12 meses</td><td><span class="pill">Renovando</span></td></tr>
                    <tr><td>C-761</td><td>Atlas Finance</td><td>24 meses</td><td><span class="pill">Ativo</span></td></tr>
                    <tr><td>C-744</td><td>Delta Labs</td><td>6 meses</td><td><span class="pill">Expira em 30d</span></td></tr>
                </tbody>
            </table>
        </article>

        <aside class="panel">
            <div class="panel-header">
                <div>
                    <h2>Evolucao possivel</h2>
                    <p>Assinatura eletrônica, versionamento, alertas de renovação e revisão automática de riscos.</p>
                </div>
            </div>
        </aside>
    </section>
@endsection
