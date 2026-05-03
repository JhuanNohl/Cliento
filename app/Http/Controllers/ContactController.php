<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(Request $request): View
    {
        $contacts = $request->user()
            ->contacts()
            ->with('company')
            ->latest()
            ->paginate(10);

        return view('contacts.index', compact('contacts'));
    }

    public function create(Request $request): View
    {
        return view('contacts.create', [
            'contact' => new Contact,
            'companies' => $request->user()->companies()->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->user()->contacts()->create($this->validatedData($request));

        return redirect()->route('contacts.index')->with('status', 'Contato cadastrado com sucesso.');
    }

    public function edit(Request $request, Contact $contact): View
    {
        $this->authorizeOwner($request, $contact);

        return view('contacts.edit', [
            'contact' => $contact,
            'companies' => $request->user()->companies()->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Contact $contact): RedirectResponse
    {
        $this->authorizeOwner($request, $contact);
        $contact->update($this->validatedData($request));

        return redirect()->route('contacts.index')->with('status', 'Contato atualizado.');
    }

    public function destroy(Request $request, Contact $contact): RedirectResponse
    {
        $this->authorizeOwner($request, $contact);
        $contact->delete();

        return redirect()->route('contacts.index')->with('status', 'Contato removido.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'company_id' => [
                'nullable',
                Rule::exists('companies', 'id')->where('user_id', $request->user()->id),
            ],
            'name' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'source' => ['nullable', 'string', 'max:100'],
            'last_contacted_at' => ['nullable', 'date'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);
    }

    private function authorizeOwner(Request $request, Contact $contact): void
    {
        abort_unless($contact->user_id === $request->user()->id, 403);
    }
}
