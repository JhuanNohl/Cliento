@extends('crm.layout')

@section('title', 'Agenda')
@section('active', 'agenda')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Agenda</p>
            <h1>Compromissos comerciais que mantêm oportunidades em movimento.</h1>
            <p class="lead">O MVP coloca follow-ups, reuniões e tarefas na frente do vendedor para evitar que bons negócios esfriem por falta de próximo passo.</p>
        </div>
    </section>

    <section class="split-grid">
        <article class="panel">
            <div class="panel-header">
                <div>
                    <h2>Hoje</h2>
                    <p>Ações com impacto direto em renovação, proposta e qualificação.</p>
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
                    <h2>Próxima camada</h2>
                    <p>Sincronização com Google/Outlook, transcrição de reuniões e geração automática de tarefas entram depois que o fluxo manual estiver validado.</p>
                </div>
            </div>
        </aside>
    </section>
@endsection
