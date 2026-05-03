@extends('crm.layout')

@section('title', 'Orders')
@section('active', 'orders')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Orders</p>
            <h1>Pedidos para fechar o ciclo venda-operação.</h1>
            <p class="lead">O MVP registra pedidos fechados e status de entrega. Integrações com ERP, faturamento e pagamento ficam mapeadas.</p>
        </div>
    </section>

    <section class="page-grid">
        <article class="panel table-scroll">
            <table class="table-lite">
                <thead>
                    <tr>
                        <th>Pedido</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>O-2201</td><td>Northwind</td><td>R$ 180k</td><td><span class="pill">Ativo</span></td></tr>
                    <tr><td>O-2198</td><td>Atlas Finance</td><td>R$ 62k</td><td><span class="pill">Implantação</span></td></tr>
                    <tr><td>O-2191</td><td>Delta Labs</td><td>R$ 38k</td><td><span class="pill">Concluído</span></td></tr>
                </tbody>
            </table>
        </article>

        <aside class="panel">
            <div class="panel-header">
                <div>
                    <h2>Evolucao possivel</h2>
                    <p>ERP, nota fiscal, cobranca recorrente, portal do cliente e acompanhamento de sucesso.</p>
                </div>
            </div>
        </aside>
    </section>
@endsection
