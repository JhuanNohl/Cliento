<section>
    <div class="panel-header compact">
        <div>
            <h2>Senha</h2>
            <p>Use uma senha longa e unica para proteger a conta.</p>
        </div>
    </div>

    <form method="post" action="{{ route('password.update') }}" class="form-panel flush">
        @csrf
        @method('put')

        <div class="form-field">
            <label for="update_password_current_password">Senha atual</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password">
            @foreach ($errors->updatePassword->get('current_password') as $message)
                <span class="form-error">{{ $message }}</span>
            @endforeach
        </div>

        <div class="form-field">
            <label for="update_password_password">Nova senha</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password">
            @foreach ($errors->updatePassword->get('password') as $message)
                <span class="form-error">{{ $message }}</span>
            @endforeach
        </div>

        <div class="form-field">
            <label for="update_password_password_confirmation">Confirmar senha</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password">
            @foreach ($errors->updatePassword->get('password_confirmation') as $message)
                <span class="form-error">{{ $message }}</span>
            @endforeach
        </div>

        <div class="button-row">
            <button class="btn-crm primary" type="submit">Salvar</button>

            @if (session('status') === 'password-updated')
                <p class="muted">Salvo.</p>
            @endif
        </div>
    </form>
</section>
