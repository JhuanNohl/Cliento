@extends('crm.layout')

@section('title', 'Relatórios')
@section('active', 'reports')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Relatórios</p>
            <h1>Leituras prontas para entender o que aconteceu e agir melhor.</h1>
            <p class="lead">No MVP, relatório bom é aquele que evita reunião longa: mostra pipeline, carteira e vendas em uma linguagem simples para decidir o próximo passo.</p>
        </div>
    </section>

    <section class="feature-grid">
        <x-crm.feature icon="stats" title="Resumo semanal" text="Pipeline, vendas fechadas, follow-ups vencidos e forecast atualizado em uma leitura executiva." />
        <x-crm.feature icon="folder-open" title="Carteira" text="Contas prioritárias, contatos sem interação e oportunidades por responsável." />
        <x-crm.feature icon="shopping-cart" title="Vendas" text="Receita fechada, ticket médio, renovações e status de implantação." />
        <x-crm.feature icon="download-alt" title="Exportação" text="CSV, PDF e integrações analíticas entram como expansão natural, depois do uso real." />
    </section>
@endsection
