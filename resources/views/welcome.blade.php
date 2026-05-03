@extends('crm.layout')

@section('title', 'Home')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">MVP comercial</p>
            <h1>Cliento organiza carteira, contatos e próximas ações sem inflar a operação.</h1>
            <p class="lead">Um CRM direto ao ponto: o time enxerga quem precisa de atenção, qual oportunidade move receita e o que deve acontecer hoje. O MVP resolve o essencial agora e deixa IA, automações e integrações prontas para crescer depois.</p>
        </div>
        <div class="head-actions">
            <a class="btn-crm primary" href="{{ route('crm.opportunities') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nova oportunidade</a>
            <a class="btn-crm" href="{{ route('crm.wallet') }}"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Ver carteira</a>
        </div>
    </section>

    <section class="metrics-grid" aria-label="Resumo operacional">
        <x-crm.metric label="Empresas" value="24" note="Contas com contexto comercial" icon="briefcase" />
        <x-crm.metric label="Contatos" value="86" note="Decisores e influenciadores" icon="user" />
        <x-crm.metric label="Oportunidades" value="17" note="R$ 412k em pipeline visível" icon="usd" />
        <x-crm.metric label="Ações hoje" value="9" note="Nada importante fica esquecido" icon="time" />
    </section>

    <section class="panel">
        <div class="panel-header">
            <div>
                <h2>Ambição clara, MVP disciplinado!</h2>
                <p>O produto mostra para onde pode ir sem prometer complexidade antes da hora.</p>
            </div>
        </div>

        <div class="feature-grid">
            <x-crm.feature icon="flash" title="IA comercial" text="Resumos de contas, sugestões de próxima ação e forecast assistido quando houver histórico suficiente." />
            <x-crm.feature icon="transfer" title="Integrações" text="Email, WhatsApp, calendário, ERP, pagamentos e enriquecimento de dados como próximas camadas." />
            <x-crm.feature icon="stats" title="BI e scoring" text="Painéis, health score, previsão de churn e segmentação sem atrapalhar a primeira entrega." />
            <x-crm.feature icon="lock" title="Governança" text="Permissões, auditoria, LGPD, SLA e playbooks para uma operação comercial mais madura." />
        </div>
    </section>
@endsection
