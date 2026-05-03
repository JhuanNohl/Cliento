<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $user = $request->user();

        $stats = [
            'companies' => $user->companies()->count(),
            'contacts' => $user->contacts()->count(),
            'open_deals' => $user->deals()->whereNotIn('stage', ['won', 'lost'])->count(),
            'forecast' => $user->deals()
                ->whereNotIn('stage', ['won', 'lost'])
                ->selectRaw('COALESCE(SUM(value * probability / 100), 0) as total')
                ->value('total'),
        ];

        $pipeline = $user->deals()
            ->selectRaw('stage, COUNT(*) as deals_count, COALESCE(SUM(value), 0) as total_value')
            ->groupBy('stage')
            ->get()
            ->keyBy('stage');

        $recentContacts = $user->contacts()
            ->with('company')
            ->latest()
            ->limit(5)
            ->get();

        $upcomingActivities = $user->activities()
            ->with(['company', 'contact'])
            ->whereNull('completed_at')
            ->orderByRaw('due_at IS NULL, due_at ASC')
            ->limit(5)
            ->get();

        return view('dashboard', [
            'stats' => $stats,
            'stages' => Deal::STAGES,
            'pipeline' => $pipeline,
            'recentContacts' => $recentContacts,
            'upcomingActivities' => $upcomingActivities,
        ]);
    }
}
