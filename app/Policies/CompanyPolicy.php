<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;

class CompanyPolicy
{
    public function update(User $user, Company $company): bool
    {
        return $this->owns($user, $company);
    }

    public function delete(User $user, Company $company): bool
    {
        return $this->owns($user, $company);
    }

    private function owns(User $user, Company $company): bool
    {
        return $company->user_id === $user->id;
    }
}
