<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::firstOrNew([
            'email' => 'demo@microcrm.test',
        ]);

        $user->fill([
            'name' => 'Demo CRM',
            'password' => 'password',
        ]);

        $user->email_verified_at ??= now();
        $user->save();

        $companies = collect([
            ['name' => 'Nuvem Verde', 'segment' => 'SaaS', 'city' => 'Sao Paulo', 'state' => 'SP', 'status' => 'prospect'],
            ['name' => 'Atlas Finance', 'segment' => 'Fintech', 'city' => 'Curitiba', 'state' => 'PR', 'status' => 'active'],
            ['name' => 'Solaria Energia', 'segment' => 'Energia', 'city' => 'Belo Horizonte', 'state' => 'MG', 'status' => 'prospect'],
        ])->map(fn (array $data) => $user->companies()->updateOrCreate([
            'name' => $data['name'],
        ], $data));

        $contacts = collect([
            ['company_id' => $companies[0]->id, 'name' => 'Marina Costa', 'role' => 'Head de Operacoes', 'email' => 'marina@nuvemverde.test', 'source' => 'LinkedIn', 'last_contacted_at' => now()->subDays(2)],
            ['company_id' => $companies[1]->id, 'name' => 'Rafael Lima', 'role' => 'CTO', 'email' => 'rafael@atlasfinance.test', 'source' => 'Indicacao', 'last_contacted_at' => now()->subWeek()],
            ['company_id' => $companies[2]->id, 'name' => 'Bianca Torres', 'role' => 'Compras', 'email' => 'bianca@solaria.test', 'source' => 'Evento', 'last_contacted_at' => now()->subDays(10)],
        ])->map(fn (array $data) => $user->contacts()->updateOrCreate([
            'email' => $data['email'],
        ], $data));

        $deals = collect([
            ['company_id' => $companies[0]->id, 'contact_id' => $contacts[0]->id, 'title' => 'Implantacao CRM comercial', 'stage' => 'qualified', 'value' => 18000, 'probability' => 45, 'expected_close_date' => now()->addDays(20)],
            ['company_id' => $companies[1]->id, 'contact_id' => $contacts[1]->id, 'title' => 'Suporte mensal de integracoes', 'stage' => 'proposal', 'value' => 32000, 'probability' => 60, 'expected_close_date' => now()->addMonth()],
            ['company_id' => $companies[2]->id, 'contact_id' => $contacts[2]->id, 'title' => 'Automacao de follow-up', 'stage' => 'new', 'value' => 9500, 'probability' => 25, 'expected_close_date' => now()->addDays(45)],
        ])->map(fn (array $data) => $user->deals()->updateOrCreate([
            'title' => $data['title'],
        ], $data));

        $user->activities()->updateOrCreate([
            'type' => 'follow_up',
            'subject' => 'Enviar proposta revisada',
        ], [
            'user_id' => $user->id,
            'company_id' => $companies[0]->id,
            'contact_id' => $contacts[0]->id,
            'deal_id' => $deals[0]->id,
            'type' => 'follow_up',
            'subject' => 'Enviar proposta revisada',
            'due_at' => now()->addDay()->setTime(10, 0),
        ]);

        $user->activities()->updateOrCreate([
            'type' => 'call',
            'subject' => 'Reuniao tecnica com o CTO',
        ], [
            'user_id' => $user->id,
            'company_id' => $companies[1]->id,
            'contact_id' => $contacts[1]->id,
            'deal_id' => $deals[1]->id,
            'type' => 'call',
            'subject' => 'Reuniao tecnica com o CTO',
            'due_at' => now()->addDays(3)->setTime(15, 30),
        ]);
    }
}
