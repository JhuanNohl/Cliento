<form method="POST" action="{{ $action }}" class="panel form-panel">
    @csrf
    @if ($method)
        @method($method)
    @endif

    <div class="form-field">
        <label for="name">Nome</label>
        <input id="name" name="name" value="{{ old('name', $contact->name) }}" required autofocus>
        @error('name') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-grid">
        <div class="form-field">
            <label for="company_id">Empresa</label>
            <select id="company_id" name="company_id">
                <option value="">Sem empresa</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" @selected((string) old('company_id', $contact->company_id) === (string) $company->id)>{{ $company->name }}</option>
                @endforeach
            </select>
            @error('company_id') <span class="form-error">{{ $message }}</span> @enderror
        </div>
        <div class="form-field">
            <label for="role">Cargo</label>
            <input id="role" name="role" value="{{ old('role', $contact->role) }}">
            @error('role') <span class="form-error">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="form-grid">
        <div class="form-field">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $contact->email) }}">
            @error('email') <span class="form-error">{{ $message }}</span> @enderror
        </div>
        <div class="form-field">
            <label for="phone">Telefone</label>
            <input id="phone" name="phone" value="{{ old('phone', $contact->phone) }}">
            @error('phone') <span class="form-error">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="form-grid">
        <div class="form-field">
            <label for="source">Origem</label>
            <input id="source" name="source" value="{{ old('source', $contact->source) }}" placeholder="LinkedIn, indicação, evento">
            @error('source') <span class="form-error">{{ $message }}</span> @enderror
        </div>
        <div class="form-field">
            <label for="last_contacted_at">Último contato</label>
            <input id="last_contacted_at" name="last_contacted_at" type="date" value="{{ old('last_contacted_at', $contact->last_contacted_at?->format('Y-m-d')) }}">
            @error('last_contacted_at') <span class="form-error">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="form-field">
        <label for="notes">Observações</label>
        <textarea id="notes" name="notes" rows="4">{{ old('notes', $contact->notes) }}</textarea>
        @error('notes') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="button-row form-actions">
        <a href="{{ route('contacts.index') }}" class="btn-crm">Cancelar</a>
        <button class="btn-crm primary" type="submit">Salvar</button>
    </div>
</form>
