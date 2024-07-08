<?php

namespace App\Policies;

use App\Models\User;

class SupportPolicy
{
    public function viewAny(User $user)
    {
        return $user->isSupport();
    }

    public function view(User $user, Model $model)
    {
        return $user->isSupport();
    }
}
