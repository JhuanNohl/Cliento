<section>
    <div class="panel-header compact">
        <div>
            <h2>Excluir conta</h2>
            <p>Esta ação remove permanentemente a conta e os dados associados.</p>
        </div>
    </div>

    <form method="post" action="{{ route('profile.destroy') }}" class="form-panel flush">
        @csrf
        @method('delete')

        <div class="form-field">
            <label for="password">Senha</label>
            <input id="password" name="password" type="password" placeholder="Confirme sua senha">
            @foreach ($errors->userDeletion->get('password') as $message)
                <span class="form-error">{{ $message }}</span>
            @endforeach
        </div>

        <div class="button-row">
            <button class="btn-crm primary" type="submit" onclick="return confirm('Excluir sua conta permanentemente?')">Excluir conta</button>
        </div>
    </form>
</section>
