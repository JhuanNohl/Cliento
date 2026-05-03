@extends('crm.layout')

@section('title', 'Perfil')

@section('content')
    <section class="page-head">
        <div>
            <p class="eyebrow">Configurações</p>
            <h1>Perfil e segurança da conta.</h1>
            <p class="lead">Dados pessoais, senha e encerramento de conta usando a mesma linguagem visual do CRM.</p>
        </div>
    </section>

    <section class="page-grid">
        <div class="panel form-panel">
            @include('profile.partials.update-profile-information-form')
        </div>

        <aside class="panel form-panel">
            @include('profile.partials.update-password-form')
        </aside>
    </section>

    <section class="panel form-panel">
        @include('profile.partials.delete-user-form')
    </section>
@endsection
