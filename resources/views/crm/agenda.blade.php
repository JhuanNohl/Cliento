@extends('crm.layout')

@section('title', 'Agenda')
@section('active', 'agenda')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Agenda</p>
            <h1>Compromissos comerciais que movem a carteira.</h1>
            <p class="lead">Follow-ups, reuniões e tarefas ficam visíveis para evitar oportunidades paradas.</p>
        </div>
    </section>

    <section class="split-grid">
        <article class="panel">
            <div class="panel-header">
                <div>
                    <h2>Hoje</h2>
                    <p>Ações com impacto direto no pipeline.</p>
                </div>
            </div>
            <div class="activity-list">
                <x-crm.activity title="10:30 - Ligação de renovação" meta="Atlas Finance" />
                <x-crm.activity title="14:00 - Enviar proposta revisada" meta="Northwind" />
                <x-crm.activity title="16:15 - Reunião de descoberta" meta="Orbit Sistemas" />
            </div>
        </article>

        <aside class="panel">
            <div class="panel-header">
                <div>
                    <h2>Evolução possível</h2>
                    <p>Sincronização com Google/Outlook, transcrição de reuniões e geração automática de tarefas.</p>
                </div>
            </div>
        </aside>
    </section>
@endsection
