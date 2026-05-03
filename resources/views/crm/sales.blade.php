@extends('crm.layout')

@section('title', 'Vendas')
@section('active', 'sales')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Vendas</p>
            <h1>Pedidos e negócios ganhos para fechar o ciclo comercial.</h1>
            <p class="lead">A área de vendas acompanha propostas aceitas, implantação e receita fechada.</p>
        </div>
    </section>

    <section class="metrics-grid">
        <x-crm.metric label="Vendas do mês" value="R$ 238k" note="7 negócios fechados" icon="shopping-cart" />
        <x-crm.metric label="Ticket médio" value="R$ 34k" note="Base B2B" icon="tag" />
        <x-crm.metric label="Implantação" value="3" note="Pedidos em andamento" icon="road" />
        <x-crm.metric label="Renovações" value="5" note="Próximos 60 dias" icon="repeat" />
    </section>

    <section class="panel table-scroll">
        <table class="table-lite">
            <thead>
                <tr>
                    <th>Venda</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>O-2201</td><td>Northwind</td><td>R$ 180k</td><td><span class="pill">Ativa</span></td></tr>
                <tr><td>O-2198</td><td>Atlas Finance</td><td>R$ 62k</td><td><span class="pill">Implantação</span></td></tr>
                <tr><td>O-2191</td><td>Delta Labs</td><td>R$ 38k</td><td><span class="pill">Concluída</span></td></tr>
            </tbody>
        </table>
    </section>
@endsection
