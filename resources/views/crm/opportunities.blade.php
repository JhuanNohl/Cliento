@extends('crm.layout')

@section('title', 'Opportunities')
@section('active', 'opportunities')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Opportunities</p>
            <h1>Pipeline comercial com poucas etapas e decisão rapida.</h1>
            <p class="lead">Valor, probabilidade, etapa e próxima ação são suficientes para vender. Forecast preditivo e simulações ficam para fases seguintes.</p>
        </div>
        <div class="head-actions">
            <button class="btn-crm primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nova oportunidade</button>
        </div>
    </section>

    <section class="page-grid">
        <article class="panel table-scroll">
            <table class="table-lite">
                <thead>
                    <tr>
                        <th>Oportunidade</th>
                        <th>Conta</th>
                        <th>Valor</th>
                        <th>Etapa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Renovação anual</td><td>Northwind</td><td>R$ 180k</td><td><span class="pill">Fechamento</span></td></tr>
                    <tr><td>Expansão multiunidade</td><td>Atlas Finance</td><td>R$ 95k</td><td><span class="pill">Proposta</span></td></tr>
                    <tr><td>Piloto operacional</td><td>Orbit Sistemas</td><td>R$ 42k</td><td><span class="pill">Negociação</span></td></tr>
                </tbody>
            </table>
        </article>

        <aside class="panel">
            <div class="panel-header">
                <div>
                    <h2>Evolucao possivel</h2>
                    <p>Forecast assistido, simulação de cenários, playbooks por etapa e risco automático.</p>
                </div>
            </div>
        </aside>
    </section>
@endsection
