@extends('crm.layout')

@section('title', 'Quotes')
@section('active', 'quotes')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Quotes</p>
            <h1>Propostas comerciais sem burocracia.</h1>
            <p class="lead">A primeira versão pode gerar proposta simples e acompanhar status. Depois entram CPQ, desconto por aprovação e assinatura eletrônica.</p>
        </div>
        <div class="head-actions">
            <button class="btn-crm primary"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Nova proposta</button>
        </div>
    </section>

    <section class="panel table-scroll">
        <table class="table-lite">
            <thead>
                <tr>
                    <th>Proposta</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Q-1042</td><td>Atlas Finance</td><td>R$ 95k</td><td><span class="pill">Enviada</span></td></tr>
                <tr><td>Q-1041</td><td>Orbit Sistemas</td><td>R$ 42k</td><td><span class="pill">Rascunho</span></td></tr>
                <tr><td>Q-1039</td><td>Northwind</td><td>R$ 180k</td><td><span class="pill">Aprovada</span></td></tr>
            </tbody>
        </table>
    </section>
@endsection
