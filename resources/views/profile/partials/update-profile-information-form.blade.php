<section>
    <div class="panel-header compact">
        <div>
            <h2>Informações do perfil</h2>
            <p>Atualize nome e email usados para acessar o CRM.</p>
        </div>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="form-panel flush">
        @csrf
        @method('patch')

        <div class="form-field">
            <label for="name">Nome</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @foreach ($errors->get('name') as $message)
                <span class="form-error">{{ $message }}</span>
            @endforeach
        </div>

        <div class="form-field">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @foreach ($errors->get('email') as $message)
                <span class="form-error">{{ $message }}</span>
            @endforeach

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <p class="muted">
                    Seu email ainda não foi verificado.
                    <button form="send-verification" class="ghost-link" type="submit">Reenviar verificação</button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="status-alert">Um novo link de verificação foi enviado.</p>
                @endif
            @endif
        </div>

        <div class="button-row">
            <button class="btn-crm primary" type="submit">Salvar</button>

            @if (session('status') === 'profile-updated')
                <p class="muted">Salvo.</p>
            @endif
        </div>
    </form>
</section>
