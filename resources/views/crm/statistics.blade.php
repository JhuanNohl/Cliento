@extends('crm.layout')

@section('title', 'Estatísticas')
@section('active', 'statistics')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Estatísticas</p>
            <h1>Indicadores comerciais suficientes para decidir o dia.</h1>
            <p class="lead">Volume, conversão, ciclo médio e SLA mostram onde agir primeiro sem transformar o MVP em uma suíte de BI.</p>
        </div>
    </section>

    <section class="metrics-grid">
        <x-crm.metric label="Receita prevista" value="R$ 148k" note="Forecast ponderado" icon="stats" />
        <x-crm.metric label="Conversão" value="31%" note="Lead até proposta" icon="retweet" />
        <x-crm.metric label="Ciclo médio" value="18d" note="Da entrada ao fechamento" icon="time" />
        <x-crm.metric label="SLA" value="92%" note="Follow-ups no prazo" icon="ok" />
    </section>

    <section class="panel">
        <div class="panel-header">
            <div>
                <h2>Resumo por etapa</h2>
                <p>Uma visão enxuta do funil para acompanhamento semanal.</p>
            </div>
        </div>
        <div class="kanban">
            <x-crm.stage title="Entrada" count="14" value="R$ 74k" />
            <x-crm.stage title="Qualificação" count="8" value="R$ 96k" />
            <x-crm.stage title="Proposta" count="5" value="R$ 184k" />
            <x-crm.stage title="Fechado" count="3" value="R$ 58k" />
        </div>
    </section>
@endsection
