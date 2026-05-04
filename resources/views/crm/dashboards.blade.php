@extends('crm.layout')

@section('title', 'Dashboards')
@section('active', 'dashboards')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Dashboards</p>
            <h1>Indicadores que contam a história comercial sem esconder o básico.</h1>
            <p class="lead">O MVP acompanha volume, conversão e tarefas pendentes. Dashboards customizáveis entram depois, quando a operação já souber quais perguntas realmente importam.</p>
        </div>
    </section>

    <section class="metrics-grid">
        <x-crm.metric label="Receita prevista" value="R$ 148k" note="Forecast ponderado" icon="stats" />
        <x-crm.metric label="Conversão" value="31%" note="Lead até proposta" icon="retweet" />
        <x-crm.metric label="Ciclo médio" value="18d" note="Da entrada ao fechamento" icon="time" />
        <x-crm.metric label="SLA" value="92%" note="Follow-ups no prazo" icon="ok" />
    </section>

    <section class="page-grid">
        <article class="panel">
            <div class="panel-header">
                <div>
                    <h2>Resumo por etapa</h2>
                    <p>Visão simples para alinhar discurso, foco e prioridade semanal.</p>
                </div>
            </div>
            <div class="kanban">
                <x-crm.stage title="Entrada" count="14" value="R$ 74k" />
                <x-crm.stage title="Qualificação" count="8" value="R$ 96k" />
                <x-crm.stage title="Proposta" count="5" value="R$ 184k" />
                <x-crm.stage title="Fechado" count="3" value="R$ 58k" />
            </div>
        </article>

        <aside class="panel">
            <div class="panel-header">
                <div>
                    <h2>Depois do MVP</h2>
                    <p>BI embarcado, funil por canal, metas por equipe e alertas preditivos ficam como expansão natural.</p>
                </div>
            </div>
            <div class="activity-list">
                <x-crm.activity title="Dashboards customizados" meta="Filtros salvos por gestor" />
                <x-crm.activity title="Forecast inteligente" meta="Probabilidade baseada em histórico" />
                <x-crm.activity title="Alertas automáticos" meta="Risco de churn e parada no funil" />
            </div>
        </aside>
    </section>
@endsection
