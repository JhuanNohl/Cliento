<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CrmAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_cannot_edit_another_users_company(): void
    {
        $owner = User::factory()->create();
        $intruder = User::factory()->create();
        $company = $owner->companies()->create([
            'name' => 'Private Account',
            'status' => 'prospect',
        ]);

        $this->actingAs($intruder)
            ->get(route('companies.edit', $company))
            ->assertForbidden();
    }

    public function test_contact_cannot_be_linked_to_another_users_company(): void
    {
        $owner = User::factory()->create();
        $user = User::factory()->create();
        $foreignCompany = $owner->companies()->create([
            'name' => 'Foreign Account',
            'status' => 'active',
        ]);

        $this->actingAs($user)
            ->post(route('contacts.store'), [
                'company_id' => $foreignCompany->id,
                'name' => 'Ana Silva',
                'email' => 'ana@example.com',
            ])
            ->assertSessionHasErrors('company_id');

        $this->assertDatabaseMissing(Contact::class, [
            'user_id' => $user->id,
            'company_id' => $foreignCompany->id,
        ]);
    }

    public function test_dashboard_counts_only_the_authenticated_users_records(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        $company = $user->companies()->create(['name' => 'Acme', 'status' => 'active']);
        $user->contacts()->create(['company_id' => $company->id, 'name' => 'Joao']);
        $user->deals()->create(['company_id' => $company->id, 'title' => 'Open deal', 'stage' => 'qualified', 'value' => 1000, 'probability' => 50]);
        $user->deals()->create(['company_id' => $company->id, 'title' => 'Closed deal', 'stage' => 'won', 'value' => 900, 'probability' => 100]);

        $otherCompany = $otherUser->companies()->create(['name' => 'Other', 'status' => 'active']);
        $otherUser->deals()->create(['company_id' => $otherCompany->id, 'title' => 'Other deal', 'stage' => 'new', 'value' => 5000, 'probability' => 80]);

        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertViewHas('stats', [
                'companies' => 1,
                'contacts' => 1,
                'open_deals' => 1,
                'forecast' => '500',
            ]);
    }
}
