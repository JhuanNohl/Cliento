@extends('crm.layout')

@section('title', 'Leads')
@section('active', 'leads')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Leads</p>
            <h1>Entrada simples para oportunidades futuras.</h1>
            <p class="lead">O MVP separa leads novos, qualificados e descartados. A camada agressiva e scoring automático por fonte, fit e intenção.</p>
        </div>
        <div class="head-actions">
            <button class="btn-crm primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo lead</button>
        </div>
    </section>

    <section class="panel">
        <div class="kanban">
            <x-crm.stage title="Novo" count="12" value="Formulário e indicações" />
            <x-crm.stage title="Em contato" count="7" value="Aguardando resposta" />
            <x-crm.stage title="Qualificado" count="4" value="Pronto para oportunidade" />
            <x-crm.stage title="Descartado" count="3" value="Sem fit atual" />
        </div>
    </section>
@endsection
