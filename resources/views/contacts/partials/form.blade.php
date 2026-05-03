<form method="POST" action="{{ $action }}" class="space-y-6 rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
    @csrf
    @if ($method)
        @method($method)
    @endif

    <div>
        <x-input-label for="name" value="Nome" />
        <x-text-input id="name" name="name" class="mt-1 block w-full" :value="old('name', $contact->name)" required autofocus />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <x-input-label for="company_id" value="Empresa" />
            <select id="company_id" name="company_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">Sem empresa</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" @selected((string) old('company_id', $contact->company_id) === (string) $company->id)>{{ $company->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('company_id')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="role" value="Cargo" />
            <x-text-input id="role" name="role" class="mt-1 block w-full" :value="old('role', $contact->role)" />
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>
    </div>

    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $contact->email)" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="phone" value="Telefone" />
            <x-text-input id="phone" name="phone" class="mt-1 block w-full" :value="old('phone', $contact->phone)" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
    </div>

    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <x-input-label for="source" value="Origem" />
            <x-text-input id="source" name="source" class="mt-1 block w-full" :value="old('source', $contact->source)" placeholder="LinkedIn, indicacao, evento" />
            <x-input-error :messages="$errors->get('source')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="last_contacted_at" value="Ultimo contato" />
            <x-text-input id="last_contacted_at" name="last_contacted_at" type="date" class="mt-1 block w-full" :value="old('last_contacted_at', $contact->last_contacted_at?->format('Y-m-d'))" />
            <x-input-error :messages="$errors->get('last_contacted_at')" class="mt-2" />
        </div>
    </div>

    <div>
        <x-input-label for="notes" value="Observacoes" />
        <textarea id="notes" name="notes" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('notes', $contact->notes) }}</textarea>
        <x-input-error :messages="$errors->get('notes')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end gap-3">
        <a href="{{ route('contacts.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Cancelar</a>
        <x-primary-button>Salvar</x-primary-button>
    </div>
</form>
