<form method="POST" action="{{ $action }}" class="space-y-6 rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
    @csrf
    @if ($method)
        @method($method)
    @endif

    <div>
        <x-input-label for="name" value="Nome" />
        <x-text-input id="name" name="name" class="mt-1 block w-full" :value="old('name', $company->name)" required autofocus />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <x-input-label for="segment" value="Segmento" />
            <x-text-input id="segment" name="segment" class="mt-1 block w-full" :value="old('segment', $company->segment)" />
            <x-input-error :messages="$errors->get('segment')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="website" value="Website" />
            <x-text-input id="website" name="website" type="url" class="mt-1 block w-full" :value="old('website', $company->website)" placeholder="https://empresa.com" />
            <x-input-error :messages="$errors->get('website')" class="mt-2" />
        </div>
    </div>

    <div class="grid gap-4 sm:grid-cols-3">
        <div class="sm:col-span-2">
            <x-input-label for="city" value="Cidade" />
            <x-text-input id="city" name="city" class="mt-1 block w-full" :value="old('city', $company->city)" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="state" value="UF" />
            <x-text-input id="state" name="state" maxlength="2" class="mt-1 block w-full uppercase" :value="old('state', $company->state)" />
            <x-input-error :messages="$errors->get('state')" class="mt-2" />
        </div>
    </div>

    <div>
        <x-input-label for="status" value="Status" />
        <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @foreach ($statuses as $value => $label)
                <option value="{{ $value }}" @selected(old('status', $company->status) === $value)>{{ $label }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('status')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="notes" value="Observacoes" />
        <textarea id="notes" name="notes" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('notes', $company->notes) }}</textarea>
        <x-input-error :messages="$errors->get('notes')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end gap-3">
        <a href="{{ route('companies.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Cancelar</a>
        <x-primary-button>Salvar</x-primary-button>
    </div>
</form>
