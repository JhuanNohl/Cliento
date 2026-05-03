<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Cliento') - {{ config('app.name', 'Cliento') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        :root {
            --ink: #050505;
            --muted: #686868;
            --line: #dedede;
            --soft: #f5f5f5;
            --paper: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: "Instrument Sans", Arial, sans-serif;
            color: var(--ink);
            background: #eeeeee;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
        }

        button,
        input {
            font: inherit;
        }

        button {
            cursor: pointer;
        }

        h1,
        h2,
        h3,
        p {
            margin: 0;
        }

        .crm-shell {
            display: grid;
            grid-template-columns: 232px minmax(0, 1fr);
            min-height: 100vh;
            border: 10px solid var(--ink);
            background: var(--paper);
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 18px;
            padding: 18px 14px;
            color: var(--paper);
            background: var(--ink);
        }

        .brand,
        .nav-link,
        .nav-button,
        .topbar,
        .head-actions,
        .button-row,
        .metric-meta,
        .item-row,
        .auth-actions {
            display: flex;
            align-items: center;
        }

        .brand {
            gap: 10px;
            font-size: 18px;
            font-weight: 700;
        }

        .brand-mark,
        .icon-btn,
        .nav-icon,
        .mini-avatar,
        .feature-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 auto;
        }

        .brand-mark {
            width: 34px;
            height: 34px;
            color: var(--ink);
            background: var(--paper);
            border-radius: 8px;
        }

        .sidebar-search {
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid #333333;
            background: #181818;
            border-radius: 7px;
        }

        .sidebar-search {
            padding: 9px 10px;
            color: #d9d9d9;
        }

        .sidebar-search input {
            width: 100%;
            min-width: 0;
            border: 0;
            outline: 0;
            background: transparent;
        }

        .sidebar-search input {
            color: var(--paper);
        }

        .nav-label {
            margin: 0 10px 8px;
            color: #bdbdbd;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .nav-list {
            display: grid;
            gap: 5px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .nav-link,
        .nav-button {
            gap: 10px;
            width: 100%;
            min-height: 38px;
            padding: 8px 10px;
            border: 1px solid transparent;
            border-radius: 8px;
            color: #f4f4f4;
            background: transparent;
            text-align: left;
        }

        .nav-link:hover,
        .nav-link.active,
        .nav-button:hover,
        .nav-button.active {
            color: var(--ink);
            background: var(--paper);
            border-color: var(--paper);
        }

        .nav-icon {
            width: 25px;
            height: 25px;
            border: 1px solid currentColor;
            border-radius: 6px;
            font-size: 12px;
        }

        .sidebar-foot {
            margin-top: auto;
            padding: 12px;
            border: 1px solid #333333;
            border-radius: 8px;
            background: #151515;
        }

        .sidebar-foot span {
            display: block;
            margin-top: 4px;
            color: #c9c9c9;
            font-size: 12px;
        }

        .auth-actions {
            gap: 8px;
            margin-top: 12px;
            color: #f4f4f4;
            font-size: 13px;
            font-weight: 700;
        }

        .auth-actions a,
        .auth-actions button {
            color: inherit;
            border: 0;
            background: transparent;
        }

        .auth-separator,
        .auth-disabled {
            color: #8f8f8f;
        }

        .main {
            min-width: 0;
            background: var(--soft);
        }

        .topbar {
            justify-content: flex-start;
            min-height: 62px;
            padding: 12px 18px;
            border-bottom: 1px solid var(--line);
            background: var(--paper);
        }

        .icon-btn {
            width: 36px;
            height: 36px;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: var(--paper);
        }

        .notification-wrap {
            position: relative;
        }

        .notification-btn {
            gap: 8px;
            width: auto;
            min-width: 42px;
            padding: 0 12px;
        }

        .notification-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 22px;
            height: 22px;
            padding: 0 6px;
            color: var(--paper);
            background: var(--ink);
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            opacity: 0;
            transform: translateX(-4px);
            transition: opacity .18s ease, transform .18s ease;
        }

        .notification-wrap:hover .notification-count,
        .notification-wrap:focus-within .notification-count {
            opacity: 1;
            transform: translateX(0);
        }

        .notification-popover {
            position: absolute;
            top: calc(100% + 10px);
            left: 0;
            z-index: 10;
            width: 250px;
            padding: 12px;
            color: var(--ink);
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 8px;
            box-shadow: 0 16px 30px rgba(0, 0, 0, .14);
            opacity: 0;
            pointer-events: none;
            transform: translateY(-4px);
            transition: opacity .18s ease, transform .18s ease;
        }

        .notification-popover strong,
        .notification-popover span {
            display: block;
        }

        .notification-popover span {
            margin-top: 4px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.4;
        }

        .notification-wrap:hover .notification-popover,
        .notification-wrap:focus-within .notification-popover {
            opacity: 1;
            transform: translateY(0);
        }

        .content {
            display: grid;
            gap: 14px;
            padding: 14px;
        }

        .page-head,
        .panel {
            border: 1px solid var(--line);
            border-radius: 8px;
            background: var(--paper);
            box-shadow: 0 10px 30px rgba(0, 0, 0, .05);
        }

        .reactive,
        .nav-button,
        .btn-crm,
        .ghost-link,
        .metric-card,
        .stage-card,
        .feature-card,
        .item-row,
        .pill {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            transform: translate3d(0, 0, 0);
            transition:
                transform .18s ease,
                box-shadow .18s ease,
                border-color .18s ease,
                background-color .18s ease,
                color .18s ease;
        }

        .reactive:hover,
        .nav-button:hover,
        .btn-crm:hover,
        .metric-card:hover,
        .stage-card:hover,
        .feature-card:hover,
        .item-row:hover {
            transform: translateY(-2px);
            border-color: #9d9d9d;
            box-shadow: 0 14px 28px rgba(0, 0, 0, .13);
        }

        .ghost-link:hover,
        .pill:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, .1);
        }

        .reactive:active,
        .nav-button:active,
        .btn-crm:active,
        .ghost-link:active,
        .metric-card:active,
        .stage-card:active,
        .feature-card:active,
        .item-row:active,
        .pill:active {
            transform: translateY(0);
            box-shadow: 0 7px 16px rgba(0, 0, 0, .1);
        }

        .nav-link.reactive:hover,
        .nav-link.reactive.active,
        .nav-button.reactive:hover,
        .nav-button.reactive.active {
            box-shadow: 0 10px 24px rgba(255, 255, 255, .14);
        }

        .page-head {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 20px;
        }

        .eyebrow {
            margin-bottom: 8px;
            color: var(--muted);
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
        }

        h1 {
            max-width: 760px;
            font-size: 28px;
            font-weight: 700;
            line-height: 1.18;
        }

        h2 {
            font-size: 17px;
            font-weight: 700;
        }

        h3 {
            font-size: 14px;
            font-weight: 700;
        }

        .lead,
        .panel-header p,
        .muted,
        .item-meta,
        .stage-value,
        .feature-card p {
            color: var(--muted);
        }

        .lead {
            max-width: 720px;
            margin-top: 10px;
            font-size: 15px;
            line-height: 1.55;
        }

        .head-actions,
        .button-row {
            flex-wrap: wrap;
            gap: 8px;
        }

        .btn-crm {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 36px;
            padding: 0 13px;
            border: 1px solid var(--ink);
            border-radius: 8px;
            color: var(--ink);
            font-weight: 700;
            background: var(--paper);
        }

        .btn-crm.primary {
            color: var(--paper);
            background: var(--ink);
        }

        .metrics-grid,
        .feature-grid,
        .page-grid {
            display: grid;
            gap: 10px;
        }

        .metrics-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .metric-card,
        .stage-card,
        .feature-card,
        .item-card {
            border: 1px solid var(--line);
            border-radius: 8px;
            background: var(--paper);
        }

        .metric-card {
            min-height: 104px;
            padding: 14px;
        }

        .metric-meta {
            justify-content: space-between;
            gap: 12px;
            color: var(--muted);
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .metric-value {
            margin-top: 12px;
            font-size: 26px;
            font-weight: 700;
        }

        .metric-note {
            margin-top: 4px;
            color: var(--muted);
            font-size: 12px;
        }

        .split-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.35fr) minmax(320px, .75fr);
            gap: 14px;
        }

        .panel-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 14px;
            padding: 16px 18px;
            border-bottom: 1px solid var(--line);
        }

        .ghost-link {
            color: var(--ink);
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        .kanban {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 10px;
            padding: 14px;
        }

        .stage-card,
        .feature-card,
        .item-card {
            padding: 14px;
        }

        .stage-count {
            margin-top: 14px;
            font-size: 28px;
            font-weight: 700;
        }

        .stage-value {
            margin-top: 4px;
            font-size: 12px;
        }

        .activity-list,
        .item-list {
            display: grid;
            gap: 10px;
            padding: 14px;
        }

        .item-row {
            justify-content: space-between;
            gap: 12px;
            padding: 12px;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: var(--paper);
        }

        .mini-avatar,
        .feature-icon {
            width: 30px;
            height: 30px;
            color: var(--paper);
            background: var(--ink);
            border-radius: 8px;
        }

        .feature-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
            padding: 14px;
        }

        .feature-card {
            display: grid;
            gap: 12px;
        }

        .feature-card p {
            font-size: 13px;
            line-height: 1.5;
        }

        .page-grid {
            grid-template-columns: minmax(0, 1fr) 340px;
        }

        .table-lite {
            width: 100%;
            border-collapse: collapse;
        }

        .table-lite th,
        .table-lite td {
            padding: 13px 14px;
            border-bottom: 1px solid var(--line);
            text-align: left;
            vertical-align: top;
        }

        .table-lite th {
            color: var(--muted);
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .pill {
            display: inline-flex;
            padding: 5px 8px;
            border: 1px solid var(--ink);
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .settings-backdrop {
            position: fixed;
            inset: 10px;
            z-index: 20;
            display: none;
            background: rgba(0, 0, 0, .16);
            border-radius: 8px;
        }

        .settings-backdrop.open {
            display: block;
        }

        .settings-drawer {
            position: fixed;
            top: 10px;
            bottom: 10px;
            left: 252px;
            z-index: 21;
            display: flex;
            flex-direction: column;
            width: min(360px, calc(100vw - 282px));
            padding: 14px;
            color: var(--ink);
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 8px;
            box-shadow: 0 22px 45px rgba(0, 0, 0, .18);
            opacity: 0;
            pointer-events: none;
            transform: translateX(-18px);
            transition: opacity .2s ease, transform .2s ease;
        }

        .settings-drawer.open {
            opacity: 1;
            pointer-events: auto;
            transform: translateX(0);
        }

        .settings-head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            padding: 4px 2px 14px;
            border-bottom: 1px solid var(--line);
        }

        .settings-head p {
            margin-top: 4px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.45;
        }

        .settings-list {
            display: grid;
            gap: 8px;
            margin: 0;
            padding: 14px 0 0;
            list-style: none;
        }

        .settings-link {
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 54px;
            padding: 10px;
            color: var(--ink);
            border: 1px solid var(--line);
            border-radius: 8px;
            background: var(--paper);
        }

        .settings-link .nav-icon {
            color: var(--paper);
            background: var(--ink);
            border-color: var(--ink);
        }

        .settings-link span:last-child {
            display: block;
            margin-top: 2px;
            color: var(--muted);
            font-size: 12px;
        }

        .settings-foot {
            margin-top: auto;
            padding-top: 14px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.45;
        }

        @media (max-width: 1180px) {
            .crm-shell {
                grid-template-columns: 78px minmax(0, 1fr);
            }

            .brand span:not(.brand-mark),
            .nav-link span:not(.nav-icon),
            .nav-button span:not(.nav-icon),
            .sidebar-search,
            .nav-label,
            .sidebar-foot {
                display: none;
            }

            .nav-link,
            .nav-button {
                justify-content: center;
            }

            .settings-drawer {
                left: 98px;
                width: min(360px, calc(100vw - 128px));
            }
        }

        @media (max-width: 980px) {
            .metrics-grid,
            .feature-grid,
            .kanban {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .split-grid,
            .page-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 720px) {
            .crm-shell {
                display: grid;
                grid-template-columns: 64px minmax(0, 1fr);
                border-width: 6px;
            }

            .sidebar {
                padding: 10px 8px;
                gap: 12px;
            }

            .brand {
                justify-content: center;
            }

            .topbar,
            .page-head,
            .panel-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .metrics-grid,
            .feature-grid,
            .kanban {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 24px;
            }

            .table-lite {
                min-width: 620px;
            }

            .table-scroll {
                overflow-x: auto;
            }

            .settings-drawer {
                top: 6px;
                right: 6px;
                bottom: 6px;
                left: 76px;
                width: auto;
            }
        }
    </style>
</head>
<body>
    @php
        $active = $active ?? trim($__env->yieldContent('active', 'home'));
        $navItems = [
            ['key' => 'home', 'label' => 'Início', 'icon' => 'home', 'route' => 'home'],
            ['key' => 'statistics', 'label' => 'Estatísticas', 'icon' => 'stats', 'route' => 'crm.statistics'],
            ['key' => 'partners', 'label' => 'Parceiros', 'icon' => 'briefcase', 'route' => 'crm.partners'],
            ['key' => 'wallet', 'label' => 'Carteira', 'icon' => 'folder-open', 'route' => 'crm.wallet'],
            ['key' => 'sales', 'label' => 'Vendas', 'icon' => 'shopping-cart', 'route' => 'crm.sales'],
            ['key' => 'agenda', 'label' => 'Agenda', 'icon' => 'calendar', 'route' => 'crm.agenda'],
            ['key' => 'opportunities', 'label' => 'Oportunidades', 'icon' => 'usd', 'route' => 'crm.opportunities'],
            ['key' => 'reports', 'label' => 'Relatórios', 'icon' => 'list-alt', 'route' => 'crm.reports'],
        ];
    @endphp

    <div class="crm-shell">
        <aside class="sidebar" aria-label="CRM navigation">
            <a class="brand" href="{{ route('home') }}">
                <span class="brand-mark glyphicon glyphicon-user" aria-hidden="true"></span>
                <span>Cliento</span>
            </a>

            <label class="sidebar-search">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                <input type="search" placeholder="Search">
            </label>

            <nav>
                <p class="nav-label">Sales</p>
                <ul class="nav-list">
                    @foreach ($navItems as $item)
                        <li>
                            <a class="nav-link reactive {{ $active === $item['key'] ? 'active' : '' }}" href="{{ route($item['route']) }}">
                                <span class="nav-icon glyphicon glyphicon-{{ $item['icon'] }}" aria-hidden="true"></span>
                                <span>{{ $item['label'] }}</span>
                            </a>
                        </li>
                    @endforeach
                    <li>
                        <button class="nav-button reactive" id="settingsToggle" type="button" aria-expanded="false" aria-controls="settingsDrawer">
                            <span class="nav-icon glyphicon glyphicon-cog" aria-hidden="true"></span>
                            <span>Configurações</span>
                        </button>
                    </li>
                </ul>
            </nav>

            <div class="sidebar-foot">
                <strong>MVP first</strong>
                <span>Operação simples hoje. Integrações e IA depois.</span>
                <div class="auth-actions">
                    <a class="reactive" href="{{ route('login') }}">Entrar</a>
                    <span class="auth-separator">|</span>
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="reactive" type="submit">Sair</button>
                        </form>
                    @else
                        <span class="auth-disabled">Sair</span>
                    @endauth
                </div>
            </div>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="notification-wrap">
                    <button class="icon-btn notification-btn reactive" type="button" title="Notificações">
                        <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                        <span class="notification-count">4</span>
                    </button>
                    <div class="notification-popover" role="status">
                        <strong>4 informações pendentes</strong>
                        <span>2 follow-ups vencem hoje, 1 oportunidade mudou de etapa e 1 relatório semanal está pronto.</span>
                    </div>
                </div>
            </header>

            <div class="content">
                @yield('content')
            </div>
        </main>
    </div>

    <div class="settings-backdrop" id="settingsBackdrop" hidden></div>

    <aside class="settings-drawer" id="settingsDrawer" aria-label="Configurações" aria-hidden="true">
        <div class="settings-head">
            <div>
                <p class="eyebrow">Settings</p>
                <h2>Configurações</h2>
                <p>Opções disponíveis para personalizar, proteger e preparar o Cliento para uma operação maior.</p>
            </div>
            <button class="icon-btn reactive" id="settingsClose" type="button" title="Fechar configurações">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </button>
        </div>

        <ul class="settings-list">
            <li>
                <a class="settings-link reactive" href="{{ route('profile.edit') }}">
                    <span class="nav-icon glyphicon glyphicon-user" aria-hidden="true"></span>
                    <strong>Perfil <span>Dados pessoais, senha e segurança da conta.</span></strong>
                </a>
            </li>
            <li>
                <a class="settings-link reactive" href="#">
                    <span class="nav-icon glyphicon glyphicon-tasks" aria-hidden="true"></span>
                    <strong>Preferências <span>Idioma, moeda, formato de data e área de trabalho.</span></strong>
                </a>
            </li>
            <li>
                <a class="settings-link reactive" href="#">
                    <span class="nav-icon glyphicon glyphicon-lock" aria-hidden="true"></span>
                    <strong>Privacidade e cookies <span>Consentimento, cookies, rastreamento e retenção.</span></strong>
                </a>
            </li>
            <li>
                <a class="settings-link reactive" href="#">
                    <span class="nav-icon glyphicon glyphicon-wrench" aria-hidden="true"></span>
                    <strong>Configurações avançadas <span>Campos, permissões, automações e regras comerciais.</span></strong>
                </a>
            </li>
            <li>
                <a class="settings-link reactive" href="#">
                    <span class="nav-icon glyphicon glyphicon-transfer" aria-hidden="true"></span>
                    <strong>Integrações <span>Email, calendário, WhatsApp, ERP, pagamento e webhooks.</span></strong>
                </a>
            </li>
            <li>
                <a class="settings-link reactive" href="#">
                    <span class="nav-icon glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    <strong>Sobre o sistema <span>Plano, versão, suporte, auditoria e termos.</span></strong>
                </a>
            </li>
        </ul>

        <p class="settings-foot">Estas entradas são demonstrativas para o MVP. Elas indicam áreas naturais de expansão sem exigir CRUDs completos agora.</p>
    </aside>

    <script>
        const settingsToggle = document.getElementById('settingsToggle');
        const settingsClose = document.getElementById('settingsClose');
        const settingsDrawer = document.getElementById('settingsDrawer');
        const settingsBackdrop = document.getElementById('settingsBackdrop');

        function setSettingsOpen(isOpen) {
            settingsDrawer.classList.toggle('open', isOpen);
            settingsBackdrop.classList.toggle('open', isOpen);
            settingsBackdrop.hidden = !isOpen;
            settingsToggle.setAttribute('aria-expanded', String(isOpen));
            settingsDrawer.setAttribute('aria-hidden', String(!isOpen));
        }

        settingsToggle.addEventListener('click', () => {
            setSettingsOpen(!settingsDrawer.classList.contains('open'));
        });

        settingsClose.addEventListener('click', () => setSettingsOpen(false));
        settingsBackdrop.addEventListener('click', () => setSettingsOpen(false));

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                setSettingsOpen(false);
            }
        });
    </script>
</body>
</html>
