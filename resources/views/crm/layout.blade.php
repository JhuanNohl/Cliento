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
        .topbar-actions,
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

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 9px;
            min-height: 38px;
            padding: 8px 10px;
            color: #f4f4f4;
            border: 1px solid #333333;
            border-radius: 8px;
            background: #101010;
        }

        .sidebar-user-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            border: 1px solid currentColor;
            border-radius: 6px;
            font-size: 12px;
        }

        .sidebar-user-name {
            min-width: 0;
            overflow: hidden;
            font-size: 13px;
            font-weight: 700;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .auth-actions {
            gap: 8px;
            margin-top: 12px;
            color: #f4f4f4;
            font-size: 13px;
            font-weight: 700;
        }

        .auth-actions form {
            margin: 0;
        }

        .auth-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 34px;
            padding: 0 10px;
            color: #f4f4f4;
            border: 1px solid #333333;
            border-radius: 8px;
            background: #101010;
            transition:
                transform .18s ease,
                color .18s ease,
                background-color .18s ease,
                border-color .18s ease,
                box-shadow .18s ease;
        }

        .auth-action:hover,
        .auth-action:focus {
            color: var(--ink);
            background: var(--paper);
            border-color: var(--paper);
            box-shadow: 0 10px 24px rgba(255, 255, 255, .12);
            transform: translateY(-2px);
        }

        .auth-disabled {
            color: #8f8f8f;
            opacity: .55;
            pointer-events: none;
        }

        .main {
            min-width: 0;
            background: var(--soft);
        }

        .topbar {
            justify-content: flex-end;
            min-height: 62px;
            padding: 12px 18px;
            border-bottom: 1px solid var(--line);
            background: var(--paper);
        }

        .topbar-actions {
            gap: 8px;
            margin-left: auto;
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
        }

        .notification-popover {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
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
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            padding: 20px;
        }

        .page-head > div:first-child {
            flex: 1 1 auto;
            min-width: 0;
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

        .head-actions {
            flex: 0 0 auto;
            justify-content: flex-end;
            margin-left: auto;
            padding-top: 2px;
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

        .panel-header.compact {
            padding: 0 0 14px;
        }

        .ghost-link {
            color: var(--ink);
            padding: 0;
            border: 0;
            background: transparent;
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
            grid-template-columns: repeat(3, minmax(0, 1fr));
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

        .table-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            white-space: nowrap;
        }

        .empty-state,
        .status-alert {
            padding: 14px;
            color: var(--muted);
            font-size: 13px;
        }

        .status-alert {
            margin-bottom: 14px;
            color: var(--ink);
            border: 1px solid var(--line);
            border-radius: 8px;
            background: #f8f8f8;
            font-weight: 700;
        }

        .form-panel {
            display: grid;
            gap: 14px;
            max-width: 780px;
            padding: 18px;
        }

        .form-panel.flush {
            padding: 14px 0 0;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .form-grid.three {
            grid-template-columns: minmax(0, 2fr) minmax(120px, .7fr);
        }

        .form-field {
            display: grid;
            gap: 7px;
        }

        .form-field label {
            color: var(--muted);
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .form-field input,
        .form-field select,
        .form-field textarea {
            width: 100%;
            min-height: 40px;
            padding: 9px 10px;
            color: var(--ink);
            border: 1px solid var(--line);
            border-radius: 8px;
            background: var(--paper);
            outline: 0;
        }

        .form-field textarea {
            min-height: 112px;
            resize: vertical;
        }

        .form-field input:focus,
        .form-field select:focus,
        .form-field textarea:focus {
            border-color: var(--ink);
            box-shadow: 0 0 0 3px rgba(5, 5, 5, .08);
        }

        .form-actions {
            justify-content: flex-end;
        }

        .form-error {
            color: #9f1d1d;
            font-size: 12px;
            font-weight: 700;
        }

        .pagination-wrap {
            margin-top: 14px;
        }

        .pagination-wrap nav > div:first-child {
            display: none;
        }

        .pagination-wrap nav > div:last-child {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            color: var(--muted);
            font-size: 12px;
        }

        .pagination-wrap a,
        .pagination-wrap span {
            color: inherit;
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
            right: 10px;
            z-index: 21;
            display: flex;
            flex-direction: column;
            width: min(380px, calc(100vw - 40px));
            padding: 14px;
            color: var(--ink);
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 8px;
            box-shadow: 0 22px 45px rgba(0, 0, 0, .18);
            opacity: 0;
            pointer-events: none;
            transform: translateX(18px);
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
            .nav-label,
            .sidebar-foot {
                display: none;
            }

            .nav-link,
            .nav-button {
                justify-content: center;
            }

            .settings-drawer {
                right: 10px;
                width: min(380px, calc(100vw - 118px));
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

            .form-grid,
            .form-grid.three {
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

            .page-head,
            .panel-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .head-actions {
                justify-content: flex-start;
                margin-left: 0;
                padding-top: 0;
            }

            .topbar {
                align-items: center;
                flex-direction: row;
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
                width: min(360px, calc(100vw - 88px));
            }
        }
    </style>
</head>
<body>
    @php
        $active = $active ?? trim($__env->yieldContent('active', 'home'));
        $navItems = [
            ['key' => 'home', 'label' => 'Início', 'icon' => 'home', 'route' => 'home'],
            ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'dashboard', 'route' => 'dashboard'],
            ['key' => 'companies', 'label' => 'Empresas', 'icon' => 'briefcase', 'route' => 'companies.index'],
            ['key' => 'contacts', 'label' => 'Contatos', 'icon' => 'user', 'route' => 'contacts.index'],
            ['key' => 'statistics', 'label' => 'Estatísticas', 'icon' => 'stats', 'route' => 'crm.statistics'],
            ['key' => 'partners', 'label' => 'Parceiros', 'icon' => 'briefcase', 'route' => 'crm.partners'],
            ['key' => 'wallet', 'label' => 'Carteira', 'icon' => 'folder-open', 'route' => 'crm.wallet'],
            ['key' => 'sales', 'label' => 'Vendas', 'icon' => 'shopping-cart', 'route' => 'crm.sales'],
            ['key' => 'agenda', 'label' => 'Agenda', 'icon' => 'calendar', 'route' => 'crm.agenda'],
            ['key' => 'opportunities', 'label' => 'Oportunidades', 'icon' => 'usd', 'route' => 'crm.opportunities'],
            ['key' => 'reports', 'label' => 'Relatórios', 'icon' => 'list-alt', 'route' => 'crm.reports'],
        ];
        $notificationCount = $notificationCount ?? 4;
        $notificationLabel = $notificationCount === 1
            ? '1 notificação pendente'
            : $notificationCount . ' notificações pendentes';
        $sidebarUserName = auth()->user()?->name ?? 'Visitante';
    @endphp

    <div class="crm-shell">
        <aside class="sidebar" aria-label="CRM navigation">
            <a class="brand" href="{{ route('home') }}">
                <span class="brand-mark" aria-hidden="true">
                    <x-application-logo style="width: 24px; height: 24px;" />
                </span>
                <span>Cliento</span>
            </a>

            <nav>
                <p class="nav-label">Menu</p>
                <ul class="nav-list">
                    @foreach ($navItems as $item)
                        <li>
                            <a class="nav-link reactive {{ $active === $item['key'] ? 'active' : '' }}" href="{{ route($item['route']) }}">
                                <span class="nav-icon glyphicon glyphicon-{{ $item['icon'] }}" aria-hidden="true"></span>
                                <span>{{ $item['label'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            <div class="sidebar-foot">
                <div class="sidebar-user" title="{{ $sidebarUserName }}">
                    <span class="sidebar-user-icon glyphicon glyphicon-user" aria-hidden="true"></span>
                    <strong class="sidebar-user-name">{{ $sidebarUserName }}</strong>
                </div>

                <div class="auth-actions">
                    <a class="auth-action" href="{{ route('login') }}" title="Entrar">
                        <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                        <span>Entrar</span>
                    </a>
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="auth-action" type="submit" title="Sair">
                                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                <span>Sair</span>
                            </button>
                        </form>
                    @else
                        <span class="auth-action auth-disabled">
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                            <span>Sair</span>
                        </span>
                    @endauth
                </div>
            </div>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="topbar-actions">
                    <div class="notification-wrap">
                        <button class="icon-btn notification-btn reactive" type="button" title="{{ $notificationLabel }}" aria-label="{{ $notificationLabel }}">
                            <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                            <span class="notification-count">{{ $notificationCount }}</span>
                        </button>
                        <div class="notification-popover" role="status">
                            <strong>{{ $notificationLabel }}</strong>
                            <span>2 follow-ups vencem hoje, 1 oportunidade mudou de etapa e 1 relatório semanal está pronto.</span>
                        </div>
                    </div>

                    <button class="icon-btn reactive" id="settingsToggle" type="button" title="Configurações" aria-label="Configurações" aria-expanded="false" aria-controls="settingsDrawer">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </button>
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
                <p>Ajustes essenciais para usar agora e caminhos claros para escalar o CRM depois.</p>
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
                <a class="settings-link reactive" href="{{ route('home') }}">
                    <span class="nav-icon glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    <strong>Sobre o sistema <span>Plano, versão, suporte, auditoria e termos.</span></strong>
                </a>
            </li>
        </ul>

        <p class="settings-foot">O essencial fica visível para a apresentação, sem links mortos ou excesso de opções.</p>
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
