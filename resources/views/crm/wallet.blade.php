@extends('crm.layout')

@section('title', 'Carteira')
@section('active', 'wallet')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Carteira</p>
            <h1>Contatos, contas e próximos passos reunidos por prioridade.</h1>
            <p class="lead">A carteira mostra onde o vendedor deve investir atenção hoje, sem duplicar dados de parceiros ou oportunidades.</p>
        </div>
        <div class="head-actions">
            <a class="btn-crm primary" href="{{ route('contacts.create') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Novo contato</a>
        </div>
    </section>

    <section class="page-grid">
        <article class="panel table-scroll">
            <table class="table-lite">
                <thead>
                    <tr>
                        <th>Contato</th>
                        <th>Conta</th>
                        <th>Prioridade</th>
                        <th>Próxima ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Ana Carvalho</td><td>Atlas Finance</td><td><span class="pill">Alta</span></td><td>Ligar hoje</td></tr>
                    <tr><td>Bruno Lima</td><td>Northwind</td><td><span class="pill">Média</span></td><td>Enviar revisão</td></tr>
                    <tr><td>Camila Rocha</td><td>Orbit Sistemas</td><td><span class="pill">Nova</span></td><td>Qualificar interesse</td></tr>
                </tbody>
            </table>
        </article>

        <aside class="panel">
            <div class="panel-header">
                <div>
                    <h2>Evolução possível</h2>
                    <p>Carteira inteligente com score, cadência automática, histórico omnichannel e sugestão de abordagem por IA.</p>
                </div>
            </div>
        </aside>
    </section>
@endsection
