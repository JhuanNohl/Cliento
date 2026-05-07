<?php

namespace App\Policies;

use App\Models\Contact;
use App\Models\User;

class ContactPolicy
{
    public function update(User $user, Contact $contact): bool
    {
        return $this->owns($user, $contact);
    }

    public function delete(User $user, Contact $contact): bool
    {
        return $this->owns($user, $contact);
    }

    private function owns(User $user, Contact $contact): bool
    {
        return $contact->user_id === $user->id;
    }
}
