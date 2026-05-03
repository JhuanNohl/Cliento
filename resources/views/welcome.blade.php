@extends('crm.layout')

@section('title', 'Home')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">MVP comercial</p>
            <h1>Cliento para acompanhar carteira, contatos e próximas ações.</h1>
            <p class="lead">Uma base enxuta para operar relacionamento comercial hoje, com espaço claro para automações, IA e integrações mais abrangentes depois.</p>
        </div>
        <div class="head-actions">
            <a class="btn-crm primary" href="{{ route('crm.opportunities') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nova oportunidade</a>
            <a class="btn-crm" href="{{ route('crm.wallet') }}"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Ver carteira</a>
        </div>
    </section>

    <section class="metrics-grid" aria-label="Resumo operacional">
        <x-crm.metric label="Empresas" value="24" note="Base ativa" icon="briefcase" />
        <x-crm.metric label="Contatos" value="86" note="Decisores e influenciadores" icon="user" />
        <x-crm.metric label="Oportunidades" value="17" note="R$ 412k em pipeline" icon="usd" />
        <x-crm.metric label="Ações hoje" value="9" note="Follow-ups pendentes" icon="time" />
    </section>

    <section class="split-grid">
        <article class="panel">
            <div class="panel-header">
                <div>
                    <h2>Pipeline essencial</h2>
                    <p>Etapas suficientes para validar o fluxo antes de ampliar o funil.</p>
                </div>
                <a class="ghost-link" href="{{ route('crm.opportunities') }}">Ver oportunidades</a>
            </div>

            <div class="kanban">
                <x-crm.stage title="Lead qualificado" count="8" value="R$ 96k" />
                <x-crm.stage title="Proposta enviada" count="5" value="R$ 184k" />
                <x-crm.stage title="Negociação" count="3" value="R$ 102k" />
                <x-crm.stage title="Fechamento" count="1" value="R$ 30k" />
            </div>
        </article>

        <aside class="panel">
            <div class="panel-header">
                <div>
                    <h2>Próximas ações</h2>
                    <p>O MVP precisa manter o time em movimento.</p>
                </div>
            </div>

            <div class="activity-list">
                <x-crm.activity title="Ligar para Ana Carvalho" meta="Renovação Atlas - 10:30" />
                <x-crm.activity title="Enviar proposta revisada" meta="Northwind - até 14:00" />
                <x-crm.activity title="Qualificar lead inbound" meta="Orbit Sistemas - novo contato" />
            </div>
        </aside>
    </section>

    <section class="panel">
        <div class="panel-header">
            <div>
                <h2>Roadmap agressivo, sem inflar o MVP</h2>
                <p>Ideias de mercado ficam visiveis como trilhas futuras, sem bloquear a primeira entrega.</p>
            </div>
        </div>

        <div class="feature-grid">
            <x-crm.feature icon="flash" title="IA comercial" text="Resumo automático de contas, sugestões de próxima ação e forecast assistido." />
            <x-crm.feature icon="transfer" title="Integrações" text="Email, WhatsApp, calendário, ERP, gateways de pagamento e enriquecimento de dados." />
            <x-crm.feature icon="stats" title="BI e scoring" text="Painéis customizáveis, health score, previsão de churn e segmentação." />
            <x-crm.feature icon="lock" title="Governança" text="Permissões por equipe, auditoria, LGPD, SLA e playbooks comerciais." />
        </div>
    </section>
@endsection
