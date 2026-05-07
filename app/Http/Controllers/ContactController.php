<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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

    public function store(ContactRequest $request): RedirectResponse
    {
        $request->user()->contacts()->create($request->validated());

        return redirect()->route('contacts.index')->with('status', 'Contato cadastrado com sucesso.');
    }

    public function edit(Request $request, Contact $contact): View
    {
        Gate::authorize('update', $contact);

        return view('contacts.edit', [
            'contact' => $contact,
            'companies' => $request->user()->companies()->orderBy('name')->get(),
        ]);
    }

    public function update(ContactRequest $request, Contact $contact): RedirectResponse
    {
        $contact->update($request->validated());

        return redirect()->route('contacts.index')->with('status', 'Contato atualizado.');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        Gate::authorize('delete', $contact);

        $contact->delete();

        return redirect()->route('contacts.index')->with('status', 'Contato removido.');
    }
}
