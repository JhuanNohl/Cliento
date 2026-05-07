<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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

    public function store(CompanyRequest $request): RedirectResponse
    {
        $request->user()->companies()->create($request->validated());

        return redirect()->route('companies.index')->with('status', 'Empresa cadastrada com sucesso.');
    }

    public function edit(Request $request, Company $company): View
    {
        Gate::authorize('update', $company);

        return view('companies.edit', [
            'company' => $company,
            'statuses' => Company::STATUSES,
        ]);
    }

    public function update(CompanyRequest $request, Company $company): RedirectResponse
    {
        $company->update($request->validated());

        return redirect()->route('companies.index')->with('status', 'Empresa atualizada.');
    }

    public function destroy(Company $company): RedirectResponse
    {
        Gate::authorize('delete', $company);

        $company->delete();

        return redirect()->route('companies.index')->with('status', 'Empresa removida.');
    }
}
