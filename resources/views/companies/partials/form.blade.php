<form method="POST" action="{{ $action }}" class="panel form-panel">
    @csrf
    @if ($method)
        @method($method)
    @endif

    <div class="form-field">
        <label for="name">Nome</label>
        <input id="name" name="name" value="{{ old('name', $company->name) }}" required autofocus>
        @error('name') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-grid">
        <div class="form-field">
            <label for="segment">Segmento</label>
            <input id="segment" name="segment" value="{{ old('segment', $company->segment) }}">
            @error('segment') <span class="form-error">{{ $message }}</span> @enderror
        </div>
        <div class="form-field">
            <label for="website">Website</label>
            <input id="website" name="website" type="url" value="{{ old('website', $company->website) }}" placeholder="https://empresa.com">
            @error('website') <span class="form-error">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="form-grid three">
        <div class="form-field">
            <label for="city">Cidade</label>
            <input id="city" name="city" value="{{ old('city', $company->city) }}">
            @error('city') <span class="form-error">{{ $message }}</span> @enderror
        </div>
        <div class="form-field">
            <label for="state">UF</label>
            <input id="state" name="state" maxlength="2" value="{{ old('state', $company->state) }}">
            @error('state') <span class="form-error">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="form-field">
        <label for="status">Status</label>
        <select id="status" name="status">
            @foreach ($statuses as $value => $label)
                <option value="{{ $value }}" @selected(old('status', $company->status) === $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('status') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-field">
        <label for="notes">Observações</label>
        <textarea id="notes" name="notes" rows="4">{{ old('notes', $company->notes) }}</textarea>
        @error('notes') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="button-row form-actions">
        <a href="{{ route('companies.index') }}" class="btn-crm">Cancelar</a>
        <button class="btn-crm primary" type="submit">Salvar</button>
    </div>
</form>
