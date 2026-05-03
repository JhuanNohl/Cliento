@extends('crm.layout')

@section('title', 'Calendário')
@section('active', 'calendar')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Calendário</p>
            <h1>Agenda comercial focada em follow-up.</h1>
            <p class="lead">No MVP, a agenda mostra atividades comerciais. Depois pode sincronizar Google, Outlook e playbooks automáticos.</p>
        </div>
    </section>

    <section class="split-grid">
        <article class="panel">
            <div class="panel-header">
                <div>
                    <h2>Hoje</h2>
                    <p>Ações que movem oportunidades.</p>
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
                    <p>Sincronização bidirecional, agenda inteligente, transcrição de reuniões e tarefas geradas por IA.</p>
                </div>
            </div>
        </aside>
    </section>
@endsection
