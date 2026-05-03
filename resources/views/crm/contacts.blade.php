@extends('crm.layout')

@section('title', 'Contatos')
@section('active', 'contacts')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Contatos</p>
            <h1>Contatos para centralizar relacionamento.</h1>
            <p class="lead">Nome, empresa, cargo e canais principais formam a base. Histórico omnichannel pode entrar numa próxima fase.</p>
        </div>
        <div class="head-actions">
            <a class="btn-crm primary" href="{{ route('contacts.create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo contato</a>
        </div>
    </section>

    <section class="page-grid">
        <article class="panel table-scroll">
            <table class="table-lite">
                <thead>
                    <tr>
                        <th>Contato</th>
                        <th>Empresa</th>
                        <th>Cargo</th>
                        <th>Última interação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Ana Carvalho</td><td>Atlas Finance</td><td>Diretora comercial</td><td>Hoje</td></tr>
                    <tr><td>Bruno Lima</td><td>Northwind</td><td>CEO</td><td>Ontem</td></tr>
                    <tr><td>Camila Rocha</td><td>Orbit Sistemas</td><td>Compras</td><td>3 dias</td></tr>
                </tbody>
            </table>
        </article>

        <aside class="panel">
            <div class="panel-header">
                <div>
                    <h2>Evolução possível</h2>
                    <p>Timeline de email, WhatsApp, ligações, consentimento LGPD e recomendação de abordagem por IA.</p>
                </div>
            </div>
        </aside>
    </section>
@endsection
