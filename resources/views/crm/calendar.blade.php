@extends('crm.layout')

@section('title', 'Calendar')
@section('active', 'calendar')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Calendar</p>
            <h1>Agenda comercial focada em follow-up.</h1>
            <p class="lead">No MVP, a agenda mostra atividades comerciais. Depois pode sincronizar Google, Outlook e playbooks automáticos.</p>
        </div>
    </section>

    <section class="split-grid">
        <article class="panel">
            <div class="panel-header">
                <div>
                    <h2>Hoje</h2>
                    <p>Acoes que movem oportunidades.</p>
                </div>
            </div>
            <div class="activity-list">
                <x-crm.activity title="10:30 - Ligação de renovação" meta="Atlas Finance" />
                <x-crm.activity title="14:00 - Enviar proposta revisada" meta="Northwind" />
                <x-crm.activity title="16:15 - Reuniao de descoberta" meta="Orbit Sistemas" />
            </div>
        </article>

        <aside class="panel">
            <div class="panel-header">
                <div>
                    <h2>Evolucao possivel</h2>
                    <p>Sincronização bidirecional, agenda inteligente, transcrição de reuniões e tarefas geradas por IA.</p>
                </div>
            </div>
        </aside>
    </section>
@endsection
