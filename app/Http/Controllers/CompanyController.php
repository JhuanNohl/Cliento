<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function index(Request $request): View
    {
        $companies = $request->user()
            ->companies()
            ->withCount(['contacts', 'deals'])
            ->latest()
            ->paginate(10);

        return view('companies.index', compact('companies'));
    }

    public function create(): View
    {
        return view('companies.create', [
            'company' => new Company(['status' => 'prospect']),
            'statuses' => Company::STATUSES,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->user()->companies()->create($this->validatedData($request));

        return redirect()->route('companies.index')->with('status', 'Empresa cadastrada com sucesso.');
    }

    public function edit(Request $request, Company $company): View
    {
        $this->authorizeOwner($request, $company);

        return view('companies.edit', [
            'company' => $company,
            'statuses' => Company::STATUSES,
        ]);
    }

    public function update(Request $request, Company $company): RedirectResponse
    {
        $this->authorizeOwner($request, $company);
        $company->update($this->validatedData($request));

        return redirect()->route('companies.index')->with('status', 'Empresa atualizada.');
    }

    public function destroy(Request $request, Company $company): RedirectResponse
    {
        $this->authorizeOwner($request, $company);
        $company->delete();

        return redirect()->route('companies.index')->with('status', 'Empresa removida.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'segment' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'url', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'size:2'],
            'status' => ['required', Rule::in(array_keys(Company::STATUSES))],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);
    }

    private function authorizeOwner(Request $request, Company $company): void
    {
        abort_unless($company->user_id === $request->user()->id, 403);
    }
}
